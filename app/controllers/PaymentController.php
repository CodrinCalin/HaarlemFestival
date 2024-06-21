<?php

namespace App\Controllers;

use App\lib\CartManager;
use App\lib\SessionManager;
use App\Services\TicketService;
use App\Services\OrderService;
use App\Logic\MailerLogic;
use Stripe\Stripe;
use Stripe\Webhook;
use Exception;

class PaymentController extends Controller
{
    private $stripeSecretKey;
    private $ticketService;
    private $orderService;
    private $mailer;

    public function __construct() {
        try {
            SessionManager::startSession();
            $this->ticketService = new TicketService();
            $this->orderService = new OrderService();
            $this->getMailInstance();
            $this->stripeSecretKey = $_ENV['STRIPE_SECRET_KEY'];
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->handleError($e);
        }
    }

    public function checkout() {
        try {
            include __DIR__ . '/../views/payment/checkout.php';
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->handleError($e);
        }
    }

    public function checkout_success() {
        try {
            $this->checkIfCheckoutSuccess();
            $cart = CartManager::getCart();
            $cartItems = $cart->getItems();

            $uniqueCode = $this->orderService->createOrder($cartItems);
            CartManager::clearCart();

            $this->sendOrderConfirmationEmail("qhgjpafz@sharklasers.com", $uniqueCode);

            include __DIR__ . '/../views/payment/checkout_success.php';
        } catch (Exception $e) {
            error_log($e->getMessage());
            echo 'Error storing order: ' . $e->getMessage();
        }
    }

    private function sendOrderConfirmationEmail($customerEmail, $uniqueCode)
    {
        try {
            $this->getMailInstance();

            $order_url_link = "http://localhost/order?unique_code=" . $uniqueCode;
            $subject = "Your Order Confirmation";
            $body = "Thank you for your order. You can view your order details here: <br><br> <a href=".$order_url_link."> Order Details </a>";

            $this->mailer->setMailInfo($customerEmail, $subject, $body);
            $this->mailer->sendMail();
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }

    public function checkout_cancel() {
        try {
            include __DIR__ . '/../views/payment/checkout_cancel.php';
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->handleError($e);
        }
    }

    private function getMailInstance(){
        try {
            $this->mailer = new MailerLogic();
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }

    private function checkIfCheckoutSuccess() {
        try {
            if (!isset($_SESSION['checkout_success']) || !$_SESSION['checkout_success']) {
                header("Location: /");
                exit;
            }
            unset($_SESSION['checkout_success']);
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }

    public function setCheckoutSuccessSession() {
        try {
            $_SESSION['checkout_success'] = true;
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }

    public function handleStripeWebhook() {
        try {
            Stripe::setApiKey($this->stripeSecretKey);

            $payload = @file_get_contents('php://input');
            $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
            $endpoint_secret = $_ENV['STRIPE_WEBHOOK_SECRET'];

            try {
                $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
            } catch(\UnexpectedValueException $e) {
                http_response_code(400);
                exit();
            } catch(\Stripe\Exception\SignatureVerificationException $e) {
                http_response_code(400);
                exit();
            }

            switch ($event->type) {
                case 'checkout.session.completed':
                    $session = $event->data->object;
                    $customerEmail = $session->customer_details->email;
                    $uniqueCode = $this->orderService->createOrder($session->line_items);
                    $this->sendOrderConfirmationEmail($customerEmail, $uniqueCode);
                    break;
                default:
                    echo 'Received unknown event type ' . $event->type;
            }

            http_response_code(200);
        } catch (Exception $e) {
            error_log($e->getMessage());
            http_response_code(500);
        }
    }

    private function handleError(Exception $e)
    {
        header('Location: /error');
        exit;
    }
}
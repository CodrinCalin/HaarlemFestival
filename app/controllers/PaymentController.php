<?php

namespace App\Controllers;

use App\lib\CartManager;
use App\lib\SessionManager;
use App\Services\TicketService;
use App\Services\OrderService;
use App\Logic\MailerLogic;
use Stripe\Stripe;
use Stripe\Webhook;

class PaymentController extends Controller
{
    private $stripeSecretKey;
    private $ticketService;
    private $orderService;
    private $mailer;

    public function __construct() {
        SessionManager::startSession();
        $this->ticketService = new TicketService();
        $this->orderService = new OrderService();
        $this->getMailInstance();
        $this->stripeSecretKey = $_ENV['STRIPE_SECRET_KEY'];
    }

    // <editor-fold desc="Checkout">
    public function checkout() {
        include __DIR__ . '/../views/payment/checkout.php';
    }
    // </editor-fold>

    // <editor-fold desc="Checkout Success">
    public function checkout_success() {
        // Check if checkout was completed
        $this->checkIfCheckoutSuccess();

        $cart = CartManager::getCart();
        $cartItems = $cart->getItems();

        try {
            $uniqueCode = $this->orderService->createOrder($cartItems);
            CartManager::clearCart();

            // Send order confirmation email
            $this->sendOrderConfirmationEmail("qhgjpafz@sharklasers.com", $uniqueCode); // Have to manually change the email for now!!!

            include __DIR__ . '/../views/payment/checkout_success.php';
        } catch (Exception $e) {
            echo 'Error storing order: ' . $e->getMessage();
        }
    }

    private function sendOrderConfirmationEmail($customerEmail, $uniqueCode)
    {
        $this->getMailInstance();

        $order_url_link = "http://localhost/order/" . $uniqueCode;
        $subject = "Your Order Confirmation";
        $body = "Thank you for your order. You can view your order details here: <br><br> <a href=".$order_url_link."> Order Details </a>";

        $this->mailer->setMailInfo($customerEmail, $subject, $body);
        $this->mailer->sendMail();
    }
    // </editor-fold>

    // <editor-fold desc="Checkout Cancel">
    public function checkout_cancel() {
        include __DIR__ . '/../views/payment/checkout_cancel.php';
    }
    // </editor-fold>

    private function getMailInstance(){
        $this->mailer = new MailerLogic();
    }

    private function checkIfCheckoutSuccess() {
        if (!isset($_SESSION['checkout_success']) || !$_SESSION['checkout_success']) {
            header("Location: /");
            exit;
        }
        unset($_SESSION['checkout_success']);
    }

    // Method to set session variable after successful checkout
    public function setCheckoutSuccessSession() {
        $_SESSION['checkout_success'] = true;
    }

    // Webhook handler
    public function handleStripeWebhook() {
        Stripe::setApiKey($this->stripeSecretKey);

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $endpoint_secret = $_ENV['STRIPE_WEBHOOK_SECRET'];

        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                // Fulfill the purchase, extract email
                $customerEmail = $session->customer_details->email;
                $uniqueCode = $this->orderService->createOrder($session->line_items); // Assuming line_items are in the session

                // Send the email
                $this->sendOrderConfirmationEmail($customerEmail, $uniqueCode);

                break;
            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        http_response_code(200);
    }
}

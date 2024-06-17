<?php

namespace App\Controllers;

use App\lib\SessionManager;
use App\Services\TicketService;

class CartController extends Controller
{
    private $ticketService;

    public function __construct() {
        parent::__construct();
        $this->ticketService = new TicketService();
    }

    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ticketId = $_POST['ticket_id'];
            $quantity = $_POST['quantity'];

            $ticket = $this->ticketService->getTicketById($ticketId);
            if ($ticket) {
                $cart = SessionManager::getCart();
                $cart->addItem($ticket, $quantity);
            }
        }

        // Redirect back to the referring page
        $this->redirectBack();
    }

    public function removeFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ticketId = $_POST['ticket_id'];
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

            $cart = SessionManager::getCart();
            $cart->removeItem($ticketId, $quantity);
        }

        // Redirect back to the referring page
        $this->redirectBack();
    }

    public function clearCart()
    {
        SessionManager::clearCart();

        // Redirect back to the referring page
        $this->redirectBack();
    }

    public function viewCart() {
        $cart = SessionManager::getCart();
        return $cart->getItems();
    }

    public function getTotal() {
        $cart = SessionManager::getCart();
        return $cart->getTotal();
    }

    private function redirectBack()
    {
        // Check if there is a referrer and redirect there; otherwise, redirect to a default page
        $referrer = $_SERVER['HTTP_REFERER'] ?? '/';
        header("Location: $referrer");
        exit();
    }
}

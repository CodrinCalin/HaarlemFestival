<?php

namespace App\Controllers;

use App\lib\CartManager;
use App\Models\Cart;
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
                $cart = CartManager::getCart();
                $cart->addItem($ticket, $quantity);
            }
        }

        $this->redirectBack();
    }

    public function methodAddToCart($ticket_id, $quantity)
    {
        $ticket = $this->ticketService->getTicketById($ticket_id);
        if ($ticket) {
            $cart = CartManager::getCart();
            $cart->addItem($ticket, $quantity);
        }
    }

    public function removeFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ticketId = $_POST['ticket_id'];
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

            $cart = CartManager::getCart();
            $cart->removeItem($ticketId, $quantity);
        }

        $this->redirectBack();
    }

    public function clearCart()
    {
        CartManager::clearCart();
        $this->redirectBack();
    }

    public function viewCart() {
        $cart = CartManager::getCart();
        return $cart->getItems();
    }

    public function getTotal() {
        $cart = CartManager::getCart();
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

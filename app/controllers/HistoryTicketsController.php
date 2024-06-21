<?php
namespace App\Controllers;

use http\Header;

class HistoryTicketsController extends Controller {
    public $historyTicketService;

    function __construct() {
        session_start();
        $this->historyTicketService = new \App\Services\HistoryTicketService();
    }

    public function index()
    {
        $service = $this->historyTicketService;
        require __DIR__ . '/../views/historyTickets/index.php';
    }

    public function addTicketToCard() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET["id"];
            $amount = $_POST["amount"];

            $ticket = $this->historyTicketService->getTicketById($id);
            if ($ticket) {
                $cart = CartManager::getCart();
                $cart->addItem($ticket, $amount);
            }
        }
    }
}



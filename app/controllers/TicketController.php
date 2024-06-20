<?php

namespace App\Controllers;

use App\Services\TicketService;

class TicketController extends Controller {

    private $ticketService;
    public function __construct() {
        $this->ticketService = new TicketService();
    }

    public function index() {
        $model = [];
        $ticketPageHeader = "Tickets";
        if($_GET){
            switch ($_GET["category"]){
                case "YUMMY":
                    $model = $this->ticketService->getAllYummyTickets();
                    $ticketPageHeader = $ticketPageHeader . " (Yummy)";
                    break;
                case "HISTORY":
                    $model = $this->ticketService->getAllHistoryTickets();
                    $ticketPageHeader = $ticketPageHeader . " (History)";
                    break;
                case "DANCE":
                    $model = $this->ticketService->getAllDanceTickets();
                    $ticketPageHeader = $ticketPageHeader . " (Dance)";
                    break;
            }
        } else{
          $model = $this->ticketService->getAllTickets();
        }
        require __DIR__ . '/../views/ticket/index.php';
    }
}
<?php
namespace App\Controllers;

use http\Header;

class HistoryTicketsController {
    public function index()
    {
        require __DIR__ . '/../views/historyTickets/index.php';
    }
}



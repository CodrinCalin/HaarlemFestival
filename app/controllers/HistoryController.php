<?php
namespace App\Controllers;

use http\Header;

class HistoryController {
    public $historyService;

    function __construct() {
        session_start();
        $this->historyService = new \App\Services\historyService();
    }

    public function index()
    {
        $service = $this->historyService;
        require __DIR__ . '/../views/history/index.php';
    }

    public function locationDetails()
    {
        $service = $this->historyService;
        require __DIR__ . '/../views/history/locationDetails.php';
    }
}



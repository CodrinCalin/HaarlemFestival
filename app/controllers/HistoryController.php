<?php
namespace App\Controllers;

use http\Header;

class HistoryController {
    public function index()
    {
        session_start();
        require __DIR__ . '/../views/history/index.php';
    }

    public function locationDetails()
    {
        require __DIR__ . '/../views/history/locationDetails.php';
    }
}



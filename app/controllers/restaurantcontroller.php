<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\UserService;
use http\Header;

class RestaurantController {

    private $service;

    function __construct() {
        //$this->service = new RestaurantService();
    }

    public function index()
    {
        require __DIR__ . '/../views/restaurant/index.php';
    }

    public function returnToIndex()
    {
        header("Location: /restaurant");
        exit();
    }
}
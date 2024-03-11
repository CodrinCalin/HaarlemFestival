<?php

namespace App\Controllers;

use App\Models\Restaurant;
use App\Models\restaurantCategory;
use App\Services\RestaurantService;
use http\Header;

class RestaurantController {

    private $service;

    function __construct() {
        $this->service = new RestaurantService();
    }

    public function index()
    {
        $categoryModel = $this->service->getAllCategories();
        $restaurantModel = $this->service->getAllRestaurants();
        $yummyDetails = $this->service->getYummyDetails();
        require __DIR__ . '/../views/restaurant/index.php';
    }

    public function returnToIndex()
    {
        header("Location: /restaurant");
        exit();
    }
}
<?php

namespace App\Controllers;

use App\Models\Restaurant;
use App\Models\restaurantCategory;
use App\Services\RestaurantService;
use App\Services\ManageRestaurantService;
use http\Header;

class RestaurantController {

    private $service;
    private $manageRestaurantService;

    function __construct() {
        session_start();
        $this->service = new RestaurantService();
        $this->manageRestaurantService = new ManageRestaurantService();
    }

    public function index()
    {
        try {
            $categoryModel = $this->service->getAllCategories();
            $restaurantModel = $this->service->getAllRestaurants();
            $yummyDetails = $this->service->getYummyDetails();
        }
        catch(\Exception $e) {
            echo "<h1>Error retrieving data, refresh and try again.</h1>";
        }
        require __DIR__ . '/../views/restaurant/index.php';
    }

    public function details() {
        $restaurantId = $_GET["id"] ?? null;

        if ($restaurantId !== null) {

            $restaurantModel = $this->manageRestaurantService->getRestaurantById($restaurantId);
            $yummyDetails = $this->manageRestaurantService->getYummyDetails();
            require __DIR__ . '/../views/restaurant/details.php';

        } else {
            echo "<h1>Restaurant with provided ID not found!</h1>";
        }
    }

    public function returnToIndex()
    {
        header("Location: /restaurant");
        exit();
    }
}
<?php

namespace App\Controllers;

use App\Models\Restaurant;
use App\Models\restaurantCategory;
use App\Services\ManageRestaurantService;
use App\Services\RestaurantService;
use http\Header;

class ManageRestaurantsController {

    private $manageRestaurantService;
    private $restaurantService;

    function __construct() {
        $this->manageRestaurantService = new ManageRestaurantService();
        $this->restaurantService = new RestaurantService();
    }

    public function index() {
        require __DIR__ . '/../views/managerestaurants/index.php';
    }

    public function categories() {
        $categoryModel = $this->restaurantService->getAllCategories();
        require __DIR__ . '/../views/managerestaurants/categories.php';
    }

    public function createCategory() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $category = new restaurantCategory();

            $category->category = $_POST["category"];
            $category->order = $_POST["order"];

            $this->manageRestaurantService->addCategory($category);

            $this->returnToCategory();
        }else{
            require __DIR__ . '/../views/managerestaurants/createcategory.php';
        }
    }

    public function editCategory() {
        $categoryId = $_GET["id"] ?? null;

        if ($categoryId !== null){

                $categoryModel = $this->manageRestaurantService->getCategoryById($categoryId);

                if($categoryModel)
                {
                    require __DIR__ . '/../views/managerestaurants/editcategory.php';
                } else {
                    echo "<h1>Category does not exist with provided ID!</h1>";
                }
        }else {
            echo "<h1>ID not provided!</h1>";
        }

    }

    public function updateCategoryById() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoryId = $_POST["id"] ?? null;
//            $categoryId = $_GET["id"] ?? null;

            if ($categoryId !== null) {
                $category = $this->manageRestaurantService->getCategoryById($categoryId);

                $category->category = $_POST["category"];
                $category->order = $_POST["order"];

                $this->manageRestaurantService->updateCategoryById($category);

                $this->returnToCategory();
            } else {
                echo "<h1>ID not provided!</h1>";
            }
        } else {
            echo "<h1>Category does not exist with the provided Id!</h1>";
        }
    }

    public function returnToIndex()
    {
        header("Location: /restaurant");
        exit();
    }

    public function returnToCategory() {
        header("Location: /managerestaurants/categories");
        exit();
    }
}
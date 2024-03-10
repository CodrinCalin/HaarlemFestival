<?php

namespace App\Controllers;

use App\Models\Restaurant;
use App\Models\restaurantCategory;
use App\Services\ManageRestaurantService;
use App\Services\RestaurantService;
use http\Header;
use mysql_xdevapi\Exception;

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

    public function restaurants() {
        $restaurantModel = $this->restaurantService->getAllRestaurants();
        require __DIR__ . '/../views/managerestaurants/restaurants.php';
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

    public function updateCategory() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $categoryId = $_POST["id"] ?? null;
//            $categoryId = $_GET["id"] ?? null;

            if ($categoryId !== null) {
                $category = $this->manageRestaurantService->getCategoryById($categoryId);

                $category->category = $_POST["category"];
                $category->order = $_POST["order"];

                $this->manageRestaurantService->updateCategory($category);

                $this->returnToCategory();
            } else {
                echo "<h1>ID not provided!</h1>";
            }
        } else {
            echo "<h1>Category does not exist with the provided Id!</h1>";
        }
    }

    public function deleteCategoryById() {
        $categoryId = $_GET["id"] ?? null;

        if ($categoryId !== null){

            $categoryModel = $this->manageRestaurantService->getCategoryById($categoryId);

            if($categoryModel)
            {
                try {
                    $this->manageRestaurantService->deleteCategoryById($categoryId);
                }
                catch(\Exception $e) {
                    echo '<script>alert("Error: One or more restaurants still belong to this category. Change the restaurant(s) categories and try again.")</script>';
                    //Work-around to return to categories since you can't change header after jscript output...
                    echo '<script>window.location.href = "/managerestaurants/categories"</script>';
                    exit();
                }

                $this->returnToCategory();

            } else {
                echo "<h1>Category does not exist with provided ID!</h1>";
            }
        }else {
            echo "<h1>ID not provided!</h1>";
        }
    }

    public function deleteRestaurantById() {
        $restaurantId = $_GET["id"] ?? null;

        if ($restaurantId !== null){

            $restaurantModel = $this->manageRestaurantService->getRestaurantById($restaurantId);

            if($restaurantModel)
            {

                $this->manageRestaurantService->deleteRestaurantById($restaurantId);

                $this->returnToRestaurant();

            } else {
                echo "<h1>Restaurant does not exist with provided ID!</h1>";
            }
        }else {
            echo "<h1>ID not provided!</h1>";
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

    public function returnToRestaurant() {
        header("Location: /managerestaurants/restaurants");
        exit();
    }
}
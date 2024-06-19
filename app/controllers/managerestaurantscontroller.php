<?php

namespace App\Controllers;

use App\Models\Restaurant;
use App\Models\restaurantCategory;
use App\Models\yummyDetails;
use App\Services\ManageRestaurantService;
use App\Services\RestaurantService;
use App\Services\ImageService;
use http\Header;
use mysql_xdevapi\Exception;

class ManageRestaurantsController {

    private $manageRestaurantService;
    private $restaurantService;
    private $imageService;

    function __construct() {
        session_start();
        $this->manageRestaurantService = new ManageRestaurantService();
        $this->restaurantService = new RestaurantService();
        $this->imageService = new ImageService();
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

    public function yummy() {
        $yummyModel = $this->manageRestaurantService->getYummyDetails();
        require __DIR__ . '/../views/managerestaurants/yummy.php';
    }

    public function createRestaurant() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $restaurant = new Restaurant();

            $restaurant->name = $_POST["restaurant"];
            $restaurant->rating = $_POST["rating"];
            $restaurant->address = $_POST["address"];
            $restaurant->phoneNumber = $_POST["number"];
            $restaurant->menuLink = $_POST["menuLink"];
            $restaurant->adultPrice = $_POST["adultPrice"];
            $restaurant->childPrice = $_POST["childPrice"];
            $restaurant->description = $_POST["description"];
            $restaurant->menuText = $_POST["menuText"];

            $restaurant->addTags($_POST["tags1"]);
            $restaurant->addTags($_POST["tags2"]);
            $restaurant->addTags($_POST["tags3"]);

            $restaurant->restaurantCategory = $_POST["category"];

            //Set all images to default first
            $restaurant->previewImage = "default.png";
            $restaurant->frontPageImage = "default.png";
            $restaurant->displayImageOne = "default.png";
            $restaurant->displayImageTwo = "default.png";

            $restaurant = $this->setRestaurantImages($restaurant);

            $this->manageRestaurantService->addRestaurant($restaurant);

            $this->returnToRestaurant();

        }else{
            $categoryModel = $this->restaurantService->getAllCategories();
            require __DIR__ . '/../views/managerestaurants/createrestaurant.php';
        }
    }

    public function editRestaurant() {
        $restaurantId = $_GET["id"] ?? null;

        if ($restaurantId !== null){

            $restaurantModel = $this->manageRestaurantService->getRestaurantById($restaurantId);
            $categoryModel = $this->restaurantService->getAllCategories();

            if($restaurantModel)
            {
                $tagArray = $restaurantModel->getTagsArray();
                require __DIR__ . '/../views/managerestaurants/editrestaurant.php';
            } else {
                echo "<h1>Restaurant does not exist with provided ID!</h1>";
            }
        }else {
            echo "<h1>ID not provided!</h1>";
        }
    }

    public function updateRestaurant() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $restaurantId = $_POST["id"] ?? null;

            if ($restaurantId !== null) {
                $restaurant = $this->manageRestaurantService->getRestaurantById($restaurantId);
                //Clear Tags to add more
                $restaurant->tags = "";

                $restaurant->name = $_POST["restaurant"];
                $restaurant->rating = $_POST["rating"];
                $restaurant->address = $_POST["address"];
                $restaurant->phoneNumber = $_POST["number"];
                $restaurant->menuLink = $_POST["menuLink"];
                $restaurant->adultPrice = $_POST["adultPrice"];
                $restaurant->childPrice = $_POST["childPrice"];
                $restaurant->description = $_POST["description"];
                $restaurant->menuText = $_POST["menuText"];

                $restaurant->addTags($_POST["tags1"]);
                $restaurant->addTags($_POST["tags2"]);
                $restaurant->addTags($_POST["tags3"]);

                $restaurant->restaurantCategory = $_POST["category"];

                $restaurant = $this->setRestaurantImages($restaurant);

                $this->manageRestaurantService->updateRestaurant($restaurant);

                $this->returnToRestaurant();
            } else {
                echo "<h1>ID not provided!</h1>";
            }
        } else {
            echo "<h1>Restaurant does not exist with the provided Id!</h1>";
        }
    }

    private function setRestaurantImages($restaurant) {
        if($_FILES!=null){

            if($_FILES["previewImage"]["error"] !== UPLOAD_ERR_NO_FILE){
                //Delete the previous image if replacing one
                if($restaurant->previewImage !== "default.png") { $this->imageService->deleteImage($restaurant->previewImage, "img/restaurant/");}
                //Set the image to the uploaded one
                $restaurant->previewImage = $this->imageService->uploadImage($_FILES["previewImage"], "img/restaurant/");
            }

            if($_FILES["frontPageImage"]["error"] !== UPLOAD_ERR_NO_FILE){
                if($restaurant->frontPageImage !== "default.png") { $this->imageService->deleteImage($restaurant->frontPageImage, "img/restaurant/");}
                $restaurant->frontPageImage = $this->imageService->uploadImage($_FILES["frontPageImage"], "img/restaurant/"); }

            if($_FILES["displayImageOne"]["error"] !== UPLOAD_ERR_NO_FILE){
                if($restaurant->displayImageOne !== "default.png") { $this->imageService->deleteImage($restaurant->displayImageOne, "img/restaurant/");}
                $restaurant->displayImageOne = $this->imageService->uploadImage($_FILES["displayImageOne"], "img/restaurant/"); }

            if($_FILES["displayImageTwo"]["error"] !== UPLOAD_ERR_NO_FILE){
                if($restaurant->displayImageTwo !== "default.png") { $this->imageService->deleteImage($restaurant->displayImageTwo, "img/restaurant/");}
                $restaurant->displayImageTwo = $this->imageService->uploadImage($_FILES["displayImageTwo"], "img/restaurant/"); }
        }

        return $restaurant;
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

    public function updateYummyDetails() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $yummy = $this->manageRestaurantService->getYummyDetails();

            $yummy->date = $_POST["date"];
            $yummy->description = $_POST["description"];
            $yummy->reminder = $_POST["reminder"];

            $this->manageRestaurantService->updateYummyDetails($yummy);

            $this->returnToManageView();
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

    public function returnToManageView() {
        header("Location: /managerestaurants");
        exit();
    }
}
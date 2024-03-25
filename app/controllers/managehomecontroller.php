<?php
namespace App\Controllers;

class Managehomecontroller
{
    function __construct()
    {
        session_start();
    }

    public function index()
    {
        require __DIR__ . '/../views/managehome/index.php';
    }

    public function manageHeader() {
        require __DIR__ . '/../views/managehome/manageHeader.php';
    }

    public function manageNavigation() {
        require __DIR__ . '/../views/managehome/manageNavigation.php';
    }

    public function manageSchedule() {
        require __DIR__ . '/../views/managehome/manageSchedule.php';
    }

    public function manageEvents() {
        require __DIR__ . '/../views/managehome/manageEvents.php';
    }

    public function changeHeaderImage() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $image = $_POST["image"];


            $this->manageRestaurantService->addCategory($category);

            $this->returnToCategory();
        }else{
            require __DIR__ . '/../views/managerestaurants/createcategory.php';
        }
    }
}
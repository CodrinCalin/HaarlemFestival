<?php

namespace App\Models;

class TicketYummy extends Ticket
{
    private $restaurantName;
    private $star;
    private $foodType;

    // <editor-fold desc="Constructor">
    public function __construct($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $datetime, $restaurantName, $star, $foodType) {
        parent::__construct($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $datetime);
        $this->setRestaurantName($restaurantName);
        $this->setStar($star);
        $this->setFoodType(explode('/', $foodType)); // Convert foodType string to array
    }
    // </editor-fold>

    // <editor-fold desc="Getters">
    public function getRestaurantName(){
        return $this->restaurantName;
    }
    public function getStar(){
        return $this->star;
    }
    public function getFoodType(){
        return $this->foodType;
    }
    // </editor-fold>

    // <editor-fold desc="Setters">
    public function setRestaurantName($restaurantName){
        $this->restaurantName = $restaurantName;
    }
    public function setStar($star){
        $this->star = $star;
    }
    public function setFoodType(array $explode){
        $this->foodType = $explode;
    }
    // </editor-fold>

    // <editor-fold desc="PrintDetails">
    public function printDetails() {
        parent::printDetails();
        echo "Restaurant Name: {$this->restaurantName}<br>";
        echo "Star Rating: {$this->star}<br>";
        echo "Food Type: " . implode(', ', $this->foodType) . "<br>";
    }
    // </editor-fold>
}

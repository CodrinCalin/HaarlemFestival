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
    private function getStarPrint(){
        $print = "";
        for ($i = 1; $i <= $this->getStar(); $i++) {
            $print = $print . "*";
        }
        return $print;
    }
    public function getFoodType(){
        return $this->foodType;
    }
    public function getFullTicketName(){
        return $this->getType() . " - " . $this->name . " (". $this->getCategory() .")";
    }
    public function getSpecificTicketDetails(){
        return $this->getRestaurantName() . " " . $this->getStarPrint();
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
        echo "<strong>Restaurant Name:</strong> {$this->getRestaurantName()}<br>";
        echo "<strong>Star Rating:</strong> {$this->getStar()}<br>";
        echo "<strong>Food Type:</strong> " . implode(', ', $this->getFoodType()) . "<br>";
    }
    // </editor-fold>
    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }
}

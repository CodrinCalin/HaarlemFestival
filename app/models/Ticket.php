<?php

namespace App\Models;

class Ticket implements \JsonSerializable {
    protected $id;
    protected $name;
    protected $category;
    protected $type;
    protected $quantityAvailable;
    protected $price;
    protected $location;
    protected $duration;
    protected $dateTime;

    // <editor-fold desc="Constructor">
    public function __construct($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $dateTime) {
        $this->setId($id);
        $this->setName($name);
        $this->setCategory($category);
        $this->setType($type);
        $this->setQuantityAvailable($quantityAvailable);
        $this->setPrice($price);
        $this->setLocation(explode('/', $location)); // Convert location string to array
        $this->setDuration($duration);
        $this->setDateTime($dateTime);
    }
    // </editor-fold>

    // <editor-fold desc="Getters">
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getType() {
        return $this->type;
    }

    public function getQuantityAvailable() {
        return $this->quantityAvailable;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getDateTime() {
        $date = new \DateTime($this->dateTime);
        return $date;
    }

    // </editor-fold>

    // <editor-fold desc="Setters">
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setQuantityAvailable($quantityAvailable) {
        $this->quantityAvailable = $quantityAvailable;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setLocation($location) {
        $this->location = $location;
    }

    public function setDuration($duration) {
        $this->duration = $duration;
    }

    public function setDateTime($dateTime) {
        $this->dateTime = $dateTime;
    }
    // </editor-fold>

    // <editor-fold desc="PrintDetails">
    public function printDetails() {
        echo "Ticket ID: {$this->id}<br>";
        echo "Name: {$this->name}<br>";
        echo "Category: {$this->category}<br>";
        echo "Type: {$this->type}<br>";
        echo "Quantity Available: {$this->quantityAvailable}<br>";
        echo "Price: €{$this->price}<br>";
        echo "Location: " . implode(', ', $this->location) . "<br>";
        echo "Duration: {$this->duration} minutes<br>";
        echo "Datetime: {$this->dateTime}<br>";
    }
    public function jsonSerialize(): mixed {
        return get_object_vars($this);
    }
}
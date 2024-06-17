<?php

namespace App\Models;

class TicketDance extends Ticket
{
    private $artist;

    // <editor-fold desc="Constructor">
    public function __construct($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $datetime, $artist) {
        parent::__construct($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $datetime);
        $this->setArtist(explode('/', $artist)); // Convert artist string to array
    }
    // </editor-fold>

    // <editor-fold desc="Getters">
    public function getArtist(){
        return $this->artist;
    }
    // </editor-fold>

    // <editor-fold desc="Setters">
    public function setArtist(array $explode){
        $this->artist = $explode;
    }
    // </editor-fold>

    // <editor-fold desc="PrintDetails">
    public function printDetails() {
        parent::printDetails();
        echo "Artist(s): " . implode(', ', $this->artist) . "<br>";
    }
    // </editor-fold>
}
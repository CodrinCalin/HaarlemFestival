<?php

namespace App\Models;

class TicketHistory extends Ticket
{
    private $language;
    private $guide;

    // <editor-fold desc="Constructor">
    public function __construct($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $datetime, $language, $guide) {
        parent::__construct($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $datetime);
        $this->setLanguage($language);
        $this->setGuide($guide);
    }
    // </editor-fold>

    // <editor-fold desc="Getters">
    public function getLanguage(){
        return $this->language;
    }
    public function getGuide(){
        return $this->guide;
    }
    // </editor-fold>

    // <editor-fold desc="Setters">
    public function setLanguage($language) {
        $this->language = $language;
    }
    public function setGuide($guide) {
        $this->guide = $guide;
    }
    // </editor-fold>

    // <editor-fold desc="PrintDetails">
    public function printDetails() {
        parent::printDetails();
        echo "Language: {$this->language}<br>";
        echo "Guide: {$this->guide}<br>";
    }
    // </editor-fold>
}
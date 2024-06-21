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

    public function getFullTicketName(){
        return $this->getType() . " - " . $this->name . " (". $this->getCategory() .")";
    }
    // </editor-fold>

    // <editor-fold desc="Setters">
    public function setLanguage($language) {
        $this->language = $language;
    }
    public function setGuide($guide) {
        $this->guide = $guide;
    }
    public function getSpecificTicketDetails(){
        return $this->getGuide() . " (" . $this->getLanguage() . ")";
    }
    // </editor-fold>

    // <editor-fold desc="PrintDetails">
    public function printDetails() {
        parent::printDetails();
        echo "<strong>Language:</strong> {$this->getLanguage()}<br>";
        echo "<strong>Guide:</strong> {$this->getGuide()}<br>";
    }
    // </editor-fold>
}
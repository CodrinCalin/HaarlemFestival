<?php
namespace App\Models;


class Venue
{

   public $venue_id;
   public $name;
   public $address;
   public $venue_img_url;
   public $description;

    public function __construct($venue_id = null, $name = null, $address = null, $venue_img_url = null, $description = null)
    {
        $this->venue_id = $venue_id;
        $this->name = $name;
        $this->address = $address;
        $this->venue_img_url = $venue_img_url;
        $this->description = $description;
    }

    public function getId() {
        return $this->venue_id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getVenueImgUrl() {
        return $this->venue_img_url;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setId($venue_id) {
        $this->venue_id = $venue_id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setVenueImgUrl($venue_img_url) {
        $this->venue_img_url = $venue_img_url;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}
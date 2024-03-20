<?php
namespace App\Models;


class Event
{

    public $event_id;
    public $date;
    public $time;
    public $session_type;
    public $duration;
    public $tickets_available;
    public $price;
    public $remarks;
    public $venue_name;
    public $artist_name;


    public function __construct($event_id = null, $date = null, $time = null, $session_type = null, $duration = null, $tickets_available = null, $price = null, $remarks = null, $venue_name = null, $artist_name = null)
    {
        $this->event_id = $event_id;
        $this->date = $date;
        $this->time = $time;
        $this->session_type = $session_type;
        $this->duration = $duration;
        $this->tickets_available = $tickets_available;
        $this->price = $price;
        $this->remarks = $remarks;
        $this->venue_name = $venue_name;
        $this->artist_name = $artist_name;
    }


    public function getId() {
        return $this->event_id;
    }

    public function getDate() {
        return $this->date;
    }

    public function getTime() {
        return $this->time;
    }

    public function getSessionType() {
        return $this->session_type;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getTicketsAvailable() {
        return $this->tickets_available;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getRemarks() {
        return $this->remarks;
    }

    public function getVenueName() {
        return $this->venue_name;
    }

    public function getArtistName() {
        return $this->artist_name;
    }
}
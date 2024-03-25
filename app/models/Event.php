<?php
namespace App\Models;

class Event {
    public int $id;
    public string $name;
    public array $dates;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
        $this->dates = array();
    }

    public function addDate($date) {
        $this->dates[] = $date;
    }
}
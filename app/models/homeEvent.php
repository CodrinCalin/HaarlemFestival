<?php
namespace App\Models;

class HomeEvent {
    public int $id;
    public string $name;
    public array $dates;

    function __construct($id, $name){
        $this->name = $name;
        $this->id = $id;
    }

    public function addDate($date) {
        $this->dates[] = $date;
    }
}
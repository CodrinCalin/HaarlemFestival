<?php

namespace App\Models;

class RestaurantTime
{
    public int $id;
    public int $dateId;
    public string $time;
    public int $maxSeats;
    public int $seatsLeft;

}
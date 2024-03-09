<?php

namespace App\Models;

class RestaurantSession
{
    public int $id;
    public restaurant $restaurant;
    public \DateTime $timeslot;
    public \DateTime $date;
    public int $availableSeats;

}
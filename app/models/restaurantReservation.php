<?php

namespace App\Models;

class RestaurantReservation
{
    public int $id;
    public int $restaurantId;
    public string $date;
    public string $time;
    public string $comment;
    public int $adults;
    public int $children;
    public float $totalPrice;

}
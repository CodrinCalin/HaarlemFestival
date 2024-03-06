<?php

namespace App\Models;

class Restaurant
{
    public int $id;
    public string $name;
    public string $image;
    public string $description;
    public string $location;
    public string $phone_number;
    public string $website;
    public array $food_tags;
    public int $rating;
    public string $category;

    //Sessions, Seats, Reservations on separate class

}
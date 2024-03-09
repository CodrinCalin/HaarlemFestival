<?php

namespace App\Models;

class Restaurant
{
    public int $id;
    public string $name;
    public array $tags;
    public string $rating;
    public string $address;
    public string $phoneNumber;
    public string $menuLink;
    public string $menuText;
    public float $adultPrice;
    public float $childPrice;
    public string $previewImage;
    public string $frontPageImage;
    public string $displayImageOne;
    public string $displayImageTwo;
    public restaurantCategory $restaurantCategory;

}
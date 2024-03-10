<?php

namespace App\Models;

class Restaurant
{
    public int $id;
    public string $name;
    private string $tags;
    public int $rating;
    public string $address;
    public string $phoneNumber;
    public string $menuLink;
    public string $menuText;
    public string $description;
    public float $adultPrice;
    public float $childPrice;
    public string $previewImage;
    public string $frontPageImage;
    public string $displayImageOne;
    public string $displayImageTwo;
    public string $restaurantCategory;

    public function getTags(): string {
        $splitTags = explode(',', $this->tags);
        return "$splitTags[0] | $splitTags[1] | $splitTags[2]";
    }

    public function setTags($tags) {
        //May need to separate tags by , here later during creation
        $this->tags = $tags;
    }

}
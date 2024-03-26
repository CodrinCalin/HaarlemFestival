<?php
namespace App\Models;


class DanceContentDetail
{
    public $id;
    public $main_image_url;
    public $description_image_one;
    public $description_image_two;
    public $description_body_one;
    public $description_body_two;
    public $artist_id;

    public function __construct($id =null, $main_image_url = null, $description_image_one = null, $description_image_two = null, $description_body_one = null, $description_body_two = null, $artist_id = null)
    {
        $this->id = $id;
        $this->main_image_url = $main_image_url;
        $this->description_image_one = $description_image_one;
        $this->description_image_two = $description_image_two;
        $this->description_body_one = $description_body_one;
        $this->description_body_two = $description_body_two;
        $this->artist_id = $artist_id;
    }
}
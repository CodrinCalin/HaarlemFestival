<?php
namespace App\Models;


class DanceContentDetail
{ 
    public $id;
    public $artist_id;
    public $description_image;
    public $description_body;

    public function __construct($id = null, $artist_id = null, $description_image = null, $description_body = null)
    {
        $this->id = $id;
        $this->artist_id = $artist_id;
        $this->description_image = $description_image;
        $this->description_body = $description_body;
    }
}

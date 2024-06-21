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

    public function getId()
    {
        return $this->id;
    }

    public function getArtistId()
    {
        return $this->artist_id;
    }

    public function getDescriptionImage()
    {
        return $this->description_image;
    }

    public function getDescriptionBody()
    {
        return $this->description_body;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setArtistId($artist_id)
    {
        $this->artist_id = $artist_id;
    }

    public function setDescriptionImage($description_image)
    {
        $this->description_image = $description_image;
    }

    public function setDescriptionBody($description_body)
    {
        $this->description_body = $description_body;
    }
}

<?php
namespace App\Models;


class Artists
{

    public $artist_id;
    public $name;
    public $style;
    public $card_image_url;
    public $title;
    function __construct($artist_id = null, $name = null, $style = null, $card_image_url = null){
      $this->artist_id = $artist_id;  
      $this->name = $name;
      $this->style = $style;
      $this->card_image_url = $card_image_url;
    }

    public function getId() { 
        return $this->artist_id;
    }

    public function getName() { 
      return $this->name;
    }
}
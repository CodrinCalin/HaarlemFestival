<?php
namespace App\Models;


class Artists
{

    public $artist_id;
    public $name;
    public $style;

    function __construct($artist_id, $name, $style){ 
      $this->artist_id = $artist_id;  
      $this->name = $name;
      $this->style = $style;
    }

    public function getId() { 
        return $this->artist_id;
    }

    public function getName() { 
      return $this->name;
    }
}
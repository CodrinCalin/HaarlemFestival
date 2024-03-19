<?php

namespace App\Services;

use App\Repositories\DanceRepository;

class DanceService { 
  private $repository;

  function getNewInstance(){ 
     $this->repository = new DanceRepository();
  }

  function getAllArtists() { 
      $this->getNewInstance();
      return $this->repository->getAllArtists();
  }

  function getAllEvents() {
      $this->getNewInstance();
      return $this->repository->getAllEvents();
  }
}
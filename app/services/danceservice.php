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

  function getAllDanceEvents() {
      $this->getNewInstance();
      return $this->repository->getAllDanceEvents();
  }

  function getAllEventsByDate() {
      $this->getNewInstance();
      return $this->repository->getAllEventsByDate();
  }

  function getAllVenues() {
      $this->getNewInstance();
      return $this->repository->getAllVenues();
  }

  function getArtistById($artistId) {
      $this->getNewInstance();
      return $this->repository->getArtistById($artistId);
  }

  function getDetailPageContentByArtistId($artistId) {
      $this->getNewInstance();
      return $this->repository->getDetailPageContentByArtistId($artistId);
  }

    function getDanceEventsByArtist($artist_name) {
        $this->getNewInstance();
        return $this->repository->getDanceEventsByArtist($artist_name);
    }
    function getAllSpecialTickets() {
        $this->getNewInstance();
        return $this->repository->getAllSpecialTickets();
    }

    public function addArtist($files, $postData) {
        $name = $postData['name'];
        $style = $postData['style'];
        $title = $postData['title'];
        $cardImageUrl = $this->uploadImage($files['card_image_url']);
        $mainImageUrl = $this->uploadImage($files['artist_main_img_url']);

        return $this->repository->createArtist($name, $style, $title, $cardImageUrl, $mainImageUrl);
    }

    protected function uploadImage($file) {
        $targetDirectory = "/img/danceimages/";
        $targetFile = $targetDirectory . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $targetFile);
        return $targetFile; // Return path to store in database
    }
}

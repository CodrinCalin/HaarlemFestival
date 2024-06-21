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
// ----------------- Add, Update, Delete Artists -----------------
    public function addArtist($artist) {
        $this->getNewInstance();
       return $this->repository->addArtist($artist);
    }

    public function deleteArtist($artistId){  
        $this->getNewInstance();
        return $this->repository->deleteArtist($artistId);
    }

    public function updateArtist($artist) {
        $this->getNewInstance();
        return $this->repository->updateArtist($artist);
    }
// ----------------- Add, Update, Delete Notable Tracks -----------------

    public function getAllTracks() {
        $this->getNewInstance();
        return $this->repository->getAllTracks();
    }

    public function addTrack($track) {
        $this->getNewInstance();
        return $this->repository->addTrack($track);
    }

    public function deleteTrack($trackId) {
        $this->getNewInstance();
        return $this->repository->deleteTrack($trackId);
    }

    public function updateTrack($track) {
        $this->getNewInstance();
        return $this->repository->updateTrack($track);
    }

    public function getTrackById($trackId) {
        $this->getNewInstance();
        return $this->repository->getTrackById($trackId);
    }

// ----------------- Add, Update, Delete Venues -----------------

    public function addVenue($venue) {
        $this->getNewInstance();
        return $this->repository->addVenue($venue);
    }

    public function deleteVenue($venueId) {
        $this->getNewInstance();
        return $this->repository->deleteVenue($venueId);
    }

    public function updateVenue($venueData) {
        return $this->repository->updateVenue($venueData);
    }
    
    public function getVenueById($venueId) {
        $this->getNewInstance();
        return $this->repository->getVenueById($venueId);
    }

    // ----------------- Add, Update, Delete Dance Content Home -----------------

    public function addDanceContentHome($danceContentHome) {
        $this->getNewInstance();
        return $this->repository->addDanceContentHome($danceContentHome);
    }

    public function deleteDanceContentHome($danceContentHomeId) {
        $this->getNewInstance();
        return $this->repository->deleteDanceContentHome($danceContentHomeId);
    }

    public function updateDanceContentHome($danceContentHome) {
        $this->getNewInstance();
        return $this->repository->updateDanceContentHome($danceContentHome);
    }

    public function getDanceContentHomeById($danceContentHomeId) {
        $this->getNewInstance();
        return $this->repository->getDanceContentHomeById($danceContentHomeId);
    }

    public function getAllDanceContentHome() {
        $this->getNewInstance();
        return $this->repository->getAllDanceContentHome();
    }

        // ----------------- Add, Update, Delete Dance Content Detail -----------------

    public function addDanceContentDetail($danceContentDetail) {
        $this->getNewInstance();
        return $this->repository->addDanceContentDetail($danceContentDetail);
    }

    public function deleteDanceContentDetail($danceContentDetailId) {
        $this->getNewInstance();
        return $this->repository->deleteDanceContentDetail($danceContentDetailId);
    }

    public function updateDanceContentDetail($danceContentDetail) {
        $this->getNewInstance();
        return $this->repository->updateDanceContentDetail($danceContentDetail);
    }

    public function getDanceContentDetailById($danceContentDetailId) {
        $this->getNewInstance();
        return $this->repository->getDanceContentDetailById($danceContentDetailId);
    }

    public function getAllDanceContentDetail() {
        $this->getNewInstance();
        return $this->repository->getAllDanceContentDetail();
    }

    protected function uploadImage($file) {
        $targetDirectory = "/img/danceimages/";
        $targetFile = $targetDirectory . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $targetFile);
        return $targetFile; // Return path to store in database
    }
}

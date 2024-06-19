<?php
namespace App\Controllers;

class ManageDanceController
{
    public $danceService;

    function __construct()
    {
        session_start();
        $this->danceService = new \App\Services\danceService();
    }

    public function index()
    {
        require __DIR__ . '/../views/manageDance/index.php';
    }

    public function manageArtists() {
        require __DIR__ . '/../views/manageDance/manageArtists.php';
    }

    public function addArtist() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $response = $this->danceService->addArtist($_FILES, $_POST);
            echo json_encode($response);
            exit;
        }
    }

    public function Artists()
    {
        try {
            $this->setHeaders();


            $danceEvent = $this->danceEventService->getAllArtists();

            echo json_encode($danceEvent);

        } catch (Exception $e) {
            // Debugging: Log any exceptions

            echo json_encode(['error' => 'An error occurred while fetching danceEvent data.']);
        }
    }


    public function manageIntro() {

    }

    public function managePracticalInformation() {

    }

    public function manageSchedule() {
    }

    public function manageMeetingPlace() {
    }

    public function manageLocations() {
    }

    public function manageFAQs() {
    }
}




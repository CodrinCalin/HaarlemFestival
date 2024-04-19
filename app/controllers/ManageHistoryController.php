<?php
namespace App\Controllers;

class ManageHistoryController
{
    public $historyService;

    function __construct()
    {
        session_start();
        $this->historyService = new \App\Services\historyService();
    }

    public function index()
    {
        require __DIR__ . '/../views/managehistory/index.php';
    }

    public function manageHeader() {
        require __DIR__ . '/../views/managehistory/manageHeader.php';
    }

    public function manageIntro() {
        $service = $this->historyService;
        require __DIR__ . '/../views/managehistory/manageIntro.php';
    }

    public function managePracticalInformation() {
        require __DIR__ . '/../views/managehistory/managePracticalInformation.php';
    }

    public function manageSchedule() {
        require __DIR__ . '/../views/managehistory/manageSchedule.php';
    }

    public function manageMeetingPlace() {
        require __DIR__ . '/../views/managehistory/manageMeetingPlace.php';
    }

    public function manageLocations() {
        require __DIR__ . '/../views/managehistory/manageLocations.php';
    }

    public function manageFAQs() {
        require __DIR__ . '/../views/managehistory/manageFAQs.php';
    }

    public function changeIntro() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $newText = $_POST["introText"];

            $this->historyService->updateContent(1, $newText);

            header("Location: /managehistory/manageIntro");
        }
    }
}
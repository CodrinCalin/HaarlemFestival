<?php
namespace App\Controllers;

class ManageHistoryController
{
    function __construct()
    {
        session_start();
    }

    public function index()
    {
        require __DIR__ . '/../views/managehistory/index.php';
    }

    public function manageHeader() {
        require __DIR__ . '/../views/managehistory/manageHeader.php';
    }

    public function manageIntro() {
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
}
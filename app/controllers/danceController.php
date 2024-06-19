<?php
namespace App\Controllers;
use App\Models\Artists;
use App\Models\Event;
use App\Services\DanceService;


class DanceController
{
    public $danceService;

    public function __construct()
    {
        $danceService = new DanceService();
    }

    function index()
    {
        $danceService = new DanceService();
        $artists = $danceService->getAllArtists();
        $danceEvents = $danceService->getAllDanceEvents();
        $eventsByDate = $danceService->getAllEventsByDate();
        $specialTickets = $danceService->getAllSpecialTickets();
        $venues = $danceService->getAllVenues();

        require __DIR__ . '/../views/dance/index.php';
    }
}

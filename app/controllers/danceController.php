<?php
namespace App\Controllers;
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
        $events = $danceService->getAllEvents();
        require __DIR__ . '/../views/dance/index.php';
    }
}

<?php
namespace App\Controllers;
use App\Models\Artists;
use App\Models\Event;
use App\Services\DanceService;
use App\Services\TicketService;


class DanceController extends Controller
{
    public $danceService;
    private $ticketService;

    public function __construct()
    {
        parent::__construct();
        $danceService = new DanceService();
        $this->ticketService = new TicketService();
    }

    function index()
    {
        $danceService = new DanceService();
        $artists = $danceService->getAllArtists();
        $danceEvents = $danceService->getAllDanceEvents();
        $eventsByDate = $danceService->getAllEventsByDate();
        $specialTickets = $danceService->getAllSpecialTickets();
        $venues = $danceService->getAllVenues();
        $model = $this->ticketService->getAllDanceTickets();
        $dancecontenthome = $danceService->getAllDanceContentHome();

        require __DIR__ . '/../views/dance/index.php';
    }
}

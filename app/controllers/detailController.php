<?php
namespace App\Controllers;
use App\Models\Artists;
use App\Models\Event;
use App\Services\DanceService;
use App\Services\TicketService;

class DetailController extends Controller
{
    private $danceService;
    private $ticketService;

    public function __construct()
    {
        parent::__construct();
        $this->danceService = new DanceService();
        $this->ticketService = new TicketService();
    }

    function index()
    {
        // Check if the 'id' query parameter is set and if it is numeric
        $artistId = isset($_GET['artist_id']) && is_numeric($_GET['artist_id']) ? intval($_GET['artist_id']) : null;

        // Fetch the artist's information if an ID is provided
        $artist = null;
        if ($artistId !== null) {
            $artist = $this->danceService->getArtistById($artistId);
            $detailpagecontent = $this->danceService->getDetailPageContentByArtistId($artistId);
            $events = $this->danceService->getDanceEventsByArtist($artist->name);
        }

        // Handle the case where no artist was found
        if (!$artist) {
            http_response_code(404);
            echo "Artist not found.";
            return;
        }
        $model = $this->ticketService->getAllDanceTickets();
        require __DIR__ . '/../views/dance/aboutartist.php';
    }
}
<?php
namespace App\Controllers;
use App\Models\Artists;
use App\Models\Event;
use App\Services\DanceService;

class DetailController
{
    private $danceService;

    public function __construct()
    {
        $this->danceService = new DanceService();
    }

    function index()
    {
        // Check if the 'id' query parameter is set and if it is numeric
        $artistId = isset($_GET['artist_id']) && is_numeric($_GET['artist_id']) ? intval($_GET['artist_id']) : null;

        // Fetch the artist's information if an ID is provided
        $artist = null;
        if ($artistId !== null) {
            $artist = $this->danceService->getArtistById($artistId);
        }

        // Handle the case where no artist was found
        if (!$artist) {
            http_response_code(404);
            echo "Artist not found.";
            return;
        }
        require __DIR__ . '/../views/dance/aboutartist.php';
    }
}


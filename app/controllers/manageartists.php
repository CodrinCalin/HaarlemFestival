<?php
namespace App\Controllers;

class ManageArtistsController
{
    public $danceService;

    function __construct()
    {
        session_start();
        $this->danceService = new \App\Services\DanceService();
    }

    public function index()
    {
        require __DIR__ . '/../views/manageartists/index.php';
    }

    public function addArtist() {
        require __DIR__ . '/../views/manageartists/addArtist.php';
    }

    public function updateArtist() {
        $artists = $this->danceService->getAllArtists();
        require __DIR__ . '/../views/manageartists/updateArtist.php';
    }

    public function deleteArtist() {
        $artists = $this->danceService->getAllArtists();
        require __DIR__ . '/../views/manageartists/deleteArtist.php';
    }

    public function viewArtists() {
        $artists = $this->danceService->getAllArtists();
        require __DIR__ . '/../views/manageartists/viewArtists.php';
    }

    public function processAddArtist() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $style = $_POST["style"];
            $cardImageUrl = $_POST["card_image_url"];
            $mainImageUrl = $_POST["main_image_url"];
            $title = $_POST["title"];

            $this->danceService->addArtist($name, $style, $cardImageUrl, $mainImageUrl, $title);

            header("Location: /manageartists/viewArtists");
        }
    }

    public function processUpdateArtist() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $artistId = $_POST["artist_id"];
            $name = $_POST["name"];
            $style = $_POST["style"];
            $cardImageUrl = $_POST["card_image_url"];
            $mainImageUrl = $_POST["main_image_url"];
            $title = $_POST["title"];

            $this->danceService->updateArtist($artistId, $name, $style, $cardImageUrl, $mainImageUrl, $title);

            header("Location: /manageartists/viewArtists");
        }
    }

    public function processDeleteArtist() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $artistId = $_POST["artist_id"];
            
            $this->danceService->deleteArtist($artistId);

            header("Location: /manageartists/viewArtists");
        }
    }
}
?>

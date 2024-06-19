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

    public function Artists()
    {
        try {
            $danceEvent = $this->danceService->getAllArtists();

            echo json_encode($danceEvent);

        } catch (Exception $e) {
            echo json_encode(['error' => 'An error occurred while fetching danceEvent data.']);
        }
    }

    public function addArtist() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validate and handle file uploads
            if (isset($_FILES['card_image_url']) && $_FILES['card_image_url']['error'] == UPLOAD_ERR_OK &&
                isset($_FILES['artist_main_img_url']) && $_FILES['artist_main_img_url']['error'] == UPLOAD_ERR_OK) {
    
                $cardImageUrl = $this->uploadImage($_FILES['card_image_url']);
                $mainImageUrl = $this->uploadImage($_FILES['artist_main_img_url']);
    
                $name = $_POST['name'];
                $style = $_POST['style'];
                $title = $_POST['title'];
    
                $artist = new Artists(null, $name, $style, $cardImageUrl, $title, $mainImageUrl);
    
                try {
                    $this->danceEventService->addArtist($artist);
                    echo json_encode(['success' => true, 'message' => 'Artist added successfully']);
                } catch (Exception $e) {
                    http_response_code(500);
                    echo json_encode(['error' => $e->getMessage()]);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Images not uploaded']);
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
        }
    }
    
}




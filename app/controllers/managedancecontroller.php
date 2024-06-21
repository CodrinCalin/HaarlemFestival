<?php
namespace App\Controllers;

use App\Models\Artists;
use App\Models\NotableTrack;
use App\Models\Venue;
use App\Models\DanceContentHome;
use App\Models\DanceContentDetail;
use App\Controllers\BaseController;

class ManageDanceController extends BaseController
{
    public $danceService;

    function __construct() {
        parent::__construct();
        $this->danceService = new \App\Services\danceService();
    }

    public function index() {
        require __DIR__ . '/../views/manageDance/index.php';
    }


    // Crud operations for Artists
    public function Artists() {
        try {
            $danceEvent = $this->danceService->getAllArtists();
            echo json_encode($danceEvent);
        } catch (Exception $e) {
            echo json_encode(['error' => 'An error occurred while fetching danceEvent data.']);
        }
    }

    public function uploadImage($file) {
        $targetDir = "img/danceimages/";
        $fileName = uniqid() . '-' . basename($file['name']);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo json_encode(['success' => 'Image uploaded successfully']);
            return $targetFilePath;
        } else {
            echo json_encode(['error' => 'Image not uploaded']);
            return null;
        }
    }

    public function addArtist() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            error_log('File upload attempt: ' . print_r($_FILES, true)); // Debugging: Log file upload details

            if (
                isset($_FILES['card_image_url']) && $_FILES['card_image_url']['error'] == UPLOAD_ERR_OK &&
                isset($_FILES['artist_main_img_url']) && $_FILES['artist_main_img_url']['error'] == UPLOAD_ERR_OK
            ) {
                // Check the file types
                $validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/JPG', 'image/PNG', 'image/GIF', 'image/webp'];
                
                $cardImageType = $_FILES['card_image_url']['type'];
                $mainImageType = $_FILES['artist_main_img_url']['type'];

                if (!in_array($cardImageType, $validTypes) || !in_array($mainImageType, $validTypes)) {
                    http_response_code(400);
                    echo json_encode(['error' => 'Invalid file type. Please upload a JPEG, PNG, Webp or GIF image.']);
                    return;
                }

                // Check the file sizes
                $maxFileSize = 10 * 1024 * 1024; // 10MB
                $cardImageSize = $_FILES['card_image_url']['size'];
                $mainImageSize = $_FILES['artist_main_img_url']['size'];

                if ($cardImageSize > $maxFileSize || $mainImageSize > $maxFileSize) {
                    http_response_code(400);
                    echo json_encode(['error' => 'File is too large. Maximum size is 10MB.']);
                    return;
                }

                $targetDir = "img/danceimages/";
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                $cardImageName = uniqid() . '-' . basename($_FILES['card_image_url']['name']);
                $mainImageName = uniqid() . '-' . basename($_FILES['artist_main_img_url']['name']);
                $cardImagePath = $targetDir . $cardImageName;
                $mainImagePath = $targetDir . $mainImageName;

                if (move_uploaded_file($_FILES['card_image_url']['tmp_name'], $cardImagePath) &&
                    move_uploaded_file($_FILES['artist_main_img_url']['tmp_name'], $mainImagePath)) {

                    $name = $_POST['name'];
                    $style = $_POST['style'];
                    $title = $_POST['title'];

                    $artist = new Artists();
                    $artist->setName($name);
                    $artist->setStyle($style);
                    $artist->setTitle($title);
                    $artist->setCardImageUrl($cardImagePath);
                    $artist->setArtistMainImgUrl($mainImagePath);

                    try {
                        $this->danceService->addArtist($artist);
                        echo json_encode(['success' => true, 'message' => 'Artist added successfully']);
                        error_log("Artist added successfully"); // Debugging: Log success
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo json_encode(['error' => $e->getMessage()]);
                    }
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to upload the images.']);
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

    public function deleteArtist() {
        header('Content-Type: application/json');
        $jsonData = file_get_contents('php://input');
        $decodedData = json_decode($jsonData, true);
        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode(['error' => 'Error decoding JSON data']);
            return;
        }
        $artistId = $decodedData['artistId'];
        try {
            // Fetch artist details to get image URLs
            $artist = $this->danceService->getArtistById($artistId);
            if (!$artist) {
                http_response_code(404);
                echo json_encode(['error' => 'Artist not found']);
                return;
            }

            // Delete the card image file if it exists
            $cardImageUrl = 'img/danceimages/' . $artist->getCardImageUrl();
            if (file_exists($cardImageUrl)) {
                unlink($cardImageUrl);
            }

            // Delete the main image file if it exists
            $mainImageUrl = 'img/danceimages/' . $artist->getArtistMainImgUrl();
            if (file_exists($mainImageUrl)) {
                unlink($mainImageUrl);
            }

            // Delete artist from the database
            $this->danceService->deleteArtist($artistId);
            echo json_encode(['message' => 'Artist deleted successfully']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete artist']);
        }
    }

    public function updateArtist() {
        header('Content-Type: application/json');
    
        // Check if request is empty
        if (empty($_POST)) {
            http_response_code(400); // Bad request
            echo json_encode(['error' => 'Empty request']);
            return;
        }
    
        // Sanitize artist data
        $fields = [
            'artistId' => FILTER_SANITIZE_NUMBER_INT,
            'name' => FILTER_SANITIZE_STRING,
            'style' => FILTER_SANITIZE_STRING,
            'title' => FILTER_SANITIZE_STRING,
        ];
        $sanitizedArtistData = $this->sanitizeData($_POST, $fields);
        $existingArtist = $this->danceService->getArtistById($sanitizedArtistData['artistId']);
    
        // Handle card image upload
        if (isset($_FILES['card_image_url']) && $_FILES['card_image_url']['error'] == UPLOAD_ERR_OK) {
            // Check the file type
            $fileType = $_FILES['card_image_url']['type'];
            if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid file type for card image. Please upload a JPEG, PNG, WEBP, or GIF image.']);
                return;
            }
    
            // Check the file size
            $fileSize = $_FILES['card_image_url']['size'];
            if ($fileSize > 10 * 1024 * 1024) {
                http_response_code(400);
                echo json_encode(['error' => 'Card image file is too large. Maximum size is 10MB.']);
                return;
            }
    
            $targetDir = "img/danceimages/";
            $oldCardImagePath = $existingArtist->getCardImageUrl();
            if (file_exists($oldCardImagePath)) {
                unlink($oldCardImagePath);
            }
    
            $cardImageName = uniqid() . '-' . basename($_FILES['card_image_url']['name']);
            $targetCardFilePath = $targetDir . $cardImageName;
    
            if (move_uploaded_file($_FILES['card_image_url']['tmp_name'], $targetCardFilePath)) {
                $sanitizedArtistData['card_image_url'] = $targetCardFilePath; // Store the full path
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to upload the card image.']);
                return;
            }
        } else {
            $sanitizedArtistData['card_image_url'] = $existingArtist->getCardImageUrl();
        }
    
        // Handle main image upload
        if (isset($_FILES['artist_main_img_url']) && $_FILES['artist_main_img_url']['error'] == UPLOAD_ERR_OK) {
            // Check the file type
            $fileType = $_FILES['artist_main_img_url']['type'];
            if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid file type for main image. Please upload a JPEG, PNG, WEBP, or GIF image.']);
                return;
            }
    
            // Check the file size
            $fileSize = $_FILES['artist_main_img_url']['size'];
            if ($fileSize > 10 * 1024 * 1024) {
                http_response_code(400);
                echo json_encode(['error' => 'Main image file is too large. Maximum size is 10MB.']);
                return;
            }
    
            $targetDir = "img/danceimages/";
            $oldMainImagePath = $existingArtist->getArtistMainImgUrl();
            if (file_exists($oldMainImagePath)) {
                unlink($oldMainImagePath);
            }
    
            $mainImageName = uniqid() . '-' . basename($_FILES['artist_main_img_url']['name']);
            $targetMainFilePath = $targetDir . $mainImageName;
    
            if (move_uploaded_file($_FILES['artist_main_img_url']['tmp_name'], $targetMainFilePath)) {
                $sanitizedArtistData['artist_main_img_url'] = $targetMainFilePath; // Store the full path
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to upload the main image.']);
                return;
            }
        } else {
            $sanitizedArtistData['artist_main_img_url'] = $existingArtist->getArtistMainImgUrl();
        }
    
        try {
            error_log('Updating artist with data: ' . print_r($sanitizedArtistData, true));
            $this->danceService->updateArtist($sanitizedArtistData);
            echo json_encode(['message' => 'Artist information updated successfully']);
        } catch (Exception $e) {
            error_log('Error updating artist: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Failed to update artist information']);
        }
    }
    

    // Crud operations for Notable Tracks

    public function Tracks() {
        try {
            $tracks = $this->danceService->getAllTracks();
            echo json_encode($tracks);
        } catch (Exception $e) {
            echo json_encode(['error' => 'An error occurred while fetching tracks data.']);
        }
    }

    public function addTrack() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            error_log('File upload attempt: ' . print_r($_FILES, true)); // Debugging: Log file upload details
    
            if (isset($_FILES['track_image']) && $_FILES['track_image']['error'] == UPLOAD_ERR_OK) {
                // Check the file type
                $validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/JPG', 'image/PNG', 'image/GIF', 'image/webp'];
                $trackImageType = $_FILES['track_image']['type'];
    
                if (!in_array($trackImageType, $validTypes)) {
                    http_response_code(400);
                    echo json_encode(['error' => 'Invalid file type. Please upload a JPEG, PNG, Webp or GIF image.']);
                    return;
                }
    
                // Check the file size
                $maxFileSize = 10 * 1024 * 1024; // 10MB
                $trackImageSize = $_FILES['track_image']['size'];
    
                if ($trackImageSize > $maxFileSize) {
                    http_response_code(400);
                    echo json_encode(['error' => 'File is too large. Maximum size is 10MB.']);
                    return;
                }
    
                $targetDir = "img/danceimages/";
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
    
                $trackImageName = uniqid() . '-' . basename($_FILES['track_image']['name']);
                $trackImagePath = $targetDir . $trackImageName;
    
                if (move_uploaded_file($_FILES['track_image']['tmp_name'], $trackImagePath)) {
                    $artist_id = $_POST['artist_id'];
                    $track_title = $_POST['track_title'];
                    $track_url = $_POST['track_url'];
    
                    // Ensure artist_id is not negative
                    if ($artist_id < 0) {
                        http_response_code(400);
                        echo json_encode(['error' => 'Artist ID cannot be negative.']);
                        return;
                    }
    
                    $track = new NotableTrack();
                    $track->setArtistId($artist_id);
                    $track->setTrackTitle($track_title);
                    $track->setTrackUrl($track_url);
                    $track->setTrackImage($trackImagePath);
    
                    try {
                        $this->danceService->addTrack($track);
                        echo json_encode(['success' => true, 'message' => 'Track added successfully']);
                        error_log("Track added successfully"); // Debugging: Log success
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo json_encode(['error' => $e->getMessage()]);
                    }
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to upload the track image.']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Track image not uploaded']);
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
        }
    }

    public function deleteTrack() {
        header('Content-Type: application/json');
        $jsonData = file_get_contents('php://input');
        $decodedData = json_decode($jsonData, true);
        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode(['error' => 'Error decoding JSON data']);
            return;
        }
        $trackId = $decodedData['trackId'];
        try {
            // Fetch track details to get image URL
            $track = $this->danceService->deleteTrack($trackId);
            if (!$track) {
                http_response_code(404);
                echo json_encode(['error' => 'Track not found']);
                return;
            }
    
            // Delete the track image file if it exists
            $trackImageUrl = 'img/danceimages/trackimages' . $track->getTrackImage();
            if (file_exists($trackImageUrl)) {
                unlink($trackImageUrl);
            }
    
            // Delete track from the database
            $this->danceService->deleteTrack($trackId);
            echo json_encode(['message' => 'Track deleted successfully']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete track']);
        }
    }

    public function updateTrack() {
        header('Content-Type: application/json');
    
        // Check if request is empty
        if (empty($_POST)) {
            http_response_code(400); // Bad request
            echo json_encode(['error' => 'Empty request']);
            return;
        }
    
        // Sanitize track data
        $fields = [
            'id' => FILTER_SANITIZE_NUMBER_INT,
            'artist_id' => FILTER_SANITIZE_NUMBER_INT,
            'track_title' => FILTER_SANITIZE_SPECIAL_CHARS,
            'track_url' => FILTER_SANITIZE_URL,
        ];
        $sanitizedTrackData = $this->sanitizeData($_POST, $fields);
        $existingTrack = $this->danceService->getTrackById($sanitizedTrackData['id']);
    
        // Handle track image upload
        if (isset($_FILES['track_image']) && $_FILES['track_image']['error'] == UPLOAD_ERR_OK) {
            // Check the file type
            $fileType = $_FILES['track_image']['type'];
            if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid file type for track image. Please upload a JPEG, PNG, WEBP, or GIF image.']);
                return;
            }
    
            // Check the file size
            $fileSize = $_FILES['track_image']['size'];
            if ($fileSize > 10 * 1024 * 1024) {
                http_response_code(400);
                echo json_encode(['error' => 'Track image file is too large. Maximum size is 10MB.']);
                return;
            }
    
            $targetDir = "img/danceimages/";
            $oldTrackImagePath = $targetDir . $existingTrack->getTrackImage();
            if (file_exists($oldTrackImagePath)) {
                unlink($oldTrackImagePath);
            }
    
            $trackImageName = uniqid() . '-' . basename($_FILES['track_image']['name']);
            $targetTrackFilePath = $targetDir . $trackImageName;
    
            if (move_uploaded_file($_FILES['track_image']['tmp_name'], $targetTrackFilePath)) {
                $sanitizedTrackData['track_image'] = $targetTrackFilePath;
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to upload the track image.']);
                return;
            }
        } else {
            $sanitizedTrackData['track_image'] = $existingTrack->getTrackImage();
        }
    
        try {
            error_log('Updating track with data: ' . print_r($sanitizedTrackData, true));
            $this->danceService->updateTrack($sanitizedTrackData);
            echo json_encode(['message' => 'Track information updated successfully']);
        } catch (Exception $e) {
            error_log('Error updating track: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Failed to update track information']);
        }
    }

    //crud for venues

    public function Venues() {
        try {
            $venues = $this->danceService->getAllVenues();
            echo json_encode($venues);
        } catch (Exception $e) {
            echo json_encode(['error' => 'An error occurred while fetching venues data.']);
        }
    }
    
    public function addVenue() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            error_log('File upload attempt: ' . print_r($_FILES, true)); // Debugging: Log file upload details
    
            if (isset($_FILES['venue_img_url']) && $_FILES['venue_img_url']['error'] == UPLOAD_ERR_OK) {
                // Check the file type
                $validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/JPG', 'image/PNG', 'image/GIF', 'image/webp'];
                $venueImageType = $_FILES['venue_img_url']['type'];
    
                if (!in_array($venueImageType, $validTypes)) {
                    http_response_code(400);
                    echo json_encode(['error' => 'Invalid file type. Please upload a JPEG, PNG, Webp or GIF image.']);
                    return;
                }
    
                // Check the file size
                $maxFileSize = 10 * 1024 * 1024; // 10MB
                $venueImageSize = $_FILES['venue_img_url']['size'];
    
                if ($venueImageSize > $maxFileSize) {
                    http_response_code(400);
                    echo json_encode(['error' => 'File is too large. Maximum size is 10MB.']);
                    return;
                }
    
                $targetDir = "img/danceimages/";
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
    
                $venueImageName = uniqid() . '-' . basename($_FILES['venue_img_url']['name']);
                $venueImagePath = $targetDir . $venueImageName;
    
                if (move_uploaded_file($_FILES['venue_img_url']['tmp_name'], $venueImagePath)) {
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $description = $_POST['description'];
    
                    $venue = new Venue();
                    $venue->setName($name);
                    $venue->setAddress($address);
                    $venue->setDescription($description);
                    $venue->setVenueImgUrl($venueImagePath);
    
                    try {
                        $this->danceService->addVenue($venue);
                        echo json_encode(['success' => true, 'message' => 'Venue added successfully']);
                        error_log("Venue added successfully"); // Debugging: Log success
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo json_encode(['error' => $e->getMessage()]);
                    }
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to upload the venue image.']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Venue image not uploaded']);
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
        }
    }
    
    public function deleteVenue() {
        header('Content-Type: application/json');
        $jsonData = file_get_contents('php://input');
        $decodedData = json_decode($jsonData, true);
        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode(['error' => 'Error decoding JSON data']);
            return;
        }
        $venueId = $decodedData['venueId'];
        try {
            // Fetch venue details to get image URL
            $venue = $this->danceService->getVenueById($venueId);
            if (!$venue) {
                http_response_code(404);
                echo json_encode(['error' => 'Venue not found']);
                return;
            }
    
            // Delete the venue image file if it exists
            $venueImageUrl = $venue->getVenueImgUrl();
            if (file_exists($venueImageUrl)) {
                unlink($venueImageUrl);
            }
    
            // Delete venue from the database
            $this->danceService->deleteVenue($venueId);
            echo json_encode(['message' => 'Venue deleted successfully']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete venue']);
        }
    }
    
    public function updateVenue() {
        header('Content-Type: application/json');
    
        // Check if request is empty
        if (empty($_POST)) {
            http_response_code(400); // Bad request
            echo json_encode(['error' => 'Empty request']);
            return;
        }
    
        // Sanitize venue data
        $fields = [
            'venueId' => FILTER_SANITIZE_NUMBER_INT,
            'name' => FILTER_SANITIZE_SPECIAL_CHARS,
            'address' => FILTER_SANITIZE_SPECIAL_CHARS,
            'description' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
        $sanitizedVenueData = $this->sanitizeData($_POST, $fields);
        $existingVenue = $this->danceService->getVenueById($sanitizedVenueData['venueId']);
    
        // Check if the venue exists
        if (!$existingVenue) {
            http_response_code(404); // Not found
            echo json_encode(['error' => 'Venue not found']);
            return;
        }
    
        // Handle venue image upload
        if (isset($_FILES['venue_img_url']) && $_FILES['venue_img_url']['error'] == UPLOAD_ERR_OK) {
            // Check the file type
            $fileType = $_FILES['venue_img_url']['type'];
            if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid file type for venue image. Please upload a JPEG, PNG, WEBP, or GIF image.']);
                return;
            }
    
            // Check the file size
            $fileSize = $_FILES['venue_img_url']['size'];
            if ($fileSize > 10 * 1024 * 1024) {
                http_response_code(400);
                echo json_encode(['error' => 'Venue image file is too large. Maximum size is 10MB.']);
                return;
            }
    
            $targetDir = "img/danceimages/";
            $oldVenueImagePath = $targetDir . $existingVenue->getVenueImgUrl();
            if (file_exists($oldVenueImagePath)) {
                unlink($oldVenueImagePath);
            }
    
            $venueImageName = uniqid() . '-' . basename($_FILES['venue_img_url']['name']);
            $targetVenueFilePath = $targetDir . $venueImageName;
    
            if (move_uploaded_file($_FILES['venue_img_url']['tmp_name'], $targetVenueFilePath)) {
                $sanitizedVenueData['venue_img_url'] = $targetVenueFilePath;
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to upload the venue image.']);
                return;
            }
        } else {
            $sanitizedVenueData['venue_img_url'] = $existingVenue->getVenueImgUrl();
        }
    
        try {
            error_log('Updating venue with data: ' . print_r($sanitizedVenueData, true));
            $result = $this->danceService->updateVenue($sanitizedVenueData);
    
            if ($result) {
                echo json_encode(['message' => 'Venue information updated successfully']);
            } else {
                throw new Exception('Update query did not affect any rows');
            }
        } catch (Exception $e) {
            error_log('Error updating venue: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Failed to update venue information']);
        }
    }

    // crud for dance content home 

    public function DanceContentHome() {
        try {
            $content = $this->danceService->getAllDanceContentHome();
            echo json_encode($content);
        } catch (Exception $e) {
            echo json_encode(['error' => 'An error occurred while fetching dance content home data.']);
        }
    }

    public function addDanceContentHome() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            error_log('File upload attempt: ' . print_r($_FILES, true)); // Debugging: Log file upload details
    
            if (isset($_FILES['main_image_url']) && $_FILES['main_image_url']['error'] == UPLOAD_ERR_OK) {
                // Check the file type
                $validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/JPG', 'image/PNG', 'image/GIF', 'image/webp'];
                $imageType = $_FILES['main_image_url']['type'];
    
                if (!in_array($imageType, $validTypes)) {
                    http_response_code(400);
                    echo json_encode(['error' => 'Invalid file type. Please upload a JPEG, PNG, Webp or GIF image.']);
                    return;
                }
    
                // Check the file size
                $maxFileSize = 10 * 1024 * 1024; // 10MB
                $imageSize = $_FILES['main_image_url']['size'];
    
                if ($imageSize > $maxFileSize) {
                    http_response_code(400);
                    echo json_encode(['error' => 'File is too large. Maximum size is 10MB.']);
                    return;
                }
    
                $targetDir = "img/danceimages/";
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
    
                $imageName = uniqid() . '-' . basename($_FILES['main_image_url']['name']);
                $imagePath = $targetDir . $imageName;
    
                if (move_uploaded_file($_FILES['main_image_url']['tmp_name'], $imagePath)) {
                    $introductionTitle = $_POST['introduction_title'];
                    $introductionSubtitle = $_POST['introduction_subtitle'];
                    $introductionText = $_POST['introduction_text'];
    
                    $content = new DanceContentHome();
                    $content->setMainImageUrl($imagePath);
                    $content->setIntroductionTitle($introductionTitle);
                    $content->setIntroductionSubtitle($introductionSubtitle);
                    $content->setIntroductionText($introductionText);
    
                    try {
                        $this->danceService->addDanceContentHome($content);
                        echo json_encode(['success' => true, 'message' => 'Content added successfully']);
                        error_log("Content added successfully"); // Debugging: Log success
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo json_encode(['error' => $e->getMessage()]);
                    }
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to upload the image.']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Image not uploaded']);
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
        }
    }
    
    public function deleteDanceContentHome() {
        header('Content-Type: application/json');
        $jsonData = file_get_contents('php://input');
        $decodedData = json_decode($jsonData, true);
        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode(['error' => 'Error decoding JSON data']);
            return;
        }
        $contentId = $decodedData['id'];
        try {
            // Fetch content details to get image URL
            $content = $this->danceService->getDanceContentHomeById($contentId);
            if (!$content) {
                http_response_code(404);
                echo json_encode(['error' => 'Content not found']);
                return;
            }
    
            // Delete the content image file if it exists
            $imageUrl = $content->getMainImageUrl();
            if (file_exists($imageUrl)) {
                unlink($imageUrl);
            }
    
            // Delete content from the database
            $this->danceService->deleteDanceContentHome($contentId);
            echo json_encode(['message' => 'Content deleted successfully']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete content']);
        }
    }
    
    public function updateDanceContentHome() {
        header('Content-Type: application/json');
    
        // Check if request is empty
        if (empty($_POST)) {
            http_response_code(400); // Bad request
            echo json_encode(['error' => 'Empty request']);
            return;
        }
    
        // Sanitize content data
        $fields = [
            'id' => FILTER_SANITIZE_NUMBER_INT,
            'introduction_title' => FILTER_SANITIZE_SPECIAL_CHARS,
            'introduction_subtitle' => FILTER_SANITIZE_SPECIAL_CHARS,
            'introduction_text' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
        $sanitizedData = $this->sanitizeData($_POST, $fields);
        $existingContent = $this->danceService->getDanceContentHomeById($sanitizedData['id']);
    
        // Check if the content exists
        if (!$existingContent) {
            http_response_code(404); // Not found
            echo json_encode(['error' => 'Content not found']);
            return;
        }
    
        // Handle main image upload
        if (isset($_FILES['main_image_url']) && $_FILES['main_image_url']['error'] == UPLOAD_ERR_OK) {
            // Check the file type
            $fileType = $_FILES['main_image_url']['type'];
            if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid file type for main image. Please upload a JPEG, PNG, WEBP, or GIF image.']);
                return;
            }
    
            // Check the file size
            $fileSize = $_FILES['main_image_url']['size'];
            if ($fileSize > 10 * 1024 * 1024) {
                http_response_code(400);
                echo json_encode(['error' => 'Main image file is too large. Maximum size is 10MB.']);
                return;
            }
    
            $targetDir = "img/danceimages/";
            $oldImagePath = $existingContent->getMainImageUrl();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            $imageName = uniqid() . '-' . basename($_FILES['main_image_url']['name']);
            $targetFilePath = $targetDir . $imageName;
    
            if (move_uploaded_file($_FILES['main_image_url']['tmp_name'], $targetFilePath)) {
                $sanitizedData['main_image_url'] = $targetFilePath;
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to upload the main image.']);
                return;
            }
        } else {
            $sanitizedData['main_image_url'] = $existingContent->getMainImageUrl();
        }
    
        try {
            error_log('Updating content with data: ' . print_r($sanitizedData, true));
            $result = $this->danceService->updateDanceContentHome($sanitizedData);
    
            if ($result) {
                echo json_encode(['message' => 'Content information updated successfully']);
            } else {
                throw new Exception('Update query did not affect any rows');
            }
        } catch (Exception $e) {
            error_log('Error updating content: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Failed to update content information']);
        }
    }

    // crud for dance content detial

    public function DanceContentDetail() {
        try {
            $content = $this->danceService->getAllDanceContentDetail();
            echo json_encode($content);
        } catch (Exception $e) {
            echo json_encode(['error' => 'An error occurred while fetching dance content detail data.']);
        }
    }
    
    public function addDanceContentDetail() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            error_log('File upload attempt: ' . print_r($_FILES, true)); // Debugging: Log file upload details
    
            if (isset($_FILES['description_image']) && $_FILES['description_image']['error'] == UPLOAD_ERR_OK) {
                // Check the file type
                $validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/JPG', 'image/PNG', 'image/GIF', 'image/webp'];
                $imageType = $_FILES['description_image']['type'];
    
                if (!in_array($imageType, $validTypes)) {
                    http_response_code(400);
                    echo json_encode(['error' => 'Invalid file type. Please upload a JPEG, PNG, Webp or GIF image.']);
                    return;
                }
    
                // Check the file size
                $maxFileSize = 10 * 1024 * 1024; // 10MB
                $imageSize = $_FILES['description_image']['size'];
    
                if ($imageSize > $maxFileSize) {
                    http_response_code(400);
                    echo json_encode(['error' => 'File is too large. Maximum size is 10MB.']);
                    return;
                }
    
                $targetDir = "img/danceimages/dancedetail/";
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }
    
                $imageName = uniqid() . '-' . basename($_FILES['description_image']['name']);
                $imagePath = $targetDir . $imageName;
    
                if (move_uploaded_file($_FILES['description_image']['tmp_name'], $imagePath)) {
                    $artistId = $_POST['artist_id'];
                    $descriptionBody = $_POST['description_body'];
    
                    $content = new DanceContentDetail();
                    $content->setDescriptionImage($imagePath);
                    $content->setArtistId($artistId);
                    $content->setDescriptionBody($descriptionBody);
    
                    try {
                        $this->danceService->addDanceContentDetail($content);
                        echo json_encode(['success' => true, 'message' => 'Content added successfully']);
                        error_log("Content added successfully"); // Debugging: Log success
                    } catch (Exception $e) {
                        http_response_code(500);
                        echo json_encode(['error' => $e->getMessage()]);
                    }
                } else {
                    http_response_code(500);
                    echo json_encode(['error' => 'Failed to upload the image.']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Image not uploaded']);
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
        }
    }
    
    public function deleteDanceContentDetail() {
        header('Content-Type: application/json');
        $jsonData = file_get_contents('php://input');
        $decodedData = json_decode($jsonData, true);
        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode(['error' => 'Error decoding JSON data']);
            return;
        }
        $contentId = $decodedData['id'];
        try {
            // Fetch content details to get image URL
            $content = $this->danceService->getDanceContentDetailById($contentId);
            if (!$content) {
                http_response_code(404);
                echo json_encode(['error' => 'Content not found']);
                return;
            }
    
            // Delete the content image file if it exists
            $imageUrl = $content->getDescriptionImage();
            if (file_exists($imageUrl)) {
                unlink($imageUrl);
            }
    
            // Delete content from the database
            $this->danceService->deleteDanceContentDetail($contentId);
            echo json_encode(['message' => 'Content deleted successfully']);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete content']);
        }
    }
    
    public function updateDanceContentDetail() {
        header('Content-Type: application/json');
    
        // Check if request is empty
        if (empty($_POST)) {
            http_response_code(400); // Bad request
            echo json_encode(['error' => 'Empty request']);
            return;
        }
    
        // Sanitize content data
        $fields = [
            'id' => FILTER_SANITIZE_NUMBER_INT,
            'artist_id' => FILTER_SANITIZE_NUMBER_INT,
            'description_body' => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
        $sanitizedData = $this->sanitizeData($_POST, $fields);
        $existingContent = $this->danceService->getDanceContentDetailById($sanitizedData['id']);
    
        // Check if the content exists
        if (!$existingContent) {
            http_response_code(404); // Not found
            echo json_encode(['error' => 'Content not found']);
            return;
        }
    
        // Handle description image upload
        if (isset($_FILES['description_image']) && $_FILES['description_image']['error'] == UPLOAD_ERR_OK) {
            // Check the file type
            $fileType = $_FILES['description_image']['type'];
            if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid file type for description image. Please upload a JPEG, PNG, WEBP, or GIF image.']);
                return;
            }
    
            // Check the file size
            $fileSize = $_FILES['description_image']['size'];
            if ($fileSize > 10 * 1024 * 1024) {
                http_response_code(400);
                echo json_encode(['error' => 'Description image file is too large. Maximum size is 10MB.']);
                return;
            }
    
            $targetDir = "img/danceimages/dancedetail/";
            $oldImagePath = $existingContent->getDescriptionImage();
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
    
            $imageName = uniqid() . '-' . basename($_FILES['description_image']['name']);
            $targetFilePath = $targetDir . $imageName;
    
            if (move_uploaded_file($_FILES['description_image']['tmp_name'], $targetFilePath)) {
                $sanitizedData['description_image'] = $targetFilePath;
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to upload the description image.']);
                return;
            }
        } else {
            $sanitizedData['description_image'] = $existingContent->getDescriptionImage();
        }
    
        try {
            error_log('Updating content with data: ' . print_r($sanitizedData, true));
            $result = $this->danceService->updateDanceContentDetail($sanitizedData);
    
            if ($result) {
                echo json_encode(['message' => 'Content information updated successfully']);
            } else {
                throw new Exception('Update query did not affect any rows');
            }
        } catch (Exception $e) {
            error_log('Error updating content: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Failed to update content information']);
        }
    }
    
    

    protected function sanitizeData($data, $fields) {
        return filter_var_array($data, $fields);
    }

    public function getArtistById() {
        header('Content-Type: application/json');
        $jsonData = file_get_contents('php://input');
        $decodedData = json_decode($jsonData, true);
    
        if ($decodedData === null && json_last_error() !== JSON_ERROR_NONE) {
            http_response_code(400);
            echo json_encode(['error' => 'Error decoding JSON data']);
            return;
        }
    
        $artistId = $decodedData['id'];
        try {
            $artist = $this->danceService->getArtistById($artistId);
            if ($artist) {
                echo json_encode(['id' => $artist->getId(), 'name' => $artist->getName()]);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Artist not found']);
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to fetch artist']);
        }
    }
}
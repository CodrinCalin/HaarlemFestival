<?php
namespace App\Controllers;
use App\Models\Artists;
use App\Controllers\BaseController;

class ManageDanceController extends BaseController
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

    public function uploadImage($file)
    {
        $targetDir = "/img/danceimages/";
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

    // public function addArtist() {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         echo json_encode($_FILES);
    //         // Validate and handle file uploads
    //         if (isset($_FILES['card_image_url']) && $_FILES['card_image_url']['error'] == UPLOAD_ERR_OK &&
    //             isset($_FILES['artist_main_img_url']) && $_FILES['artist_main_img_url']['error'] == UPLOAD_ERR_OK) {
    
    //             $cardImageUrl = $this->uploadImage($_FILES['card_image_url']);
    //             $mainImageUrl = $this->uploadImage($_FILES['artist_main_img_url']);
    
    //             $name = $_POST['name'];
    //             $style = $_POST['style'];
    //             $title = $_POST['title'];
    
    //             $artist = new Artists();
    //             $artist->setName($name);
    //             $artist->setStyle($style);
    //             $artist->setTitle($title);
    //             $artist->setCardImageUrl($cardImageUrl);
    //             $artist->setArtistMainImgUrl($mainImageUrl);

    //             echo json_encode($artist);
    
    //             try {
    //                 $this->danceEventService->addArtist($artist);
    //                 echo json_encode(['success' => true, 'message' => 'Artist added successfully']);
    //             } catch (Exception $e) {
    //                 http_response_code(500);
    //                 echo json_encode(['error' => $e->getMessage()]);
    //             }
    //         } else {
    //             http_response_code(400);
    //             echo json_encode(['error' => 'Images not uploaded']);
    //         }
    //     } else {
    //         http_response_code(405);
    //         echo json_encode(['error' => 'Method not allowed']);
    //     }
    // }

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
}




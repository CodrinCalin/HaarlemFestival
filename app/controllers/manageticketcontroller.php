<?php
namespace App\Controllers;

use App\Models\Ticket;
use App\Models\TicketDance;
use App\Models\TicketHistory;
use App\Models\TicketYummy;

use App\Controllers\BaseController;

class ManageTicketController extends BaseController
{
    public $ticketService;

    function __construct()
    {
        parent::__construct();
        $this->ticketService = new \App\Services\ticketService();
    }

    public function index()
    {
        require __DIR__ . '/../views/manageTickets/index.php';
    }

    public function Tickets()
    {
        try {
            $tickets = $this->ticketService->getAllTickets();
            echo json_encode($tickets);
        } catch (Exception $e) {
            echo json_encode(['error' => 'An error occurred while fetching tickets.']);
        }
    }

    public function addTicket() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $category = $_POST['category'];
            $type = $_POST['type'] ?? null;
            $quantityAvailable = $_POST['quantity_available'];
            $price = $_POST['price'];
            $location = $_POST['location'];
            $duration = $_POST['duration'] ?? null;
            $dateTime = $_POST['date_time'];
            $ticket = null;

            switch ($category) {
                case 'DANCE':
                    $artist = $_POST['artist'] ?? null;
                    $ticket = new TicketDance(null, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $dateTime, $artist);
                    break;
                case 'HISTORY':
                    $language = $_POST['language'] ?? null;
                    $guide = $_POST['guide'] ?? null;
                    $ticket = new TicketHistory(null, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $dateTime, $language, $guide);
                    break;
                case 'YUMMY':
                    $restaurantName = $_POST['restaurant_name'] ?? null;
                    $star = $_POST['star'] ?? null;
                    $foodType = $_POST['food_type'] ?? null;
                    $ticket = new TicketYummy(null, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $dateTime, $restaurantName, $star, $foodType);
                    break;
            }

            if ($ticket) {
                try {
                    $this->ticketService->addTicket($ticket);
                    echo json_encode(['success' => true, 'message' => 'Ticket added successfully']);
                } catch (Exception $e) {
                    http_response_code(500);
                    echo json_encode(['error' => $e->getMessage()]);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid category']);
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
        }
    }


    public function updateTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $id = $data['id'];
            $name = $data['name'];
            $category = $data['category'];
            $price = $data['price'];

            try {
                $this->ticketService->updateTicket($id, $name, $category, $price);
                echo json_encode(['success' => true, 'message' => 'Ticket updated successfully']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
        }
    }

    public function deleteTicket()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $data = json_decode(file_get_contents('php://input'), true);
            $id = $data['id'];

            try {
                $this->ticketService->deleteTicket($id);
                echo json_encode(['success' => true, 'message' => 'Ticket deleted successfully']);
            } catch (Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
        } else {
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed']);
        }
    }
}


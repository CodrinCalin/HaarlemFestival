<?php
namespace App\Controllers;

use App\lib\SessionManager;
use App\Services\TicketService;

class PersonalProgramController extends Controller
{
    private $ticketService;

    public function __construct()
    {
        parent::__construct();
        $this->ticketService = new TicketService();
    }

    public function index()
    {
        $model = $this->ticketService->getAllYummyTickets();
        require __DIR__ . '/../views/personalprogram/index.php';
    }
}
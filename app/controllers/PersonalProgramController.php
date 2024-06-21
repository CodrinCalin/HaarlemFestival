<?php
namespace App\Controllers;

use App\lib\CartManager;
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
        try {
            $cart = CartManager::getTimeOrderedCart();
            $events = $this->getEvents($cart);
            require __DIR__ . '/../views/personalprogram/index.php';
        } catch (Exception $e) {
            error_log($e->getMessage());
            $this->handleError($e);
        }
    }

    public function getEvents($cart)
    {
        try {
            $events = [];
            foreach ($cart as $item) {
                $ticket = $item['ticket'];
                $startDateTime = $ticket->getDateTime();
                $endDateTime = clone $startDateTime;

                if ($ticket->getType() === 'Full Access Pass') {
                    // Full Access Pass: Event lasts 3 days
                    $endDateTime->modify('+3 days');
                } elseif ($ticket->getType() !== 'Single' && $ticket->getDuration() == 0) {
                    // Full-day tickets: End at the end of the day
                    $endDateTime->setTime(23, 59, 59);
                } else {
                    // Regular tickets: Add duration in minutes
                    $endDateTime->modify('+' . $ticket->getDuration() . ' minutes');
                }

                $events[] = [
                    'title' => $ticket->getFullTicketName(),
                    'start' => $startDateTime->format('Y-m-d\TH:i:s'),
                    'end' => $endDateTime->format('Y-m-d\TH:i:s')
                ];
            }
            return $events;
        } catch (Exception $e) {
            error_log($e->getMessage());
            throw $e;
        }
    }

    private function handleError(Exception $e)
    {
        header('Location: /error');
        exit;
    }
}
<?php

namespace App\Services;

class HistoryTicketService {
    private $ticketService;
    private $historyService;

    private function getNewInstance() {
        $this->ticketService = new \App\Services\TicketService();
        $this->historyService = new \App\Services\HistoryService();
    }

    public function getTicketById($id) {
        $this->getNewInstance();
        return $ticketService->getTicketById($id);
    }

    public function getHeaderImage() {
        $this->getNewInstance();
        return $this->historyService->getContentById(35);
    }

    public function getTicketsByLanguage($language) {
        $this->getNewInstance();
        $allTickets = $this->ticketService->getAllHistoryTickets();
        $tickets = [];
        foreach ($allTickets as $ticket) {
            if ($ticket->getLanguage() == $language) {
                $tickets[] = $ticket;
            }
        }
        return $tickets;
    }

    public function getDates($language) {
        $this->getNewInstance();
        $tickets = $this->ticketService->getAllHistoryTickets();
        $dates = [];
        foreach ($tickets as $ticket) {
            if ($ticket->getLanguage() == $language) {
                $dates[] = $ticket->getDateTime()->format('Y-m-d');
            }
        }
        return array_unique($dates);
    }

    public function getTimes($language, $givenDate) {
        $this->getNewInstance();
        $allTickets = $this->ticketService->getAllHistoryTickets();
        $tickets = [];
        foreach ($allTickets as $ticket) {
            if ($ticket->getLanguage() == $language && $ticket->getDateTime()->format('Y-m-d') == $givenDate) {
                $tickets[] = $ticket->getDateTime()->format('H:i');
            }
        }
        return array_unique($tickets);
    }

    public function getTickets($language, $givenDate, $givenTime){
        $this->getNewInstance();
        $allTickets = $this->ticketService->getAllHistoryTickets();
        $tickets = [];
        foreach ($allTickets as $ticket) {
            if ($ticket->getLanguage() == $language && $ticket->getDateTime()->format('Y-m-d') == $givenDate && $ticket->getDateTime()->format('H:i') == $givenTime) {
                $tickets[] = $ticket;
            }
        }
        return $tickets;
    }
}
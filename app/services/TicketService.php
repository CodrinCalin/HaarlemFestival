<?php

namespace App\Services;

use App\Repositories\TicketRepository;

class TicketService {
    private $repository;
    private function getNewInstance() {
        $this->repository = new TicketRepository();
    }
    public function getTicketById($id) {
        $this->getNewInstance();
        return $this->repository->getTicketById($id);
    }
    public function getAllTickets(){
        $this->getNewInstance();
        return $this->repository->getAllTickets();
    }
    public function getAllDanceTickets(){
        $this->getNewInstance();
        return $this->repository->getAllDanceTickets();
    }
    public function getAllHistoryTickets(){
        $this->getNewInstance();
        return $this->repository->getAllHistoryTickets();
    }
    public function getAllYummyTickets(){
        $this->getNewInstance();
        return $this->repository->getAllYummyTickets();
    }
    public function getAllYummyTicketsByName($name) {
        $this->getNewInstance();
        return $this->repository->getAllYummyTicketsByName($name);
    }

    function addTicket($ticket)
    {
        $this->getNewInstance();
        return $this->repository->addTicket($ticket);
    }

    function updateTicket($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $dateTime, $restaurantName, $star, $foodType, $language, $guide, $artist)
    {
        $this->getNewInstance();
        return $this->repository->updateTicket($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $dateTime, $restaurantName, $star, $foodType, $language, $guide, $artist);
    }

    function deleteTicket($id)
    {
        $this->getNewInstance();
        return $this->repository->deleteTicket($id);
    }
}
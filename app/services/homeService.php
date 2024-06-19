<?php
namespace App\Services;
use App\Repositories\eventrepository;
use App\Repositories\homerepository;

class homeService {
    private $repository;

    private function getNewInstance()
    {
        $this->repository = new homerepository();
    }

    public function getAll(){
        $this->getNewInstance();
        return $this->repository->getAll();
    }

    public function getContentById($textId)
    {
        $this->getNewInstance();
        return $this->repository->getContentById($textId);
    }

    public function getAllDates() {
        $eventRepository = new eventrepository();
        return $eventRepository->getAllDates();
    }

    public function getAllEvents() {
        $eventRepository = new eventrepository();
        return $eventRepository->getAllEvents();
    }
}

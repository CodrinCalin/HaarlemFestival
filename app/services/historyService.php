<?php
namespace App\Services;
use App\Repositories\historycontentrepository;

class historyService {
    private $repository;

    private function getNewInstance()
    {
        $this->repository = new historycontentrepository();
    }
    public function getAll()
    {
        $this->getNewInstance();
        return $this->repository->getAll();
    }

    public function getContentById($contentId) {
        $this->getNewInstance();
        return $this->repository->getContentById($contentId);
    }

    public function getPracticalInformation() {
        $this->getNewInstance();
        return $this->repository->getPracticalInformation();
    }

    public function getTourByLanguage($language) {
        $this->getNewInstance();
        return $this->repository->getTourByLanguage($language);
    }
}

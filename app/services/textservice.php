<?php
namespace App\Services;
use App\Repositories\textrepository;

class textservice {
    private $repository;

    private function getNewInstance()
    {
        $this->repository = new textrepository();
    }
    public function getAll()
    {
        $this->getNewInstance();
        return $this->repository->getAll();
    }

    public function getTextById($textId)
    {
        $this->getNewInstance();
        return $this->repository->getTextById($textId);
    }

    public function getTextByCategory($category) {
        $this->getNewInstance();
        return $this->repository->getTextByCategory($category);
    }
}

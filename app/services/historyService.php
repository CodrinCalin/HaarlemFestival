<?php
namespace App\Services;
use App\Repositories\historyrepository;

class historyService {
    private $repository;

    private function getNewInstance()
    {
        $this->repository = new historyrepository();
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
        return $this->repository->getContentByCategory("practicalInformation");
    }

    public function getFAQ()
    {
        $this->getNewInstance();
        return $this->repository->getContentByCategory("faq");
    }

    public function getTourByLanguage($language) {
        $this->getNewInstance();
        return $this->repository->getTourByLanguage($language);
    }

    public function getAllHistoryLocations() {
        $this->getNewInstance();
        return $this->repository->getAllHistoryLocations();
    }

    public function getHistoryLocationById($id) {
        $this->getNewInstance();
        return $this->repository->getHistoryLocationById($id);
    }

    public function updateContent($contentId, $newText) {
        $this->getNewInstance();
        $this->repository->updateContent($contentId, $newText);
    }

    public function addContent($content, $addition, $category) {
        $this->getNewInstance();
        $this->repository->addContent($content, $addition, $category);
    }

    public function fixtable() {
        $this->getNewInstance();
        $this->repository->fixtable();
    }
}

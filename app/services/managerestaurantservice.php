<?php

namespace App\Services;

use App\Repositories\managerestaurantRepository;

class ManageRestaurantService
{
    private $repository;

    private function getNewInstance() {
        $this->repository = new ManageRestaurantRepository();
    }

    public function addCategory($category) {
        $this->getNewInstance();
        return $this->repository->addCategory($category);
    }
    public function getCategoryById($categoryId) {
        $this->getNewInstance();
        return $this->repository->getCategoryById($categoryId);
    }

    public function updateCategoryById($category) {
        $this->getNewInstance();
        $this->repository->updateCategoryById($category);
    }
}
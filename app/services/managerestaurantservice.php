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

    public function updateCategory($category) {
        $this->getNewInstance();
        $this->repository->updateCategory($category);
    }

    public function deleteCategoryById($categoryId) {
        $this->getNewInstance();
        $this->repository->deleteCategoryById($categoryId);
    }

    public function getRestaurantById($restaurantId) {
        $this->getNewInstance();
        return $this->repository->getRestaurantById($restaurantId);
    }
    public function deleteRestaurantById($restaurantId) {
        $this->getNewInstance();
        $this->repository->deleteRestaurantById($restaurantId);
    }
}
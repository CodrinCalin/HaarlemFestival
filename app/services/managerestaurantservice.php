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

    public function getCategoryIdByName($categoryName) {
        $this->getNewInstance();
        return $this->repository->getCategoryIdByName($categoryName);
    }

    public function updateCategory($category) {
        $this->getNewInstance();
        $this->repository->updateCategory($category);
    }

    public function deleteCategoryById($categoryId) {
        $this->getNewInstance();
        $this->repository->deleteCategoryById($categoryId);
    }

    public function addRestaurant($restaurant) {
        $this->getNewInstance();
        $this->repository->addRestaurant($restaurant);
    }
    public function getRestaurantById($restaurantId) {
        $this->getNewInstance();
        return $this->repository->getRestaurantById($restaurantId);
    }

    public function updateRestaurant($restaurant) {
        $this->getNewInstance();
        $this->repository->updateRestaurant($restaurant);
    }
    public function deleteRestaurantById($restaurantId) {
        $this->getNewInstance();
        $this->repository->deleteRestaurantById($restaurantId);
    }

    public function getYummyDetails() {
        $this->getNewInstance();
        return $this->repository->getYummyDetails();
    }

    public function updateYummyDetails($details) {
        $this->getNewInstance();
        $this->repository->updateYummyDetails($details);
    }
}
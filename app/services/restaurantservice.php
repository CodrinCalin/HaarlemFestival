<?php

namespace App\Services;

use App\Repositories\restaurantrepository;

class RestaurantService
{
    private $repository;

    private function getNewInstance() {
        $this->repository = new restaurantrepository();
    }

    public function getAllCategories() {
        $this->getNewInstance();
        return $this->repository->getAllCategories();
    }

    public function getAllRestaurants() {
        $this->getNewInstance();
        return $this->repository->getAllRestaurants();
    }

    public function getYummyDetails() {
        $this->getNewInstance();
        return $this->repository->getYummyDetails();
    }
}
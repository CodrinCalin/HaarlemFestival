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

    public function getRestaurantDates() {
        $this->getNewInstance();
        return $this->repository->getRestaurantDates();
    }

    public function getRestaurantDateById($date) {
        $this->getNewInstance();
        return $this->repository->getRestaurantDateById($date);
    }
    public function getRestaurantTimes() {
        $this->getNewInstance();
        return $this->repository->getRestaurantTimes();
    }

    public function getRestaurantTimeById($time) {
        $this->getNewInstance();
        return $this->repository->getRestaurantTimeById($time);
    }

}
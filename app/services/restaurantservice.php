<?php

namespace App\Services;

use App\Repositories\restaurantRepository;

class RestaurantService
{
    private $repository;

    private function getNewInstance() {
        $this->repository = new restaurantRepository();
    }

    public function getAllCategories() {
        $this->getNewInstance();
        return $this->repository->getAllCategories();
    }
}
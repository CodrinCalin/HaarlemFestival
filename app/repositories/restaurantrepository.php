<?php
namespace App\Repositories;

use App\Models\restaurantCategory;
use PDO;

class RestaurantRepository extends Repository {

    function getAllCategories() {
        $stmt = $this->connection->prepare
        ("SELECT id, category, `order` FROM `restaurantCategory`
                ORDER BY `order` ASC");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurantCategory');

        $categories = $stmt->fetchAll();

        return $categories;
    }

}
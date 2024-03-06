<?php
namespace App\Repositories;

use PDO;

class restaurantRepository extends Repository {

    function getAllCategories() {
        $stmt = $this->connection->prepare
        ("SELECT id, category FROM restaurantCategory");

        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurantCategory');
        $categories = $stmt->fetchAll();

        return $categories;
    }

}
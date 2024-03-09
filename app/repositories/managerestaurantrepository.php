<?php
namespace App\Repositories;

use PDO;

class ManageRestaurantRepository extends Repository {

    function addCategory($restaurantCategory) {
        $stmt = $this->connection->prepare
        ("INSERT INTO `restaurantCategory` (category, `order`) 
                VALUES (:category, :order)");

        $stmt->execute([
            ':category' => $restaurantCategory->category,
            ':order' => $restaurantCategory->order]);

    }

    function getCategoryById($categoryId) {
        $stmt = $this->connection->prepare
        ("SELECT id, category, `order` FROM `restaurantCategory` WHERE id=:categoryId");

        $stmt->execute([':categoryId' => $categoryId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurantCategory');

        $category = $stmt->fetch();

        if ($category) {
            return $category;
        } else {
            return null;
        }
    }

    function updateCategoryById($category) {
        $stmt = $this->connection->prepare
        ("UPDATE `restaurantCategory` SET category=:category, `order`=:order WHERE id=:id");

        $stmt->execute([
            ':category' => $category->category,
            ':order' => $category->order,
            ':id' => $category->id
        ]);
    }

}
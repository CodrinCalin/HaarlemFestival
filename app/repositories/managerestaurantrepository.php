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

    function updateCategory($category) {
        $stmt = $this->connection->prepare
        ("UPDATE `restaurantCategory` SET category=:category, `order`=:order WHERE id=:id");

        $stmt->execute([
            ':category' => $category->category,
            ':order' => $category->order,
            ':id' => $category->id
        ]);
    }

    function deleteCategoryById($categoryId) {
        $stmt = $this->connection->prepare
        ("DELETE FROM `restaurantCategory` WHERE `id`=:categoryId");

         $stmt->execute([':categoryId' => $categoryId]);
    }

    function getRestaurantById($restaurantId) {
        $stmt = $this->connection->prepare
        ("SELECT r.id, r.name, r.tags, r.rating, r.address, r.phoneNumber, r.menuLink, r.menuText, r.description, r.adultPrice, r.childPrice, r.previewImage, r.frontPageImage, r.displayImageOne, r.displayImageTwo,
                c.category AS restaurantCategory
                FROM restaurant r 
                JOIN restaurantCategory c ON r.category = c.id 
                WHERE r.id=:restaurantId");

        $stmt->execute([':restaurantId' => $restaurantId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurant');

        $restaurant = $stmt->fetch();

        if ($restaurant) {
            return $restaurant;
        } else {
            return null;
        }
    }

    public function deleteRestaurantById($restaurantId) {
        $stmt = $this->connection->prepare
        ("DELETE FROM `restaurant` WHERE `id`=:restaurantId");

        $stmt->execute([':restaurantId' => $restaurantId]);
    }

}
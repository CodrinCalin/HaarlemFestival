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

    function getAllRestaurants() {
        $stmt = $this->connection->prepare
        ("SELECT r.id, r.name, r.tags, r.rating, r.address, r.phoneNumber, r.menuLink, r.menuText, r.description, r.adultPrice, r.childPrice, r.previewImage, r.frontPageImage, r.displayImageOne, r.displayImageTwo,
                c.category AS restaurantCategory
                FROM restaurant r 
                JOIN restaurantCategory c ON r.category = c.id");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurant');

        $restaurants = $stmt->fetchAll();

        return $restaurants;
    }

    function getYummyDetails() {
        $stmt = $this->connection->prepare
        ("SELECT date, description, reminder FROM `yummyDetails`");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\yummyDetails');

        $yummyDetails = $stmt->fetch();

        return $yummyDetails;
    }

}
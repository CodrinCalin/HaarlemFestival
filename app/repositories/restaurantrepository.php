<?php
namespace App\Repositories;

use App\Models\restaurantCategory;
use App\Models\restaurantDate;
use App\Models\restaurantTime;
use PDO;

class RestaurantRepository extends Repository {

    public function getAllCategories() {
        $stmt = $this->connection->prepare
        ("SELECT id, category, `order` FROM `restaurantCategory`
                ORDER BY `order` ASC");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurantCategory');

        $categories = $stmt->fetchAll();

        return $categories;
    }

    public function getAllRestaurants() {
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

    public function getYummyDetails() {
        $stmt = $this->connection->prepare
        ("SELECT date, description, reminder FROM `yummyDetails`");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\yummyDetails');

        $yummyDetails = $stmt->fetch();

        return $yummyDetails;
    }

    public function getRestaurantDates() {
        $stmt = $this->connection->prepare
        ("SELECT id, restaurantId, date FROM `restaurantDates`");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurantDate');

        $restaurantDates = $stmt->fetchAll();

        return $restaurantDates;
    }

    public function getRestaurantDateById($date) {
        $stmt = $this->connection->prepare
        ("SELECT id, restaurantId, date FROM `restaurantDates` WHERE id=:id");

        $stmt->execute([
            ':id' => $date->id,
        ]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurantDate');

        $restaurantDate = $stmt->fetch();

        return $restaurantDate;
    }

    public function getRestaurantTimes() {
        $stmt = $this->connection->prepare
        ("SELECT id, dateId, time, maxSeats, seatsLeft FROM `restaurantTimes`");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurantTime');

        $restaurantTimes = $stmt->fetchAll();

        return $restaurantTimes;
    }

    public function getRestaurantTimeById($time) {
        $stmt = $this->connection->prepare
        ("SELECT id, dateId, time, maxSeats, seatsLeft FROM `restaurantTimes` WHERE id=:id");

        $stmt->execute([
            ':id' => $time
        ]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\restaurantTime');

        $restaurantTime = $stmt->fetch();

        return $restaurantTime;
    }

}
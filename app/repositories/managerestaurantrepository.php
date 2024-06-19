<?php
namespace App\Repositories;

use PDO;

class ManageRestaurantRepository extends Repository {

    public function addCategory($restaurantCategory) {
        $stmt = $this->connection->prepare
        ("INSERT INTO `restaurantCategory` (category, `order`) 
                VALUES (:category, :order)");

        $stmt->execute([
            ':category' => $restaurantCategory->category,
            ':order' => $restaurantCategory->order]);

    }

    public function getCategoryById($categoryId) {
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

    public function getCategoryIdByName($categoryName) {
        $stmt = $this->connection->prepare
        ("SELECT id FROM `restaurantCategory` WHERE category=:categoryName");

        $stmt->execute([':categoryName' => $categoryName]);

        $categoryId = (string)$stmt->fetchColumn();

        return $categoryId;
    }

    public function updateCategory($category) {
        $stmt = $this->connection->prepare
        ("UPDATE `restaurantCategory` SET category=:category, `order`=:order WHERE id=:id");

        $stmt->execute([
            ':category' => $category->category,
            ':order' => $category->order,
            ':id' => $category->id
        ]);
    }

    public function deleteCategoryById($categoryId) {
        $stmt = $this->connection->prepare
        ("DELETE FROM `restaurantCategory` WHERE `id`=:categoryId");

         $stmt->execute([':categoryId' => $categoryId]);
    }

    public function addRestaurant($restaurant) {
        $stmt = $this->connection->prepare
        ("INSERT INTO `restaurant` (name, tags, rating, address, phoneNumber, menuLink, menuText, description, adultPrice, childPrice, previewImage, frontPageImage, displayImageOne, displayImageTwo, category) 
                VALUES (:name, :tags, :rating, :address, :phoneNumber, :menuLink, :menuText, :description, :adultPrice, :childPrice, :previewImage, :frontPageImage, :displayImageOne, :displayImageTwo, :category)");

        $stmt->execute([
            ':name' => $restaurant->name,
            ':tags' => $restaurant->tags,
            ':rating' => $restaurant->rating,
            ':address' => $restaurant->address,
            ':phoneNumber' => $restaurant->phoneNumber,
            ':menuLink' => $restaurant->menuLink,
            ':menuText' => $restaurant->menuText,
            ':description' => $restaurant->description,
            ':adultPrice' => $restaurant->adultPrice,
            ':childPrice' => $restaurant->childPrice,
            ':previewImage' => $restaurant->previewImage,
            ':frontPageImage' => $restaurant->frontPageImage,
            ':displayImageOne' => $restaurant->displayImageOne,
            ':displayImageTwo' => $restaurant->displayImageTwo,
            ':category' => $restaurant->restaurantCategory
        ]);
    }
    public function getRestaurantById($restaurantId) {
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

    public function updateRestaurant($restaurant) {
        $stmt = $this->connection->prepare
        ("UPDATE `restaurant` SET name=:name, tags=:tags, rating=:rating, address=:address, phoneNumber=:phoneNumber, menuLink=:menuLink, menuText=:menuText, description=:description,
                adultPrice=:adultPrice, childPrice=:childPrice, previewImage=:previewImage, frontPageImage=:frontPageImage, displayImageOne=:displayImageOne, displayImageTwo=:displayImageTwo, category=:category
                WHERE id=:id");

        $stmt->execute([
            ':id' => $restaurant->id,
            ':name' => $restaurant->name,
            ':tags' => $restaurant->tags,
            ':rating' => $restaurant->rating,
            ':address' => $restaurant->address,
            ':phoneNumber' => $restaurant->phoneNumber,
            ':menuLink' => $restaurant->menuLink,
            ':menuText' => $restaurant->menuText,
            ':description' => $restaurant->description,
            ':adultPrice' => $restaurant->adultPrice,
            ':childPrice' => $restaurant->childPrice,
            ':previewImage' => $restaurant->previewImage,
            ':frontPageImage' => $restaurant->frontPageImage,
            ':displayImageOne' => $restaurant->displayImageOne,
            ':displayImageTwo' => $restaurant->displayImageTwo,
            ':category' => $restaurant->restaurantCategory
        ]);
    }
    public function deleteRestaurantById($restaurantId) {
        $stmt = $this->connection->prepare
        ("DELETE FROM `restaurant` WHERE `id`=:restaurantId");

        $stmt->execute([':restaurantId' => $restaurantId]);
    }

    public function getYummyDetails() {
        $stmt = $this->connection->prepare
        ("SELECT id, date, description, reminder FROM yummyDetails");

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\yummyDetails');
        $stmt->execute();

        return $stmt->fetch();
    }

    public function updateYummyDetails($details) {
        $stmt = $this->connection->prepare
        ("UPDATE `yummyDetails` SET date=:date, description=:description, reminder=:reminder WHERE id=:id");

        $stmt->execute([
            ':id' => $details->id,
            ':date' => $details->date,
            ':description' => $details->description,
            ':reminder' => $details->reminder
        ]);
    }

    public function reserveSeat($timeslot) {
        $stmt = $this->connection->prepare
        ("UPDATE `restaurantTimes` SET seatsLeft=:seatsLeft where id=:id");

        $stmt->execute([
            ':seatsLeft' => $timeslot->seatsLeft,
            ':id' => $timeslot->id
        ]);
    }

    public function addReservation($reservation) {
        $stmt = $this->connection->prepare
        ("INSERT INTO `restaurantReservation` (date, time, restaurant, comment, adults, children, totalPrice)
                VALUES (:date, :time, :restaurantId, :comment, :adults, :children, :totalPrice)");

        $stmt->execute([
            ':date' => $reservation->date,
            ':time' => $reservation->time,
            ':restaurantId' => $reservation->restaurantId,
            ':comment' => $reservation->comment,
            ':adults' => $reservation->adults,
            ':children' => $reservation->children,
            ':totalPrice' => $reservation->totalPrice]);
    }

}
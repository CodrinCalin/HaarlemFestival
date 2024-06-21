<?php

namespace App\Repositories;

use App\Models\TicketDance;
use App\Models\TicketHistory;
use App\Models\TicketYummy;
use PDO;

class TicketRepository extends Repository {

    public function getTicketById($id) {
        $sql = "SELECT * FROM ticket WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $this->transformDataToTicket($result);
        }

        return null; // or throw an exception if preferred
    }


    public function getAllTickets()
    {
        $sql = "SELECT * FROM ticket";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tickets = [];
        foreach ($results as $result) {
            $tickets[] = $this->transformDataToTicket($result);
        }

        return $tickets;
    }

    public function getAllDanceTickets()
    {
        $sql = "SELECT T.id, T.name, T.category, T.type, T.quantity_available, T.price, T.location, T.duration, T.date_time, T.artist FROM `ticket` AS T WHERE `category` LIKE 'DANCE';";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tickets = [];
        foreach ($results as $result) {
            $tickets[] = $this->transformDataToTicket($result);
        }

        return $tickets;
    }

    public function getAllYummyTickets()
    {
        $sql = "SELECT T.id, T.name, T.category, T.type, T.quantity_available, T.price, T.location, T.duration, T.date_time, T.restaurant_name, T.star, T.food_type FROM `ticket` AS T WHERE `category` LIKE 'YUMMY';";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tickets = [];
        foreach ($results as $result) {
            $tickets[] = $this->transformDataToTicket($result);
        }

        return $tickets;
    }

    public function getAllHistoryTickets()
    {
        $sql = "SELECT T.id, T.name, T.category, T.type, T.quantity_available, T.price, T.location, T.duration, T.date_time, T.language, T.guide FROM `ticket` AS T WHERE `category` LIKE 'HISTORY';";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tickets = [];
        foreach ($results as $result) {
            $tickets[] = $this->transformDataToTicket($result);
        }

        return $tickets;
    }

    public function getAllYummyTicketsByName($name) {
        $sql = "SELECT T.id, T.name, T.category, T.type, T.quantity_available, T.price, T.location, T.duration, T.restaurant_name, T.date_time, T.language, T.guide, T.star, T.food_type FROM `ticket` AS T WHERE `category` LIKE 'YUMMY' AND `restaurant_name` = :name;";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':name' => $name]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $tickets = [];
        foreach ($results as $result) {
            $tickets[] = $this->transformDataToTicket($result);
        }

        return $tickets;
    }


    public function addTicket($ticket)
    {
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO tickets (name, category, type, quantity_available, price, location, duration, date_time, restaurant_name, star, food_type, language, guide, artist) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );

            $foodType = $ticket instanceof TicketYummy ? implode('/', $ticket->getFoodType()) : null;
            $artist = $ticket instanceof TicketDance ? implode('/', $ticket->getArtist()) : null;

            return $stmt->execute([
                $ticket->getName(),
                $ticket->getCategory(),
                $ticket->getType(),
                $ticket->getQuantityAvailable(),
                $ticket->getPrice(),
                $ticket->getLocation(),
                $ticket->getDuration(),
                $ticket->getDateTime(),
                $ticket instanceof TicketYummy ? $ticket->getRestaurantName() : null,
                $ticket instanceof TicketYummy ? $ticket->getStar() : null,
                $foodType,
                $ticket instanceof TicketHistory ? $ticket->getLanguage() : null,
                $ticket instanceof TicketHistory ? $ticket->getGuide() : null,
                $artist,
            ]);
        } catch (PDOException $e) {
            throw new PDOException('Error adding ticket: ' . $e->getMessage());
        }
    }


    public function updateTicket($id, $name, $category, $type, $quantityAvailable, $price, $location, $duration, $dateTime, $restaurantName, $star, $foodType, $language, $guide, $artist)
    {
        try {
            $stmt = $this->connection->prepare(
                "UPDATE tickets SET name = ?, category = ?, type = ?, quantity_available = ?, price = ?, location = ?, duration = ?, date_time = ?, restaurant_name = ?, star = ?, food_type = ?, language = ?, guide = ?, artist = ? WHERE id = ?"
            );
            return $stmt->execute([$name, $category, $type, $quantityAvailable, $price, $location, $duration, $dateTime, $restaurantName, $star, $foodType, $language, $guide, $artist, $id]);
        } catch (PDOException $e) {
            throw new PDOException('Error updating ticket: ' . $e->getMessage());
        }
    }

    public function deleteTicket($id)
    {
        try {
            $stmt = $this->connection->prepare(
                "DELETE FROM ticket WHERE id = ?"
            );
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            throw new PDOException('Error deleting ticket: ' . $e->getMessage());
        }
    }

    private function transformDataToTicket($result){
        $ticket = "";
        switch ($result['category']) {
            case 'HISTORY':
                $ticket = new TicketHistory(
                    $result['id'],
                    $result['name'],
                    $result['category'],
                    $result['type'],
                    $result['quantity_available'],
                    $result['price'],
                    $result['location'],
                    $result['duration'],
                    $result['date_time'],
                    $result['language'],
                    $result['guide']);
                break;
            case 'YUMMY':
                $ticket = new TicketYummy(
                    $result['id'],
                    $result['name'],
                    $result['category'],
                    $result['type'],
                    $result['quantity_available'],
                    $result['price'],
                    $result['location'],
                    $result['duration'],
                    $result['date_time'],
                    $result['restaurant_name'],
                    $result['star'],
                    $result['food_type']);
                break;
            case 'DANCE':
                $ticket = new TicketDance(
                    $result['id'],
                    $result['name'],
                    $result['category'],
                    $result['type'],
                    $result['quantity_available'],
                    $result['price'],
                    $result['location'],
                    $result['duration'],
                    $result['date_time'],
                    $result['artist']);
                break;
        }
        return $ticket;
    }
}
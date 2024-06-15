<?php
namespace App\Repositories;

use PDO;

class textrepository extends Repository {
    function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM texts");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Text');
        $texts = $stmt->fetchAll();

        return $texts;
    }

    public function getTextById($textId)
    {
        $stmt = $this->connection->prepare(
            "SELECT * 
                FROM texts 
                WHERE id=:textId");
        $stmt->execute([':textId' => $textId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Text');
        $textRetrieved = $stmt->fetch();

        if ($textRetrieved) {
            return $textRetrieved;
        } else {
            return null;
        }
    }

    public function getTextByCategory($category) {
        $stmt = $this->connection->prepare(
            "SELECT * 
                FROM texts 
                WHERE category=:category");
        $stmt->execute([':category' => $category]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\Text');
        $textRetrieved = $stmt->fetch();

        if ($textRetrieved) {
            return $textRetrieved;
        } else {
            return null;
        }
    }
}



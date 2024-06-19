<?php
namespace App\Repositories;

use PDO;

class homerepository extends Repository {

    function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM homeContent");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\homeContent');
        $texts = $stmt->fetchAll();

        return $texts;
    }

    public function getContentById($textId)
    {
        $stmt = $this->connection->prepare(
            "SELECT * 
                FROM homeContent 
                WHERE id=:textId");
        $stmt->execute([':textId' => $textId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\homeContent');
        $textRetrieved = $stmt->fetch();

        if ($textRetrieved) {
            return $textRetrieved;
        } else {
            return null;
        }
    }
}



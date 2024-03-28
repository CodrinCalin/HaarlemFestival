<?php
namespace App\Repositories;

use App\Models\Content;
use App\Models\HistoryTour;
use PDO;

class historycontentrepository extends Repository {

    public function getContentById($contentId) {
        $stmt = $this->connection->prepare(
            "SELECT * 
                FROM historyContent 
                WHERE id=:contentId");
        $stmt->execute([':contentId' => $contentId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\Content');
        $contentRetrieved = $stmt->fetch();

        if ($contentRetrieved) {
            return $contentRetrieved;
        } else {
            return null;
        }
    }

    public function getContentByCategory($category) {
        $stmt = $this->connection->prepare(
            "SELECT *
            FROM historyContent
            WHERE category=:category");
        $stmt->execute([':category' => $category]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\Content');
        return $stmt->fetchAll();
    }

    public function getPracticalInformation(): array
    {
        $stmt = $this->connection->prepare(
            "SELECT *
            FROM historyContent
            WHERE category='practicalInformation'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\Content');
        return $stmt->fetchAll();
    }

    public function getTourByLanguage($language): array
    {
        $stmt = $this->connection->prepare(
            "SELECT *
            FROM historySchedule
            WHERE language=:language"
        );
        $stmt->execute([':language' => $language]);
        $result = $stmt->fetchAll();
        $tours = array();
        foreach ($result as $item) {
            $tours[] = new HistoryTour($item['id'], $item['language'], $item['startTime'], $item['endTime'], $item['tourGuide']);
        }
        return $tours;
    }
}
?>

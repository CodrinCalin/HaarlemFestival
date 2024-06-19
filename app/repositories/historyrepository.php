<?php
namespace App\Repositories;

use App\Models\Content;
use App\Models\HistoryTour;
use PDO;

class historyrepository extends Repository {

    public function getContentById($contentId) {
        $stmt = $this->connection->prepare(
            "SELECT * 
                FROM historyContent 
                WHERE id=:contentId");
        $stmt->execute([':contentId' => $contentId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\HistoryContent');
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
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\HistoryContent');
        return $stmt->fetchAll();
    }

    public function getPracticalInformation(): array
    {
        $stmt = $this->connection->prepare(
            "SELECT *
            FROM historyContent
            WHERE category='practicalInformation'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\HistoryContent');
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

    public function getAllHistoryLocations(): array
    {
        $stmt = $this->connection->prepare(
            "SELECT *
            FROM historyLocation"
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\HistoryLocation');
        return $stmt->fetchAll();
    }

    public function getHistoryLocationById($id) {
        $stmt = $this->connection->prepare(
            "SELECT *
            FROM historyLocation
            WHERE id=:id");
        $stmt->execute([':id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\HistoryLocation');
        $locationRetrieved = $stmt->fetch();
        if ($locationRetrieved) {
            return $locationRetrieved;
        } else {
            return null;
        }
    }

    public function updateContent($id, $newText) {
        $stmt = $this->connection->prepare(
            "UPDATE historyContent
            SET content = :text
            WHERE id = :id"
        );
        $stmt->execute([':id' => $id, ':text' => $newText]);
    }

    public function addContent($content, $addition, $category) {
        $stmt = $this->connection->prepare(
            "INSERT INTO historyContent (content, addition, category)
                    VALUES (:content, :addition, :category)");
        $stmt->execute([':content' => $content, ':addition' => $addition, ':category' => $category]);
    }

    public function editFAQ($id, $question, $answer) {
        $stmt = $this->connection->prepare(
            "UPDATE historyContent
            SET content = :question,
            addition = :answer
            WHERE id = :id"
        );
        $stmt->execute([':id' => $id, ':question' => $question, ':answer' => $answer]);
    }

    public function deleteContent($id) {
        $stmt = $this->connection->prepare(
            "DELETE FROM historyContent
                    WHERE id = :id"
        );
        $stmt->execute([':id' => $id]);
    }

    public function deleteSchedule($id) {
        $stmt = $this->connection->prepare(
            "DELETE FROM historySchedule
                    WHERE id = :id"
        );
        $stmt->execute([':id' => $id]);
    }

    public function addSchedule($language, $guide, $startDate, $endDate) {
        $stmt = $this->connection->prepare(
            "INSERT INTO historySchedule (language, startTime, endTime, tourGuide)
                    VALUES (:language, :startTime, :endTime, :tourGuide)");
        $stmt->execute([':language' => $language, ':startTime' => $startDate, ':endTime' => $endDate, ':tourGuide'=>$guide]);
    }

    public function addImage($name) {
        $stmt = $this->connection->prepare(
            "INSERT INTO historyContent (content, category, addition)
                    VALUES (:content, :category, :addition)");
        $stmt->execute([':content' => $name, ':category' => " ", ':addition' => " "]);
    }

}

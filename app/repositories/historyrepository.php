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

/*    function fixtable() {
        $stmt = $this->connection->prepare
        ("INSERT INTO `historyLocation` (`id`, `name`, `description`, `address`, `latitude`, `longitude`, `text1`, `text2`, `text3`, `text4`, `text5`, `img1`, `img2`, `img3`, `img4`, `img5`, `img6`) VALUES (NULL, 'Hof van bakenes', 'Proveniershof was established in the early 17th century, specifically in 1662, by Pieter Teyler van der Hulst. It was originally intended to provide housing for \"proveniers,\" which were individuals who contributed to the almshouse in exchange for accommodation and other benefits. The almshouse was created to support elderly single women in need.', 'Wijde Appelaarsteeg 11F, 2011 HB Haarlem', '52.38168600509787', '4.639780497291783', '', '', '', '', '', '', '', '', '', '', '');");

        $stmt->execute();

    }*/
}

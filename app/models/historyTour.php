<?php
namespace App\Models;

class HistoryTour {
    public int $id;
    public string $language;
    public \DateTime $startTime;
    public \DateTime $endTime;
    public string $tourGuide;

    public function __construct($id, $language, $startTime, $endTime, $tourGuide) {
        $this->id = $id;
        $this->language = $language;
        $this->startTime = new \DateTime($startTime);
        $this->endTime = new \DateTime($endTime);
        $this->tourGuide = $tourGuide;
    }
}
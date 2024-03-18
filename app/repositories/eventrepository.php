<?php
namespace App\Repositories;

use App\Models\Event;
use PDO;

class eventrepository extends Repository {
    public function getAllEvents(): array
    {
        $stmt = $this->connection->prepare("SELECT fe.id AS event_id, fe.name AS event_name, fs.date AS event_date
        FROM festivalEvents fe
        JOIN festivalSchedule fs ON fe.id = fs.event");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $events = array();

        if (!empty($result)) {
            foreach ($result as $item) {
                if (empty($events)) {
                    $newEvent = new Event($item['event_id'], $item['event_name']);
                    $newEvent->addDate($item['event_date']);
                    $events[] = $newEvent;
                } else {
                    $contains = false;
                    foreach ($events as $event) {
                        if ($event->id == $item['event_id']) {
                            $event->addDate($item['event_date']);
                            $contains = true;

                        }
                    }
                    if (!$contains) {
                        $newEvent = new Event($item['event_id'], $item['event_name']);
                        $newEvent->addDate($item['event_date']);
                        $events[] = $newEvent;
                    }
                }

            }
        }
        return $events;
    }

    public function getAllDates(): array
    {
        $events = $this->getAllEvents();
        $dates = array();
        foreach ($events as $event) {
            foreach ($event->dates as $date) {
                $dates[] = $date;
            }
        }
        $dates = array_unique($dates);
        sort($dates);
        return $dates;
    }
}
?>

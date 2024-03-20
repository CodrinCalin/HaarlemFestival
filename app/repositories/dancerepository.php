<?php
namespace App\Repositories;
use App\Models\Event;
use PDO;

class DanceRepository extends Repository {

    public function getAllArtists(){
        $stmt = $this->connection->prepare
        ("SELECT artist_id, name, style FROM artists");
        $stmt->execute();

        //$stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\artists.php');

        $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $artists;
    }

    public function getAllEvents() {
        $stmt = $this->connection->prepare(
            "SELECT event_id, date, time, session_type, duration, tickets_available, price, remarks, venue_name, artist_name FROM events"
        );
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\Event');

        $events = $stmt->fetchAll();

        return $events;
    }

    public function getAllVenues() {
        $stmt = $this->connection->prepare(
            "SELECT venue_id, name, address, venue_img_url, description FROM venues"
        );
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\Venue');

        return $stmt->fetchAll();
    }

    public function getAllEventsByDate() {
        $stmt = $this->connection->prepare(
            "SELECT event_id, date, time, session_type, duration, tickets_available, price, remarks, venue_name, artist_name FROM events ORDER BY date ASC;"
        );

        $stmt->execute();
        $eventsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $eventsByDate = [];
        foreach ($eventsData as $event) {
            $eventsByDate[$event['date']][] = $event;
        }

        return $eventsByDate;
    }




    public function getAllTickets(){

    }

    public function updateArtist(){

    }
    public function updateEvents(){

    }
    public function updateTickets(){

    }

    public function DeleteArtist(){

    }

    
    public function DeleteEvent(){

    }
    
    public function DeleteTicket(){

    }
}
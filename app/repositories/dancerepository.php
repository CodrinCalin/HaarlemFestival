<?php
namespace App\Repositories;

use PDO;

class DanceRepository extends Repository {

    public function getAllArtists(){
        $stmt = $this->connection->prepare
        ("SELECT artist_id, name, style FROM artists");
        $stmt->execute();

        //$stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\artists.php'); wont work

        $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $artists;
    }

    public function getAllEvents(){
        $stmt = $this->connection->prepare
        ("SELECT event_id, date, time, session_type, duration, tickets_available, price, remarks, venue_name, artist_name FROM events");
        $stmt->execute();

        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $events;
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
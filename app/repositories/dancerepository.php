<?php
namespace App\Repositories;
use App\Models\Event;
use PDO;

class DanceRepository extends Repository {

    public function getAllArtists(){
        $stmt = $this->connection->prepare
        ("SELECT artist_id, name, style, card_image_url, title FROM artists");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\Artists');

        $artists = $stmt->fetchAll();

        return $artists;
    }

    public function getArtistById($artistId) {
        $stmt = $this->connection->prepare(
            "SELECT artist_id, name, style, card_image_url, title, artist_main_img_url FROM artists WHERE artist_id = :artist_id"
        );
        $stmt->bindParam(':artist_id', $artistId, PDO::PARAM_INT);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\Artists');

        $artist = $stmt->fetch();

        return $artist;
    }


    public function getAllDanceEvents() {
        $stmt = $this->connection->prepare(
            "SELECT event_id, date, time, session_type, duration, tickets_available, price, venue_name, artist_name FROM danceEvents"
        );
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\DanceEvent');

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
            "SELECT event_id, date, time, session_type, duration, tickets_available, price, venue_name, artist_name FROM danceEvents ORDER BY date ASC;"
        );

        $stmt->execute();
        $eventsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $eventsByDate = [];
        foreach ($eventsData as $event) {
            $eventsByDate[$event['date']][] = $event;
        }

        return $eventsByDate;
    }

    public function getDetailPageContentByArtistId($artistId) {
        // Fetch content descriptions
        $stmt1 = $this->connection->prepare(
            "SELECT id, artist_id, description_image, description_body 
             FROM danceContentDetail WHERE artist_id = :artist_id"
        );
        $stmt1->bindParam(':artist_id', $artistId, PDO::PARAM_INT);
        $stmt1->execute();
        $stmt1->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\DanceContentDetail');
        $contentDescriptions = $stmt1->fetchAll();
    
        // Fetch notable tracks
        $stmt2 = $this->connection->prepare(
            "SELECT id, artist_id, track_image, track_title, track_url 
             FROM notableTracks WHERE artist_id = :artist_id"
        );
        $stmt2->bindParam(':artist_id', $artistId, PDO::PARAM_INT);
        $stmt2->execute();
        $stmt2->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\NotableTrack');
        $notableTracks = $stmt2->fetchAll();
    
        return [
            'contentDescriptions' => $contentDescriptions,
            'notableTracks' => $notableTracks
        ];
    }

    public function getDanceEventsByArtist($artist_name) {
        $stmt = $this->connection->prepare(
            "SELECT event_id, date, time, session_type, duration, tickets_available, price, venue_name, artist_name 
             FROM danceEvents 
             WHERE artist_name LIKE :artist_name"
        );
        $artistNameParam = '%' . $artist_name . '%';
        $stmt->bindParam(':artist_name', $artistNameParam, PDO::PARAM_STR);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\DanceEvent');

        return $stmt->fetchAll();
    }

    public function getAllSpecialTickets() {
        $stmt = $this->connection->prepare(
            "SELECT id, ticket_name, ticket_price, ticket_information FROM specialTickets"
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\SpecialTicket');
        return $stmt->fetchAll();
    }

    public function createArtist($name, $style, $title, $cardImageUrl, $mainImageUrl) {
        $stmt = $this->connection->prepare("INSERT INTO artists (name, style, title, card_image_url, artist_main_img_url) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $style, $title, $cardImageUrl, $mainImageUrl]);
    }

    public function addArtist(Artists $artist)
    {
        try {
            // Use a prepared statement to insert the artist into the database
            $stmt = $this->connection->prepare("INSERT INTO artists (name, style, title, card_image_url, artist_main_img_url) VALUES (:name, :style, :title, :card_image_url, :artist_main_img_url)");
            
            $name = $artist->getName();
            $style = $artist->style;
            $title = $artist->title;
            $card_image_url = $artist->card_image_url;
            $artist_main_img_url = $artist->artist_main_img_url;

            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':style', $style, PDO::PARAM_STR);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':card_image_url', $card_image_url, PDO::PARAM_STR);
            $stmt->bindParam(':artist_main_img_url', $artist_main_img_url, PDO::PARAM_STR);

            $stmt->execute();
            return true; // Return true if insertion is successful
        } catch (PDOException $e) {
            // Handle the exception (log, show an error message, etc.)
            throw new PDOException('Error adding artist: ' . $e->getMessage());
        }
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
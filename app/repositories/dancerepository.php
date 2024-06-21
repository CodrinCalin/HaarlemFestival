<?php
namespace App\Repositories;
use App\Models\Event;
use App\Models\Artists;
use App\Models\Venue;
use App\Models\NotableTrack;
use App\Models\DanceContentHome;
use App\Models\DanceContentDetail;

use Exception;

use PDO;

class DanceRepository extends Repository {

    public function getAllArtists() {
        $stmt = $this->connection->prepare(
            "SELECT artist_id, name, style, card_image_url, title, artist_main_img_url FROM artists"
        );
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

    // Add, Update, Delete Artists
    public function addArtist(Artists $artist) {
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

    public function deleteArtist($artistId) {
        $stmt = $this->connection->prepare("DELETE FROM artists WHERE artist_id = :artist_id");
        $stmt->bindParam(':artist_id', $artistId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateArtist($artist) {
        try {
            $stmt = $this->connection->prepare("
                UPDATE artists
                SET name = :name,
                    style = :style,
                    title = :title,
                    card_image_url = :card_image_url,
                    artist_main_img_url = :artist_main_img_url
                WHERE artist_id = :artistId
            ");
    
            $stmt->bindParam(':artistId', $artist['artistId'], PDO::PARAM_INT);
            $stmt->bindParam(':name', $artist['name'], PDO::PARAM_STR);
            $stmt->bindParam(':style', $artist['style'], PDO::PARAM_STR);
            $stmt->bindParam(':title', $artist['title'], PDO::PARAM_STR);
            $stmt->bindParam(':card_image_url', $artist['card_image_url'], PDO::PARAM_STR); // Ensure the correct path is bound to the SQL statement
            $stmt->bindParam(':artist_main_img_url', $artist['artist_main_img_url'], PDO::PARAM_STR); // Ensure the correct path is bound to the SQL statement
    
            error_log('Executing SQL: ' . $stmt->queryString . ' with data: ' . print_r($artist, true));
            $stmt->execute();
    
            error_log('Update successful, rows affected: ' . $stmt->rowCount());
        } catch (PDOException $e) {
            error_log('PDOException: ' . $e->getMessage());
            throw new Exception('Error updating artist');
        }
    }
    

    // Add, Update, Delete Notable Tracks

    public function getAllTracks() {
        $stmt = $this->connection->prepare(
            "SELECT id, artist_id, track_image, track_title, track_url FROM notableTracks"
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\NotableTrack');
        return $stmt->fetchAll();
    }

    public function addTrack(NotableTrack $track) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO notableTracks (artist_id, track_image, track_title, track_url) VALUES (:artist_id, :track_image, :track_title, :track_url)");
            
            $artist_id = $track->getArtistId();
            $track_image = $track->getTrackImage();
            $track_title = $track->getTrackTitle();
            $track_url = $track->getTrackUrl();
    
            $stmt->bindParam(':artist_id', $artist_id, PDO::PARAM_INT);
            $stmt->bindParam(':track_image', $track_image, PDO::PARAM_STR);
            $stmt->bindParam(':track_title', $track_title, PDO::PARAM_STR);
            $stmt->bindParam(':track_url', $track_url, PDO::PARAM_STR);
    
            $stmt->execute();
            return true; // Return true if insertion is successful
        } catch (PDOException $e) {
            // Handle the exception (log, show an error message, etc.)
            throw new PDOException('Error adding track: ' . $e->getMessage());
        }
    }    

    public function deleteTrack($trackId) {
        $stmt = $this->connection->prepare("DELETE FROM notableTracks WHERE id = :track_id");
        $stmt->bindParam(':track_id', $trackId, PDO::PARAM_INT);
        return $stmt->execute();
    }    

    public function updateTrack($track) {
        try {
            $stmt = $this->connection->prepare("
                UPDATE notableTracks
                SET artist_id = :artist_id,
                    track_image = :track_image,
                    track_title = :track_title,
                    track_url = :track_url
                WHERE id = :id
            ");
    
            $stmt->bindParam(':id', $track['id'], PDO::PARAM_INT);
            $stmt->bindParam(':artist_id', $track['artist_id'], PDO::PARAM_INT);
            $stmt->bindParam(':track_image', $track['track_image'], PDO::PARAM_STR);
            $stmt->bindParam(':track_title', $track['track_title'], PDO::PARAM_STR);
            $stmt->bindParam(':track_url', $track['track_url'], PDO::PARAM_STR);
    
            error_log('Executing SQL: ' . $stmt->queryString . ' with data: ' . print_r($track, true));
            $stmt->execute();
    
            error_log('Update successful, rows affected: ' . $stmt->rowCount());
        } catch (PDOException $e) {
            error_log('PDOException: ' . $e->getMessage());
            throw new Exception('Error updating track');
        }
    }
    
    // Get a track by its ID

    public function getTrackById($trackId) {
        try {
            $stmt = $this->connection->prepare("SELECT id, artist_id, track_image, track_title, track_url FROM notableTracks WHERE id = :id");
            $stmt->bindParam(':id', $trackId, PDO::PARAM_INT);
            $stmt->execute();
            $track = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($track) {
                // Convert the fetched data to a NotableTrack object
                $notableTrack = new NotableTrack();
                $notableTrack->setId($track['id']);
                $notableTrack->setArtistId($track['artist_id']);
                $notableTrack->setTrackImage($track['track_image']);
                $notableTrack->setTrackTitle($track['track_title']);
                $notableTrack->setTrackUrl($track['track_url']);
                
                return $notableTrack;
            } else {
                throw new Exception('Track not found with ID: ' . $trackId);
            }
        } catch (PDOException $e) {
            throw new Exception('Database error: ' . $e->getMessage());
        }
    }

    // Add, Update, Delete Venues

    public function addVenue(Venue $venue) {
        try {
            // Use a prepared statement to insert the venue into the database
            $stmt = $this->connection->prepare("INSERT INTO venues (name, address, venue_img_url, description) VALUES (:name, :address, :venue_img_url, :description)");
            
            $name = $venue->getName();
            $address = $venue->getAddress();
            $venue_img_url = $venue->getVenueImgUrl();
            $description = $venue->getDescription();
    
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':venue_img_url', $venue_img_url, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    
            $stmt->execute();
            return true; // Return true if insertion is successful
        } catch (PDOException $e) {
            // Handle the exception (log, show an error message, etc.)
            throw new PDOException('Error adding venue: ' . $e->getMessage());
        }
    }

    public function getVenueById($venueId) {
        $stmt = $this->connection->prepare(
            "SELECT venue_id, name, address, venue_img_url, description FROM venues WHERE venue_id = :venue_id"
        );
        $stmt->bindParam(':venue_id', $venueId, PDO::PARAM_INT);
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\Venue');
    
        $venue = $stmt->fetch();
    
        return $venue;
    }

    public function deleteVenue($venueId) {
        $stmt = $this->connection->prepare("DELETE FROM venues WHERE venue_id = :venue_id");
        $stmt->bindParam(':venue_id', $venueId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateVenue($venue) {
        try {
            $stmt = $this->connection->prepare("
                UPDATE venues
                SET name = :name,
                    address = :address,
                    description = :description,
                    venue_img_url = :venue_img_url
                WHERE venue_id = :venue_id
            ");
    
            $stmt->bindParam(':venue_id', $venue['venueId'], PDO::PARAM_INT);
            $stmt->bindParam(':name', $venue['name'], PDO::PARAM_STR);
            $stmt->bindParam(':address', $venue['address'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $venue['description'], PDO::PARAM_STR);
            $stmt->bindParam(':venue_img_url', $venue['venue_img_url'], PDO::PARAM_STR);
    
            error_log('Executing SQL: ' . $stmt->queryString . ' with data: ' . print_r($venue, true));
            $stmt->execute();
    
            $rowsAffected = $stmt->rowCount();
            error_log('Update successful, rows affected: ' . $rowsAffected);
    
            return $rowsAffected > 0; // Return true if rows were updated
        } catch (PDOException $e) {
            error_log('PDOException: ' . $e->getMessage());
            throw new Exception('Error updating venue');
        }
    }    

    // Add, Update, Delete Dance Content Home

    public function getAllDanceContentHome() {
        $stmt = $this->connection->prepare(
            "SELECT id, main_image_url, introduction_title, introduction_subtitle, introduction_text FROM dancecontenthome"
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\DanceContentHome');
        return $stmt->fetchAll();
    }    
    
    public function addDanceContentHome(DanceContentHome $content) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO dancecontenthome (main_image_url, introduction_title, introduction_subtitle, introduction_text) VALUES (:main_image_url, :introduction_title, :introduction_subtitle, :introduction_text)");
            
            $main_image_url = $content->getMainImageUrl();
            $introduction_title = $content->getIntroductionTitle();
            $introduction_subtitle = $content->getIntroductionSubtitle();
            $introduction_text = $content->getIntroductionText();
    
            $stmt->bindParam(':main_image_url', $main_image_url, PDO::PARAM_STR);
            $stmt->bindParam(':introduction_title', $introduction_title, PDO::PARAM_STR);
            $stmt->bindParam(':introduction_subtitle', $introduction_subtitle, PDO::PARAM_STR);
            $stmt->bindParam(':introduction_text', $introduction_text, PDO::PARAM_STR);
    
            $stmt->execute();
            return true; // Return true if insertion is successful
        } catch (PDOException $e) {
            // Handle the exception (log, show an error message, etc.)
            throw new PDOException('Error adding content: ' . $e->getMessage());
        }
    }
    
    public function deleteDanceContentHome($contentId) {
        $stmt = $this->connection->prepare("DELETE FROM dancecontenthome WHERE id = :content_id");
        $stmt->bindParam(':content_id', $contentId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getDanceContentHomeById($id) {
        try {
            $stmt = $this->connection->prepare("SELECT id, main_image_url, introduction_title, introduction_subtitle, introduction_text FROM dancecontenthome WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $content = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($content) {
                // Convert the fetched data to a DanceContentHome object
                $danceContentHome = new DanceContentHome();
                $danceContentHome->setId($content['id']);
                $danceContentHome->setMainImageUrl($content['main_image_url']);
                $danceContentHome->setIntroductionTitle($content['introduction_title']);
                $danceContentHome->setIntroductionSubtitle($content['introduction_subtitle']);
                $danceContentHome->setIntroductionText($content['introduction_text']);
                
                return $danceContentHome;
            } else {
                throw new Exception('Dance Content Home not found with ID: ' . $id);
            }
        } catch (PDOException $e) {
            throw new Exception('Database error: ' . $e->getMessage());
        }
    }
    
    
    public function updateDanceContentHome($content) {
        try {
            $stmt = $this->connection->prepare("
                UPDATE dancecontenthome
                SET main_image_url = :main_image_url,
                    introduction_title = :introduction_title,
                    introduction_subtitle = :introduction_subtitle,
                    introduction_text = :introduction_text
                WHERE id = :id
            ");
    
            $stmt->bindParam(':id', $content['id'], PDO::PARAM_INT);
            $stmt->bindParam(':main_image_url', $content['main_image_url'], PDO::PARAM_STR);
            $stmt->bindParam(':introduction_title', $content['introduction_title'], PDO::PARAM_STR);
            $stmt->bindParam(':introduction_subtitle', $content['introduction_subtitle'], PDO::PARAM_STR);
            $stmt->bindParam(':introduction_text', $content['introduction_text'], PDO::PARAM_STR);
    
            error_log('Executing SQL: ' . $stmt->queryString . ' with data: ' . print_r($content, true));
            $stmt->execute();
    
            error_log('Update successful, rows affected: ' . $stmt->rowCount());
        } catch (PDOException $e) {
            error_log('PDOException: ' . $e->getMessage());
            throw new Exception('Error updating content');
        }
    }
    
    // Add, Update, Delete Dance Content Detail

    public function getAllDanceContentDetail() {
        $stmt = $this->connection->prepare(
            "SELECT id, artist_id, description_image, description_body FROM danceContentDetail"
        );
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'App\\Models\\DanceContentDetail');
        return $stmt->fetchAll();
    }    
    
    public function addDanceContentDetail(DanceContentDetail $content) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO danceContentDetail (artist_id, description_image, description_body) VALUES (:artist_id, :description_image, :description_body)");
            
            $artist_id = $content->getArtistId();
            $description_image = $content->getDescriptionImage();
            $description_body = $content->getDescriptionBody();
    
            $stmt->bindParam(':artist_id', $artist_id, PDO::PARAM_INT);
            $stmt->bindParam(':description_image', $description_image, PDO::PARAM_STR);
            $stmt->bindParam(':description_body', $description_body, PDO::PARAM_STR);
    
            $stmt->execute();
            return true; // Return true if insertion is successful
        } catch (PDOException $e) {
            // Handle the exception (log, show an error message, etc.)
            throw new PDOException('Error adding content: ' . $e->getMessage());
        }
    }
    
    public function deleteDanceContentDetail($contentId) {
        $stmt = $this->connection->prepare("DELETE FROM danceContentDetail WHERE id = :content_id");
        $stmt->bindParam(':content_id', $contentId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function getDanceContentDetailById($id) {
        try {
            $stmt = $this->connection->prepare("SELECT id, artist_id, description_image, description_body FROM danceContentDetail WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $content = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($content) {
                // Convert the fetched data to a DanceContentDetail object
                $danceContentDetail = new DanceContentDetail();
                $danceContentDetail->setId($content['id']);
                $danceContentDetail->setArtistId($content['artist_id']);
                $danceContentDetail->setDescriptionImage($content['description_image']);
                $danceContentDetail->setDescriptionBody($content['description_body']);
                
                return $danceContentDetail;
            } else {
                throw new Exception('Dance Content Detail not found with ID: ' . $id);
            }
        } catch (PDOException $e) {
            throw new Exception('Database error: ' . $e->getMessage());
        }
    }
    
    public function updateDanceContentDetail($content) {
        try {
            $stmt = $this->connection->prepare("
                UPDATE danceContentDetail
                SET artist_id = :artist_id,
                    description_image = :description_image,
                    description_body = :description_body
                WHERE id = :id
            ");
    
            $stmt->bindParam(':id', $content['id'], PDO::PARAM_INT);
            $stmt->bindParam(':artist_id', $content['artist_id'], PDO::PARAM_INT);
            $stmt->bindParam(':description_image', $content['description_image'], PDO::PARAM_STR);
            $stmt->bindParam(':description_body', $content['description_body'], PDO::PARAM_STR);
    
            error_log('Executing SQL: ' . $stmt->queryString . ' with data: ' . print_r($content, true));
            $stmt->execute();
    
            error_log('Update successful, rows affected: ' . $stmt->rowCount());
        } catch (PDOException $e) {
            error_log('PDOException: ' . $e->getMessage());
            throw new Exception('Error updating content');
        }
    }
}
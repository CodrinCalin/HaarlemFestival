<?php 
namespace App\Models;

class NotableTrack
{
    public $id;
    public $artist_id;
    public $track_image;
    public $track_title;
    public $track_url;

    public function __construct($id = null, $artist_id = null, $track_image = null, $track_title = null, $track_url = null)
    {
        $this->id = $id;
        $this->artist_id = $artist_id;
        $this->track_image = $track_image;
        $this->track_title = $track_title;
        $this->track_url = $track_url;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setArtistId($artist_id)
    {
        $this->artist_id = $artist_id;
    }

    public function getArtistId()
    {
        return $this->artist_id;
    }

    public function setTrackImage($track_image)
    {
        $this->track_image = $track_image;
    }

    public function getTrackImage()
    {
        return $this->track_image;
    }

    public function setTrackTitle($track_title)
    {
        $this->track_title = $track_title;
    }


    public function getTrackTitle()
    {
        return $this->track_title;
    }

    public function setTrackUrl($track_url)
    {
        $this->track_url = $track_url;
    }

    public function getTrackUrl()
    {
        return $this->track_url;
    }
}
?>
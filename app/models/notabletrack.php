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
}
?>
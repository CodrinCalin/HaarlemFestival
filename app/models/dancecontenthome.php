<?php
namespace App\Models;


class DanceContentHome
{
    public $main_image_url;
    public $introduction_text;
    public $introduction_title;
    public $introduction_subtitle;

    public function __construct($main_image_url = null, $introduction_text = null, $introduction_title = null, $introduction_subtitle = null)
    {
        $this->main_image_url = $main_image_url;
        $this->introduction_text = $introduction_text;
        $this->introduction_title = $introduction_title;
        $this->introduction_subtitle = $introduction_subtitle;
    }
}
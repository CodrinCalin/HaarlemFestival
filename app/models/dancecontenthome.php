<?php
namespace App\Models;


class DanceContentHome
{
    public $id;
    public $main_image_url;
    public $introduction_title;
    public $introduction_subtitle;
    public $introduction_text;

    // Add constructor if needed
    public function __construct($id = null, $main_image_url = null, $introduction_title = null, $introduction_subtitle = null, $introduction_text = null) {
        $this->id = $id;
        $this->main_image_url = $main_image_url;
        $this->introduction_title = $introduction_title;
        $this->introduction_subtitle = $introduction_subtitle;
        $this->introduction_text = $introduction_text;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMainImageUrl() {
        return $this->main_image_url;
    }

    public function setMainImageUrl($main_image_url) {
        $this->main_image_url = $main_image_url;
    }

    public function getIntroductionTitle() {
        return $this->introduction_title;
    }

    public function setIntroductionTitle($introduction_title) {
        $this->introduction_title = $introduction_title;
    }

    public function getIntroductionSubtitle() {
        return $this->introduction_subtitle;
    }

    public function setIntroductionSubtitle($introduction_subtitle) {
        $this->introduction_subtitle = $introduction_subtitle;
    }

    public function getIntroductionText() {
        return $this->introduction_text;
    }

    public function setIntroductionText($introduction_text) {
        $this->introduction_text = $introduction_text;
    }
}
<?php

namespace App\Services;

use App\Controllers\imagecontroller;

class ImageService
{
    private $controller;

    private function getNewInstance()
    {
        $this->controller = new imagecontroller();
    }

    public function uploadImage($file, $directory)
    {
        $this->getNewInstance();
        return $this->controller->uploadImage($file, $directory);
    }

    public function deleteImage($file, $directory) {
        $this->getNewInstance();
        $this->controller->deleteImage($file, $directory);
    }
}
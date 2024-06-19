<?php

namespace App\Controllers;

class ImageController
{
    public function uploadImage($file, $directory)
    {
        if ($this->validateFile($file)) {
            $targetFile = $directory . basename($file["name"]);
            // Rename file if it already exists
            if (file_exists($targetFile)) {
                $fileInfo = pathinfo($targetFile);
                $fileName = $fileInfo["filename"];
                $fileExtension = $fileInfo["extension"];
                $counter = 1;

                // Generate a new filename until it doesn't exist
                while (file_exists($targetFile)) {
                    $targetFile = $directory . $fileName . $counter . "." . $fileExtension;
                    $counter++;
                }
            }

            if (move_uploaded_file($file["tmp_name"], $targetFile)) {
                return basename($targetFile);
            } else {
                echo "<h1>Sorry, there was an error uploading your file. Please try again.</h1>";
            }
        }
        //Return a default image in case all uploading fails
        return "default.png";
    }

        private function validateFile($file)
        {
            //Check if image is real
            $check = getimagesize($file["tmp_name"]);
            if($check === false) { return false; }

            return true;
        }

        public function deleteImage($file, $directory) {
            $targetFile = $directory . $file;
            if(file_exists($targetFile)) {
                unlink($targetFile);
            }
        }
    }

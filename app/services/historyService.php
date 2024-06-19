<?php
namespace App\Services;
use App\Repositories\historyrepository;

class historyService {
    private $repository;

    private function getNewInstance()
    {
        $this->repository = new historyrepository();
    }
    public function getAll()
    {
        $this->getNewInstance();
        return $this->repository->getAll();
    }

    public function getContentById($contentId) {
        $this->getNewInstance();
        return $this->repository->getContentById($contentId);
    }

    public function getPracticalInformation() {
        $this->getNewInstance();
        return $this->repository->getContentByCategory("practicalInformation");
    }

    public function getFAQ()
    {
        $this->getNewInstance();
        return $this->repository->getContentByCategory("faq");
    }

    public function getTourByLanguage($language) {
        $this->getNewInstance();
        return $this->repository->getTourByLanguage($language);
    }

    public function getAllHistoryLocations() {
        $this->getNewInstance();
        return $this->repository->getAllHistoryLocations();
    }

    public function getHistoryLocationById($id) {
        $this->getNewInstance();
        return $this->repository->getHistoryLocationById($id);
    }

    public function uploadImage($image, $name) {
        if (isset($image) && $image["error"] == 0) {
            $fileType = explode('.', $image["name"])[1];
            $image["name"] = $name.".".$fileType;
            $fileFullName = $image["name"];
            $fileTmpPath = $image["tmp_name"];
            $uploadFileDir = './img/history/';
            $dest_path = $uploadFileDir . $fileFullName;
            $newPath = '\img\history\\' . $fileFullName;

            // Move the file to the specified directory
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                return $newPath;
            } else {
                return " ";
            }
        } else {
            return " ";
        }
    }

    public function changeImage($id, $newPath) {
        $this->getNewInstance();
        $this->repository->updateContent($id, $newPath);
    }

    public function removeImage() {
        $this->getNewInstance();
        $this->repository->addImage("\img\history\history_header.png");
    }

    public function updateContent($contentId, $newText) {
        $this->getNewInstance();
        $this->repository->updateContent($contentId, $newText);
    }

    public function addContent($content, $addition, $category) {
        $this->getNewInstance();
        $this->repository->addContent($content, $addition, $category);
    }

    public function editFAQ($id, $question, $answer) {
        $this->getNewInstance();
        $this->repository->editFAQ($id, $question, $answer);
    }

    public function deleteContent($id) {
        $this->getNewInstance();
        $this->repository->deleteContent($id);
    }

    public function deleteSchedule($id) {
        $this->getNewInstance();
        $this->repository->deleteSchedule($id);
    }

    public function addSchedule($language, $guide, $startDate, $endDate) {
        $this->getNewInstance();
        $this->repository->addSchedule($language, $guide, $startDate, $endDate);
    }
}

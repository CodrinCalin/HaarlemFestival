<?php
namespace App\Controllers;

class ManageHistoryController
{
    public $historyService;

    function __construct()
    {
        session_start();
        $this->historyService = new \App\Services\historyService();
    }

    public function index()
    {
        require __DIR__ . '/../views/managehistory/index.php';
    }

    public function manageHeader() {
        $service = $this->historyService;
        require __DIR__ . '/../views/managehistory/manageHeader.php';
    }

    public function manageIntro() {
        $service = $this->historyService;
        require __DIR__ . '/../views/managehistory/manageIntro.php';
    }

    public function managePracticalInformation() {
        $service = $this->historyService;
        require __DIR__ . '/../views/managehistory/managePracticalInformation.php';
    }

    public function manageSchedule() {
        $service = $this->historyService;
        require __DIR__ . '/../views/managehistory/manageSchedule.php';
    }

    public function manageLocations() {
        require __DIR__ . '/../views/managehistory/manageLocations.php';
    }

    public function manageFAQs() {
        $service = $this->historyService;
        require __DIR__ . '/../views/managehistory/manageFAQs.php';
    }

    public function changeImage() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET["id"];
            $name = $_GET["name"];
            $newPath = $this->historyService->uploadImage($_FILES["image"], $name);
            $this->historyService->changeImage($id, $newPath);

            header("Location: /managehistory/manageHeader");
        }
    }

    public function editContent() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET["id"];
            $type = $_GET["type"];
            $newContent = htmlspecialchars($_POST["newContent"]);

            $this->historyService->updateContent($id, $newContent);

            if($type == "intro") {
                header("Location: /managehistory/manageIntro");
            }
            else if($type == "practical") {
                header("Location: /managehistory/managePracticalInformation");
            }
        }
    }

    public function addInfoCard() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $text = htmlspecialchars($_POST["content"]);
            $name = $_GET["name"];
            $newPath = $this->historyService->uploadImage($_FILES["image"], $name);

            $this->historyService->addContent($text, $newPath, "practicalInformation");

            header("Location: /managehistory/managePracticalInformation");
        }
    }

    public function deleteInfoCard() {
        $id = $_GET["id"];
        $this->historyService->deleteContent($id);

        header("Location: /managehistory/managePracticalInformation");
    }

    public function addFAQ() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $content = htmlspecialchars($_POST["question"]);
            $addition = htmlspecialchars($_POST["answer"]);
            $category = "faq";

            $this->historyService->addContent($content, $addition, $category);

            header("Location: /managehistory/manageFAQs");
        }
    }

    public function editFAQ() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET["id"];
            $question = htmlspecialchars($_POST["newQuestion"]);
            $answer = htmlspecialchars($_POST["newAnswer"]);

            $this->historyService->editFAQ($id, $question, $answer);

            header("Location: /managehistory/manageFAQs");
        }
    }

    public function deleteFAQ() {
        $id = $_GET["id"];
        $this->historyService->deleteContent($id);

        header("Location: /managehistory/manageFAQs");
    }

    public function deleteSchedule() {
        $id = $_GET["id"];
        $this->historyService->deleteSchedule($id);

        header("Location: /managehistory/manageSchedule");
    }

    public function addSchedule() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $language = htmlspecialchars($_POST["language"]);
            $guide = htmlspecialchars($_POST["guide"]);
            $startDate = $_POST["startDate"];
            $endDate = $_POST["endDate"];

            $this->historyService->addSchedule($language, $guide, $startDate, $endDate);

            header("Location: /managehistory/manageSchedule");
        }
    }
}
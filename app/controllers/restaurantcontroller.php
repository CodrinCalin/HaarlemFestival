<?php

namespace App\Controllers;

use App\Models\Restaurant;
use App\Models\restaurantCategory;
use App\Models\restaurantReservation;
use App\Services\RestaurantService;
use App\Services\ManageRestaurantService;
use App\Services\TicketService;
use http\Header;

class RestaurantController {

    private $service;
    private $manageRestaurantService;
    private $ticketService;

    function __construct() {
        session_start();
        $this->service = new RestaurantService();
        $this->manageRestaurantService = new ManageRestaurantService();
        $this->ticketService = new TicketService();
    }

    public function index()
    {
        try {
            $categoryModel = $this->service->getAllCategories();
            $restaurantModel = $this->service->getAllRestaurants();
            $yummyDetails = $this->service->getYummyDetails();
        }
        catch(\Exception $e) {
            echo "<h1>Error retrieving data, refresh and try again.</h1>";
        }
        require __DIR__ . '/../views/restaurant/index.php';
    }

    public function details() {
        $restaurantId = $_GET["id"] ?? null;

        if ($restaurantId !== null) {

            $restaurantModel = $this->manageRestaurantService->getRestaurantById($restaurantId);
            $yummyDetails = $this->manageRestaurantService->getYummyDetails();
//            $restaurantDates = $this->service->getRestaurantDates($restaurantId);
//            $restaurantTimes = $this->service->getRestaurantTimes($restaurantId);
            $restaurantDates = $this->restaurantDates($restaurantId);
            $restaurantTimes = $this->restaurantTimes($restaurantId);
            require __DIR__ . '/../views/restaurant/details.php';

        } else {
            echo "<h1>Restaurant with provided ID not found!</h1>";
        }
    }

    public function reserveSeats() {
        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $restaurantReservation = new restaurantReservation();

            $restaurantReservation->restaurantId = $_POST["id"];
            $restaurantReservation->date = $_POST["dates"];
            $restaurantReservation->time = $_POST["times"];
            $restaurantReservation->comment = $_POST["comment"];
            $restaurantReservation->adults = $_POST["adults"];
            $restaurantReservation->children = $_POST["children"];
            $restaurantReservation->totalPrice = $this->calculateTotalPrice($restaurantReservation);

            if(!$this->updateAvailableSeats($restaurantReservation)) {
                echo "<h1>No more seats available</h1>";
                exit;
            }

            $this->manageRestaurantService->addReservation($restaurantReservation);

            $this->returnToIndex();
        }else{
            echo "<h1>Invalid Reservation</h1>";
        }
    }

     private function updateAvailableSeats($restaurantReservation) {
        $timeslot = $this->service->getRestaurantTimeById($restaurantReservation->time);
        $timeslot->seatsLeft = $timeslot->seatsLeft - ($restaurantReservation->adults + $restaurantReservation->children);

        if($timeslot->seatsLeft < 0) {
            return false;
        }
        else {
            $this->manageRestaurantService->reserveSeat($timeslot);
            return true;
        }
    }

    private function calculateTotalPrice($restaurantReservation) {
        $restaurant = $this->manageRestaurantService->getRestaurantById($restaurantReservation->restaurantId);

        $adultPrice = $restaurantReservation->adults * $restaurant->adultPrice;
        $childPrice = $restaurantReservation->children * $restaurant->childPrice;

        return $adultPrice + $childPrice;
    }

    private function restaurantDates($restaurantId) {
        $restaurant = $this->manageRestaurantService->getRestaurantById($restaurantId);
        $tickets = $this->ticketService->getAllYummyTicketsByName($restaurant->name);
        $dates = [];

        foreach($tickets as $ticket) {
            $dateTime = $ticket->getDateTime();
            $date = $dateTime->format('F-d');
            if (!in_array($date, $dates)) {
                $dates[] = $date;
            }
        }

        return $dates;
    }

    private function restaurantTimes($restaurantId) {
        $restaurant = $this->manageRestaurantService->getRestaurantById($restaurantId);
        $tickets = $this->ticketService->getAllYummyTicketsByName($restaurant->name);

        $timeTickets = [];

        foreach($tickets as $ticket) {
            $unique = true;
            foreach($timeTickets as $time) {
                if($time->getDateTime()->format('H:i') === $ticket->getDateTime()->format('H:i')) {
                    $unique = false;
                    break;
                }
            }
            if($unique) { $timeTickets[] = $ticket; }
        }

        return $timeTickets;
    }
    private function getTimeByDate($date, $restaurantId) {
        $restaurant = $this->manageRestaurantService->getRestaurantById($restaurantId);
        $tickets = $this->ticketService->getAllYummyTicketsByName($restaurant->name);
        //Only keep tickets with the right date
        $counter = 0;
        foreach($tickets as $ticket) {
            if($ticket->getDateTime()->format('F-d') !== $date) {
                unset($tickets[$counter]);
            }
            $counter++;
        }

        $timeTickets = [];
        //Filter out only unique times from the tickets
        foreach($tickets as $ticket) {
            $unique = true;
            foreach($timeTickets as $time) {
                if($time->getDateTime()->format('H:i') === $ticket->getDateTime()->format('H:i')) {
                    $unique = false;
                    break;
                }
            }
            if($unique) { $timeTickets[] = $ticket; }
        }

        return $timeTickets;
    }
    public function updateTime()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = $_POST['dates'];
            $restaurantId = $_POST['restaurant'];
            header('Content-Type: application/json');

            $times = [];
            $times = $this->getTimeByDate($date, $restaurantId);
            $encoded = json_encode($times[0], JSON_FORCE_OBJECT);
        }
    }

    public function returnToIndex()
    {
        header("Location: /restaurant");
        exit();
    }
}
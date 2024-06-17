<?php
session_start();
require_once 'controllers/CartController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketId = $_POST['ticket_id'];
    $quantity = $_POST['quantity'];

    $cartController = new CartController();
    $cartController->addToCart($ticketId, $quantity);

    header('Location: index.php');
}
?>
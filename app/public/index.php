<?php
require '../vendor/autoload.php';

// Load environment variables from .env
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Access environment variables
$stripeSecretKey = $_ENV['STRIPE_SECRET_KEY'];

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new App\PatternRouter();
$router->route($uri);


<?php

$secretkey = "sk_test_51PT20QFOgvMrJQDgldkFAmxn37UrQBbgHCk67Y2B8VFtNlvZfRvWeBaitTSmAUeghkAHOUzoXgOKtxHhc7nJ7OBJ00UI6zgWwM";
$domain = 'http://localhost';
require_once '../vendor/autoload.php';

use Stripe\Stripe;
use Stripe\Checkout\Session;
header('Content-Type: application/json');

Stripe::setApiKey($secretkey);
$YOUR_DOMAIN = 'http://localhost';

// Fetch the cart items using CartManager
$cart = \App\lib\CartManager::getCart();
$cartItems = $cart->getItems();
$lineItems = [];

// Prepare line items for Stripe checkout
foreach ($cart->getItems() as $item) {
    $ticket = $item['ticket'];
    $lineItems[] = [
        'price_data' => [
            'currency' => 'eur',
            'unit_amount' => $ticket->getPrice() * 100, // Amount in cents
            'product_data' => [
                'name' => $ticket->getFullTicketName(),
                'description' => 'Date: ' . $ticket->getDateTime(),
            ],
        ],
        'quantity' => $item['quantity'],
    ];
}

try {
    // Create a Stripe checkout session
    $checkout_session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => $domain . '/payment/checkout_success',
        'cancel_url' => $domain . '/payment/checkout_cancel'
    ]);

    // Set session variable for successful checkout
    $paymentController = new \App\Controllers\PaymentController();
    $paymentController->setCheckoutSuccessSession();

    // Redirect to the Stripe checkout page
    http_response_code(303);
    header("Location: " . $checkout_session->url);
    exit;
} catch (Exception $e) {
    // Handle error creating the checkout session
    echo 'Error creating checkout session: ' . $e->getMessage();
}
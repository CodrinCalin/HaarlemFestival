<?php

namespace App\Controllers;

use App\Services\OrderService;

class OrderController extends Controller
{
    private $orderService;

    public function __construct()
    {
        parent::__construct();
        $this->orderService = new OrderService(); // Inject OrderService dependency
    }

    public function index()
    {
        // Retrieve unique_code from query parameters
        $orderCode = $_GET['unique_code'] ?? null;

        if (!$orderCode) {
            http_response_code(400); // Bad request if code is missing
            echo "Order code missing.";
            return;
        }

        // Fetch order details from the database based on $orderCode
        $order = $this->orderService->getOrderDetails($orderCode);

        if (!$order) {
            http_response_code(404); // Order not found
            echo "Order not found.";
            return;
        }

        // Assuming you have a view to display order details
        require __DIR__ . '/../views/order/index.php';
    }
}
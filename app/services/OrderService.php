<?php

namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService
{
    private $orderRepository;

    public function __construct() {
        $this->getNewInstance();
    }

    private function getNewInstance() {
        $this->orderRepository = new OrderRepository();
    }

    // <editor-fold desc="Create order">
    public function createOrder($cartItems) {
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item['ticket']->getPrice() * $item['quantity'];
        }

        $uniqueCode = $this->generateUniqueCode();

        $orderData = [
            'unique_code' => $uniqueCode,
            'total_amount' => $totalAmount,
            'items' => []
        ];

        foreach ($cartItems as $item) {
            $ticket = $item['ticket'];

            $orderData['items'][] = [
                'ticket_id' => $ticket->getId(),
                'ticket_name' => $ticket->getFullTicketName(),
                'quantity' => $item['quantity'],
                'price' => $ticket->getPrice(),
                'datetime' => $ticket->getDateTime()
            ];
        }

        $this->orderRepository->createOrder($orderData);

        return $uniqueCode;
    }

    private function generateUniqueCode() {
        do {
            $uniqueCode = bin2hex(random_bytes(16));
        } while ($this->orderRepository->uniqueCodeExists($uniqueCode));

        return $uniqueCode;
    }
    // <editor-fold>

    public function getOrderDetails($unique_code) {
        return $this->orderRepository->getOrderDetails($unique_code);
    }
}
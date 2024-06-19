<?php

namespace App\Models;

use DateTime;

class Order
{
    private int $id;
    private string $uniqueCode;
    private DateTime $orderDate;
    private float $totalAmount;
    private array $orderItems = [];

    // <editor-fold desc="Getters">
    public function getId(): int {
        return $this->id;
    }
    public function getUniqueCode(): string {
        return $this->uniqueCode;
    }
    public function getOrderDate(): DateTime {
        return $this->orderDate;
    }
    public function getTotalAmount(): float {
        return $this->totalAmount;
    }
    public function getOrderItems(): array {
        return $this->orderItems;
    }
    // </editor-fold>

    //<editor-fold desc="Setters">
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setUniqueCode(string $uniqueCode): void {
        $this->uniqueCode = $uniqueCode;
    }
    public function setOrderDate(DateTime $orderDate): void {
        $this->orderDate = $orderDate;
    }
    public function setTotalAmount(float $totalAmount): void {
        $this->totalAmount = $totalAmount;
    }
    // </editor-fold>

    public function addOrderItem(OrderItem $orderItem): void {
        $this->orderItems[] = $orderItem;
    }
}

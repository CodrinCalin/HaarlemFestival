<?php
namespace App\Models;

use DateTime;

class OrderItem
{
    private int $id;
    private int $orderId;
    private int $ticketId;
    private string $ticketName;
    private int $quantity;
    private float $price;
    private DateTime $datetime;

    // <editor-fold desc="Getters">
    public function getId(): int {
        return $this->id;
    }
    public function getOrderId(): int {
        return $this->orderId;
    }
    public function getTicketId(): int {
        return $this->ticketId;
    }
    public function getTicketName(): string {
        return $this->ticketName;
    }
    public function getQuantity(): int {
        return $this->quantity;
    }
    public function getPrice(): float {
        return $this->price;
    }
    public function getDatetime(): DateTime {
        return $this->datetime;
    }
    // </editor-fold>

    // <editor-fold desc="Setters">
    public function setId(int $id): void {
        $this->id = $id;
    }
    public function setOrderId(int $orderId): void {
        $this->orderId = $orderId;
    }
    public function setTicketId(int $ticketId): void {
        $this->ticketId = $ticketId;
    }
    public function setTicketName(string $ticketName): void {
        $this->ticketName = $ticketName;
    }
    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }
    public function setPrice(float $price): void {
        $this->price = $price;
    }
    public function setDatetime(DateTime $datetime): void {
        $this->datetime = $datetime;
    }
    // </editor-fold>
}

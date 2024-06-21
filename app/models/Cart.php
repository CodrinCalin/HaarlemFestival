<?php

namespace App\Models;

class Cart {
    private $items = [];

    public function addItem($ticket, $quantity) {
        $id = $ticket->getId();
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
        } else {
            $this->items[$id] = ['ticket' => $ticket, 'quantity' => $quantity];
        }
    }

    public function removeItem($ticketId, $quantity = 1)
    {
        foreach ($this->items as $key => $item) {
            if ($item['ticket']->getId() == $ticketId) {
                if ($item['quantity'] > $quantity) {
                    $this->items[$key]['quantity'] -= $quantity;
                } else {
                    unset($this->items[$key]);
                }
                break;
            }
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['ticket']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    public function getItems() {
        return $this->items;
    }

    // Method to return items sorted by closest date/time without affecting the original array
    public function getTimeOrderedCart() {
        $sortedItems = $this->items; // Make a copy of the items array
        usort($sortedItems, function($a, $b) {
            $dateA = $a['ticket']->getDateTime();
            $dateB = $b['ticket']->getDateTime();
            return $dateA <=> $dateB;
        });
        return $sortedItems;
    }

    public function printItems() {
        foreach ($this->items as $item){
            echo $item['ticket']->printDetails();
        }
    }

    public function clearCart()
    {
        $this->items = [];
    }
}
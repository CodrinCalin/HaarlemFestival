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
        // Re-index the array to maintain consistent keys
        $this->items = array_values($this->items);
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['ticket']->getPrice() * $item['quantity'];
        }
        return $total;
    }

    // Get all items in the cart and sort by closest date/time
    public function getItems() {
        //$this->sortByClosestDateTime(); // Ensure items are sorted before returning
        return $this->items;
    }

    // Method to sort items by closest date/time
    private function sortByClosestDateTime() {
        usort($this->items, function($a, $b) {
            $dateA = $a['ticket']->getDateTime();
            $dateB = $b['ticket']->getDateTime();
            return strtotime($dateA) - strtotime($dateB);
        });
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
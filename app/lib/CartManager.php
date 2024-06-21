<?php

namespace App\lib;

use App\Models\Cart;

class CartManager extends SessionManager
{
    public static function getCart() {
        self::startSession();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new Cart();
        }
        return $_SESSION['cart'];
    }
    public static function clearCart() {
        self::startSession();
        if (isset($_SESSION['cart'])) {
            $_SESSION['cart'] = new Cart();
        }
    }

    public static function getTimeOrderedCart() {
        $cart = self::getCart();
        return $cart->getTimeOrderedCart();
    }
}
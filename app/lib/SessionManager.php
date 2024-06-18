<?php

namespace App\lib;

use App\Models\Cart;

class SessionManager {
    public static function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
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

}
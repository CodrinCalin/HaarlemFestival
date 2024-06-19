<?php

namespace App\lib;

use App\Models\Cart;

class SessionManager {
    public static function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
}
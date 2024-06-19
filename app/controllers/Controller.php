<?php

namespace App\Controllers;

use App\lib\SessionManager;

class Controller
{
    private $cart;

    function __construct()
    {
        SessionManager::startSession();
    }
}
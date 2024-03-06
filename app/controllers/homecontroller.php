<?php
namespace App\Controllers;

class HomeController
{
    function __construct()
    {
        session_start();
    }

    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function user()
    {
        require __DIR__ . '/../views/manageusers/index.php';
    }
}
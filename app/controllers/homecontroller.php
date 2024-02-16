<?php
namespace App\Controllers;

class HomeController
{
    function __construct()
    {
        /*for now empty*/
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
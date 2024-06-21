<?php
namespace App\Controllers;

use http\Header;

class HomeController extends Controller
{
    public $homeService;
    function __construct()
    {
        session_start();
        $this->homeService = new \App\Services\homeService();
    }

    public function index()
    {
        $service = $this->homeService;
        require __DIR__ . '/../views/home/index.php';
    }
}
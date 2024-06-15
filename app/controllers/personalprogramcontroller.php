<?php
namespace App\Controllers;

use App\Services\UserService;

class PersonalProgramController
{
    private $service;

    function __construct()
    {
        session_start();
        $this->service = new UserService();
    }

    public function index()
    {
        $model = $this->service->getAll();
        require __DIR__ . '/../views/personalprogram/index.php';
    }
}
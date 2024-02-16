<?php
namespace App\Controllers;

class ManageUsersController
{
    private $service;

    function __construct()
    {
        $this->service = new \App\Services\UserService();
    }

    public function index()
    {
        $model = $this->service->getAll();
        require __DIR__ . '/../views/manageusers/index.php';
    }
}
<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService {

    private $repository;

    private function getNewInstance()
    {
        $this->repository = new UserRepository();
    }
    public function getAll()
    {
        $this->getNewInstance();
        return $this->repository->getAll();
    }

    public function insert($user)
    {
        $this->getNewInstance();
        return $this->repository->insert($user);
    }

    public function getUserById($userId)
    {
        $this->getNewInstance();
        return $this->repository->getUserById($userId);
    }

    public function deleteUserById($userId)
    {
        $this->getNewInstance();
        $this->repository->deleteUserById($userId);
    }

    public function updateUserById($updatedUser)
    {
        $this->getNewInstance();
        $this->repository->updateUserById($updatedUser);
    }

    public function addUser($newUser)
    {
        $this->getNewInstance();
        $this->repository->addUser($newUser);
    }
}
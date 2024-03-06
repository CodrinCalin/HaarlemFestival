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

    public function getUserById($userId)
    {
        $this->getNewInstance();
        return $this->repository->getUserById($userId);
    }

    public function getUserByUsername($username)
    {
        $this->getNewInstance();
        return $this->repository->getUserByUsername($username);
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
        if(isset($newUser->first_name) || isset($newUser->last_name)) {
            $this->repository->addUserWithDetails(
                $newUser->username, $newUser->email,
                $newUser->password,
                $newUser->first_name, $newUser->last_name);
        }else{
            $this->repository->addUser(
                $newUser->username, $newUser->email,
                $newUser->password);
        }
    }

    public function checkUsernameExists($usernameInput)
    {
        $this->getNewInstance();
        return $this->repository->checkUsernameExists($usernameInput);
    }

    public function checkEmailExists($emailInput)
    {
        $this->getNewInstance();
        return $this->repository->checkEmailExists($emailInput);
    }
}
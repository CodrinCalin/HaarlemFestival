<?php

namespace App\Services;

use App\Repositories\ResetTokenRepository;
use App\Repositories\UserRepository;

class UserService
{

    private $repository;
    private $tokenRepository;

    private function getNewInstance()
    {
        $this->repository = new UserRepository();
        $this->tokenRepository = new ResetTokenRepository();
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

    public function updateUserPassword($resetToken, $newHashedPassword)
    {
        $this->getNewInstance();
        $this->repository->updateUserPassword($resetToken->email, $newHashedPassword);
        $this->tokenRepository->deleteResetTokenByToken($resetToken->token);
    }

    public function addUser($newUser)
    {
        $this->getNewInstance();
        if (isset($newUser->first_name) || isset($newUser->last_name)) {
            $this->repository->addUserWithDetails(
                $newUser->username, $newUser->email,
                $newUser->password,
                $newUser->first_name, $newUser->last_name);
        } else {
            $this->repository->addUser(
                $newUser->username, $newUser->email,
                $newUser->password);
        }
    }

    public function getUserByEmail($email)
    {
        $this->getNewInstance();
        return $this->repository->getUserByEmail($email);
    }
}
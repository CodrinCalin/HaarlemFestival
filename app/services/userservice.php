<?php
namespace App\Services;

class UserService {

    private $repository;

    private function getNewInstance(){
        $this->repository = new \App\Repositories\UserRepository();
    }
    public function getAll() {
        $this->getNewInstance();
        return $this->repository->getAll();
    }

    public function insert($user) {
        $this->getNewInstance();
        return $this->repository->insert($user);
    }
}
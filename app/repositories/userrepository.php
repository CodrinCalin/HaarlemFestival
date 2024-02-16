<?php
namespace App\Repositories;

use PDO;

class UserRepository extends Repository {

    function getAll() {
        $stmt = $this->connection->prepare("SELECT * FROM users");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\User');
        $users = $stmt->fetchAll();

        return $users;
    }


    public function insert($user) {
        $stmt = $this->connection->prepare("INSERT INTO users (username, email, password, first_name, last_name, date_created) 
        VALUES (:username, :email, :password, :first_name, :last_name, :date_created)");

        $date = date('Y/m/d h:i:s H', time());

        $results = $stmt->execute([':email' => $user->email,
                                ':password' => $user->password,
                                ':first_name' => $user->first_name,
                                ':last_name' => $user->last_name,
                                ':date_created' =>  $date]);
        return $results;
    }
}
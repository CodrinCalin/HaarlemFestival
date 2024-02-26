<?php
namespace App\Repositories;

use PDO;

class UserRepository extends Repository {

    function getAll()
    {
        $stmt = $this->connection->prepare("SELECT * FROM users");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\User');
        $users = $stmt->fetchAll();

        return $users;
    }

    public function getUserById($userId)
    {
        $stmt = $this->connection->prepare(
            "SELECT * 
                FROM users 
                WHERE id=:userId");
        $stmt->execute([':userId' => $userId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\User');
        $userRetrieved = $stmt->fetch();

        if ($userRetrieved) {
            return $userRetrieved;
        } else {
            return null;
        }
    }

    public function addUser($newUser)
    {
        $stmt = $this->connection->prepare(
            "INSERT INTO users (username, email, password, first_name, last_name, date_created) 
                VALUES (:username, :email, :password, :first_name, :last_name, CURRENT_TIMESTAMP)");

        $results = $stmt->execute([
            ':username' => $newUser->username,
            ':email' => $newUser->email,
            ':password' => $newUser->password,
            ':first_name' => $newUser->first_name,
            ':last_name' => $newUser->last_name]);
    }

    public function updateUserById($updatedUser)
    {
        $stmt = $this->connection->prepare(
          "UPDATE `users` SET username=:username, first_name=:firstName, last_name=:lastName 
                WHERE id=:id");
        $stmt->execute([
                ':username' => $updatedUser->username,
                ':firstName' => $updatedUser->first_name,
                ':lastName' => $updatedUser->last_name,
                ':id' => $updatedUser->id]);
    }

    public function deleteUserById($userId)
    {
        $stmt = $this->connection->prepare(
        "DELETE 
                FROM `users` 
                WHERE id=:userId");
        $stmt->execute([':userId' => $userId]);
    }
}
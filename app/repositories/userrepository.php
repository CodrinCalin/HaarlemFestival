<?php
namespace App\Repositories;

use App\Models\Permissions;
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
            "SELECT id, username, email, password, first_name, last_name, permissions, date_created
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

    public function getUserByUsername($usernameInput)
    {
        $stmt = $this->connection->prepare(
            "SELECT id, username, email, password, first_name, last_name, permissions, date_created
                    FROM users  
                    WHERE username LIKE :username");
        $stmt->execute([':username' => $usernameInput]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\User');
        $userRetrieved = $stmt->fetch();

        if ($userRetrieved) {
            return $userRetrieved;
        } else {
            return null;
        }
    }

    public function addUser($username, $email, $password)
    {
        $default_permissions = 2; // 0-System, 1-Admin, 2-User
        $stmt = $this->connection->prepare(
            "INSERT INTO users (username, email, password, permissions, date_created) 
                    VALUES (:username, :email, :password, :permissions, CURRENT_TIMESTAMP)");

        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':permissions' => $default_permissions]);
    }

    public function addUserWithDetails($username, $email, $password, $first_name, $last_name)
    {
        $default_permissions = 2; // 0-System, 1-Admin, 2-User
        $stmt = $this->connection->prepare(
            "INSERT INTO users (username, email, password, first_name, last_name, permissions, date_created) 
                VALUES (:username, :email, :password, :first_name, :last_name, :permissions, CURRENT_TIMESTAMP)");

        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':permissions' => $default_permissions]);
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

    public function checkUsernameExists($usernameInput)
    {
        $username = $this->getUserByUsername($usernameInput);

        if ($username == $usernameInput) {
            return true;
        } else {
            return false;
        }
    }

    public function checkEmailExists($emailInput)
    {
        $stmt = $this->connection->prepare(
            "SELECT `id`, `email`
                FROM users 
                WHERE email LIKE :email");
        $stmt->execute([':email' => $emailInput]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\User');
        $result = $stmt->fetch();

        if ($result->email == $emailInput) {
            return true;
        } else {
            return false;
        }
    }
}
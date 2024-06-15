<?php
namespace App\Repositories;

use App\Models\Permissions;
use PDO;

class ResetTokenRepository extends Repository
{
    public function fetchResetTokenByToken($token)
    {
        try{
            $stmt = $this->connection->prepare(
                "SELECT id, email, token, expiration, date_created
                        FROM resetTokens
                        WHERE token LIKE :token");
            $stmt->execute([':token' => $token]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\ResetToken');

            return $stmt->fetch();
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function fetchAllResetTokensByEmail($email){
        try{
            $stmt = $this->connection->prepare(
                "SELECT id, email, token, expiration, date_created
                        FROM resetTokens
                        WHERE email LIKE :email");
            $stmt->execute([':email' => $email]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\Models\ResetToken');

            return $stmt->fetchAll();
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function addResetToken($email, string $token)
    {
        $expiration = date('Y-m-d H:i:s', strtotime('+1 day')); // Token validity lasts for 1 d
        try {
            $stmt = $this->connection->prepare(
                "INSERT INTO resetTokens (email, token, expiration, date_created) 
                    VALUES (:email, :token, :expiration, CURRENT_TIMESTAMP)");

            $stmt->execute([
                ':email' => $email,
                ':token' => $token,
                ':expiration' => $expiration]);
        } catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteResetTokenByToken($token)
    {
        $stmt = $this->connection->prepare(
            "DELETE 
                FROM `resetTokens` 
                WHERE token LIKE :token");
        $stmt->execute([':token' => $token]);
    }

    public function checkIfTokenIsValid($token){
        $stmt = $this->connection->prepare(
            "SELECT `id`, `email`, `token`, `expiration`, `date_created`
                FROM resetTokens 
                WHERE token LIKE :token");
        $stmt->execute([':token' => $token]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'App\\Models\\User');
        $result = $stmt->fetch();

        if ($result == null) {
            return true;
        }
        return false;
    }
}
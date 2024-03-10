<?php
namespace App\Models;

class ResetToken{
    public int $id;
    public string $email;
    public string $token;
    public string $expiration;
    public string $date_created;
}

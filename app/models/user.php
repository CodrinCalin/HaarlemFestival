<?php
namespace App\Models;

class User {
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public ?string $first_name;
    public ?string $last_name;
    public int $permissions;
    public string $date_created;
}

<?php
namespace App\Models;

use Cassandra\Date;
use DateTime;

class User {
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $first_name;
    public string $last_name;
    public string $date_created;
}

<?php

namespace App\Exception;

class PasswordDoesNotMatchException extends \Exception
{
    public function __construct($message = "Password does not match", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
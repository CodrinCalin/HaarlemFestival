<?php

namespace App\exception;

class TokenNotFoundException extends \Exception
{
    public function __construct($message = "Token not found", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
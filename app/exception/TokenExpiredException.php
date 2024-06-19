<?php

namespace App\Exception;

class TokenExpiredException extends \Exception
{
    public function __construct($message = "Token Expired", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
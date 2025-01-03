<?php

namespace kosmo\app\exceptions;

class AuthenticationException extends AppException
{
    public function __construct(string $message = "", int $code = 403)
    {
        parent::__construct($message, $code);
    }
}

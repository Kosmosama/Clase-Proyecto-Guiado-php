<?php
namespace kosmo\app\exceptions;
use Exception;

class ValidationException extends Exception
{
    public function __construct($message = "Error de validación.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
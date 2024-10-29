<?php
namespace dwes\app\exceptions;
use Exception;

class AppException extends Exception
{
    public function __construct($message = "Error de app.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
<?php
namespace kosmo\app\exceptions;
use Exception;

Class QueryException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        $fullMessage = "Error en la consulta. Detalles: $message";
        parent::__construct($fullMessage, $code, $previous);
    }
}

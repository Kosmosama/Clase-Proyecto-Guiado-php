<?php
namespace kosmo\app\exceptions;
use Exception;

class NotFoundException extends Exception
{
    public function __construct($message = "No se ha encontrado el elemento solicitado.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

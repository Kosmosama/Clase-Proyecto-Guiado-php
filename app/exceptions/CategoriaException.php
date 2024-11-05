<?php
namespace kosmo\app\exceptions;
use Exception;

class CategoriaException extends Exception
{
    public function __construct($message = "No se ha seleccionado una categoría válida.", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

<?php
namespace kosmo\app\exceptions;
use Exception;

class FileException extends Exception
{
    /**
    * param string $fileName
    * param array $arrTypes
    * @throws FileException
    */
    public function __construct($fileName, $arrTypes = [])
    {
        $message = "Error con el archivo '$fileName'.";
        
        if (!empty($arrTypes)) {
            $message .= " Los tipos permitidos son: " . implode(', ', $arrTypes) . ".";
        }
        
        parent::__construct($message);
    }
}
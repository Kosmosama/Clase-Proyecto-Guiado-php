<?php
namespace kosmo\app\utils;
use Monolog;
use Monolog\Logger;

class MyLog
{
    /**
     * @var \Monolog\Logger
     */
    private $log;
    private $level;
    private function __construct(string $filename, int $level)
    {
        $this->level = $level;
        $this->log = new Monolog\Logger('name');
        $this->log->pushHandler(new Monolog\Handler\StreamHandler($filename, $this->level));
    }
    public static function load(string $filename, int $level = Logger::INFO): MyLog
    {
        return new MyLog($filename, $level);
    }
    public function add(string $message): void
    {
        $this->log->log($this->level, $message);
    }
}


// require __DIR__ . '....mylog'


// En el archivo nueva-imagen-galeria.php, ponemos:
// $imagenGaleriaRepository->guarda($imagenGaleria);
// App::get('logger')->add("Se ha guardado una imagen: ".$imagenGaleria->getNombre());
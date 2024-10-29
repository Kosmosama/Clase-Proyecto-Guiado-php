<?php
namespace dwes\app\utils;
use Monolog;

class MyLog
{
    /**
     * @var \Monolog\Logger
     */
    private $log;
    private function __construct(string $filename)
    {
        $this->log = new Monolog\Logger('name');
        $this->log->pushHandler(new Monolog\Handler\StreamHandler($filename, \Monolog\Level::Info));
    }
    public static function load(string $filename): MyLog
    {
        return new MyLog($filename);
    }
    public function add(string $message): void
    {
        $this->log->info($message);
    }
}


// require __DIR__ . '....mylog'


// En el archivo nueva-imagen-galeria.php, ponemos:
// $imagenGaleriaRepository->guarda($imagenGaleria);
// App::get('logger')->add("Se ha guardado una imagen: ".$imagenGaleria->getNombre());
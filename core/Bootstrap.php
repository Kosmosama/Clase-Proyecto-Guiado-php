<?php
use dwes\app\utils\MyLog;
require_once __DIR__ . '/App.php';
require __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../app/config.php';
App::bind('config',$config); // Guardamos la configuración en el contenedor de servicios

$router = Router::load('app/routes.php');
App::bind('router',$router);

$logger = MyLog::load('logs/curso.log');
App::bind('logger',$logger);

// #TODO  este contenido se debe eliminar de las páginas donde estaba a (galería.php y asociados.php)
// #TODO Por último, añadimos el require de Request.php y NotFoundException en el archivo Bootstrap.php

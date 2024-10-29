<?php
use dwes\app\exceptions\NotFoundException;
require_once __DIR__ . '/App.php';
require_once __DIR__ . '/Request.php';
$config = require_once __DIR__ . '/../app/config.php';
App::bind('config', $config); // Guardamos la configuración en el contenedor de servicios

require_once 'core/bootstrap.php';
$router = new Router();
require 'app/routes.php'; // Obtenemos la tabla de rutas
require $routes[Request::uri()];

try {
    require_once 'core/bootstrap.php';
    require Router::load('app/routes.php')->direct(Request::uri(), Request::method());
} catch (NotFoundException $notFoundException) {
    die($notFoundException->getMessage());
}

// #TODO Por último, debemos ir al menú de navegación (menú_navegacion.part.php) y cambiar por
// un lado los enlaces .php por los definidos en routes.php (‘/’, ‘/galeria’ , etc.) y por otro lado,
// también en las comprobaciones de la opción activa esOpcionMenuActiva('/galeria')
//  <a href="index.php"><i class="fa fa-home sr-icons"></i> Home</a>
// Por
// <a href="/"><i class="fa fa-home sr-icons"></i> Home</a>
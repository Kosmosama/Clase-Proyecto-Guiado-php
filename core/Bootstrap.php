<?php
use kosmo\core\App;
use kosmo\app\utils\MyLog;
use kosmo\core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$config = require_once __DIR__ . '/../app/config.php';
App::bind('config', $config);

$router = Router::load(__DIR__ . '/../app/' . $config['routes']['filename']);
App::bind('router',$router);

$logger = MyLog::load(__DIR__ . '/../logs/' . $config['logs']['filename'], $config['logs']['level']);
App::bind('logger',$logger);

<?php

use kosmo\app\exceptions\AppException;
use kosmo\app\exceptions\NotFoundException;
use kosmo\core\Request;
use kosmo\core\App;

try {
    require_once 'core/Bootstrap.php';
    App::get('router')->direct(Request::uri(), Request::method());
}catch ( AppException $appException ) {
    $appException->handleError();
}
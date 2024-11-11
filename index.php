<?php
use kosmo\app\exceptions\NotFoundException;
use kosmo\core\Request;
use kosmo\core\App;

try {
    require_once 'core/Bootstrap.php';
    App::get('router')->direct(Request::uri(), Request::method());
} catch (NotFoundException $notFoundException) {
    die($notFoundException->getMessage());
}
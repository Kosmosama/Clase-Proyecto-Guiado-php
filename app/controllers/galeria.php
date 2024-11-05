<?php
use kosmo\app\exceptions\AppException;
use kosmo\app\exceptions\QueryException;
use kosmo\app\repository\CategoriasRepository;
use kosmo\app\repository\ImagenesRepository;
use kosmo\core\App;

$errores = [];
$titulo = "";
$descripcion = "";
$mensaje = "";

try {
    $conexion = App::getConnection();
    $imagenesRepository = new ImagenesRepository();
    $categoriasRepository = new CategoriasRepository();
    $imagenes = $imagenesRepository->findAll();
    $categorias = $categoriasRepository->findAll();
} catch (QueryException $queryException) {
    $errores[] = $fileException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
}
require_once __DIR__ . '../views/galeria.view.php';

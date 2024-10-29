<?php
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\QueryException;
use dwes\app\repository\CategoriasRepository;
use dwes\app\repository\ImagenesRepository;

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
require_once __DIR__ . '/../views/galeria.view.php';

<?php
use dwes\app\exceptions\AppException;
use dwes\app\exceptions\CategoriaException;
use dwes\app\exceptions\QueryException;
use dwes\app\exceptions\FileException;
use dwes\app\entity\Imagen;
use dwes\app\repository\ImagenesRepository;
use dwes\app\utils\File;

try {
    $conexion = App::getConnection();
    $imagenesRepository = new ImagenesRepository();

    $titulo = trim(htmlspecialchars($_POST['titulo']));
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $categoria = trim(htmlspecialchars($_POST['categoria']));
    $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];

    if (empty($categoria)) {
        throw new CategoriaException();
    }

    $imagen = new File('imagen', $tiposAceptados);
    $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

    $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
    $imagenesRepository->guarda($imagenGaleria);

    $imagenGaleriaRepository->guarda($imagenGaleria);
    App::get('logger')->add("Se ha guardado una imagen: ".$imagenGaleria->getNombre());

    $mensaje = "Se ha guardado la imagen correctamente";
    
} catch (FileException $fileException) {
    $errores[] = $fileException->getMessage();
} catch (QueryException $queryException) {
    $errores[] = $queryException->getMessage();
} catch (AppException $appException) {
    $errores[] = $appException->getMessage();
} catch (CategoriaException $categoriaException) {
    $errores[] = "No se ha seleccionado una categoría válida";
}

App::get('router')->redirect('imagenes-galeria');

<?php

namespace kosmo\app\controllers;

use kosmo\app\exceptions\AppException;
use kosmo\app\exceptions\QueryException;
use kosmo\app\repository\CategoriasRepository;
use kosmo\app\repository\ImagenesRepository;
use kosmo\core\App;
use kosmo\app\exceptions\CategoriaException;
use kosmo\app\exceptions\FileException;
use kosmo\app\entity\Imagen;
use kosmo\app\utils\File;
use kosmo\core\Response;

class GaleriaController
{
    public function index(): void
    {
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
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        }
        require_once __DIR__ . '/../views/galeria.view.php';
    }

    public function nueva(): void
    {
        $errores = [];
        $titulo = "";
        $descripcion = "";
        $mensaje = "";

        try {
            $conexion = App::getConnection();

            $imagenesRepository = App::getRepository(ImagenesRepository::class);

            $titulo = trim(htmlspecialchars($_POST['titulo']));
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $categoria = trim(htmlspecialchars($_POST['categoria']));
            if (empty($categoria))
                throw new CategoriaException;

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados); // El nombre 'imagen' es el que se ha puesto en el formulario de galeria.view.php

            $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

            $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
            $imagenesRepository->save($imagenGaleria); // Esto era guarda, pero lo he cambiado por save pq daba error
            App::get('logger')->add("Se ha guardado una imagen: " . $imagenGaleria->getNombre());
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (AppException $appException) {
            $errores[] = $appException->getMessage();
        } catch (CategoriaException) {
            $errores[] = "No se ha seleccionado una categoría válida";
        }
        App::get('router')->redirect('galeria');
    }

    public function show($id)
    {
        $imagenesRepository = App::getRepository(ImagenesRepository::class);
        $imagen = $imagenesRepository->find($id);
        Response::renderView(
            'imagen-show',
            'layout',
            compact('imagen', 'imagenesRepository')
        );
    }
}

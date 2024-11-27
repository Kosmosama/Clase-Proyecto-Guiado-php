<?php

namespace kosmo\app\controllers;

use kosmo\core\helpers\FlashMessage;
use kosmo\app\exceptions\AppException;
use kosmo\app\exceptions\QueryException;
use kosmo\app\repository\CategoriasRepository;
use kosmo\app\repository\ImagenesRepository;
use kosmo\core\App;
use kosmo\app\exceptions\CategoriaException;
use kosmo\app\exceptions\FileException;
use kosmo\app\entity\Imagen;
use kosmo\app\exceptions\ValidationException;
use kosmo\app\utils\File;
use kosmo\core\Response;

class GaleriaController
{
    public function index()
    {

        $errores = FlashMessage::get('errores', []);
        $mensaje = FlashMessage::get('mensaje');
        $descripcion = FlashMessage::get('descripcion');
        $categoriaSeleccionada = FlashMessage::get('categoriaSeleccionada');
        $titulo = FlashMessage::get('titulo');

        try {
            $imagenes = App::getRepository(ImagenesRepository::class)->findAll();
            $categorias = App::getRepository(CategoriasRepository::class)->findAll();
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
        }

        Response::renderView(
            'galeria',
            'layout',
            compact('imagenes', 'categorias', 'errores', 'titulo', 'descripcion', 'mensaje', 'categoriaSeleccionada')
        );
    }

    public function nueva()
    {
        try {
            // session_start();

            // if (isset($_POST['captcha']) && ($_POST['captcha'] != "")) {
            //     if ($_SESSION['captchaGenerado'] != $_POST['captcha']) {
            //         throw new ValidationException("¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.");
            //     }
            // } else {
            //     throw new ValidationException("Introduzca el código de seguridad.");
            // }

            $imagenesRepository = App::getRepository(ImagenesRepository::class);

            $titulo = trim(htmlspecialchars($_POST['titulo']));
            FlashMessage::set('titulo', $titulo);

            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            FlashMessage::set('descripcion', $descripcion);

            $categoria = trim(htmlspecialchars($_POST['categoria']));
            if (empty($categoria)) {
                throw new CategoriaException;
            }
            FlashMessage::set('categoriaSeleccionada', $categoria);

            $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
            $imagen = new File('imagen', $tiposAceptados);

            $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS);

            $imagenGaleria = new Imagen($imagen->getFileName(), $descripcion, $categoria);
            $imagenesRepository->save($imagenGaleria);

            $mensaje = "Se ha guardado una imagen: " . $imagenGaleria->getNombre();

            App::get('logger')->add($mensaje);
            FlashMessage::set('mensaje', $mensaje);

            FlashMessage::unset('descripcion');
            FlashMessage::unset('categoriaSeleccionada');
            FlashMessage::unset('titulo');

        } catch (ValidationException $validationException) {
            FlashMessage::set('errores', [$validationException->getMessage()]);
        } catch (FileException $fileException) {
            FlashMessage::set('errores', [$fileException->getMessage()]);
        } catch (QueryException $queryException) {
            FlashMessage::set('errores', [$queryException->getMessage()]);
        } catch (AppException $appException) {
            FlashMessage::set('errores', [$appException->getMessage()]);
        } catch (CategoriaException) {
            FlashMessage::set('errores', ["No se ha seleccionado una categoría válida"]);
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

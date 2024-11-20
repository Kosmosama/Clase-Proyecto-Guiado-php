<?php
namespace kosmo\app\controllers;

use kosmo\app\entity\Imagen;
use kosmo\app\repository\AsociadosRepository;
use kosmo\app\repository\ImagenesRepository;
use kosmo\core\App;
use kosmo\core\Response;

class PagesController
{
    public function index()
    {
        $asociados = App::getRepository(AsociadosRepository::class)->findAll();
        $imagenesHome = App::getRepository(ImagenesRepository::class)->findAll();
        
        Response::renderView(
            'index',
            'layout',
            compact ( 'imagenesHome','asociados')
            );
    }
    public function about()
    {
        $imagenesClientes[] = new Imagen('client1.jpg', 'MISS BELLA');
        $imagenesClientes[] = new Imagen('client2.jpg', 'DON PENO');
        $imagenesClientes[] = new Imagen('client3.jpg', 'SWEETY');
        $imagenesClientes[] = new Imagen('client4.jpg', 'LADY');

        Response::renderView(
            'about',
            'layout',
            compact('imagenesClientes')
        );
    }
    public function blog()
    {
        Response::renderView(
            'blog',
            'layout'
            );
    }
    public function post()
    {
        Response::renderView(
            'single_post',
            'layout'
            );
    }
}

<?php
namespace kosmo\app\controllers;
use kosmo\app\entity\Imagen;
use kosmo\app\entity\Asociado;
use kosmo\core\App;
use kosmo\core\Response;

class PagesController
{
    public function index()
    {
        $asociadosLista = App::getRepository(Asociado::class)->findAll();
        $imagenGaleria = App::getRepository(Imagen::class)->findAll();
        
        Response::renderView(
            'index',
            'layout',
            compact ( 'imagenesGaleria','asociadosLogos')
            );
    }
    public function about()
    {
        Response::renderView(
            'about',
            'layout'
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

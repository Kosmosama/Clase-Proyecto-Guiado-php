<?php
namespace kosmo\app\controllers;
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

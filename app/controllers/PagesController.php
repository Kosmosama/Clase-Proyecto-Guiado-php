<?
namespace kosmo\app\controllers;
use kosmo\app\entity\Imagen;
use kosmo\app\entity\Asociado;
use kosmo\core\App;
use kosmo\core\Response;

class PagesController
{
    public function index()
    {
        $imagenGaleria = App::getRepository(Imagen::class)->findAll();
        $asociadosLista = App::getRepository(Asociado::class)->findAll();
        
        Response::renderView(
            'index',
            'layout',
            compact ( 'imagenesGaleria','asociadosLogos')
            );
    }
    public function about()
    {
        require __DIR__ . '/../views/about.view.php';
    }
    public function blog()
    {
        require __DIR__ . '/../views/blog.view.php';
    }
    public function post()
    {
        require __DIR__ . '/../views/single_post.view.php';
    }
}

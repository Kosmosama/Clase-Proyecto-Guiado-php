<?php
$router->get ('', 'PagesController@index');
$router->get ('about', 'PagesController@about');
$router->get ('asociados', '../app/controllers/asociados.php');
$router->get ('blog', 'PagesController@blog');
$router->get ('contact', '../app/controllers/contact.php');
$router->get ('imagenes-galeria', '../app/controllers/galeria.php');
$router->get ('post', 'PagesController@post');
$router->post('imagenes-galeria/nueva', '../app/controllers/nueva-imagen-galeria.php');
$router->get ('galeria', 'GaleriaController@index');
$router->post('galeria/nueva', 'GaleriaController@nueva');
$router->get ('galeria/:id', 'GaleriaController@show');
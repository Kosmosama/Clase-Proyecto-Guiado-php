<?php
$router->get ('', 'PagesController@index');
$router->get ('about', 'PagesController@about');
$router->get('asociados', 'app/controllers/asociados.php');
$router->get ('blog', 'PagesController@blog');
$router->get('contact', 'app/controllers/contact.php');
$router->get ('post', 'PagesController@post');
$router->get('galeria', 'GaleriaController@index');
$router->post('galeria/nueva', 'GaleriaController@nueva');
$router->post('asociados/nuevo', 'app/controllers/asociados_nuevo.php');
$router->get ('galeria/:id', 'GaleriaController@show');
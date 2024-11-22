<?php
$router->get ('', 'PagesController@index');
$router->get('asociados', 'app/controllers/asociados.php');
$router->get ('blog', 'PagesController@blog');
$router->get('contact', 'app/controllers/contact.php');
$router->get ('post', 'PagesController@post');
$router->get ('galeria', 'GaleriaController@index', 'ROLE_USER');
$router->post('galeria/nueva', 'GaleriaController@nueva', 'ROLE_ADMIN');
$router->post('asociados/nuevo', 'app/controllers/asociados_nuevo.php');
$router->get ('galeria/:id', 'GaleriaController@show', 'ROLE_USER');
$router->get ('login', 'AuthController@login');
$router->post('check-login', 'AuthController@checkLogin');
$router->get ('logout', 'AuthController@logout');
$router->get ('', 'PagesController@index');
$router->get ('about', 'PagesController@about');
$router->get ('registro', 'AuthController@registro');
$router->post('check-registro', 'AuthController@checkRegistro');
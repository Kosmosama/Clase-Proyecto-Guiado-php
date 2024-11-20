<?php

namespace kosmo\app\controllers;

use kosmo\app\entity\Imagen;
use kosmo\app\exceptions\ValidationException;
use kosmo\app\repository\AsociadosRepository;
use kosmo\app\repository\ImagenesRepository;
use kosmo\app\repository\UsuariosRepository;
use kosmo\core\App;
use kosmo\core\helpers\FlashMessage;
use kosmo\core\Response;

class AuthController
{
    public function login()
    {
        $errores = FlashMessage::get('login-error', []);
        $username = FlashMessage::get('username');
        Response::renderView('login', 'layout', compact('errores', 'username'));
    }

    public function logout()
    {
        if (isset($_SESSION['loguedUser'])) {
            $_SESSION['loguedUser'] = null;
            unset($_SESSION['loguedUser']);
        }
        App::get('router')->redirect('login');
    }

    public function checkLogin()
    {
        try {
            if (!isset($_POST['username']) || empty($_POST['username']))
                throw new ValidationException('Debes introducir el usuario y el password');
            FlashMessage::set('username', $_POST['username']);

            if (!isset($_POST['password']) || empty($_POST['password']))
                throw new ValidationException('Debes introducir el usuario y el password');

            $usuario = App::getRepository(UsuariosRepository::class)->findOneBy([
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ]);

            if (!is_null($usuario)) {
                // Guardamos el usuario en la sesión y redireccionamos a la página principal
                $_SESSION['loguedUser'] = $usuario->getId();
                FlashMessage::unset("username");
                App::get('router')->redirect('');
            }
            throw new ValidationException('El usuario y el password introducidos no existen');
        } catch (ValidationException $validationException) {
            FlashMessage::set('login-error', [$validationException->getMessage()]);
            App::get('router')->redirect('login'); // Redireccionamos al login
        }
    }
}

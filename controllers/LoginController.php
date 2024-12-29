<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController
{
    //INICIO CONTROLADOR PARA INGRESAR AL SISTEMA "LOGIN"
    public static function login(Router $router)
    {
        $alertas = [];
        $auth = new Usuario;


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) { //SI ALERTAS ESTA VACIO

                //comprobar que exista usuario
                $usuario = Usuario::where('nombre', $auth->nombre);

                if ($usuario) {
                    //Si es false devuelve la alerta USUARIO NO EXISTE
                    //verificar el password
                    if ($usuario->comprobarContraseña($auth->contraseña)) {

                        //autenticar usuario
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        //redireccionamiento admin
                        if (in_array($usuario->id, ["1", "2", "3", "4"])) {
                            header('Location: /Revistas');
                            exit();
                        }
                    }
                } else {
                    Usuario::setAlerta('error', 'El usuario no existe. Por favor, verifique e intente nuevamente.');
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/Login', [
            'alertas' => $alertas,
            'auth' => $auth
        ]);
    }
    //FIN CONTROLADOR PARA INGRESAR AL SISTEMA "LOGIN"

    // FUNCIÓN PARA ACTUALIZAR USUARIO
    public static function actualizarLogin(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $antiguoNombre = $_POST['antiguoNombre'];
            $antiguaContraseña = $_POST['antiguaContraseña'];
            $nuevoNombre = $_POST['nuevoNombre'];
            $nuevaContraseña = $_POST['nuevaContraseña'];
            Usuario::actualizarUsuario($antiguoNombre, $antiguaContraseña, $nuevoNombre, $nuevaContraseña);


            $alertas = Usuario::getAlertas();
            $router->render('auth/Login', [
                'alertas' => $alertas
            ]);
        } else {
            $alertas = Usuario::getAlertas();
            $router->render('auth/Login', [
                'alertas' => $alertas
            ]);
        }
    }
    // FUNCIÓN PARA ACTUALIZAR USUARIO


    //----------------CERRAR SESIÓN------------------------
    public static function logout()
    {
        // Verificar si la sesión ya está iniciada
        if (session_status() == PHP_SESSION_NONE) {
            session_start();

            // Destruir la sesión 
            session_destroy();
            // Redirigir al usuario a la página de inicio de sesión 
            header('Location: /');
            exit();
        }
    }
    //----------------CERRAR SESIÓN------------------------
}

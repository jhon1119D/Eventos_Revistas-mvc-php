<?php

namespace Model;


class Usuario extends ActiveRecord
{

    //aqui usamos activerecords 
    // base de datos

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'contraseña'];

    public $id;
    public $nombre;
    public $email;
    public $contraseña;


    public  function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->contraseña = $args['contraseña'] ?? '';
    }


    //MENSAJES DE VALIDACION PARA VALIDAR EL LOGIN
    public function validarLogin()
    {
        if (!$this->nombre) {
            self::$alertas['error'][] = 'Ingrese un usuario';
        }

        if (!$this->contraseña) {
            self::$alertas['error'][] = 'Ingrese una contraseña';
        }
        return self::$alertas;
    }
    //MENSAJES DE VALIDACION PARA VALIDAR EL LOGIN


    //FUNCIÓN PARA HASHEAR UNA CONTRASEÑA
    public function hashPassword()
    {
        $this->contraseña = password_hash($this->contraseña, PASSWORD_BCRYPT);
    }
    //FUNCIÓN PARA HASHEAR UNA CONTRASEÑA

    //FUNCIÓN PARA COMPROBAR CONTRASEÑA
    public function comprobarContraseña($contraseña)
    {

        $resultado = password_verify($contraseña, $this->contraseña);
        if (!$resultado) {
            self::$alertas['error'][] = 'Contraseña incorrecta';
        } else {
            return true;
        }
    }
    //FUNCIÓN PARA COMPROBAR CONTRASEÑA

    //FUNCIÓN PARA ACTUALIZAR USUARIO
    public static function actualizarUsuario($antiguoNombre, $antiguaContraseña, $nuevoNombre, $nuevaContraseña)
    {

        $usuario = self::buscarPorNombre($antiguoNombre);
        if ($usuario && $usuario->comprobarContraseña($antiguaContraseña)) {
            // Validación de la longitud de la nueva contraseña 
            if (strlen($nuevaContraseña) <= 4) {
                self::$alertas['error'][] = 'La nueva contraseña debe tener al menos 4 caracteres.';
                return;
            }
            $usuario->nombre = $nuevoNombre;
            $usuario->contraseña = $nuevaContraseña;
            $usuario->hashPassword();
            $usuario->actualizar();
            self::$alertas['exito'][] = '¡Actualización exitosa! Las nuevas credenciales han sido guardadas.';
        } else {
            self::$alertas['error'][] = 'No se pudo actualizar las credenciales. Por favor, inténtelo de nuevo.';
        }
    }
    //FUNCIÓN PARA ACTUALIZAR USUARIO

    //FUNCIÓN PARA BUSCAR SI EXISTE USUARIO Y PRODECER A ACTUALIZAR
    public static function buscarPorNombre($nombre)
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE nombre = '" . self::$db->escape_string($nombre) . "' LIMIT 1";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }
    //FUNCIÓN PARA BUSCAR SI EXISTE USUARIO Y PRODECER A ACTUALIZAR
}

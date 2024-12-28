<?php require_once __DIR__ . '/../includes/app.php';
// Ajusta la ruta según tu estructura de proyecto
use Model\Usuario;

function crearOActualizarUsuario($id, $nombre, $email, $contraseña)
{



    $usuario = Usuario::find($id);

    if ($usuario) {
        // Actualizar usuario existente 
        $usuario->nombre = $nombre;
        $usuario->email = $email;
        $usuario->contraseña = $contraseña;
        $usuario->hashPassword();
        $usuario->actualizar();
        echo "Usuario actualizado: $nombre\n";
    } else {
        // Crear nuevo usuario
        $usuario = new Usuario();
        $usuario->id_usuario = $id;
        $usuario->nombre = $nombre;
        $usuario->email = $email;
        $usuario->contraseña = $contraseña;
        $usuario->hashPassword();
        $usuario->crear();
        $usuario->guardar();
        echo "Usuario creado: $nombre\n";
    }
}
// Crear o actualizar el primer usuario 
crearOActualizarUsuario(1, '1', 'admin1@example.com', '1');
// Crear o actualizar el cuarto usuario
crearOActualizarUsuario(2, '2', 'admin2@example.com', '2');
// Crear o actualizar el cuarto usuario
crearOActualizarUsuario(3, '3', 'admin3@example.com', '3');
// Crear o actualizar el cuarto usuario
crearOActualizarUsuario(4, '4', 'admin4@example.com', '4');
echo 'Operación completada exitosamente';

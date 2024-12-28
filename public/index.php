<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\RevistasController;
use Controllers\LoginController;
use Controllers\EventosController;
use Model\Evento;
use MVC\Router;

$router = new Router();

// ------------------------------ LOGIN
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);

$router->get('/actualizar', [LoginController::class, 'actualizarLogin']);
$router->post('/actualizar', [LoginController::class, 'actualizarLogin']);
//CERRAR SESIÓN
$router->get('/logout', [loginController::class, 'logout']);
//CERRAR SESIÓN
// ------------------------------ LOGIN

// ------------------------------ EVENTOS
$router->get('/Eventos', [EventosController::class, 'Eventos']);
$router->post('/Eventos', [EventosController::class, 'Eventos']);
// ------------------------------ EVENTOS


// ------------------------------ REVISTAS
$router->get('/Revistas', [RevistasController::class, 'Revistas']);
$router->post('/Revistas', [RevistasController::class, 'Revistas']);
// ------------------------------ REVISTAS


// ------------------------------ELIMINAR EVENTOS Y REVISTAS
$router->get('/eliminar', [RevistasController::class, 'eliminar']);
$router->get('/eliminar_evento', [EventosController::class, 'eliminar']);
// ------------------------------ELIMINAR EVENTOS Y REVISTAS

// --------------------------------EDITAR REVISTAS
$router->get('/editar', [RevistasController::class, 'editar']);
$router->post('/editar', [RevistasController::class, 'editar']);
// ----------------------------EDITAR REVISTAS


// --------------------------EDITAR EVENTOS
$router->get('/editar_evento', [EventosController::class, 'editar']);
$router->post('/editar_evento', [EventosController::class, 'editar']);
// ----------------------------EDITAR EVENTOS


// BUSCAR REVISTAS EN EL ADMINISTRADOR Y PUBLICO
$router->get('/buscar_revistas_admin', [RevistasController::class, 'buscarAdmin']);
$router->post('/buscar_revistas_admin', [RevistasController::class, 'buscarAdmin']);
//----------------------------------------------------------------------------------
$router->get('/buscar_revistas_publico', [RevistasController::class, 'buscarPublico']);
$router->post('/buscar_revistas_publico', [RevistasController::class, 'buscarPublico']);
// BUSCAR REVISTAS EN EL ADMINISTRADOR Y PUBLICO

// BUSCAR EVENTOS EN EL ADMINISTRADOR Y PUBLICO
$router->get('/buscar_eventos_admin', [EventosController::class, 'buscarAdmin']);
$router->post('/buscar_eventos_admin', [EventosController::class, 'buscarAdmin']);
//---------------------------------------------------------------------------------
$router->get('/buscar_eventos_publico', [EventosController::class, 'buscarPublico']);
$router->post('/buscar_eventos_publico', [eventosController::class, 'buscarPublico']);
// BUSCAR EVENTOS EN EL ADMINISTRADOR Y PUBLICO





// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

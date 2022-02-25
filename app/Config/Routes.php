<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//$routes->resource('Atracciones_Control');

$routes->get('/busqueda','Iniciar_Sesion_Administrador_Control::getBusqueda');
$routes->post('/busqueda','Iniciar_Sesion_Administrador_Control::getBusqueda');
$routes->get('/Atracciones','Atracciones_Control::new');
$routes->get('/Atracciones/Datos','Atracciones_Control::cargarDatos');
$routes->get('/Iniciar_Sesion_Administrador','Iniciar_Sesion_Administrador_Control::new');
$routes->get('/Menu_Principal_Administrador','Menu_Principal_Control::new');
$routes->get('/Asociados','Asociados_Control::new');

$routes->get('/Eventos','Eventos_Control::new');
$routes->get('/Eventos/Mostrar_Atracciones','Eventos_Control::mostrarAtracciones');
$routes->post('/Eventos/Mostrar_Atracciones','Eventos_Control::mostrarAtracciones');
$routes->get('/Eventos/Agregar_Evento','Eventos_Control::agregarEvento');
$routes->post('/Eventos/Agregar_Evento','Eventos_Control::agregarEvento');
$routes->get('/Eventos/Mostrar_Tarjetas','Eventos_Control::mostrarTarjetas');
$routes->post('/Eventos/Mostrar_Tarjetas','Eventos_Control::mostrarTarjetas');

$routes->get('/Eventos/Mostrar_Tarjetas_Nuevas','Eventos_Control::mostrar_Tarjetas_Nuevas');
$routes->post('/Eventos/Mostrar_Tarjetas_Nuevas','Eventos_Control::mostrar_Tarjetas_Nuevas');

$routes->get('/Eventos/Agregar_Tarjetas_Evento','Eventos_Control::agregar_Tarjetas_Evento');
$routes->post('/Eventos/Agregar_Tarjetas_Evento','Eventos_Control::agregar_Tarjetas_Evento');

$routes->get('/Eventos/Mostrar_Asociacion','Eventos_Control::mostrarAsociacion');
$routes->post('/Eventos/Mostrar_Asociacion','Eventos_Control::mostrarAsociacion');

$routes->get('/Usuarios','Usuarios_Control::new');
$routes->get('/Promociones','Promociones_Control::new');
$routes->get('/Tarjetas','Tarjetas_Control::new');
$routes->post('/Tarjetas/EditarLote','Tarjetas_Control::actualizarLote');
$routes->get('/Tarjetas/EditarLote','Tarjetas_Control::actualizarLote');
$routes->post('/Tarjetas/Tarjetas','Tarjetas_Control::listadoTarjetas');
$routes->get('/Clientes','Clientes_Control::new');
$routes->post('/Agregar_Atraccion','Atracciones_Control::insertarAtraccion');
$routes->get('/Agregar_Atraccion','Atracciones_Control::insertarAtraccion');
$routes->post('/Agregar_Propietario','Atracciones_Control::insertarPropietario');
$routes->get('/Agregar_Propietario','Atracciones_Control::insertarPropietario');
$routes->post('/Atracciones/Editar_Atraccion','Atracciones_Control::actualizarAtraccion');
$routes->get('/Atracciones/Editar_Atraccion','Atracciones_Control::actualizarAtraccion');
$routes->post('/Atracciones/Editar_Propietario','Atracciones_Control::actualizarPropietario');
$routes->get('/Atracciones/Editar_Propietario','Atracciones_Control::actualizarPropietario');
$routes->post('/Usuarios/Agregar_Usuario','Usuarios_Control::agregarUsuarios');
$routes->get('/Usuarios/Agregar_Usuario','Usuarios_Control::agregarUsuarios');
$routes->post('/Usuarios/Editar_Usuario','Usuarios_Control::actualizarUsuario');
$routes->get('/Usuarios/Editar_Usuario','Usuarios_Control::actualizarUsuario');
$routes->post('/Agregar_Lote','Tarjetas_Control::insertarLote');
$routes->get('/Agregar_Lote','Tarjetas_Control::insertarLote');//
$routes->get('/Clientes/Tarjetas_Asociadas','Clientes_Control::tarjetasAsociadas');
$routes->post('/Clientes/Tarjetas_Asociadas','Clientes_Control::tarjetasAsociadas');
$routes->get('/Contratos','Contratos_Control::new');

$routes->get('/Taquillas','Taquillas_Control::new');

$routes->get('/Iniciar_Sesion_User','Iniciar_Sesion_User_Control::new');
$routes->post('/Busuarios','Iniciar_Sesion_User_Control::getBusqueda');
$routes->get('/Busuarios','Iniciar_Sesion_User_Control::getBusqueda');
$routes->get('/Menu_Principal_User','Menu_Principal_User_Control::new');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
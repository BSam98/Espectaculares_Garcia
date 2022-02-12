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
$routes->get('/Usuarios','Usuarios_Control::new');
$routes->get('/Promociones','Promociones_Control::new');
$routes->get('/Tarjetas','Tarjetas_Control::new');
$routes->get('/Clientes','Clientes_Control::new');
$routes->post('/Agregar_Atraccion','Atracciones_Control::insertarAtraccion');
$routes->get('/Agregar_Atraccion','Atracciones_Control::insertarAtraccion');
$routes->post('/Agregar_Propietario','Atracciones_Control::insertarPropietario');
$routes->get('/Agregar_Propietario','Atracciones_Control::insertarPropietario');
$routes->post('/Atracciones/Editar_Atraccion','Atracciones_Control::actualizarAtraccion');
$routes->get('/Atracciones/Editar_Atraccion','Atracciones_Control::actualizarAtraccion');
$routes->post('/Atracciones/Editar_Propietario','Atracciones_Control::actualizarPropietario');
$routes->get('/Atracciones/Editar_Propietario','Atracciones_Control::actualizarPropietario');


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

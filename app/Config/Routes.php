<?php namespace Config;

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

$routes->get('/Iniciar_Sesion_User','Iniciar_Sesion_User_Control::new');


$routes->post('/Busuarios','Iniciar_Sesion_User_Control::getBusqueda');

$routes->get('/TipoT','Iniciar_Sesion_User_Control::inicioP');
//$routes->post('/turno','Iniciar_Sesion_User_Control::inicio');
$routes->get('/turno','Iniciar_Sesion_User_Control::Turno');
$routes->get('/sAtracciones','Supervisor_Atracciones_Control::new');


$routes->get('/Menu_Principal_User','Menu_Principal_User_Control::new');
$routes->post('/Menu_Principal_User','Menu_Principal_User_Control::new');




$routes->get('/busqueda','Iniciar_Sesion_Administrador_Control::getBusqueda');
$routes->post('/busqueda','Iniciar_Sesion_Administrador_Control::getBusqueda');
$routes->get('/TipoUsuario','Iniciar_Sesion_Administrador_Control::menuBuscar');
$routes->post('/subMenus','Iniciar_Sesion_Administrador_Control::bsubMenu');
//$routes->get('/new','Iniciar_Sesion_Administrador_Control::new');
//$routes->get('/user','Iniciar_Sesion_Administrador_Control::user');
//$routes->post('/agregarPrivilegios','Rol_Control::agregarP');
//$routes->post('/listarModulos','Rol_Control::MRol');
//$routes->post('/listaSubmodulos','Rol_Control::submodulos');
$routes->post('/privUser','Rol_Control::ModulRol');
$routes->post('/editarPrivilegiosUser','Rol_Control::editarPrivilegios');
$routes->post('/agregarRol','Rol_Control::nuevoRol');
//$routes->post('/agregarAttSupervisar','Supervisor_Atracciones_Control::agregarAtracciones');
$routes->post('/consultarAtracc','Supervisor_Atracciones_Control::consultarAt');
$routes->post('/guardarDat','Supervisor_Atracciones_Control::guardarDatos');




$routes->get('/turnoValidador','Iniciar_Sesion_User_Control::turnoValidador');

//$routes->post('/insertarP','Usuarios_Control::insertarPriv');
//ORIGINAL->  $routes->get('/PuntoVenta','Menu_Principal_User_Control::cobrar');
$routes->post('/PuntoVenta','Menu_Principal_User_Control::ConsultaTurno');
$routes->get('/ModuloCobro','Menu_Principal_User_Control::Cobro');
$routes->post('/valida','Iniciar_Sesion_User_Control::valida');
$routes->get('/valida','Iniciar_Sesion_User_Control::valida');


$routes->post('/Supervisar_Taquillas','Iniciar_Sesion_User_Control::superTaquillas');
$routes->get('/Supervisar_Taquillas','Iniciar_Sesion_User_Control::superTaquillas');

$routes->get('/Supervisar_Taquillas/Ventanillas','Supervisar_Taquillas_Control::ventanillas');
$routes->post('/Supervisar_Taquillas/Ventanillas','Supervisar_Taquillas_Control::ventanillas');

$routes->get('/Supervisar_Taquillas/Ventanillas_Inactivas','Supervisar_Taquillas_Control::ventanillas_Inactivas');
$routes->post('/Supervisar_Taquillas/Ventanillas_Inactivas','Supervisar_Taquillas_Control::ventanillas_Inactivas');

$routes->get('/Supervisar_Taquillas/Transacciones','Supervisar_Taquillas_Control::transacciones_Taquillero');
$routes->post('/Supervisar_Taquillas/Transacciones','Supervisar_Taquillas_Control::transacciones_Taquillero');

$routes->get('/Supervisar_Taquillas/Descripcion_Transaccion','Supervisar_Taquillas_Control::descripcion_Transaccion');
$routes->post('/Supervisar_Taquillas/Descripcion_Transaccion','Supervisar_Taquillas_Control::descripcion_Transaccion');

$routes->get('/Supervisar_Taquillas/Vouchers','Supervisar_Taquillas_Control::vouchers_Turno');
$routes->post('/Supervisar_Taquillas/Vouchers','Supervisar_Taquillas_Control::vouchers_Turno');

$routes->get('/Supervisar_Taquillas/Desglose_Fajilla','Supervisar_Taquillas_Control::desglose_Fajilla');
$routes->post('/Supervisar_Taquillas/Desglose_Fajilla','Supervisar_Taquillas_Control::desglose_Fajilla');

$routes->get('/Supervisar_Taquillas/Validacion_Taquilla','Supervisar_Taquillas_Control::validacion_Taquilla');
$routes->post('/Supervisar_Taquillas/Validacion_Taquilla','Supervisar_Taquillas_Control::validacion_Taquilla');

$routes->get('/Supervisar_Taquillas/Actualizar_Taquilla','Supervisar_Taquillas_Control::actualizar_Taquilla');
$routes->post('/Supervisar_Taquillas/Actualizar_Taquilla','Supervisar_Taquillas_Control::actualizar_Taquilla');

$routes->get('/Supervisar_Taquillas/Informacion_Turno','Supervisar_Taquillas_Control::informacion_Turno');
$routes->post('/Supervisar_Taquillas/Informacion_Turno','Supervisar_Taquillas_Control::informacion_Turno');

$routes->get('/Supervisar_Taquillas/Cerrar_Turno_Taquilla','Supervisar_Taquillas_Control::cerrar_Turno_Taquilla');
$routes->post('/Supervisar_Taquillas/Cerrar_Turno_Taquilla','Supervisar_Taquillas_Control::cerrar_Turno_Taquilla');

$routes->get('/Supervisar_Taquillas/Validar_Faltante','Supervisar_Taquillas_Control::validar_Faltante');
$routes->post('/Supervisar_Taquillas/Validar_Faltante','Supervisar_Taquillas_Control::validar_Faltante');

$routes->get('/Supervisar_Taquillas/Validar_Faltante_Turno_Inactivo','Supervisar_Taquillas_Control::validar_Faltante_Turno');
$routes->post('/Supervisar_Taquillas/Validar_Faltante_Turno_Inactivo','Supervisar_Taquillas_Control::validar_Faltante_Turno');

$routes->get('/Supervisar_Taquillas/Transacciones_Finalizadas','Supervisar_Taquillas_Control::transacciones_Finalizadas');
$routes->post('/Supervisar_Taquillas/Transacciones_Finalizadas','Supervisar_Taquillas_Control::transacciones_Finalizadas');

$routes->get('/Supervisar_Taquillas/Vouchers_Faltantes','Supervisar_Taquillas_Control::vouchers_Faltantes');
$routes->post('/Supervisar_Taquillas/Vouchers_Faltantes','Supervisar_Taquillas_Control::vouchers_Faltantes');

$routes->get('/Ingresos x Evento','Menu_Principal_Control::rEvento');

$routes->get('/Utilizacion por Evento','Reporte_Personas_Evento_Control::uEvento');

$routes->get('/Utilizacion por Evento/Reporte','Reporte_Personas_Evento_Control::listado_Eventos');
$routes->post('/Utilizacion por Evento/Reporte','Reporte_Personas_Evento_Control::listado_Eventos');


$routes->get('/Utilizacion por Atracción','Reporte_Atraccion_Evento_Control::uAtraccion');

//$routes->get('/Ticket','reporte_Venta_Control::ticket');
$routes->get('/Ticket','ticket_Control::ticket');




$routes->get('/Rol','Rol_Control::rol');
//$routes->get('/Roles','Rol_Control::rol');
$routes->get('/Utilización por Evento','Menu_Principal_Control::uEvento');
$routes->get('/Utilización por Atracción','Menu_Principal_Control::uAtraccion');

$routes->get('/Ver Atracciones','Super_Atracciones_Control::new');
$routes->get('/Ver Atracciones/Mostrar_Atracciones','Super_Atracciones_Control::ciclos');
$routes->post('/Ver Atracciones/Mostrar_Atracciones','Super_Atracciones_Control::ciclos');
$routes->get('/Ver Atracciones/Mostrar_Detalles','Super_Atracciones_Control::detalles');
$routes->post('/Ver Atracciones/Mostrar_Detalles','Super_Atracciones_Control::detalles');

$routes->get('/Ver Taquillas','Taquillas_Control::new');

$routes->get('/Ver Taquillas/Taquillas_Activas','Taquillas_Control::taquillas_Activas');
$routes->post('/Ver Taquillas/Taquillas_Activas','Taquillas_Control::taquillas_Activas');

$routes->get('/Ver Taquillas/Ventanillas_Activas','Taquillas_Control::ventanillas_Activas');
$routes->post('/Ver Taquillas/Ventanillas_Activas','Taquillas_Control::ventanillas_Activas');

$routes->get('Ver Taquillas/Taquillas_Inactivas','Taquillas_Control::taquillas_Inactivas');
$routes->post('Ver Taquillas/Taquillas_Inactivas','Taquillas_Control::taquillas_Inactivas');

$routes->get('Ver Taquillas/Ventanillas_Inactivas','Taquillas_Control::ventanillas_Inactivas');
$routes->post('Ver Taquillas/Ventanillas_Inactivas','Taquillas_Control::ventanillas_Inactivas');

$routes->get('/Ver Supervisores','supervisores_control::new');
//$routes->post('/modulosRol','Rol_Control::MRol');
$routes->post('/listarModulos','Rol_Control::MRol');


$routes->post('/Productos','Menu_Principal_User_Control::resultados');
$routes->post('/validarTarjeta','Menu_Principal_User_Control::validar_Tarjeta');
$routes->post('/creditosCortesia','Menu_Principal_User_Control::creditos_Cortesia');
$routes->post('/Tipo_Pago','Menu_Principal_User_Control::tipo_Pago');

//$routes->get('/', 'UsersController::index');
//$routes->post('users/fileUpload', 'archivos_Controler::fileUpload');
$routes->post('users/fileUpload', 'Contratos_Control::fileUpload');
$routes->post('addContrato', 'Contratos_Control::fileUploadContrato');
$routes->get('/Archivo','archivos_Controler::index');
//$routes->post('/verPoliza','archivos_Controler::verPolizas');
$routes->post('/verPoliza','Contratos_Control::verPolizas');
$routes->post('/verCotizacion','Contratos_Control::verContra');
$routes->post('/contratosPolizas','Contratos_Control::contrato_Poliza');
$routes->post('/eligeZona','Iniciar_Sesion_User_Control::Zonas');
$routes->post('/eligeTaquilla','Iniciar_Sesion_User_Control::Taquillas');
$routes->post('/eligeVentanilla','Iniciar_Sesion_User_Control::Ventanillas');
$routes->post('/datosTurno','Iniciar_Sesion_User_Control::guardarDatos');
$routes->post('/consultaDatos','Iniciar_Sesion_User_Control::consultaDatosT');
$routes->post('/guardarVentas','Menu_Principal_User_Control::guardar_Ventas');
$routes->post('/agregarFaj','Menu_Principal_User_Control::agregarFajillas');
$routes->post('/devolverTarjeta','Menu_Principal_User_Control::devolucion');
$routes->post('/cerrarC','reporte_Venta_Control::CerrarCaja');
$routes->post('/cerrarTurno','reporte_Venta_Control::cerrarTurn');
$routes->post('/contadorIntentos','reporte_Venta_Control::contarIntentos');
$routes->post('/actualizarStatus','reporte_Venta_Control::actualizarEstado');
$routes->post('/ForzarCierreC', 'reporte_Venta_Control::forzarCierrec');
//$routes->post('/ingresoxEvento','Menu_Principal_Control::rEvento');
//$routes->post('/Ver Atracciones','super_Atracciones_Control::new');
//$routes->post('/supervisores','supervisores_control::new');
//$routes->post('/Roles','Iniciar_Sesion_Administrador_Control::rol');

//$routes->get('/PuntoVenta','Menu_Principal_User_Control::venta');
/*$routes->get('/login', 'Home::login');
$routes->post('/login', 'Home::login');
$routes->get('/inicio', 'Home::inicio');
$routes->post('/inicio', 'Home::inicio');*/


$routes->get('/Atracciones','Atracciones_Control::new');
$routes->get('/Atracciones/Datos','Atracciones_Control::cargarDatos');

$routes->get('/Listado_Propietarios','Atracciones_Control::mostrar_Propietarios');
$routes->post('/Listado_Propietarios','Atracciones_Control::mostrar_Propietarios');
//$routes->get('/Iniciar_Sesion_Administrador','Iniciar_Sesion_Administrador_Control::new');
//$routes->get('/Menu_Principal_Administrador','Menu_Principal_Control::new');
$routes->get('/Asociados','Asociados_Control::new');

$routes->get('/Eventos','Eventos_Control::new');

$routes->get('/Eventos/Mostrar_Atracciones','Eventos_Control::mostrarAtracciones');
$routes->post('/Eventos/Mostrar_Atracciones','Eventos_Control::mostrarAtracciones');

$routes->get('/Eventos/Agregar_Atraccion_Evento','Eventos_Control::agregar_Atracciones_Evento');
$routes->post('/Eventos/Agregar_Atraccion_Evento','Eventos_Control::agregar_Atracciones_Evento');

$routes->get('/Eventos/Editar_Atraccion_Evento','Eventos_Control::informacion_Atraccion');
$routes->post('/Eventos/Editar_Atraccion_Evento','Eventos_Control::informacion_Atraccion');

$routes->get('/Eventos/Editar_Atraccion','Eventos_Control::actualizar_Atraccion');
$routes->post('/Eventos/Editar_Atraccion','Eventos_Control::actualizar_Atraccion');

$routes->get('/Eventos/Agregar_Evento','Eventos_Control::agregarEvento');
$routes->post('/Eventos/Agregar_Evento','Eventos_Control::agregarEvento');
$routes->get('/Eventos/Mostrar_Tarjetas','Eventos_Control::mostrarTarjetas');
$routes->post('/Eventos/Mostrar_Tarjetas','Eventos_Control::mostrarTarjetas');

$routes->get('/Eventos/Mostrar_Tarjetas_Nuevas','Eventos_Control::mostrar_Tarjetas_Nuevas');
$routes->post('/Eventos/Mostrar_Tarjetas_Nuevas','Eventos_Control::mostrar_Tarjetas_Nuevas');

$routes->get('/Eventos/Agregar_Tarjetas_Evento','Eventos_Control::agregar_Tarjetas_Evento');
$routes->post('/Eventos/Agregar_Tarjetas_Evento','Eventos_Control::agregar_Tarjetas_Evento');

$routes->get('/Eventos/Lotes_Cortesias','Eventos_Control::buscar_Lotes');
$routes->post('/Eventos/Lotes_Cortesias','Eventos_Control::buscar_Lotes');

$routes->get('/Eventos/Tarjetas_Cortesias','Eventos_Control::buscar_Tarjetas');
$routes->post('/Eventos/Tarjetas_Cortesias','Eventos_Control::buscar_Tarjetas');

$routes->get('/Eventos/Agregar_Cortesias','Eventos_Control::agregar_Cortesias');
$routes->post('/Eventos/Agregar_Cortesias','Eventos_Control::agregar_Cortesias');

$routes->get('/Eventos/Mostrar_Zonas','Eventos_Control::mostrar_Zonas_Evento');
$routes->post('/Eventos/Mostrar_Zonas','Eventos_Control::mostrar_Zonas_Evento');

$routes->get('/Eventos/Agregar_Zona','Eventos_Control::agregar_Zona_Evento');
$routes->post('/Eventos/Agregar_Zona','Eventos_Control::agregar_Zona_Evento');

$routes->get('/Eventos/Mostrar_Taquillas','Eventos_Control::mostrar_Taquillas_Evento');
$routes->post('Eventos/Mostrar_Taquillas','Eventos_Control::mostrar_Taquillas_Evento');

$routes->get('/Eventos/Agregar_Taquillas_Evento','Eventos_Control::agregar_Taquillas_Evento');
$routes->post('/Eventos/Agregar_Taquillas_Evento','Eventos_Control::agregar_Taquillas_Evento');

//$routes->get('/Eventos/Mostrar_Promociones','Eventos_Control::mostrar_Promociones');
//$routes->post('/Eventos/Mostrar_Promociones','Eventos_Control::mostrar_Promociones');
$routes->get('/Eventos/Mostrar_Promociones','Prueba_Promocion_Control::mostrar_Promociones');
$routes->post('/Eventos/Mostrar_Promociones','Prueba_Promocion_Control::mostrar_Promociones');

$routes->get('/Eventos/Agregar_Promocion_Evento','Prueba_Promocion_Control::agregar_Promocion_Evento');
$routes->post('/Eventos/Agregar_Promocion_Evento','Prueba_Promocion_Control::agregar_Promocion_Evento');

$routes->get('/Eventos/Editar_Promocion_Evento','Prueba_Promocion_Control::editar_Promocion_Evento');
$routes->post('/Eventos/Editar_Promocion_Evento','Prueba_Promocion_Control::editar_Promocion_Evento');

$routes->get('/Eventos/Editar_Taquillas','Eventos_Control::editar_Taquillas');
$routes->post('/Eventos/Editar_Taquillas','Eventos_Control::editar_Taquillas');

$routes->get('/Eventos/Mostrar_Asociacion','Eventos_Control::mostrarAsociacion');
$routes->post('/Eventos/Mostrar_Asociacion','Eventos_Control::mostrarAsociacion');

$routes->get('/Usuarios','Usuarios_Control::new');

$routes->get('/Promociones','Promociones_Control::new');

$routes->post('/Promociones/Agregar_Promocion','Promociones_Control::agregar_Promocion');
$routes->get('/Promociones/Agregar_Promocion','Promociones_Control::agregar_Promocion');

$routes->post('/Promociones/VerEventos','Promociones_Control::ver_Eventos');
$routes->get('/Promociones/VerEventos','Promociones_Control::ver_Eventos');


$routes->get('/Lotes','Tarjetas_Control::new');
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

$routes->get('/Reponer Saldo','Reponer_Saldo_Control::new');


$routes->get('/Reponer Saldo/Pulsera_Atraccion','Reponer_Saldo_Control::pulsera_Atraccion');
$routes->post('/Reponer Saldo/Pulsera_Atraccion','Reponer_Saldo_Control::pulsera_Atraccion');

$routes->get('/Reponer Saldo/Gratis_Atraccion','Reponer_Saldo_Control::gratis_Atraccion');
$routes->post('/Reponer Saldo/Gratis_Atraccion','Reponer_Saldo_Control::gratis_Atraccion');

$routes->get('/Reponer Saldo/Saldo_Taquilla','Reponer_Saldo_Control::saldo_Taquilla');
$routes->post('/Reponer Saldo/Saldo_Taquilla','Reponer_Saldo_Control::saldo_Taquilla');

$routes->get('/Reponer Saldo/Pulsera_Taquilla','Reponer_Saldo_Control::pulsera_Taquilla');
$routes->post('/Reponer Saldo/Pulsera_Taquilla','Reponer_Saldo_Control::pulsera_Taquilla');

$routes->get('/Reponer Saldo/Cortesia_Taquilla','Reponer_Saldo_Control::cortesia_Taquilla');
$routes->post('/Reponer Saldo/Cortesia_Taquilla','Reponer_Saldo_Control::cortesia_Taquilla');
$routes->get('/Iniciar_Sesion_User','Iniciar_Sesion_User_Control::new');
$routes->get('/Menu_Principal_User','Menu_Principal_User_Control::new');
$routes->post('/Menu_Principal_User','Menu_Principal_User_Control::new');


/************************************************************** Login Usuario ********************************************************/
$routes->post('/Busuarios','Iniciar_Sesion_User_Control::getBusqueda');
$routes->get('/Busuarios','Iniciar_Sesion_User_Control::getBusqueda');
/************************************************************** Verificar rol *********************************************************/
//$routes->get('/CheckRol','Iniciar_Sesion_User_Control::veriRol');
$routes->post('/CheckRol','Iniciar_Sesion_User_Control::veriRol');
/************************************************************ Ingresa la jornada ******************************************************/
$routes->post('/datosTurno','Iniciar_Sesion_User_Control::guardarDatos');
/******************************************************** Ingresa al modulo de cobro **************************************************/
$routes->get('/ModuloCobro','Menu_Principal_User_Control::MCobro');
/********************************************************* Validar Tarjeta ************************************************************/
$routes->post('/validarTarjeta','Menu_Principal_User_Control::validar_Tarjeta');
/********************************************************* Pagar Compra ***************************************************************/
$routes->post('/Tipo_Pago','Menu_Principal_User_Control::tipo_Pago');
/********************************************************* Guardar Ventas ***************************************************************/
$routes->post('/guardarVentas','Menu_Principal_User_Control::guardar_Ventas');
/********************************************************* Agregamos recargas ***************************************************************/
$routes->post('/addRecarga','Menu_Principal_User_Control::agregarRecarga');







$routes->post('/Cobro','Menu_Principal_User_Control::cobrar');
$routes->get('/Cobro','Menu_Principal_User_Control::cobrar');





$routes->get('/SesionAdmin','Home::admin');
//$routes->post('/SesionAdmin','Home::admin');


$routes->get('/SesionUser','Home::user');
$routes->post('/SesionUser','Home::user');
$routes->get('/CerrarSesion','Iniciar_Sesion_Administrador_Control::logout');
$routes->post('/CerrarSesion','Iniciar_Sesion_Administrador_Control::logout');
$routes->get('/ReporteVenta','reporte_Venta_Control::consultarVentanilla');
//$routes->post('/supervisarAtraccion','Supervisor_Atracciones_Control::new');
//$routes->get('/supervisarAtraccion','Supervisor_Atracciones_Control::new');
$routes->post('/Validador','validador_Control::new');
$routes->get('/Validador','validador_Control::new');

$routes->post('/Atracciones_Zona','validador_Control::listado_Atracciones');

$routes->post('/Iniciar_Turno_Validador','validador_Control::iniciar_Turno'); /****************************** */
$routes->get('/Validacion_Interfaz','validador_Control::new');

$routes->get('/Validacion_Interfaz/Cerrar_Sesion','validador_Control::Cerrar_Sesion');
$routes->post('/Validacion_Interfaz/Cerrar_Sesion','validador_Control::Cerrar_Sesion');

$routes->get('/Validacion_Interfaz/Tarjeta','validador_Control::Validar_Saldo');
$routes->post('/Validacion_Interfaz/Tarjeta','validador_Control::Validar_Saldo');

$routes->get('/Validacion_Interfaz/Promociones','validador_Control::Promociones');
$routes->post('/Validacion_Interfaz/Promociones','validador_Control::Promociones');

$routes->get('/Validacion_Interfaz/Ciclo','validador_Control::Insertar_Ciclo');
$routes->post('/Validacion_Interfaz/Ciclo','validador_Control::Insertar_Ciclo');

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
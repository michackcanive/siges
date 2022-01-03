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
$routes->setDefaultController('Index');
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


$routes->get('/', 'Index::index');
$routes->get('login', 'Index::login');
$routes->get('inscreverse', 'Index::inscreverse');
$routes->post('registrar', 'Index::registrar');

$routes->post('autenticar', 'AuthController::autenticar');
//////////////////////////////////////////////////////////////////////////////
$routes->get('/inicio', 'Inicio::index');
$routes->get('sair', 'Inicio::sair');
/////////////////////////////////////////////////////////////////
$routes->get('/cadastrar_sl', 'OperacaoSl::cadastrar_sl');
$routes->post('/criar_sl', 'OperacaoSl::criar_sl');
$routes->post('/pagar_salao', 'OperacaoSl::pagar_salao');

//////////////////////////////////////////////////////////////////////
$routes->get('/cadastrar_servicos', 'OperacaoSl::cadastrar_servicos');
$routes->post('/criar_servicos', 'OperacaoSl::criar_servicos');
$routes->post('/gestao_servicos', 'OperacaoSl::gestao_servicos');
$routes->post('/eliminar', 'OperacaoSl::eliminar');
///////////////////////////////////////////////////////////////
$routes->post('/listar_reservas_no_pagas', 'OperacaoSl::listar_reservas_no_pagas');
$routes->post('/listar_reservas_pagas', 'OperacaoSl::listar_reservas_pagas');

$routes->post('/liberar_espaco', 'OperacaoSl::liberar_espaco');

///////////////////////////////////////////////////////////////
$routes->post('/gestao_reservas', 'OperacaoSl::gestao_reservas');
$routes->post('/solicitar_salao', 'OperacaoSl::solicitar_salao');
$routes->post('/add_servicos', 'OperacaoSl::add_servicos'); 
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

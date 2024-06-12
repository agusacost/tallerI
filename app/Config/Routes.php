<?php

namespace Config;

use App\Controllers\Home;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//layout principal
$routes->get('/', 'Home::principal');
$routes->get('/about', 'Home::about');
$routes->get('/frequentquestions', 'Home::frequentquestions');
$routes->get('/termsandconditions', 'Home::terms');
$routes->get('/commerce', 'Home::commerce');
$routes->get('/politics', 'Home::politics');

//users
$routes->get('/listar_users', 'Users', ['filter' => 'authAdmin']);
$routes->get('/borrar_user/(:num)', 'Users::borrar/$1', ['filter' => 'authAdmin']);
$routes->get('/edit/(:num)', 'Users::form/$1', ['filter' => 'authUser']);
$routes->get('/profile', 'Users::profile', ['filter' => 'authUser']);
//actualizar
$routes->post('/user/formValidation/(:num)', 'Users::formValidation/$1');
//register
$routes->get('/register', 'Users::form');
$routes->post('/user/formValidation', 'Users::formValidation');
//loguear
$routes->get('/login', 'Login::login');
$routes->post('/signin', 'Login::auth');
$routes->get('/logout', 'Login::logout');

//productos
$routes->get('/productos', 'Product::publicProducts'); //Cards todos los productos
$routes->post('/productos/filtrar', 'Product::filtrarProductos'); //Cards con filtro de categoria
$routes->get('/listar', 'Product::index', ['filter' => 'authAdmin']); //listar todos los productos
$routes->get('/producto', 'Product::form', ['filter' => 'authAdmin']); //form para crear
$routes->post('/producto/save', 'Product::save', ['filter' => 'authAdmin']); //crea producto 
$routes->get('/producto/(:num)', 'Product::form/$1', ['filter' => 'authAdmin']); //form para actualizar
$routes->post('/producto/save/(:num)', 'Product::save/$1', ['filter' => 'authAdmin']); //actualiza producto
$routes->get('/borrar/(:num)', 'Product::borrar/$1', ['filter' => 'authAdmin']); //borra

//cart
$routes->get('carrito/view', 'Cart::view', ['filter' => 'authUser']);
$routes->post('carrito/add', 'Cart::add', ['filter' => 'authUser']);
$routes->post('carrito/update', 'Cart::update', ['filter' => 'authUser']);
$routes->post('carrito/remove/(:any)', 'Cart::remove/$1', ['filter' => 'authUser']); //elimina un item
$routes->post('carrito/remove', 'Cart::remove', ['filter' => 'authUser']); //vacia el carrito
//comprar 
$routes->post('ventas/confirmar', 'Cart::proceder', ['filter' => 'authUser']); //ir a la vista de confirmacion de compra
$routes->post('ventas/comprar', 'Cart::comprar', ['filter' => 'authUser']); //ir a la vista de confirmacion de compra
$routes->get('ventas/success', 'Cart::success', ['filter' => 'authUser']); //ir a la vista de confirmacion de compra

//consultas
$routes->get('/contact', 'Consulta');
$routes->post('/contact/send', 'Consulta::sendConsulta');
$routes->get('/contact_list', 'Consulta::listaConsulta', ['filter' => 'authAdmin']);
$routes->get('/borrar_consulta/(:num)', 'Consulta::borrarConsulta/$1', ['filter' => 'authAdmin']);

//ventas
$routes->get('/ventas_list', 'Ventas',  ['filter' => 'authAdmin']);
$routes->get('/ventas/usuario/(:num)', 'Ventas::ventasUser/$1',  ['filter' => 'authUser']);
//envios
$routes->get('/envios_list', 'Envios',  ['filter' => 'authAdmin']);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

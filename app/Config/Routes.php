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
$routes->get('/contact', 'Home::contact');
$routes->get('/frequentquestions', 'Home::frequentquestions');
$routes->get('/termsandconditions', 'Home::terms');
$routes->get('/commerce', 'Home::commerce');
$routes->get('/politics', 'Home::politics');

//register
$routes->get('/register', 'Users::create');
$routes->post('/register_user', 'Users::formValidation');
//loguear
$routes->get('/login', 'Login::login');
$routes->post('/signin', 'Login::auth');
$routes->get('/logout', 'Login::logout');

//productos
$routes->get('/listar', 'Product::index', ['filter' => 'authAdmin']); //listar todos los prooductos
$routes->get('/producto', 'Product::form', ['filter' => 'authAdmin']); //form para crear
$routes->post('/producto/save', 'Product::save', ['filter' => 'authAdmin']); //crea producto 
$routes->get('/producto/(:num)', 'Product::form/$1', ['filter' => 'authAdmin']); //form para actualizar
$routes->post('/producto/save/(:num)', 'Product::save/$1', ['filter' => 'authAdmin']); //actualiza producto
$routes->get('/borrar/(:num)', 'Product::borrar/$1', ['filter' => 'authAdmin']); //borra

//users
$routes->get('/listar_users', 'Users', ['filter' => 'authAdmin']);
$routes->get('/borrar_user/(:num)', 'Users::borrar/$1', ['filter' => 'authAdmin']);


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

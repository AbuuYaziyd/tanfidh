<?php

namespace Config;

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
$routes->get('/', 'Home::index');
$routes->get('test', 'Home::test');


/*
 * --------------------------------------------------------------------
 * Custom Routes My Auth Routings
 * --------------------------------------------------------------------
 */
$routes->get('register', 'AuthController::register');
$routes->post('secure', 'AuthController::secure');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::auth');
$routes->get('logout', 'AuthController::logout');
$routes->get('recover', 'AuthController::recover');
$routes->post('recover', 'AuthController::password');
$routes->get('change/password', 'AuthController::pass', ['filter' => 'auth']);
$routes->post('change/password/(:num)', 'AuthController::change/$1', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Routes Groups User Routings
 * --------------------------------------------------------------------
 */
$routes->group('user', function ($routes) {
    $routes->get('/','UserController::index', ['filter' => 'auth']);
    $routes->get('profile/(:num)', 'UserController::show/$1', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'UserController::edit/$1', ['filter' => 'auth']);
    $routes->post('edit-mushrif/(:num)', 'UserController::editMushrif/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'UserController::update/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Image Routings
 * --------------------------------------------------------------------
 */
$routes->group('image', function ($routes) {
    $routes->get('/', 'ImageController::index', ['filter' => 'auth']);
    $routes->get('edit/(:num)/(:any)', 'ImageController::imgShow/$1/$2', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'ImageController::update/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Mashruu Routings
 * --------------------------------------------------------------------
 */
$routes->group('tanfidh', function ($routes) {
    $routes->get('/', 'MashruuController::index', ['filter' => 'auth']);
    $routes->post('create', 'MashruuController::create', ['filter' => 'auth']);
    $routes->get('connect', 'MashruuController::connect', ['filter' => 'auth']);
    $routes->get('delete', 'MashruuController::delete', ['filter' => 'auth']);
    $routes->get('tasrih', 'MashruuController::tasrih', ['filter' => 'admin']);
    $routes->get('download', 'MashruuController::download', ['filter' => 'admin']);
    $routes->get('tasrih/delete', 'MashruuController::delete', ['filter' => 'admin']);
    $routes->get('done', 'MashruuController::done', ['filter' => 'auth']);
    $routes->get('start', 'MashruuController::start', ['filter' => 'auth']);
    $routes->get('show/(:num)', 'MashruuController::show/$1', ['filter' => 'admin']);
    $routes->post('edit/(:num)', 'MashruuController::edit/$1', ['filter' => 'admin']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Admin Routings
 * --------------------------------------------------------------------
 */
$routes->group('admin', function ($routes) {
    $routes->get('/', 'AdminController::index', ['filter' => 'admin']);
    $routes->get('jamia/(:num)', 'AdminController::jamia/$1', ['filter' => 'admin']);
    $routes->get('nat/(:any)', 'AdminController::nat/$1', ['filter' => 'admin']);
    $routes->get('all', 'AdminController::all', ['filter' => 'admin']);
    $routes->get('users/(:any)/(:num)', 'AdminController::users/$1/$2', ['filter' => 'admin']);
    $routes->get('activate/(:num)', 'AdminController::activate/$1', ['filter' => 'admin']);
    $routes->post('activate-all', 'AdminController::activateAll', ['filter' => 'admin']);
    $routes->get('show/(:num)', 'AdminController::show/$1', ['filter' => 'admin']);
    $routes->get('delete/(:num)', 'AdminController::delete/$1', ['filter' => 'admin']);
    $routes->get('tanfidh', 'AdminController::tanfidh', ['filter' => 'admin']);
    $routes->get('tanfidh-all', 'AdminController::tanfidhAll', ['filter' => 'admin']);
    $routes->get('tasrih', 'AdminController::tasrih', ['filter' => 'admin']);
    $routes->get('tasrih-user/(:num)', 'AdminController::tasrihUser/$1', ['filter' => 'admin']);
    $routes->post('mulahadha/(:num)', 'AdminController::mulahadha/$1', ['filter' => 'admin']);
    $routes->get('edit-mushrif/(:num)', 'AdminController::editMushrif/$1', ['filter' => 'admin']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Mushrif Routings
 * --------------------------------------------------------------------
 */
$routes->group('mushrif', function ($routes) {
    $routes->get('/', 'MushrifController::index', ['filter' => 'admin']);
    $routes->get('users', 'MushrifController::users', ['filter' => 'admin']);
    $routes->get('add', 'MushrifController::add', ['filter' => 'admin']);
    $routes->post('create', 'MushrifController::create', ['filter' => 'admin']);
    $routes->get('judud', 'MushrifController::judud', ['filter' => 'admin']);
    $routes->get('user/(:num)', 'MushrifController::user/$1', ['filter' => 'admin']);
    $routes->get('activate/(:num)', 'MushrifController::activate/$1', ['filter' => 'admin']);
    $routes->get('active/(:num)', 'MushrifController::active/$1', ['filter' => 'admin']);
    $routes->get('tasrih', 'MushrifController::tasrih', ['filter' => 'admin']);
    $routes->get('tasrih-user/(:num)', 'MushrifController::tasrihUser/$1', ['filter' => 'admin']);
    $routes->post('mulahadha/(:num)', 'MushrifController::mulahadha/$1', ['filter' => 'admin']);
    $routes->get('send-tasrih/(:num)', 'MushrifController::sendTasrih/$1', ['filter' => 'admin']);
    $routes->get('tasrih-delete/(:num)', 'MushrifController::tasrihDelete/$1', ['filter' => 'admin']);
    $routes->get('tanfidh', 'MushrifController::tanfidh', ['filter' => 'admin']);
    $routes->get('tanfidh-shahr', 'MushrifController::thisMonthTanfidh', ['filter' => 'admin']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Umrah Routings
 * --------------------------------------------------------------------
 */
$routes->group('umrah', function ($routes) {
    $routes->get('/', 'TanfidhController::index', ['filter' => 'auth']);
    $routes->post('/', 'TanfidhController::index', ['filter' => 'auth']);
    $routes->post('create', 'TanfidhController::create', ['filter' => 'auth']);
    $routes->get('show/(:num)', 'TanfidhController::show/$1', ['filter' => 'auth']);
    $routes->get('edit/(:num)', 'TanfidhController::edit/$1', ['filter' => 'auth']);
    $routes->post('upload/(:num)', 'TanfidhController::update/$1', ['filter' => 'auth']);
    $routes->post('loc/(:num)', 'TanfidhController::loc/$1', ['filter' => 'auth']);
    $routes->post('makkah/(:num)', 'TanfidhController::makkah/$1', ['filter' => 'auth']);
    $routes->post('miqat/(:num)', 'TanfidhController::miqat/$1', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups Setting Routings
 * --------------------------------------------------------------------
 */
$routes->group('set', function ($routes) {
    $routes->get('/', 'SettingController::index', ['filter' => 'auth']);
    $routes->get('add', 'SettingController::add', ['filter' => 'auth']);
    $routes->post('create', 'SettingController::create', ['filter' => 'auth']);
    $routes->get('show/(:num)', 'SettingController::show/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'SettingController::edit/$1', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'SettingController::delete/$1', ['filter' => 'auth']);
    $routes->post('student-count', 'SettingController::studentCount', ['filter' => 'auth']);
    $routes->post('tanfidh', 'SettingController::tanfidh', ['filter' => 'auth']);
    $routes->post('tasrih', 'SettingController::tasrih', ['filter' => 'auth']);
    $routes->post('umra-count', 'SettingController::umraCount', ['filter' => 'auth']);
});

/*
 * --------------------------------------------------------------------
 * Routes Groups WhatsApp Routings
 * --------------------------------------------------------------------
 */
$routes->group('whatsapp', function ($routes) {
    $routes->get('/', 'WhatsappController::index', ['filter' => 'auth']);
    $routes->get('show/(:num)', 'WhatsappController::show/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'WhatsappController::edit/$1', ['filter' => 'auth']);
});

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

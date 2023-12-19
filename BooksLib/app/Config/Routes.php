<?php

namespace Config;

use App\Controllers\Pages;

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
$routes->setAutoRoute(true);
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
$routes->get('/', 'Books::getindex');
$routes->get('/create', 'Books::getcreate');
$routes->post('/create', 'Books::postCreate');
$routes->get('/authors', 'Authors::getindex');
$routes->get('/authors/create', 'Authors::getcreate');
$routes->post('/authors/create', 'Authors::postCreate');
$routes->get('/login', 'Authentification::getLogin');
$routes->post('/login', 'Authentification::postLogin');
$routes->get('/registration', 'Authentification::getRegistration');
$routes->post('/registration', 'Authentification::postRegistration');
$routes->get('/logout', 'Authentification::Logout');
$routes->get('/getadmin', 'Authentification::getAdmin');
// $routes->resource("api/books",["controller"=>"BooksLib"]);
// $routes->get("pages",[Pages::class, "index"]);
// $routes->get("pages/(:segment)",[Pages::class, "view"]);
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

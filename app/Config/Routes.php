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
$routes->get('announcements', 'Announcement::index');
$routes->get('careers', 'Career::index');
$routes->get('events', 'Event::index');

$routes->group('request', function($routes) {
    $routes->get('/', 'Request::index');
    $routes->post('confirm', 'Request::confirm');
    $routes->post('approve', 'Request::approve');
    $routes->post('delete', 'Request::delete');
    $routes->post('s', 'Request::search');
});

$routes->group('users', function($routes) {
    $routes->get('/', 'Alumni::index');
    $routes->post('confirm', 'Alumni::confirm');
    $routes->post('approve', 'Alumni::approve');
    $routes->post('block', 'Alumni::block');
    $routes->post('delete', 'Alumni::delete');
    $routes->post('s', 'Alumni::search');
});

$routes->group('threads', function($routes) {
    $routes->get('/', 'Forum::index');
    $routes->post('confirm', 'Forum::confirm');
    $routes->post('close', 'Forum::close');
    $routes->post('delete', 'Forum::delete');
    $routes->post('v', 'Forum::view');
    $routes->post('s', 'Forum::search');
});

$routes->get('archives', 'Archive::index');

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

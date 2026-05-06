<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman user (sudah ada)
$routes->get('/', 'Home::index');

$routes->group('admin', static function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('movies', 'Admin::movies');
    $routes->post('movies', 'Admin::storeMovie');
    $routes->post('movies/(:num)', 'Admin::updateMovie/$1');
    $routes->post('movies/(:num)/delete', 'Admin::deleteMovie/$1');
    // $routes->get('users', 'Admin::users');
    // $routes->get('settings', 'Admin::settings');
});

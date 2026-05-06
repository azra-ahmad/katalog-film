<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Halaman user (sudah ada)
$routes->get('/', 'Home::index');

// Halaman admin
$routes->get('admin', 'Admin::index');
$routes->get('admin/movies', 'Admin::movies');

// Atau pakai group biar lebih rapi kalau nanti banyak halaman admin:
$routes->group('admin', static function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('movies', 'Admin::movies');
    // $routes->get('users', 'Admin::users');
    // $routes->get('settings', 'Admin::settings');
});
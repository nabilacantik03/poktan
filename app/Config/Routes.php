<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Landing page route
$routes->get('/', 'Home::index');

// Authentication routes
$routes->group('auth', function($routes) {
    $routes->get('/', 'Auth::index');
    $routes->get('login', 'Auth::login');
    $routes->get('register', 'Auth::register');
    $routes->post('processLogin', 'Auth::processLogin');
    $routes->post('processRegister', 'Auth::processRegister');
    $routes->get('logout', 'Auth::logout');
});

// Dashboard routes (akan ditambahkan nanti)
$routes->group('dashboard', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Dashboard::index');
});

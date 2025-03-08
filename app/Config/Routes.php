<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/path', 'namaController::namaFunction');


// Landing page route
$routes->get('/', 'Home::index');

// Contact form routes
$routes->get('contact', 'Home::contact');
$routes->post('messages/send', 'Messages::send');

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
    $routes->get('profile', 'Dashboard::profile');
    $routes->post('profile', 'Dashboard::updateProfile');
    $routes->get('activities', 'Dashboard::activities');
    $routes->get('gallery', 'Dashboard::gallery');
    $routes->post('gallery', 'Dashboard::uploadMedia');
    $routes->delete('gallery/(:num)', 'Dashboard::deleteMedia/$1');
    
    // Anggota routes
    $routes->get('members', 'Dashboard::anggota');
    $routes->post('members', 'Dashboard::createAnggota');
    $routes->delete('members/(:num)', 'Dashboard::deleteAnggota/$1');
    
    // $routes->get('members', 'Dashboard::members');
});

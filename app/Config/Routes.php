<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/register', 'Home::register');
// Auth actions
$routes->post('/login', 'Auth::login');
$routes->post('/register', 'Auth::register');
$routes->get('/logout', 'Auth::logout');

// Notes CRUD
$routes->get('notes', 'Notes::index');
$routes->get('notes/create', 'Notes::create');
$routes->post('notes/store', 'Notes::store');
$routes->get('notes/edit/(:num)', 'Notes::edit/$1');
$routes->post('notes/update/(:num)', 'Notes::update/$1');
$routes->post('notes/delete/(:num)', 'Notes::delete/$1');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ProductController::emart');
$routes->get('/view/(:any)', 'ProductController::view/$1');
$routes->get('/login', 'UserController::login');
$routes->get('/register', 'UserController::register');
$routes->post('/signup', 'UserController::signup');
$routes->post('/check', 'UserController::check');
$routes->get('/admindash', 'AdminController::Logatoc');
$routes->post('/save', 'AdminController::save');
$routes->get('/delete/(:any)', 'AdminController::delete/$1');
$routes->get('/edit/(:any)', 'AdminController::edit/$1');
['filter'=>'authGuard'];


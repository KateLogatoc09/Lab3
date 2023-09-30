<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/emart', 'ProductController::emart');
$routes->get('/view/(:any)', 'ProductController::view/$1');
$routes->get('/signup', 'UserController::register');
$routes->get('/signin', 'UserController::LoginAuth');
$routes->get('/admindash', 'AdminController::Logatoc');
$routes->post('/save', 'AdminController::save');
$routes->get('/delete/(:any)', 'AdminController::delete/$1');
$routes->get('/edit/(:any)', 'AdminController::edit/$1');
['filter'=>'authGuard'];


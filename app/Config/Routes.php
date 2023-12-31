<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/users', 'UserController::index');
$routes->match(['get', 'post'], '/login', 'UserController::login');
$routes->get('/logout', 'UserController::logout');
$routes->get('/dashboard', 'UserController::dashboard');




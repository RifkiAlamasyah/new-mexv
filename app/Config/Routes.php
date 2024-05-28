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
$routes->match(['get', 'post'], '/register', 'UserController::register');

// product
$routes->get('/product', 'ProductController::index');
$routes->get('/product/manage-product', 'ProductController::manage_product');
$routes->match(['get', 'post'], '/product/add', 'ProductController::add_product');
$routes->match(['get', 'post'], '/product/update/(:num)', 'ProductController::update_product/$1');
$routes->match(['get', 'post', 'delete'], '/product/delete/(:num)', 'ProductController::delete_product/$1');

// end product




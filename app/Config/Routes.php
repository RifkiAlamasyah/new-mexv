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
$routes->get('product/order/(:any)', 'ProductController::order/$1');
$routes->post('product/submit-order', 'ProductController::submitOrder');
// end product

// Transaction
$routes->get('cart', 'ProductController::cart');
$routes->get('cart/confirm/(:num)', 'ProductController::confirmOrder/$1');
$routes->post('cart/update-order', 'ProductController::updateOrder');
$routes->get('cart/cancel-order/(:num)', 'ProductController::cancelOrder/$1');
$routes->get('/product/manage-product-order', 'ProductController::manage_product_order');
$routes->post('/product/update-status-order/(:num)', 'ProductController::update_status_order/$1');



<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/registration', 'Home::registration');
$routes->post('/sendotp', 'Home::sendotp');
$routes->get('/admin', 'Home::admin');
$routes->get('/login', 'Home::login');

$routes->get('/check', 'Home::checkroom');
$routes->get('dashboard', 'Admin::index');
$routes->get('logout', 'User::logout');
$routes->get('logout_front', 'User::logoutfront');

$routes->get('/list-of-district-guest-house', 'Home::guesthouselist');


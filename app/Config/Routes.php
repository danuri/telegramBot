<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('casn', 'Casn::index');
$routes->post('casn', 'Casn::index');

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/test', 'CDbb::testconexion');
$routes->get('/', 'ImcController::index');
$routes->post('imc/calcular', 'ImcController::calcular');
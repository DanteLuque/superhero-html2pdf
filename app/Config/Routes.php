<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/reportes/r1', 'ReporteController::getReporte1');
$routes->get('/reportes/r2', 'ReporteController::getReporte2');
$routes->get('/reportes/r3', 'ReporteController::getReporte3');
$routes->post('/reportes/r4', 'ReporteController::getReporte4');

$routes->get('/generador', 'GerenadorController::index');

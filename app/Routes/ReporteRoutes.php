<?php

$routes->get('/', 'Home::index');
$routes->get('/reportes/r1', 'ReporteController::getReporte1');
$routes->get('/reportes/r2', 'ReporteController::getReporte2');
$routes->get('/reportes/r3', 'ReporteController::getReporte3');
$routes->post('/reportes/r4', 'ReporteController::getReporte4');

$routes->get('/generador', 'GerenadorController::index');

$routes->get('/tarea5', 'GerenadorController::tarea5');
$routes->post('/tarea5/buscador', 'GerenadorController::buscador');
$routes->get('/tarea5/poderes/(:num)', 'ReporteController::getReporte5/$1');

$routes->get('/reportes/showui', 'ReporteController::showUIReport');

$routes->post('/reportes/show-heroes', 'ReporteController::getResportByPublisher');
$routes->post('/reportes/show-heroes-and-race-align', 'ReporteController::getResportByRaceAndAlignment');

$routes->get('/dashboard/informe1', 'DashboardController::getInforme1');
$routes->get('/dashboard/informe2', 'DashboardController::getInforme2');
$routes->get('/dashboard/informe3', 'DashboardController::getInforme3');

$routes->get('/public/api/getdatainforme2', 'DashboardController::getDataInforme2');
$routes->get('/public/api/getdatainforme3', 'DashboardController::getDataInforme3');

// cache
$routes->get('/public/api/getdatainforme3cache', 'DashboardController::getDataInforme3Cache');


$routes->get('/dashboard/informe4', 'DashboardController::getInforme4');
$routes->get('/public/api/getdatainforme4gendercache', 'DashboardController::getDataInforme4GenderCache');
$routes->get('/public/api/getdatainforme4publishercache', 'DashboardController::getDataInforme4PublisherCache');

$routes->get('/reportes/excel1', 'ReporteController::getExcel1');


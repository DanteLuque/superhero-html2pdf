<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// rutas por módulos
require APPPATH . 'Routes/HomeRoutes.php';
require APPPATH . 'Routes/AuthRoutes.php';
require APPPATH . 'Routes/UsuarioRoutes.php';
require APPPATH . 'Routes/TestRoutes.php';


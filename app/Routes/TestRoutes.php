<?php

$routes->group('testrol', function ($routes) {
    $routes->get('admin', 'TestController::admin', ['filter' => ['auth', 'role:ADMIN']]);
    $routes->get('user', 'TestController::user', ['filter' => ['auth', 'role:ADMIN,USER']]);
});

<?php

$routes->group(
    'usuarios',
    ['filter' => 'alreadyLoggedIn'],
    function ($routes) {
        $routes->post('save_db', 'UsuarioController::saveDB');
    }
);

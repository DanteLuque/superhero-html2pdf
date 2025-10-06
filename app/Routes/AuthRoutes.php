<?php

$routes->group('auth', ['filter' => 'alreadyLoggedIn'], function ($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('doLogin', 'AuthController::doLogin');
    $routes->get('register', 'AuthController::register');
});

$routes->get('auth/logout', 'AuthController::logout');

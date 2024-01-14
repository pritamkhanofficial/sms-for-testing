<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Home::index', ['filter' => 'authfilter']);

$routes->get('/', 'Auth::index', ['filter' => 'noauthfilter']);

$routes->post('/signin', 'Auth::signin');

$routes->get('/logout', 'Auth::signout');

$routes->get('/profile_edit', 'User::index', ['filter' => 'authfilter']);

$routes->post('/update_profile','User::Profile_update', ['filter' => 'authfilter']);

$routes->get('/change_password','User::PasswordChange', ['filter' => 'authfilter']);

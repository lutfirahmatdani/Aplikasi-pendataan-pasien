<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::dashboard');
$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/valid_login', 'Auth::valid_login');
$routes->post('/auth/valid_register', 'Auth::valid_register');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/user', 'User::dashboard');
$routes->get('/user/pasien', 'User::pasien');

$routes->get('/admin', 'Admin::dashboard');
$routes->get('/admin/datapasien', 'Admin::pasien');
$routes->get('/admin/tambah/pasien', 'Admin::tambah_pasien');
$routes->post('/admin/datapasien/save', 'Pasien::saveadmin');

$routes->post('/pasien/save', 'Pasien::save');

$routes->delete('/pasien/(:num)', 'Pasien::delete/$1');
$routes->get('/pasien/edit/(:num)', 'Pasien::edit/$1'); 
$routes->post('/pasien/update/(:num)', 'Pasien::update/$1');


<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/menu', 'Home::menu', ['filter' => 'auth']);
$routes->post('/login', 'Home::login');
$routes->get('/matakuliah','Home::inputmatakuliah');
$routes->get('/mahasiswa','Mahasiswa::index');
$routes->post('mahasiswa/create', 'Mahasiswa::create');
$routes->post('mahasiswa/update', 'Mahasiswa::update');
$routes->post('mahasiswa/hapus', 'Mahasiswa::hapus');
$routes->get('logout' , 'Home::logout');
// $routes->get('/page/tampil', 'page::tampil');
// $routes->get('/page/param/(:any)', 'page::param?$1');

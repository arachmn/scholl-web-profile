<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'PublicController::index');
$routes->get('/ppdb', 'PublicController::registration');
$routes->get('/berita/(:num)', 'PublicController::article/$1');

$routes->get('/auth', 'AuthController::index');

$routes->get('/admin', 'AdminController::index');
$routes->get('/admin/profil', 'AdminController::profile');
$routes->get('/admin/berita', 'AdminController::article');
$routes->get('/admin/daftar-guru', 'AdminController::teacher');
$routes->get('/admin/galeri-sekolah', 'AdminController::gallery');
$routes->get('/admin/fasilitas', 'AdminController::facility');
$routes->get('/admin/ppdb', 'AdminController::registration');
$routes->get('/admin/admin', 'AdminController::admin');

$routes->get('/docx/(:segment)', 'PublicController::downloadForm/$1');
$routes->get('/data/(:segment)', 'PublicController::downloadData/$1');

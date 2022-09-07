<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'C_Dashboard::index');
$routes->get('/C_Dashboard/index', 'C_Dashboard::index');

$routes->get('/C_Kategori/index', 'C_Kategori::index');
$routes->get('/C_Kategori/tambah', 'C_Kategori::tambah');
$routes->post('/C_Kategori/proses_tambah', 'C_Kategori::proses_tambah');
$routes->get('/C_Kategori/tampil_edit_data/(:num)', 'C_Kategori::tampil_edit_data/$1');

$routes->get('/C_Barang/index', 'C_Barang::index');
$routes->get('/C_Barang/tambah', 'C_Barang::tambah');
$routes->post('/C_Barang/proses_tambah', 'C_Barang::proses_tambah');
$routes->get('/C_Barang/tampil_edit_data/(:segment)', 'C_Barang::tampil_edit_data/$1');

$routes->get('/C_Satuan/index', 'C_Satuan::index');
$routes->get('/C_Satuan/tambah', 'C_Satuan::tambah');

// $routes->resource('C_Kategori');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

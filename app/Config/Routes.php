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
$routes->get('/', 'C_Dashboard::index', ['filter' => 'auth']);
$routes->get('/C_Dashboard/index', 'C_Dashboard::index', ['filter' => 'auth']);

// Routing Login
$routes->post('proses_login', 'C_Auth::proses_login');
$routes->get('halaman_login', 'C_Auth::index');
$routes->get('tampil_dashboard', 'C_Dashboard::index', ['filter' => 'auth']);

// Routing Logout
$routes->get('logout', 'C_Auth::logout');

// Routing Kategori
$routes->get('/C_Kategori/index', 'C_Kategori::index', ['filter' => 'auth']);
$routes->get('/C_Kategori/tambah', 'C_Kategori::tambah', ['filter' => 'auth']);
$routes->post('/C_Kategori/proses_tambah', 'C_Kategori::proses_tambah', ['filter' => 'auth']);
$routes->get('/C_Kategori/tampil_edit_data/(:num)', 'C_Kategori::tampil_edit_data/$1', ['filter' => 'auth']);

// Data Barang
$routes->get('tampil-barang', 'C_Barang::index', ['filter' => 'auth']);
$routes->get('detail-barang/(:num)', 'C_Barang::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-barang', 'C_Barang::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-barang', 'C_Barang::proses_tambah', ['filter' => 'auth']);
$routes->get('edit-barang/(:num)', 'C_Barang::tampil_edit_data/$1', ['filter' => 'auth']);
$routes->post('prosesedit-barang', 'C_Barang::edit', ['filter' => 'auth']);
$routes->get('hapus-barang/(:num)', 'C_Barang::hapus/$1', ['filter' => 'auth']);
$routes->get('export-barang', 'C_Barang::export', ['filter' => 'auth']);

// Barang Keluar
$routes->get('tampil-barangkeluar', 'C_Barang_Keluar::index', ['filter' => 'auth']);
$routes->get('autotampildatabarangkeluar/(:num)', 'C_Barang_Keluar::tampil_otomatis_data_barang/$1', ['filter' => 'auth']);
$routes->get('detail-barangkeluar/(:num)', 'C_Barang_Keluar::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-barangkeluar', 'C_Barang_Keluar::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-barangkeluar', 'C_Barang_Keluar::proses_tambah', ['filter' => 'auth']);
$routes->post('edit-barangkeluar', 'C_Barang_Keluar::edit', ['filter' => 'auth']);
$routes->get('hapus-barangkeluar/(:num)', 'C_Barang_Keluar::hapus/$1', ['filter' => 'auth']);

// Satuan
$routes->get('/C_Satuan/index', 'C_Satuan::index', ['filter' => 'auth']);
$routes->get('/C_Satuan/tambah', 'C_Satuan::tambah', ['filter' => 'auth']);

$routes->get('cekstok/(:num)', 'C_barang::cek_stok/$1', ['filter' => 'auth']);

// Permintaan
$routes->get('autotampildatapermintaan/(:num)', 'C_Permintaan::tampil_otomatis_data_permintaan/$1', ['filter' => 'auth']);

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

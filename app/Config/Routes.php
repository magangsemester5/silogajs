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

// Data Barang
$routes->get('tampil-barang', 'C_Barang::index');
$routes->get('tambah-barang', 'C_Barang::tambah');
$routes->post('prosestambah-barang', 'C_Barang::proses_tambah');
$routes->get('prosesedit-barang/(:num)', 'C_Barang::tampil_edit_data/$1');
$routes->post('edit-barang', 'C_Barang::edit');
$routes->get('hapus-barang/(:num)', 'C_Barang::hapus/$1');

// Barang Keluar
$routes->get('tampil-barangkeluar', 'C_Transaksi::index');
$routes->get('autotampildatabarangkeluar/(:num)', 'C_Transaksi::tampil_otomatis_data_barang/$1');
$routes->get('detail-barangkeluar/(:num)', 'C_Transaksi::detail/$1');
$routes->get('tambah-barangkeluar', 'C_Transaksi::tambah');
$routes->post('prosestambah-barangkeluar', 'C_Transaksi::proses_tambah_barang_keluar');
$routes->get('prosesedit-barangkeluar/(:num)', 'C_Transaksi::tampil_edit_data/$1');
$routes->post('edit-barangkeluar', 'C_Transaksi::edit');
$routes->get('hapus-barangkeluar/(:num)', 'C_Transaksi::hapus/$1');

// Satuan
$routes->get('/C_Satuan/index', 'C_Satuan::index');
$routes->get('/C_Satuan/tambah', 'C_Satuan::tambah');
// Auto Code
$routes->get('autocode-barang', 'C_Barang::auto_code_barang');
$routes->get('autocode-barangmasuk', 'C_Transaksi::auto_code_barang_masuk');
$routes->get('autocode-barangkeluar', 'C_Transaksi::auto_code_barang_keluar');

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

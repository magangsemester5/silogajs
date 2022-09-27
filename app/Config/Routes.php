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
$routes->get('tampil-kategori', 'C_Kategori::index');
$routes->get('tambah-kategori', 'C_Kategori::tambah');
$routes->post('prosestambah-kategori', 'C_Kategori::proses_tambah');
$routes->get('edit-kategori/(:num)', 'C_Kategori::edit/$1');
$routes->post('prosesedit-kategori', 'C_Kategori::proses_edit', ['filter' => 'auth']);
$routes->get('hapus-kategori/(:num)', 'C_Kategori::hapus/$1', ['filter' => 'auth']);

// Data Barang
$routes->get('tampil-barang', 'C_Barang::index', ['filter' => 'auth']);
$routes->get('detail-barang/(:num)', 'C_Barang::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-barang', 'C_Barang::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-barang', 'C_Barang::proses_tambah', ['filter' => 'auth']);
$routes->get('edit-barang/(:num)', 'C_Barang::edit/$1', ['filter' => 'auth']);
$routes->post('prosesedit-barang', 'C_Barang::proses_edit', ['filter' => 'auth']);
$routes->get('hapus-barang/(:num)', 'C_Barang::hapus/$1', ['filter' => 'auth']);

// Barang Masuk
$routes->get('tampil-barangmasuk', 'C_Barang_Masuk::index', ['filter' => 'auth']);
$routes->get('autotampildatabarangmasuk/(:num)', 'C_Barang_Masuk::tampil_otomatis_data_barang_masuk/$1', ['filter' => 'auth']);
$routes->get('detail-barangmasuk/(:num)', 'C_Barang_Masuk::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-barangmasuk', 'C_Barang_Masuk::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-barangmasuk', 'C_Barang_Masuk::proses_tambah', ['filter' => 'auth']);
$routes->get('hapus-barangmasuk/(:num)', 'C_Barang_Masuk::hapus/$1', ['filter' => 'auth']);

// Barang Keluar
$routes->get('tampil-barangkeluar', 'C_Barang_Keluar::index', ['filter' => 'auth']);
$routes->get('autotampildatabarangkeluar/(:num)', 'C_Barang_Keluar::tampil_otomatis_data_barang_keluar/$1', ['filter' => 'auth']);
$routes->get('detail-barangkeluar/(:num)', 'C_Barang_Keluar::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-barangkeluar', 'C_Barang_Keluar::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-barangkeluar', 'C_Barang_Keluar::proses_tambah', ['filter' => 'auth']);
$routes->get('hapus-barangkeluar/(:num)', 'C_Barang_Keluar::hapus/$1', ['filter' => 'auth']);

// Data Manajemen User
$routes->get('tampil-user', 'C_User::index', ['filter' => 'auth']);
$routes->get('detail-user/(:num)', 'C_User::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-user', 'C_User::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-user', 'C_User::proses_tambah', ['filter' => 'auth']);
$routes->get('edit-user/(:num)', 'C_User::edit/$1', ['filter' => 'auth']);
$routes->post('prosesedit-user', 'C_User::proses_edit', ['filter' => 'auth']);
$routes->get('hapus-user/(:num)', 'C_User::hapus/$1', ['filter' => 'auth']);

// Satuan
$routes->get('tampil-satuan', 'C_Satuan::index', ['filter' => 'auth']);
$routes->get('tambah-satuan', 'C_Satuan::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-satuan', 'C_Satuan::proses_tambah', ['filter' => 'auth']);
$routes->get('edit-satuan/(:num)', 'C_Satuan::edit/$1', ['filter' => 'auth']);
$routes->post('prosesedit-satuan', 'C_Satuan::proses_edit', ['filter' => 'auth']);
$routes->get('hapus-satuan/(:num)', 'C_Satuan::hapus/$1', ['filter' => 'auth']);

$routes->get('cekstok/(:num)', 'C_barang::cek_stok/$1', ['filter' => 'auth']);

// Permintaan
$routes->get('tampil-permintaan', 'C_Permintaan::index', ['filter' => 'auth']);
$routes->get('hapus-permintaan/(:num)', 'C_Permintaan::hapus/$1', ['filter' => 'auth']);
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

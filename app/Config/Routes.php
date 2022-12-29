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

// Routing Forgot Password
$routes->get('tampil-forgotpassword', 'C_Auth::tampil_forgot_password');
$routes->post('proses-resetpassword', 'C_Auth::validasi_forgot_password');
$routes->get('tampil-formforgotpassword/(:num)', 'C_Auth::tampil_form_forgot_password/$1');
$routes->post('proses-gantipasswordbaru', 'C_Auth::proses_form_forgot_password');
// Routing Logout
$routes->get('logout', 'C_Auth::logout');

// Routing Kategori
$routes->get('tampil-kategori', 'C_Kategori::index', ['filter' => 'auth']);
$routes->get('tambah-kategori', 'C_Kategori::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-kategori', 'C_Kategori::proses_tambah', ['filter' => 'auth']);
$routes->get('edit-kategori/(:num)', 'C_Kategori::edit/$1', ['filter' => 'auth']);
$routes->post('prosesedit-kategori', 'C_Kategori::proses_edit', ['filter' => 'auth']);
$routes->get('hapus-kategori/(:num)', 'C_Kategori::hapus/$1', ['filter' => 'auth']);

// Data Material
$routes->get('tampil-material', 'C_Material::index', ['filter' => 'auth']);
$routes->get('detail-material/(:num)', 'C_Material::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-material', 'C_Material::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-material', 'C_Material::proses_tambah', ['filter' => 'auth']);
$routes->get('edit-material/(:num)', 'C_Material::edit/$1', ['filter' => 'auth']);
$routes->post('prosesedit-material', 'C_Material::proses_edit', ['filter' => 'auth']);
$routes->get('hapus-material/(:num)', 'C_Material::hapus/$1', ['filter' => 'auth']);

// Data Kabel
$routes->get('tampil-kabel', 'C_Kabel::index', ['filter' => 'auth']);
$routes->get('tambah-kabel', 'C_Kabel::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-kabel', 'C_Kabel::proses_tambah', ['filter' => 'auth']);
$routes->get('edit-kabel/(:num)', 'C_Kabel::edit/$1', ['filter' => 'auth']);
$routes->post('prosesedit-kabel', 'C_Kabel::proses_edit', ['filter' => 'auth']);
$routes->get('hapus-kabel/(:num)', 'C_Kabel::hapus/$1', ['filter' => 'auth']);

// Material Masuk
$routes->get('tampil-materialmasuk', 'C_Material_Masuk::index', ['filter' => 'auth']);
$routes->get('autotampildatamaterialmasuk/(:num)', 'C_Material_Masuk::tampil_otomatis_data_material_masuk/$1', ['filter' => 'auth']);
$routes->get('autotampildatadetailmaterialmasuk/(:num)', 'C_Material_Masuk::tampil_otomatis_detail_data_material_masuk/$1', ['filter' => 'auth']);
$routes->get('detail-materialmasuk/(:num)', 'C_Material_Masuk::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-materialmasuk', 'C_Material_Masuk::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-materialmasuk', 'C_Material_Masuk::proses_tambah', ['filter' => 'auth']);
$routes->get('hapus-materialmasuk/(:num)', 'C_Material_Masuk::hapus/$1', ['filter' => 'auth']);

// Material Keluar
$routes->get('tampil-materialkeluar', 'C_Material_Keluar::index', ['filter' => 'auth']);
$routes->get('autotampildatamaterialkeluar/(:num)', 'C_Material_Keluar::tampil_otomatis_data_material_keluar/$1', ['filter' => 'auth']);
$routes->get('autotampildatapermintaanmaterial/(:num)', 'C_Material_Keluar::tampil_otomatis_data_wilayah_material_keluar/$1', ['filter' => 'auth']);
$routes->get('autotampildetaildatamaterialkeluar/(:num)', 'C_Material_Keluar::tampil_data_detail_material_keluar/$1', ['filter' => 'auth']);

$routes->get('autotampildatausermaterialkeluarsetelahdikirim/(:num)', 'C_Material_Keluar::tampil_data_user_setelah_dikirim/$1', ['filter' => 'auth']);
$routes->get('autotampildetaildatamaterialkeluarsetelahdikirim/(:num)', 'C_Material_Keluar::tampil_data_detail_material_keluar_setelah_dikirim/$1', ['filter' => 'auth']);

$routes->get('detail-materialkeluar/(:num)', 'C_Material_Keluar::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-materialkeluar', 'C_Material_Keluar::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-materialkeluar', 'C_Material_Keluar::proses_tambah', ['filter' => 'auth']);
$routes->get('hapus-materialkeluar/(:num)', 'C_Material_Keluar::hapus/$1', ['filter' => 'auth']);
$routes->get('cetaksuratjalan-materialkeluar/(:num)', 'C_Material_Keluar::surat_jalan/$1', ['filter' => 'auth']);

// Kabel Masuk
$routes->get('tampil-kabelmasuk', 'C_Kabel_Masuk::index', ['filter' => 'auth']);
$routes->get('autotampildatakabelmasuk/(:num)', 'C_Kabel_Masuk::tampil_otomatis_data_kabel_masuk/$1', ['filter' => 'auth']);
$routes->get('autotampildatadetailkabelmasuk/(:num)', 'C_Kabel_Masuk::tampil_otomatis_detail_data_kabel_masuk/$1', ['filter' => 'auth']);
$routes->get('detail-kabelmasuk/(:num)', 'C_Kabel_Masuk::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-kabelmasuk', 'C_Kabel_Masuk::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-kabelmasuk', 'C_Kabel_Masuk::proses_tambah', ['filter' => 'auth']);
$routes->get('hapus-kabelmasuk/(:num)', 'C_Kabel_Masuk::hapus/$1', ['filter' => 'auth']);

// Kabel Keluar
$routes->get('tampil-kabelkeluar', 'C_Kabel_Keluar::index', ['filter' => 'auth']);
$routes->get('autotampildatakabelkeluar/(:num)', 'C_Kabel_Keluar::tampil_otomatis_data_kabel_keluar/$1', ['filter' => 'auth']);
$routes->get('autotampildatapermintaankabel/(:num)', 'C_Kabel_Keluar::tampil_otomatis_data_wilayah_kabel_keluar/$1', ['filter' => 'auth']);
$routes->get('autotampildetaildatakabelkeluar/(:num)', 'C_Kabel_Keluar::tampil_data_detail_kabel_keluar/$1', ['filter' => 'auth']);
$routes->get('autotampildatauserkabelkeluarsetelahdikirim/(:num)', 'C_kabel_Keluar::tampil_data_user_setelah_dikirim/$1', ['filter' => 'auth']);
$routes->get('autotampildetaildatakabelkeluarsetelahdikirim/(:num)', 'C_kabel_Keluar::tampil_data_detail_kabel_keluar_setelah_dikirim/$1', ['filter' => 'auth']);
$routes->get('detail-kabelkeluar/(:num)', 'C_Kabel_Keluar::detail/$1', ['filter' => 'auth']);
$routes->get('tambah-kabelkeluar', 'C_Kabel_Keluar::tambah', ['filter' => 'auth']);
$routes->post('prosestambah-kabelkeluar', 'C_Kabel_Keluar::proses_tambah', ['filter' => 'auth']);
$routes->get('hapus-kabelkeluar/(:num)', 'C_Kabel_Keluar::hapus/$1', ['filter' => 'auth']);
$routes->get('cetaksuratjalan-kabelkeluar/(:num)', 'C_Kabel_Keluar::surat_jalan/$1', ['filter' => 'auth']);

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

// Profil
$routes->get('tampil-profil', 'C_User::profil', ['filter' => 'auth']);
$routes->post('prosesedit-profil', 'C_User::proses_edit_profil', ['filter' => 'auth']);
$routes->get('gantipassword-profil', 'C_User::ganti_password_profil', ['filter' => 'auth']);
$routes->post('prosesgantipassword-profil', 'C_User::proses_ganti_password_profil', ['filter' => 'auth']);

// Permintaan Material
$routes->get('tampilpermintaan-material', 'C_Permintaan::permintaan_material', ['filter' => 'auth']);
$routes->post('tambahpermintaanmaterial', 'C_Permintaan::tambah_permintaan_material', ['filter' => 'auth']);
$routes->get('detailpermintaan-material/(:num)', 'C_Permintaan::detail_permintaan_material/$1', ['filter' => 'auth']);
$routes->get('autotampildatauserhistorypermintaanmaterial/(:num)', 'C_Permintaan::tampil_data_history_permintaan_material_user/$1', ['filter' => 'auth']);
$routes->get('autotampildetaildatahistorypermintaanmaterial/(:num)', 'C_Permintaan::tampil_data_detail_history_permintaan_material/$1', ['filter' => 'auth']);
$routes->get('approvedetailpermintaan-material/(:num)', 'C_Permintaan::approve_detail_permintaan_material/$1', ['filter' => 'auth']);
$routes->get('rejectdetailpermintaan-material/(:num)', 'C_Permintaan::reject_detail_permintaan_material/$1', ['filter' => 'auth']);
$routes->get('deletedatahistorypermintaanmaterial/(:num)', 'C_Permintaan::delete_history_permintaan_material/$1', ['filter' => 'auth']);
// Permintaan Kabel
$routes->get('tampilpermintaan-kabel', 'C_Permintaan::permintaan_kabel', ['filter' => 'auth']);
$routes->post('tambahpermintaankabel', 'C_Permintaan::tambah_permintaan_kabel', ['filter' => 'auth']);
$routes->get('detailpermintaan-kabel/(:num)', 'C_Permintaan::detail_permintaan_kabel/$1', ['filter' => 'auth']);
$routes->get('autotampildatauserhistorypermintaankabel/(:num)', 'C_Permintaan::tampil_data_history_permintaan_kabel_user/$1', ['filter' => 'auth']);
$routes->get('autotampildetaildatahistorypermintaankabel/(:num)', 'C_Permintaan::tampil_data_detail_history_permintaan_kabel/$1', ['filter' => 'auth']);
$routes->get('approvedetailpermintaan-kabel/(:num)', 'C_Permintaan::approve_detail_permintaan_kabel/$1', ['filter' => 'auth']);
$routes->get('rejectdetailpermintaan-kabel/(:num)', 'C_Permintaan::reject_detail_permintaan_kabel/$1', ['filter' => 'auth']);
$routes->get('deletedatahistorypermintaankabel/(:num)', 'C_Permintaan::delete_history_permintaan_kabel/$1', ['filter' => 'auth']);
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
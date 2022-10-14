<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../template/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?= $title ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../template/assets/vendor/fonts/boxicons.css" />
    <!-- Picker Tanggal -->
    <link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/assets/vendor/libs/flatpickr/flatpickr.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="../template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../template/assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../template/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <!-- Clock Display -->
    <!-- Helpers -->
    <script src="../template/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../template/assets/js/config.js"></script>
    <!-- Confirm Delete -->
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a class="app-brand-link">
              <span class="app-brand-logo demo rounded ml-2">
                      <img src="<?= base_url('../uploads/logo.png') ?>"/>
              </span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>
          <ul class="menu-inner py-4">
            <!-- Dashboard -->
              <?php if ($title == 'Halaman Dashboard | SILOG AJS') : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('/C_Dashboard/index') ?>">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
              </a>
              </li>
            <!-- Tampilan Admin Wilayah -->
            <?php if (session()->get('jabatan') == 'Admin Wilayah') { ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU UTAMA</span></li>
            <!-- New -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
                <div data-i18n="Account Settings">Permintaan</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Permintaan material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-material') ?>">
              <div data-i18n="Analytics">Permintaan Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Permintaan kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-kabel') ?>">
              <div data-i18n="Analytics">Permintaan Kabel</div>
              </a>
              </li>
              </ul>
              </li>
              <li class="menu-header small text-uppercase"><span class="menu-header-text">LAINNYA</span></li>
            </li>
            <?php if ($title == 'Halaman Logout | SILOG AJS') : ?>
              <li class="btn menu-item active">
              <?php else : ?>
              <li class="btn menu-item">
              <?php endif; ?>
              <a class="btn menu-link" onclick="logout()">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <?php }; ?>
            <!-- Tampilan RPM -->
            <?php if (session()->get('jabatan') == 'Rpm') { ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU UTAMA</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Account Settings">Data Master</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Satuan | SILOG AJS' ||
                $title == 'Halaman Tambah Satuan | SILOG AJS' ||
                $title == 'Halaman Edit Satuan | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-satuan') ?>">
              <div data-i18n="Analytics">Satuan</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material | SILOG AJS' ||
                $title == 'Halaman Tambah Material | SILOG AJS' ||
                $title == 'Halaman Edit Material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-material') ?>">
              <div data-i18n="Analytics">Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel | SILOG AJS' ||
                $title == 'Halaman Tambah kabel | SILOG AJS' ||
                $title == 'Halaman Edit kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-kabel') ?>">
              <div data-i18n="Analytics">Kabel</div>
              </a>
              </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Transaksi</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Material Masuk| SILOG AJS' ||
                $title == 'Halaman Tambah Material Masuk| SILOG AJS' ||
                $title == 'Halaman Edit Material Masuk| SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Material Masuk</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah Material Keluar | SILOG AJS' ||
                $title == 'Halaman Edit Material Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Material Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Edit kabel Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Edit kabel Masuk | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Masuk</div>
              </a>
              </li>
              </ul>
            </li>
            <!-- New -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
                <div data-i18n="Account Settings">Permintaan</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Permintaan material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-material') ?>">
              <div data-i18n="Analytics">Permintaan Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Permintaan kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-kabel') ?>">
              <div data-i18n="Analytics">Permintaan Kabel</div>
              </a>
              </li>
              </ul>
              </li>
              <li class="menu-header small text-uppercase"><span class="menu-header-text">LAINNYA</span></li>
              <?php if ($title == 'Halaman Manajemen User | SILOG AJS') : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-user'
                                          ) ?>">
              <i class="menu-icon tf-icons bx bxs-user-badge"></i>
              <div data-i18n="Analytics">Manajemen User</div>
              </a>
            </li>
            <?php if ($title == 'Halaman Logout | SILOG AJS') : ?>
              <li class="btn menu-item active">
              <?php else : ?>
              <li class="btn menu-item">
              <?php endif; ?>
              <a class="btn menu-link" onclick="logout()">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <?php }; ?>
            <!-- Tampilan Admin Pusat -->
            <?php if (session()->get('jabatan') == 'Admin Pusat') { ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU UTAMA</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Account Settings">Data Master</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Satuan | SILOG AJS' ||
                $title == 'Halaman Tambah Satuan | SILOG AJS' ||
                $title == 'Halaman Edit Satuan | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-satuan') ?>">
              <div data-i18n="Analytics">Satuan</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material | SILOG AJS' ||
                $title == 'Halaman Tambah Material | SILOG AJS' ||
                $title == 'Halaman Edit Material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-material') ?>">
              <div data-i18n="Analytics">Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel | SILOG AJS' ||
                $title == 'Halaman Tambah kabel | SILOG AJS' ||
                $title == 'Halaman Edit kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-kabel') ?>">
              <div data-i18n="Analytics">Kabel</div>
              </a>
              </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Transaksi</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Material Masuk| SILOG AJS' ||
                $title == 'Halaman Tambah Material Masuk| SILOG AJS' ||
                $title == 'Halaman Edit Material Masuk| SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Material Masuk</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah Material Keluar | SILOG AJS' ||
                $title == 'Halaman Edit Material Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Material Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Edit kabel Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Edit kabel Masuk | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Masuk</div>
              </a>
              </li>
              </ul>
            </li>
            <!-- New -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
                <div data-i18n="Account Settings">Permintaan</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Permintaan material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-material') ?>">
              <div data-i18n="Analytics">Permintaan Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Permintaan kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-kabel') ?>">
              <div data-i18n="Analytics">Permintaan Kabel</div>
              </a>
              </li>
              </ul>
              </li>
              <li class="menu-header small text-uppercase"><span class="menu-header-text">LAINNYA</span></li>
              <?php if ($title == 'Halaman Manajemen User | SILOG AJS') : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-user'
                                          ) ?>">
              <i class="menu-icon tf-icons bx bxs-user-badge"></i>
              <div data-i18n="Analytics">Manajemen User</div>
              </a>
            </li>
            <?php if ($title == 'Halaman Logout | SILOG AJS') : ?>
              <li class="btn menu-item active">
              <?php else : ?>
              <li class="btn menu-item">
              <?php endif; ?>
              <a class="btn menu-link" onclick="logout()">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <?php }; ?>
             <!-- Tampilan PM -->
            <?php if (session()->get('jabatan') == 'PM') { ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU UTAMA</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Account Settings">Data Master</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Satuan | SILOG AJS' ||
                $title == 'Halaman Tambah Satuan | SILOG AJS' ||
                $title == 'Halaman Edit Satuan | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-satuan') ?>">
              <div data-i18n="Analytics">Satuan</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material | SILOG AJS' ||
                $title == 'Halaman Tambah Material | SILOG AJS' ||
                $title == 'Halaman Edit Material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-material') ?>">
              <div data-i18n="Analytics">Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel | SILOG AJS' ||
                $title == 'Halaman Tambah kabel | SILOG AJS' ||
                $title == 'Halaman Edit kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-kabel') ?>">
              <div data-i18n="Analytics">Kabel</div>
              </a>
              </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Transaksi</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Material Masuk| SILOG AJS' ||
                $title == 'Halaman Tambah Material Masuk| SILOG AJS' ||
                $title == 'Halaman Edit Material Masuk| SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Material Masuk</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah Material Keluar | SILOG AJS' ||
                $title == 'Halaman Edit Material Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Material Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Edit kabel Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Edit kabel Masuk | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Masuk</div>
              </a>
              </li>
              </ul>
            </li>
            <!-- New -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
                <div data-i18n="Account Settings">Permintaan</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Permintaan material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-material') ?>">
              <div data-i18n="Analytics">Permintaan Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Permintaan kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-kabel') ?>">
              <div data-i18n="Analytics">Permintaan Kabel</div>
              </a>
              </li>
              </ul>
              </li>
              <li class="menu-header small text-uppercase"><span class="menu-header-text">LAINNYA</span></li>
              <?php if ($title == 'Halaman Manajemen User | SILOG AJS') : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-user'
                                          ) ?>">
              <i class="menu-icon tf-icons bx bxs-user-badge"></i>
              <div data-i18n="Analytics">Manajemen User</div>
              </a>
            </li>
            <?php if ($title == 'Halaman Logout | SILOG AJS') : ?>
              <li class="btn menu-item active">
              <?php else : ?>
              <li class="btn menu-item">
              <?php endif; ?>
              <a class="btn menu-link" onclick="logout()">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <?php }; ?>
            <?php if (session()->get('jabatan') == 'Direktur') { ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU UTAMA</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Account Settings">Data Master</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Satuan | SILOG AJS' ||
                $title == 'Halaman Tambah Satuan | SILOG AJS' ||
                $title == 'Halaman Edit Satuan | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-satuan') ?>">
              <div data-i18n="Analytics">Satuan</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material | SILOG AJS' ||
                $title == 'Halaman Tambah Material | SILOG AJS' ||
                $title == 'Halaman Edit Material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-material') ?>">
              <div data-i18n="Analytics">Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel | SILOG AJS' ||
                $title == 'Halaman Tambah kabel | SILOG AJS' ||
                $title == 'Halaman Edit kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-kabel') ?>">
              <div data-i18n="Analytics">Kabel</div>
              </a>
              </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Transaksi</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Material Masuk| SILOG AJS' ||
                $title == 'Halaman Tambah Material Masuk| SILOG AJS' ||
                $title == 'Halaman Edit Material Masuk| SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Material Masuk</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah Material Keluar | SILOG AJS' ||
                $title == 'Halaman Edit Material Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Material Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Edit kabel Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Edit kabel Masuk | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Masuk</div>
              </a>
              </li>
              </ul>
            </li>
            <!-- New -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
                <div data-i18n="Account Settings">Permintaan</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Permintaan material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-material') ?>">
              <div data-i18n="Analytics">Permintaan Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Permintaan kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-kabel') ?>">
              <div data-i18n="Analytics">Permintaan Kabel</div>
              </a>
              </li>
              </ul>
              </li>
              <li class="menu-header small text-uppercase"><span class="menu-header-text">LAINNYA</span></li>
              <?php if ($title == 'Halaman Manajemen User | SILOG AJS') : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-user'
                                          ) ?>">
              <i class="menu-icon tf-icons bx bxs-user-badge"></i>
              <div data-i18n="Analytics">Manajemen User</div>
              </a>
            </li>
            <?php if ($title == 'Halaman Logout | SILOG AJS') : ?>
              <li class="btn menu-item active">
              <?php else : ?>
              <li class="btn menu-item">
              <?php endif; ?>
              <a class="btn menu-link" onclick="logout()">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <?php }; ?>
             <!-- Tampilan Management -->
            <?php if (session()->get('jabatan') == 'Management') { ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU UTAMA</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Account Settings">Data Master</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Satuan | SILOG AJS' ||
                $title == 'Halaman Tambah Satuan | SILOG AJS' ||
                $title == 'Halaman Edit Satuan | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-satuan') ?>">
              <div data-i18n="Analytics">Satuan</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material | SILOG AJS' ||
                $title == 'Halaman Tambah Material | SILOG AJS' ||
                $title == 'Halaman Edit Material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-material') ?>">
              <div data-i18n="Analytics">Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel | SILOG AJS' ||
                $title == 'Halaman Tambah kabel | SILOG AJS' ||
                $title == 'Halaman Edit kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-kabel') ?>">
              <div data-i18n="Analytics">Kabel</div>
              </a>
              </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Transaksi</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Material Masuk| SILOG AJS' ||
                $title == 'Halaman Tambah Material Masuk| SILOG AJS' ||
                $title == 'Halaman Edit Material Masuk| SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Material Masuk</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Material Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah Material Keluar | SILOG AJS' ||
                $title == 'Halaman Edit Material Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-materialkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Material Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Keluar | SILOG AJS' ||
                $title == 'Halaman Edit kabel Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Keluar</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Tambah kabel Masuk | SILOG AJS' ||
                $title == 'Halaman Edit kabel Masuk | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-kabelmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Kabel Masuk</div>
              </a>
              </li>
              </ul>
            </li>
            <!-- New -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
                <div data-i18n="Account Settings">Permintaan</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Permintaan material | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-material') ?>">
              <div data-i18n="Analytics">Permintaan Material</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Permintaan kabel | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampilpermintaan-kabel') ?>">
              <div data-i18n="Analytics">Permintaan Kabel</div>
              </a>
              </li>
              </ul>
              </li>
              <li class="menu-header small text-uppercase"><span class="menu-header-text">LAINNYA</span></li>
              <?php if ($title == 'Halaman Manajemen User | SILOG AJS') : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-user'
                                          ) ?>">
              <i class="menu-icon tf-icons bx bxs-user-badge"></i>
              <div data-i18n="Analytics">Manajemen User</div>
              </a>
            </li>
            <?php if ($title == 'Halaman Logout | SILOG AJS') : ?>
              <li class="btn menu-item active">
              <?php else : ?>
              <li class="btn menu-item">
              <?php endif; ?>
              <a class="btn menu-link" onclick="logout()">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <?php }; ?>
            <!-- User interface -->
            <!-- User interface -->
            <!-- Forms & Tables -->
            <!-- Forms -->
            <!-- Tables -->
            <!-- Misc -->
          </ul>
        </aside>
        <!-- Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <!-- Search -->
              <div class="rounded" style="background-color:#696CFF">
                <div class="d-flex flex-wrap justify-content-center">
                    <a><span class="badge hours"></span></a> :
                    <a><span class="badge min"></span></a> :
                    <a><span class="badge sec"></span></a>
                </div>
              </div>
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url('') ?>/uploads/<?= session()->get('foto_user'); ?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="<?= base_url('tampil-profil') ?>">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('gantipassword-profil') ?>">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Ganti Password</span>
                      </a>
                    </li> 
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../template/html/auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <!-- Render Halaman/Section Content -->
            <?= $this->renderSection('content') ?>
            <!-- / Content -->
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../template/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../template/assets/vendor/libs/popper/popper.js"></script>
    <script src="../template/assets/vendor/js/bootstrap.js"></script>
    <script src="../template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../template/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <!-- <script src="../template/assets/vendor/libs/apex-charts/apexcharts.js"></script> -->

    <!-- Main JS -->
    <script src="../template/assets/js/main.js"></script>

    <!-- Page JS -->
    <!-- <script src="../template/assets/js/dashboards-analytics.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../template/js/jquery-3.6.0.js"></script>
    <script>
    $(document).ready(function () {
      <?php if (session()->getFlashdata('status')) { ?>
      swal({
          title: "<?= session()->getFlashdata('status') ?>",
          text: "<?= session()->getFlashdata('status_text') ?>",
          icon: "<?= session()->getFlashdata('status_icon') ?>",
          button: "OK",
      });
      <?php } ?>
      });
    </script>
    <!-- Confirm logout -->
    <script>
    function logout() 
    { 
      swal({
            title:"Anda Yakin ingin logout ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
      })
      .then((willLogout) => {
         if (willLogout) {
            $.ajax({
              url: "<?php echo base_url('logout'); ?>",
              method: "GET",
            });
            location.reload();
          }
       });
    }
    </script>
    <!-- Delete Confirm Data Kategori -->
    <script>
    function deletedatakategori($id) 
    { 
      swal({
            title:"Anda Yakin ?",
            text: "Data Akan dihapus Secara Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            $.ajax({
              url: "<?php echo base_url('hapus-kategori'); ?>" + "/" + $id,
              method: "GET",
              success: function() {
                swal({    
                    icon: "success",
                });
              }
            });
            location.reload();
          }
       });
    }
    </script>
    <!-- Delete Confirm Data Satuan -->
    <script>
    function deletedatasatuan($id) 
    { 
      swal({
            title:"Anda Yakin ?",
            text: "Data Akan dihapus Secara Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            $.ajax({
              url: "<?php echo base_url('hapus-satuan'); ?>" + "/" + $id,
              method: "GET",
              success: function() {
                swal({    
                    icon: "success",
                });
              }
            });
            location.reload();
          }
       });
    }
    </script>
    <!-- Delete Confirm Data Kabel -->
    <script>
    function deletedatakabel($id) 
    { 
      swal({
            title:"Anda Yakin ?",
            text: "Data Akan dihapus Secara Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            $.ajax({
              url: "<?php echo base_url('hapus-kabel'); ?>" + "/" + $id,
              method: "GET",
              success: function() {
                swal({    
                    icon: "success",
                });
              }
            });
            location.reload();
          }
       });
    }
    </script>
    <!-- Delete Confirm Data Material -->
    <script>
    function deletedatamaterial($id) 
    { 
      swal({
            title:"Anda Yakin ?",
            text: "Data Akan dihapus Secara Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            $.ajax({
              url: "<?php echo base_url('hapus-material'); ?>" + "/" + $id,
              method: "GET",
              success: function() {
                swal({    
                    icon: "success",
                });
              }
            });
            location.reload();
          }
       });
    }
    </script>
    <!-- Delete Confirm Data User -->
    <script>
    function deletedatauser($id) 
    { 
      swal({
            title:"Anda Yakin ?",
            text: "Data Akan dihapus Secara Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            $.ajax({
              url: "<?php echo base_url('hapus-user'); ?>" + "/" + $id,
              method: "GET",
              success: function() {
                swal({    
                    icon: "success",
                });
              }
            });
            location.reload();
          }
       });
    }
    </script>
    <!-- Delete Confirm Data Kabel Keluar -->
    <script>
    function deletedatakabelkeluar($id) 
    { 
      swal({
            title:"Anda Yakin ?",
            text: "Data Akan dihapus Secara Permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
      })
      .then((willDelete) => {
         if (willDelete) {
            $.ajax({
              url: "<?php echo base_url('hapus-kabelkeluar'); ?>" + "/" + $id,
              method: "GET",
              success: function() {
                swal({    
                    icon: "success",
                });
              }
            });
            location.reload();
          }
       });
    }
    </script>
    <!-- Memunculkan Preview Foto -->
    <script>
        $("#inputFile").change(function(event) {
            fadeInAdd();
            getURL(this);
        });

        $("#inputFile").on('click', function(event) {
            fadeInAdd();
        });

        function getURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#inputFile").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    debugger;
                    $('#imgView').attr('src', e.target.result);
                    $('#imgView').hide();
                    $('#imgView').fadeIn(500);
                    $('.custom-file-label').text(filename);
                }
                reader.readAsDataURL(input.files[0]);
            }
            $(".alert").removeClass("loadAnimate").hide();
        }

        function fadeInAdd() {
            fadeInAlert();
        }

        function fadeInAlert(text) {
            $(".alert").text(text).addClass("loadAnimate");
        }
    </script>
        <!-- Mendapatkan Kalkulasi Total Stok Material Keluar -->
        <script type="text/javascript">
          <?php $request = \Config\Services::request(); ?>
          let hal = '<?= $request->uri->getSegment(1) ?>';
          let hal_panjang_keluar = '<?= $request->uri->getSegment(1) ?>';
          let serial_number = $('#serial_number');
          let nama_satuan = $('#nama_satuan');
          let nama = $('#nama');
          let no_drum = $('#no_drum');
          let core = $('#core');
          let stok = $('#stok');
          let total_stok = $('#total_stok');
          let foto_serial_number = $('#foto_serial_number');
          let jumlah = hal == 'tampil-materialkeluar' ? $('#jumlah_masuk') : $('#jumlah_keluar');
          let panjang = $('#panjang');
          let total_panjang = $('#total_panjang');
          let panjang_keluar = hal_panjang_keluar == 'tampil-kabelkeluar' ? $('#panjang_masuk') : $('#panjang_keluar');
          let wilayah = $('#wilayah');

        // Mendapatkan Kalkulasi Target Nama Material
        $(document).on('change', '#nama_material', function() {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo base_url('autotampildatamaterialkeluar'); ?>" + "/" + id,
              method: "GET",
              dataType: 'json',
              success: function(data) {
                serial_number.val(data.serial_number);
                nama_satuan.val(data.nama_satuan);
                stok.val(data.stok);
                total_stok.val(data.stok);
                foto_serial_number.html("<img src='../uploads/" + data.foto_serial_number + "'width='200px' height='200px'>");
                jumlah.focus();
              }
            });
        });

        // Mendapatkan Kalkulasi Target Nama Kabel
        $(document).on('change', '#no_drum', function() {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo base_url('autotampildatakabelkeluar'); ?>" + "/" + id,
              method: "GET",
              dataType: 'json',
              success: function(data) {
                serial_number.val(data.serial_number);
                nama_satuan.val(data.nama_satuan);
                panjang.val(data.panjang);
                total_panjang.val(data.panjang);
                foto_serial_number.html("<img src='../uploads/" + data.foto_serial_number + "'width='200px' height='200px'>");
                panjang_keluar.focus();
              }
            });
        });

        $(document).on('change', '#id_permintaan_material', function() {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo base_url('autotampildatapermintaanmaterial'); ?>" + "/" + id,
              method: "GET",
              dataType: 'json',
              success: function(data) {
                wilayah.val(data.wilayah);
              }
            });
        });
        
        $(document).on('change', '#id_permintaan_kabel', function() {
          var id = $(this).val();
          
          $.ajax({
              url: "<?php echo base_url('autotampildatapermintaankabel'); ?>" + "/" + id,
              method: "GET",
              dataType: 'json',
              success: function(data) {
                wilayah.val(data.wilayah);
                nama.val(data.nama);
                for(i=0; i<data.length; i++){
                  data[i].no_drum.val(data.no_drum);
                  data[i].core.val(data.core);
                  data[i].panjang.val(data.panjang);
                }
              }
            });
          });

        $(document).on('keyup', '#jumlah_masuk', function() {
            let totalStok = parseInt(stok.val()) + parseInt(this.value);
            total_stok.val(Number(totalStok));
        });

        $(document).on('keyup', '#jumlah_keluar', function() {
            let totalStok = parseInt(stok.val()) - parseInt(this.value);
            total_stok.val(Number(totalStok));
        });

        $(document).on('keyup', '#panjang_masuk', function() {
            let totalPanjang = parseInt(panjang.val()) + parseInt(this.value);
            total_panjang.val(Number(totalPanjang));
        });

        $(document).on('keyup', '#panjang_keluar', function() {
            let totalPanjang = parseInt(panjang.val()) - parseInt(this.value);
            total_panjang.val(Number(totalPanjang));
        });
    </script>
    <script>
      $(document).ready(function() {
      setInterval( function() {
      var hours = new Date().getHours();
      $(".hours").html(( hours < 10 ? "0" : "" ) + hours);
      }, 1000);
      setInterval( function() {
      var minutes = new Date().getMinutes();
      $(".min").html(( minutes < 10 ? "0" : "" ) + minutes);
      },1000);
      setInterval( function() {
      var seconds = new Date().getSeconds();
      $(".sec").html(( seconds < 10 ? "0" : "" ) + seconds);
      },1000);
      });
    </script>
    <!-- Picker Tanggal -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <!-- Data Tables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="../template/assets/vendor/demo/datatables-demo.js"></script>
    <script>
      flatpickr('#flatpickrdate');
    </script>
    <!-- Modal Detail Item Kabel yang akan keluar -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Kabel yang diminta</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="content-wrapper">
        <!-- Content -->
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                <!-- <div class="col-md-1"> -->
                <!-- Form Error -->
                <!-- </div> -->
                <!-- </div> -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped w-100 dt-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Drum</th>
                                    <th>Core</th>
                                    <th>Jumlah Keluar</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <td>1</td>
                                <td>KB-343</td>
                                <td>Core</td>
                                <td>200 Meter</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Basic Bootstrap Table -->

            <!--/ Borderless Table -->

            <!-- Hoverable Table rows -->
            <!--/ Hoverable Table rows -->

            <!-- Small table -->
            <!--/ Small table -->

            <!-- Contextual Classes -->
            <!--/ Contextual Classes -->

            <!-- Table within card -->
            <!--/ Table within card -->

            <!-- Responsive Table -->
            <!--/ Responsive Table -->
        <!-- / Content -->
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
        </div>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
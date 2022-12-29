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
    <link rel="icon" type="image/x-icon" href="../template/assets/img/favicon/logo.ico" />

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <link href="../template/assets/css/font-web.css" rel="stylesheet"/>
    <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="../template/assets/css/dataTable/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../template/assets/css/dataTable/buttons.dataTables.min.css">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../template/assets/vendor/fonts/boxicons.css" />
    <!-- Picker Tanggal -->
    <link rel="stylesheet" href="../template/assets/css/flatpickr.css" />
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
    <link rel="manifest" href="../manifest.json">

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../template/assets/js/config.js"></script>
    <!-- Confirm Delete -->
  </head>

  <body>

  <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Halaman Ganti Password Baru</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Halaman Ganti Password Baru</h5>
                </div>
                <div class="card-body">
                <?php $validation = \Config\Services::validation(); $this->encryption = \Config\Services::encrypter(); $request = \Config\Services::request(); ?>
                    <form method="POST" action="<?= base_url("proses-gantipasswordbaru") ?>">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= $tampildata->id;?>">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" id="basic-default-company"
                                placeholder="Masukan password baru disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('password_baru')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('password_baru'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Konfirmasi Password</label>
                            <input type="password" name="konfirmasi_password" class="form-control"
                                id="basic-default-company" placeholder="Masukan konfirmasi password disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('konfirmasi_password')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('konfirmasi_password'); ?>
                        </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Picker Tanggal -->
    <script src="../template/assets/js/flatpickr.js"></script>
    <!-- Data Tables -->
    <script type="text/javascript" charset="utf8" src="../template/assets/js/dataTable/jquery.dataTables.js"></script>
    <script src="../template/assets/js/dataTable/dataTables.buttons.min.js"></script>
    <script src="../template/assets/js/dataTable/jszip.min.js"></script>
    <script src="../template/assets/js/dataTable/pdfmake.min.js"></script>
    <script src="../template/assets/js/dataTable/vfs_fonts.js"></script>
    <script src="../template/assets/js/dataTable/buttons.html5.min.js"></script>
    <script src="../template/assets/js/dataTable/buttons.print.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="../template/assets/vendor/demo/datatables-demo.js"></script>
    <script>
      flatpickr('#flatpickrdate');
    </script>
    <!-- Load PWA -->
    <script>
     window.onload = () => {
        'use strict';

        if ('serviceWorker' in navigator) {
          navigator.serviceWorker
                  .register('../serviceworker.js');
        }
    }
    </script>
  </body>
</html>
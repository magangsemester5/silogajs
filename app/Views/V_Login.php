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
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-template-assets-path="../template/assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Halaman Login | Silog AJS</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../template/assets/img/favicon/logo.ico" />

    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <link href="../template/assets/css/font-web.css" rel="stylesheet"/>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../template/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../template/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../template/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../template/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../template/template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../template/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../template/assets/vendor/js/helpers.js"></script>
    <link rel="manifest" href="../manifest.json">
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../template/assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                  <img src="<?= base_url('../uploads/logo.png') ?>"/>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Login Aplikasi Silog AJS</h4>
              <p class="mb-4">Silakan masuk ke akun Anda dan mulai bekerja</p>
 
              <form method="post" class="mb-3" action="<?= base_url('proses_login'); ?>">
                <div class="mb-3">
                  <label for="id" class="form-label">ID</label>
                  <input type="text" name="id_user" id="id_user" placeholder="Masukan ID Anda" class="form-control" required autofocus>
                </div>
                <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="<?= base_url('tampil-forgotpassword') ?>">
                      <small>Lupa Password ?</small>
                    </a>
                </div>
                  <div class="input-group input-group-merge">
                  <input type="password" name="password" id="password" placeholder="Masukan password Anda" class="form-control" required autofocus>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="g-recaptcha mt-3 mb-3" data-sitekey="6LcYuisjAAAAAPLFgwZIcari9MRqli1oQMZ7iYgz"></div>  
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                </div>
              </form>          
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
    <!-- / Content -->
    <!-- Core JS -->
    <!-- build:js template/assets/vendor/js/core.js -->
    <script src="../template/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../template/assets/vendor/libs/popper/popper.js"></script>
    <script src="../template/assets/vendor/js/bootstrap.js"></script>
    <script src="../template/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../template/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../template/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="../template/assets/js/buttons-io.js"></script>
    <!-- Sweet Alert -->
    <script src="../template/assets/js/sweetalert2.min.js"></script>
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
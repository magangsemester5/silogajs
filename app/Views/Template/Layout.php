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
            <!-- Tampilan Admin -->
            <?php if (session()->get('kriteria') == 'Admin') { ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU UTAMA</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Account Settings">Data Master</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Kategori | SILOG AJS' ||
                $title == 'Halaman Tambah Kategori | SILOG AJS' ||
                $title == 'Halaman Edit Kategori | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-kategori') ?>">
              <div data-i18n="Analytics">Kategori</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Barang | SILOG AJS' ||
                $title == 'Halaman Tambah Barang | SILOG AJS' ||
                $title == 'Halaman Edit Barang | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-barang') ?>">
              <div data-i18n="Analytics">Barang</div>
              </a>
              </li>
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
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Transaksi</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                $title == 'Halaman Barang Masuk| SILOG AJS' ||
                $title == 'Halaman Tambah Barang Masuk| SILOG AJS' ||
                $title == 'Halaman Edit Barang Masuk| SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-barangmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Barang Masuk</div>
              </a>
              </li>
              <?php if (
                $title == 'Halaman Barang Keluar | SILOG AJS' ||
                $title == 'Halaman Tambah Barang Keluar | SILOG AJS' ||
                $title == 'Halaman Edit Barang Keluar | SILOG AJS'
              ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-barangkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Barang Keluar</div>
              </a>
              </li>
              </ul>
            </li>
            <?php if ($title == 'Halaman Permintaan | SILOG AJS') : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-permintaan'
                                          ) ?>">
              <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
              <div data-i18n="Analytics">Permintaan</div>
              </a>
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
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('logout') ?>">
              <i class="menu-icon tf-icons bx bx-log-out"></i>
              <div data-i18n="Analytics">Logout</div>
              </a>
            </li>
            <?php }; ?>
             <!-- Tampilan Supervisor -->
             <?php if (session()->get('kriteria') == 'Supervisor') { ?>
            <li class="menu-header small text-uppercase"><span class="menu-header-text">MENU UTAMA</span></li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-server"></i>
                <div data-i18n="Account Settings">Data Master</div>
              </a>
              <ul class="menu-sub">
              <?php if (
                  $title == 'Halaman Kategori | SILOG AJS'
                ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-kategori') ?>">
              <div data-i18n="Analytics">Kategori</div>
              </a>
              </li>
              <?php if (
                  $title == 'Halaman Barang | SILOG AJS'
                ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-barang') ?>">
              <div data-i18n="Analytics">Barang</div>
              </a>
              </li>
              <?php if (
                  $title == 'Halaman Satuan | SILOG AJS'
                ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('tampil-satuan') ?>">
              <div data-i18n="Analytics">Satuan</div>
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
                  $title == 'Halaman Barang Masuk| SILOG AJS'
                ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-barangmasuk'
                                          ) ?>">
              <div data-i18n="Analytics">Barang Masuk</div>
              </a>
              </li>
              <?php if (
                  $title == 'Halaman Barang Keluar | SILOG AJS'
                ) : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-barangkeluar'
                                          ) ?>">
              <div data-i18n="Analytics">Barang Keluar</div>
              </a>
              </li>
              </ul>
            </li>
            <?php if ($title == 'Halaman Permintaan | SILOG AJS') : ?>
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url(
                                            'tampil-permintaan'
                                          ) ?>">
              <i class="menu-icon tf-icons bx bx-git-pull-request"></i>
              <div data-i18n="Analytics">Permintaan</div>
              </a>
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
              <li class="menu-item active">
              <?php else : ?>
              <li class="menu-item">
              <?php endif; ?>
              <a class="menu-link" href="<?= base_url('logout') ?>">
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

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url('')?>/uploads/<?= session()->get('foto_user');?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <!-- <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../template/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
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
                  </ul> -->
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
    <!-- Delete Confirm Data Barang -->
    <script>
        $(document).ready(function(){
            $(document).on('click',"#del",function(e) {
                e.preventDefault();
                var del = $(this).data('id');
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
                            url : "hapus-barang/" + del,
                            type : "GET",
                            data : {id:del},
                            success : function() {
                                swal({
                                    title: "Sukses",
                                    text: "Data barang berhasil dihapus",
                                    icon: "success",
                                }); 
                            }
                        });
                        location.reload();
                    }
                });
            });
        });
    </script>
    <!-- Memunculkan Preview Foto    -->
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
        <!-- Mendapatkan Kalkulasi Total Stok -->
        <script type="text/javascript">
          <?php $request = \Config\Services::request(); ?>
          let hal = '<?= $request->uri->getSegment(1) ?>';
          let serial_number = $('#serial_number');
          let nama_satuan = $('#nama_satuan');
          let stok = $('#stok');
          let total = $('#total_stok');
          let foto_serial_number = $('#foto_serial_number');
          let jumlah = hal == 'tampil-barangkeluar' ? $('#jumlah_masuk') : $('#jumlah_keluar');
          let wilayah = $('#wilayah');

        $(document).on('change', '#nama_barang', function() {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo base_url('autotampildatabarangkeluar'); ?>" + "/" + id,
              method: "GET",
              dataType: 'json',
              success: function(data) {
                serial_number.val(data.serial_number);
                nama_satuan.val(data.nama_satuan);
                stok.val(data.stok);
                total.val(data.stok);
                foto_serial_number.html("<img src='../uploads/" + data.foto_serial_number + "'width='200px' height='200px'>");
                jumlah.focus();
              }
            });
        });

        $(document).on('change', '#id_permintaan', function() {
          var id = $(this).val();
          $.ajax({
              url: "<?php echo base_url('autotampildatapermintaan'); ?>" + "/" + id,
              method: "GET",
              dataType: 'json',
              success: function(data) {
                wilayah.val(data.wilayah);
              }
            });
        });

        $(document).on('keyup', '#jumlah_masuk', function() {
            let totalStok = parseInt(stok.val()) + parseInt(this.value);
            total.val(Number(totalStok));
        });

        $(document).on('keyup', '#jumlah_keluar', function() {
            let totalStok = parseInt(stok.val()) - parseInt(this.value);
            total.val(Number(totalStok));
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
  </body>
</html>
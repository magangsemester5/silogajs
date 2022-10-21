<?= $this->extend('Template/layout') ?>
<?= $this->Section('content') ?>
<?php if (session()->get('jabatan') == 'Admin Wilayah') { ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang <?= session()->get('nama'); ?> (Admin
                                Wilayah <?= session()->get('wilayah'); ?>)</h5>
                            <p class="mb-4">
                                di Sistem Logistik Arkatama Jaya Sakti, Semoga Sukses dan Sehat selalu
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../template/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Permintaan Wilayah</span>
                            <h3 class="card-title mb-2"><?= $data_material ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Admin Wilayah Keseluruhan</span>
                            <h3 class="card-title mb-2"><?= $user_admin_wilayah ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<?php if (session()->get('jabatan') == 'Rpm') { ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang <?= session()->get('nama'); ?> (RPM
                                <?= session()->get('wilayah'); ?>)</h5>
                            <p class="mb-4">
                                di Sistem Logistik Arkatama Jaya Sakti, Semoga Sukses dan Sehat selalu
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../template/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Material </span>
                            <h3 class="card-title mb-2"><?= $data_material ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Kabel</span>
                            <h3 class="card-title mb-2"><?= $data_kabel ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <!-- </div>
                <div class="row"> -->
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<?php if (session()->get('jabatan') == 'Admin Pusat') { ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang <?= session()->get('nama'); ?> (Admin
                                Pusat)</h5>
                            <p class="mb-4">
                                di Sistem Logistik Arkatama Jaya Sakti, Semoga Sukses dan Sehat selalu
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../template/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Material </span>
                            <h3 class="card-title mb-2"><?= $data_material ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Kabel</span>
                            <h3 class="card-title mb-2"><?= $data_kabel ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Jumlah Keseluruhan User</span>
                            <h3 class="card-title mb-2"><?= $user_keseluruhan ?></h3>
                        </div>
                    </div>
                </div>
                <!-- </div>
                <div class="row"> -->
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<?php if (session()->get('jabatan') == 'PM') { ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang <?= session()->get('nama'); ?> (PM)</h5>
                            <p class="mb-4">
                                di Sistem Logistik Arkatama Jaya Sakti, Semoga Sukses dan Sehat selalu
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../template/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Material </span>
                            <h3 class="card-title mb-2"><?= $data_material ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Kabel</span>
                            <h3 class="card-title mb-2"><?= $data_kabel ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../template/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                            class="rounded" />
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Jumlah Keseluruhan User</span>
                                <h3 class="card-title mb-2"><?= $user_keseluruhan ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div>
                <div class="row"> -->
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<?php if (session()->get('jabatan') == 'Direktur') { ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang <?= session()->get('nama'); ?> (Direktur)
                            </h5>
                            <p class="mb-4">
                                di Sistem Logistik Arkatama Jaya Sakti, Semoga Sukses dan Sehat selalu
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../template/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Material </span>
                            <h3 class="card-title mb-2"><?= $data_material ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Kabel</span>
                            <h3 class="card-title mb-2"><?= $data_kabel ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Jumlah Keseluruhan User</span>
                            <h3 class="card-title mb-2"><?= $user_keseluruhan ?></h3>
                        </div>
                    </div>
                </div>
                <!-- </div>
                <div class="row"> -->
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<?php if (session()->get('jabatan') == 'Management') { ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang <?= session()->get('nama'); ?>
                                (Management)</h5>
                            <p class="mb-4">
                                di Sistem Logistik Arkatama Jaya Sakti, Semoga Sukses dan Sehat selalu
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../template/assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Material </span>
                            <h3 class="card-title mb-2"><?= $data_material ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Data Kabel</span>
                            <h3 class="card-title mb-2"><?= $data_kabel ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Masuk</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-6 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Material Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Kabel Keluar</span>
                            <h3 class="card-title text-nowrap mb-2"></h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="../template/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Jumlah Keseluruhan User</span>
                            <h3 class="card-title mb-2"><?= $user_keseluruhan ?></h3>
                        </div>
                    </div>
                </div>
                <!-- </div>
                <div class="row"> -->
            </div>
        </div>
    </div>
</div>
<?php }; ?>
<?= $this->endSection('content') ?>
<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Barang Keluar</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="fw-bold">Data Barang Keluar</h6>
                </div>
                <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                    <!-- <div class="col-md-1"> -->
                    <!-- Form Error -->
                    <!-- </div> -->
                <!-- </div> -->
                <div class="card-body">
                    <a href="<?= base_url('tambah-barangkeluar'); ?>" class="btn btn-info btn-icon-split mb-3 mt-1">
                        <span class="icon text-green-50">
                            <i class="bx bx-plus-circle me-1"></i>
                        </span>
                        <span class="text">Tambah Barang Keluar</span>
                    </a>
                    <a href="<?= base_url('C_Barang/export'); ?>" class="btn btn-warning btn-icon-split mb-3 mt-1">
                        <span class="icon text-green-50">
                            <i class="bx bxs-file-blank"></i>
                        </span>
                        <span class="text">Export PDF</span>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang Keluar</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1; foreach ($tampildata as $td) : ?>
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $no++ ?></strong></td>
                                        <td><?= $td->kode_barang_keluar ?></td>
                                        <td><?= $td->nama_barang ?></td>
                                        <td><?= $td->qty ?></td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="<?= base_url("detail-barangkeluar/$td->id_barang_keluar"); ?>"><i class="bx bx-show-alt"></i>Detail</a>
                                            <a class="btn btn-warning btn-sm" href="<?= base_url("prosesedit-barangkeluar/$td->id_barang_keluar"); ?>"><i class="bx bx-edit-alt"></i> Edit</a>
                                            <a class="btn btn-danger btn-sm" href="<?= base_url("hapus-barangkeluar/$td->id_barang_keluar"); ?>"><i class="bx bx-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                            </tbody>
                        <?php endforeach; ?>
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
        </div>
        <!-- / Content -->
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    <?= $this->endSection('content') ?>
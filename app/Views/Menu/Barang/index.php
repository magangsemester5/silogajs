<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Barang</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="fw-bold">Data Barang</h6>
                </div>
                <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                    <!-- <div class="col-md-1"> -->
                    <!-- Form Error -->
                    <!-- </div> -->
                <!-- </div> -->
                <div class="card-body">
                    <a href="<?= base_url('tambah-barang'); ?>" class="btn btn-info btn-icon-split mb-3 mt-1">
                        <span class="icon text-green-50">
                            <i class="bx bx-plus-circle me-1"></i>
                        </span>
                        <span class="text">Tambah Barang</span>
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
                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori Barang</th>
                                    <th>Stok</th>
                                    <th>Satuan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php foreach ($tampildata as $td) : ?>
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $td->id_barang ?></strong></td>
                                        <td><?= $td->nama_barang ?></td>
                                        <td><?= $td->nama_kategori ?></td>
                                        <td><?= $td->stok ?></td>
                                        <td><?= $td->nama_satuan ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= base_url("prosesedit-barang/$td->id_barang"); ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="btn btn-danger" href="<?= base_url("hapus-barang/$td->id_barang"); ?>"><i class="bx bx-trash me-1"></i> Delete</a>
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
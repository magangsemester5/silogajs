<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Permintaan</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="fw-bold">Data Permintaan</h6>
                </div>
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
                                    <th>No Permintaan</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Permintaan</th>
                                    <th>Wilayah</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                                foreach ($tampildata as $td) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $td->no_permintaan ?></td>
                                        <td><?= $td->nama_barang ?></td>
                                        <td><?= $td->jumlah_permintaan ?></td>
                                        <td><?= $td->wilayah ?></td>
                                        <td><?= $td->status ?></td>
                                        <?php if (session()->get('kriteria') == 'Admin') { ?>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="<?= base_url("status-permintaan/$td->id_barang"); ?>"><i class="bx bx-show-alt"></i>Aprove/Reject</a>
                                                <a class="btn btn-info btn-sm" href="<?= base_url("detail-permintaan/$td->id_barang"); ?>"><i class="bx bx-show-alt"></i>Detail</a>
                                                <a class="btn btn-danger btn-sm" href="<?= base_url("hapus-permintaan/$td->id_barang"); ?>"><i class="bx bx-trash"></i>Hapus History</a>
                                            </td>
                                        <?php } ?>
                                        <?php if (session()->get('kriteria') == 'Supervisor') { ?>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="<?= base_url("status-permintaan/$td->id_barang"); ?>"><i class="bx bx-show-alt"></i>Aprove/Reject</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php endforeach; ?>
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
        </div>
        <!-- / Content -->
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    <?= $this->endSection('content') ?>
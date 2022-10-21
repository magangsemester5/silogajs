<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman kabel</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="fw-bold">Data kabel</h6>
                </div>
                <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                <!-- <div class="col-md-1"> -->
                <!-- Form Error -->
                <!-- </div> -->
                <!-- </div> -->
                <div class="card-body">
                    <?php if (session()->get('kriteria') == 'Admin Pusat') { ?>
                    <a href="<?= base_url('tambah-kabel'); ?>" class="btn btn-info btn-icon-split mb-3">
                        <span class="icon text-green-50">
                            <i class="bx bx-plus-circle me-1"></i>
                        </span>
                        <span class="text">Tambah kabel</span>
                    </a>
                    <?php } ?>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped w-100 dt-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Drum</th>
                                    <th>Core</th>
                                    <th>Panjang</th>
                                    <th>Serial Number</th>
                                    <th>Foto Serial Number</th>
                                    <?php if (session()->get('kriteria') == 'Admin Pusat') { ?>
                                    <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                                foreach ($tampildata as $td) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $td->no_drum ?></td>
                                    <td><?= $td->core ?></td>
                                    <td><?= $td->panjang ?>&nbsp<?= $td->nama_satuan ?></td>
                                    <td><?= $td->serial_number ?></td>
                                    <td>
                                        <img src="<?= base_url("../uploads/$td->foto_serial_number") ?>" width="100">
                                    </td>
                                    <td>
                                        <?php if (session()->get('jabatan') == 'Admin Pusat') { ?>
                                        <a class="btn btn-warning btn-sm"
                                            href="<?= base_url("edit-kabel/$td->id_kabel"); ?>"><i
                                                class="bx bx-edit-alt"></i>Edit</a>
                                        <a class="btn btn-danger btn-sm" style="color:white"
                                            onclick="deletedatakabel(<?= $td->id_kabel ?>)"><i
                                                class="bx bx-trash"></i>Hapus</a>
                                        <?php } ?>
                                    </td>
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
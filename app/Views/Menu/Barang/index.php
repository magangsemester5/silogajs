<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Barang</h4>
            <!-- Basic Bootstrap Table -->
            <a class="btn btn-primary" href="<?= base_url('C_Barang/tambah'); ?>"><i class="bx bx-plus-circle me-1"></i>Tambah Data</a>
            <b><hr size="5"></b>
            <div class="card">
                <h5 class="card-header">Table Barang</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>ID Kategori Barang</th>
                                <th>ID Satuan Barang</th>
                                <th>Harga Barang</th>
                                <th>Gambar Barang</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php $no = 0; foreach ($tampildata as $td) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $td['brgkode'] ?></td>
                                    <td><?= $td['brgnama'] ?></td>
                                    <td><?= $td['brgkatid'] ?></td>
                                    <td><?= $td['brgsatid'] ?></td>
                                    <td><?= $td['brgharga'] ?></td>
                                    <td><?= $td['brggambar'] ?></td>
                                    <td>
                                        <a class="" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="" href=""><i class="bx bx-trash me-1"></i> Delete</a>
                                    </td>
                                </tr>
                        </tbody>
                    <?php endforeach; ?>
                    </table>
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
<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Kategori</h4>
            <!-- Basic Bootstrap Table -->
            <a class="btn btn-primary" href="<?= base_url('C_Kategori/tambah'); ?>"><i class="bx bx-plus-circle me-1"></i>Tambah Data</a>
            <b><hr size="5"></b>
            <div class="card">
                <h5 class="card-header">Table Kategori</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php foreach ($tampildata as $td) : ?>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $td->katid ?></strong></td>
                                    <td><?= $td->katnama ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="<?= base_url("C_Kategori/tampil_edit_data/$td->katid");?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="btn btn-danger" href=""><i class="bx bx-trash me-1"></i> Delete</a>
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
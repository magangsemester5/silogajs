<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Detail Permintaan Kabel</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="fw-bold">Data Detail Permintaan Kabel</h6>
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
                                    <td>No</td>
                                    <td>Nama Admin Wilayah</td>
                                    <th>Nomor Drum</th>
                                    <th>Panjang</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                                foreach ($tampildata as $td1) : ?>
                                    <?php
                                    foreach ($tampildatarelasi as $td) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $td1->nama ?></td>
                                            <td><?= $td->no_drum ?></td>
                                            <td><?= $td->panjang ?></td>
                                        </tr>
                                    <?php endforeach; ?>
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
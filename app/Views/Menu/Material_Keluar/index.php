<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman material Keluar</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="fw-bold">Data material Keluar</h6>
                </div>
                <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                <!-- <div class="col-md-1"> -->
                <!-- Form Error -->
                <!-- </div> -->
                <!-- </div> -->
                <div class="card-body">
                    <?php if (session()->get('kriteria') == 'Admin Pusat') { ?>
                    <a href="<?= base_url('tambah-materialkeluar'); ?>" class="btn btn-info btn-icon-split mb-3">
                        <span class="icon text-green-50">
                            <i class="bx bx-plus-circle me-1"></i>
                        </span>
                        <span class="text">Tambah material Keluar</span>
                    </a>
                    <?php } ?>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped w-100 dt-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No Permintaan</th>
                                    <th>Nama Peminta</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                                foreach ($tampildata as $td) : ?>
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong><?= $no++ ?></strong>
                                    </td>
                                    <td><?= $td->tanggal_keluar ?></td>
                                    <td><?= $td->no_permintaan ?></td>
                                    <td><?= $td->nama ?></td>
                                    <td>
                                        <?php if (session()->get('jabatan') == 'Rpm') { ?>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detaildatamaterialkeluar"
                                            data-id="<?= $td->id_material_keluar ?>"><i
                                                class="bx bx-show-alt"></i>Detail</button>
                                        <?php } ?>
                                        <?php if (session()->get('jabatan') == 'Admin Pusat') { ?>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detaildatamaterialkeluar"
                                            data-id="<?= $td->id_material_keluar ?>"><i
                                                class="bx bx-show-alt"></i>Detail</button>
                                        <a class="btn btn-danger btn-sm" style="color:white"
                                            onclick="deletedatamaterialkeluar(<?= $td->id_material_keluar ?>)"><i
                                                class="bx bx-trash"></i>Hapus History</a>
                                        <?php } ?>
                                        <?php if (session()->get('jabatan') == 'PM') { ?>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detaildatamaterialkeluar"
                                            data-id="<?= $td->id_material_keluar ?>"><i
                                                class="bx bx-show-alt"></i>Detail</button>
                                        <?php } ?>
                                        <?php if (session()->get('jabatan') == 'Direktur') { ?>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detaildatamaterialkeluar"
                                            data-id="<?= $td->id_material_keluar ?>"><i
                                                class="bx bx-show-alt"></i>Detail</button>
                                        <?php } ?>
                                        <?php if (session()->get('jabatan') == 'Management') { ?>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detaildatamaterialkeluar"
                                            data-id="<?= $td->id_material_keluar ?>"><i
                                                class="bx bx-show-alt"></i>Detail</button>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal Detail Item material yang akan keluar -->
            <!-- Modal -->
            <div class="modal fade" id="detaildatamaterialkeluar" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail material yang diminta
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="content-wrapper">
                                <!-- Content -->
                                <!-- Basic Bootstrap Table -->
                                <div class="card shadow mb-4">
                                    <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                                    <!-- <div class="col-md-1"> -->
                                    <!-- Form Error -->
                                    <!-- </div> -->
                                    <!-- </div> -->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped w-20 dt-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Material</th>
                                                        <th>Jumlah Keluar</th>
                                                        <!-- <th>Serial Number</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="isitabeldetailmaterialkeluar" class="table-border-bottom-0"
                                                    style="background-color:#D9DEE3">
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
                                <!-- / Content -->
                                <!-- / Footer -->

                                <div class="content-backdrop fade"></div>
                            </div>
                            <label>Wilayah : </label>
                            <input type="text"
                                style="width:90px;border:0; background: transparent;outline:none;color:#697A8D;"
                                readonly id="wilayah" />
                            <br>
                            <label class="foto_penerima">Foto Pengambilan Kabel :</label>
                            <div id="foto_penerima">
                            </div>
                            <h8>Data kabel yang ada pada tabel diatas ialah data yang sudah diapprove oleh
                                Direktur</h8>
                        </div>
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
<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Permintaan Kabel</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <?php if (session()->get('jabatan') == 'Admin Wilayah') { ?>
                <div class="card-header py-3 mt-2">
                    <h6 class="fw-bold fs-5">Form Permintaan Kabel</h6>
                </div>
                <div class="card-body">
                    <form action="#" method="POST" id="add_form">
                        <div class="form-group">
                            <div class="col-xl-2">
                                <label>No Permintaan</label>
                                <input type="text" class="form-control" name="no_permintaan" id="no_permintaan" />
                            </div>
                        </div>
                        <div id="show_item">
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" name="no_drum[]"
                                        placeholder="Pilih Nomor Drum" aria-label="Pilih Nomor Drum">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="panjang[]"
                                        placeholder="Masukan Panjang Kabel" aria-label="Masukan Panjang Kabel">
                                </div>
                                <div class="col">
                                    <button class="btn btn-success add_item_btn">Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="col-xl-2">
                                <label>Wilayah</label>
                                <input type="text" readonly class="form-control"
                                    value="<?= session()->get('wilayah') ?>" />
                            </div>
                        </div>
                        <input type="submit" value="Add" class="btn btn-primary float-right mt-3" id="add_btn">
                    </form>
                </div>
            </div>
            <?php } ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3 mt-2">
                    <h6 class="fw-bold fs-5">Data Permintaan Kabel</h6>
                </div>
                <div class="card-body">
                    <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                    <!-- <div class="col-md-1"> -->
                    <!-- Form Error -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped w-100 dt-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Permintaan</th>
                                    <th>Nama Peminta</th>
                                    <th>Wilayah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                            foreach ($tampildata as $td) : ?>
                                <?php if (session()->get('jabatan') == ('Admin Wilayah' || 'Rpm') && session()->get('wilayah') == $td->wilayah) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $td->no_permintaan ?></td>
                                    <td><?= $td->nama ?></td>
                                    <td><?= $td->wilayah ?></td>
                                    <td>
                                        <a class=" btn btn-info btn-sm"
                                            href="<?= base_url("detailpermintaan-kabel/$td->id_permintaan_kabel"); ?>"><i
                                                class="bx bx-show-alt"></i>Detail</a>
                                    </td>
                                </tr>
                                <?php } else if (session()->get('jabatan') == ('Admin Pusat' || 'PM' || 'Direktur') && session()->get('wilayah') == 'Jakarta') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $td->no_permintaan ?></td>
                                    <td><?= $td->nama ?></td>
                                    <td><?= $td->wilayah ?></td>
                                    <td>
                                        <a class=" btn btn-info btn-sm"
                                            href="<?= base_url("detailpermintaan-kabel/$td->id_permintaan_kabel"); ?>"><i
                                                class="bx bx-show-alt"></i>Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
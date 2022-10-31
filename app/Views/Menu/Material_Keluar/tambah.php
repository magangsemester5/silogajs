<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Data Material Keluar</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data Material Keluar</h5>
                </div>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form method="POST" action="<?= base_url('prosestambah-materialkeluar') ?>"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_keluar">Tanggal Keluar</label>
                            <div class="col-md-2">
                                <input type="text" id="flatpickrdate" name="tanggal_keluar" class="form-control date"
                                    placeholder="Tanggal Keluar" readonly>
                            </div>
                            <!-- Error Validation -->
                            <?php if ($validation->getError('tanggal_keluar')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('tanggal_keluar'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <label class="form-label" for="basic-default-fullname">Nomor Permintaan</label>
                        <div class="input-group input-group-merge">
                            <select class="form-control" name="no_permintaan" id="id_permintaan_material">
                                <option value="" disabled selected>Pilih Nomor Permintaan</option>
                                <?php foreach ($tampildatapermintaanmaterial as $key => $value) : ?>
                                <option value="<?= $value->id_permintaan_material ?>">
                                    <?= $value->no_permintaan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('id_permintaan_material')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('id_permintaan_material'); ?>
                        </div>
                        <?php } ?>
                        <br>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Detail Material yang diminta</label>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal"><i class="bx bx-package"></i>&nbspKlik Disini</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama Admin Wilayah</label>
                            <input type="text" id="nama" name="nama" class="form-control" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Wilayah</label>
                            <input readonly="readonly" id="wilayah" name="wilayah" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="custom-file-label">Foto Penerima</label>
                            <input type="file" name="image" id="inputFile" class="form-control">
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('image')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('image'); ?>
                        </div>
                        <?php } ?>
                        <div class="col-md-3">
                            <img src="" id="imgView" class="card-img-top img-fluid">
                        </div>
                        <br>
                        <!-- Modal Detail Item material yang akan keluar -->
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Material yang diminta
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
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
                                                                    <th>Stok Material Setelah Keluar</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="showdetailmaterialkeluar"
                                                                class="table-border-bottom-0"
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
                                        <h8>Data meterial yang ada pada tabel diatas ialah data yang sudah diapprove
                                            oleh
                                            Direktur</h8>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('tampil-materialkeluar') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
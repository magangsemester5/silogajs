<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Data kabel Keluar</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data kabel Keluar</h5>
                </div>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form method="POST" action="<?= base_url('prosestambah-kabelkeluar') ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_keluar">Tanggal Keluar</label>
                            <div class="col-md-2">
                                <input type="text" id="flatpickrdate" name="tanggal_keluar" class="form-control date" placeholder="Tanggal Keluar" readonly>
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
                            <select class="form-control" name="id_permintaan_kabel" id="id_permintaan_kabel">
                                <option value="" disabled selected>Pilih Nomor Permintaan</option>
                                <?php foreach ($tampildatapermintaankabel as $key => $value) : ?>
                                    <option value="<?= $value->id_permintaan_kabel ?>"><?= $value->no_permintaan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Detail Kabel yang diminta</label>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bx bx-package"></i>&nbspLaunch demo modal</button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama Admin Wilayah</label>
                            <input type="text" id="nama" class="form-control" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Wilayah</label>
                            <input readonly="readonly" id="wilayah" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="custom-file-label">Foto Penerima</label>
                            <input type="file" name="foto_penerima" id="inputFile" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <img src="" id="imgView" class="card-img-top img-fluid">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('tampil-kabelkeluar') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
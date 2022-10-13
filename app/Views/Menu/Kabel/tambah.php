<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Data material</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data kabel</h5>
                </div>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form method="POST" action="<?= base_url("prosestambah-kabel") ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Nomor Drum</label>
                            <input type="text" name="no_drum" class="form-control" id="basic-default-company" placeholder="Masukan nomor drum disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('no_drum')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('no_drum'); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Core</label>
                            <input type="text" name="core" class="form-control" id="basic-default-company" placeholder="Masukan jumlah core disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('core')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('core'); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Satuan</label>
                            <div class="input-group input-group-merge">
                                <select name="id_satuan" class="form-control">
                                    <option value=""></option>
                                    <?php foreach ($tampildatasatuan as $key => $value) : ?>
                                        <option value="<?= $value->id_satuan ?>"><?= $value->nama_satuan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('id_satuan')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('id_satuan'); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Panjang</label>
                            <input type="text" name="panjang" id="basic-default-phone" class="form-control phone-mask" placeholder="Masukan Total Panjang Kabel Disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('panjang')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('panjang'); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Serial Number</label>
                            <input type="text" name="serial_number" id="basic-default-phone" class="form-control phone-mask" placeholder="Masukan Serial Number Disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('serial_number')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('serial_number'); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Foto Serial Number</label>
                            <input type="file" name="foto_serial_number" id="inputFile" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label>Preview Foto Serial Number</label>
                            <img src="" id="imgView" class="card-img-top img-fluid">
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('tampil-kabel') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
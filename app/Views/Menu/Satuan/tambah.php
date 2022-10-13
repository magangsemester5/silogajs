<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>Satuan</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Satuan</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url("prosestambah-satuan") ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Nama satuan</label>
                            <input type="text" name="nama_satuan" id="basic-default-phone" class="form-control phone-mask" placeholder="Masukan nama satuan" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('nama_satuan')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('nama_satuan'); ?>
                            </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('tampil-satuan') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
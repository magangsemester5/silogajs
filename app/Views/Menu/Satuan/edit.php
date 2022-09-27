<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Ubah Data Kategori</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url("prosesedit-satuan") ?>">
                        <div class="row mb-3">
                            <input type="hidden" name="id_satuan" id="id_satuan" value="<?php echo $tampildata->id_satuan ?>">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Satuan</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-box"></i></span>
                                    <input type="text" class="form-control" name="nama_satuan" id="basic-icon-default-fullname" value="<?= $tampildata->nama_satuan ?>" placeholder="Masukan nama satuan disini" aria-label="Masukan nama satuan disini" aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                <a href="<?= base_url('tampil-satuan') ?>" class="btn btn-warning">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
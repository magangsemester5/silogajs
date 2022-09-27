<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Edit Data Manajement User</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Data Manajement User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url("prosesedit-user") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $tampildata->id ?>">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $tampildata->nama ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Password</label>
                            <input type="text" name="password" class="form-control" id="basic-default-company" value="<?= $tampildata->password ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Id User</label>
                            <input type="text" name="id_user" class="form-control" id="basic-default-company" value="<?= $tampildata->id_user ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" id="basic-default-company" value="<?= $tampildata->jabatan ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Kriteria</label>
                            <input type="text" name="kriteria" class="form-control" id="basic-default-company" value="<?= $tampildata->kriteria ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Foto User</label>
                            <input type="file" name="foto_user" id="inputFile" value="<?= $tampildata->foto_user ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Preview Foto User</label>
                            <img src="<?= base_url("../uploads/$tampildata->foto_user") ?>" width="150" id="imgView" class="card-img-top img-fluid" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <a href="<?= base_url('tampil-user') ?>" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
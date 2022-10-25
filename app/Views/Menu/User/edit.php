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
                            <label class="form-label" for="basic-default-company">Id User</label>
                            <input type="text" name="id_user" class="form-control" id="basic-default-company" value="<?= $tampildata->id_user ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control" required>
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="Admin Pusat">Admin Pusat</option>
                            <option value="Admin Wilayah">Admin Wilayah</option>
                            <option value="Rpm">Rpm</option>
                            <option value="PM">PM</option>
                            <option value="Direktur">Direktur</option>
                            <option value="Management">Management</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Kriteria</label>
                            <select name="kriteria" id="kriteria" class="form-control" required>
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="Admin Pusat">Admin Pusat</option>
                            <option value="Admin Wilayah">Admin Wilayah</option>
                            <option value="Rpm">Rpm</option>
                            <option value="PM">PM</option>
                            <option value="Direktur">Direktur</option>
                            <option value="Management">Management</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Wilayah</label>
                            <select name="wilayah" id="wilayah" class="form-control" required>
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="Padang">Padang</option>
                            <option value="Medan">Medan</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Pasuruan">Pasuruan</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Sulawesi">Sulawesi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Nomor Telepon</label>
                            <input type="number" name="no_telepon" class="form-control" id="basic-default-company" value="<?= $tampildata->kriteria ?>" />
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
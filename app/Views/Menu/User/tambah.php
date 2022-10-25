<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>Manajemen User</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Manajemen User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url("prosestambah-user") ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Nama</label>
                            <input type="text" name="nama" id="basic-default-phone" class="form-control phone-mask" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Password</label>
                            <input type="text" name="password" id="basic-default-phone"
                                class="form-control phone-mask" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Id User</label>
                            <input type="text" name="id_user" id="basic-default-phone"
                                class="form-control phone-mask" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Jabatan</label>
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
                            <label class="form-label" for="basic-default-phone">Kriteria</label>
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
                            <label class="form-label" for="basic-default-phone">Wilayah</label>
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
                            <label class="form-label" for="basic-default-phone">Nomor Telepon</label>
                            <input type="number" name="no_telepon" id="basic-default-phone"
                                class="form-control phone-mask" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Foto User</label>
                            <input type="file" name="foto_user" id="inputFile" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('tampil-user') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
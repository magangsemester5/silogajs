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
                    <?php $validation = \Config\Services::validation(); ?>
                    <form method="POST" action="<?= base_url("prosestambah-user") ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Nama</label>
                            <input type="text" name="nama" id="basic-default-phone" class="form-control phone-mask"
                                placeholder="Masukan Nama" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('nama')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('nama'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Email</label>
                            <input type="email" name="email" id="basic-default-phone" class="form-control phone-mask"
                                placeholder="Masukan Email" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('email')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('email'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Password</label>
                            <input type="text" name="password" id="basic-default-phone" class="form-control phone-mask"
                                placeholder="Masukan Password" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('password')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('password'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Id User</label>
                            <input type="text" name="id_user" id="basic-default-phone" class="form-control phone-mask"
                                placeholder="Masukan ID User" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('id_user')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('id_user'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control" placeholder="Masukan Jabatan">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Admin Pusat">Admin Pusat</option>
                                <option value="Admin Wilayah">Admin Wilayah</option>
                                <option value="Rpm">Rpm</option>
                                <option value="PM">PM</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Management">Management</option>
                            </select>
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('jabatan')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('jabatan'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Kriteria</label>
                            <select name="kriteria" id="kriteria" class="form-control" placeholder="Masukan Kriteria">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Admin Pusat">Admin Pusat</option>
                                <option value="Admin Wilayah">Admin Wilayah</option>
                                <option value="Rpm">Rpm</option>
                                <option value="PM">PM</option>
                                <option value="Direktur">Direktur</option>
                                <option value="Management">Management</option>
                            </select>
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('kriteria')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('kriteria'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Wilayah</label>
                            <select name='wilayah' id='wilayah' class='form-control' placeholder='Masukan Wilayah'>
                                <option value=''>-- Silahkan Pilih --</option>
                                <option value='Jakarta'>Jakarta (Admin Pusat/Direktur/PM/Management Pilih Wilayah
                                    (Jakarta)</option>
                                <option value='Padang'>Padang</option>
                                <option value='Medan'>Medan</option>
                                <option value='Jawa Barat'>Jawa Barat</option>
                                <option value='Yogyakarta'>Yogyakarta</option>
                                <option value='Pasuruan'>Pasuruan</option>
                                <option value='Sulawesi'>Sulawesi</option>
                            </select>
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('wilayah')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('wilayah'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Nomor Telepon</label>
                            <input type="number" name="no_telepon" id="basic-default-phone"
                                class="form-control phone-mask" placeholder="Masukan No Telepon" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('no_telepon')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('no_telepon'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Foto User</label>
                            <input type="file" name="image" id="inputFile" class="form-control">
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('image')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('image'); ?>
                        </div>
                        <?php } ?>
                        <div class="col-md-3">
                            <label>Preview Foto User</label>
                            <img src="" id="imgView" class="card-img-top img-fluid">
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('tampil-user') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
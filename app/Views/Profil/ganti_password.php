<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Halaman Ganti Password Profil</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Halaman Ganti Password Profil</h5>
                </div>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form method="POST" action="<?= base_url("prosesgantipassword-profil") ?>">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= session()->get('id'); ?>">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control" id="basic-default-company" placeholder="Masukan password lama disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('password_lama')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('password_lama'); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control" id="basic-default-company" placeholder="Masukan password baru disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('password_baru')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('password_baru'); ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Konfirmasi Password</label>
                            <input type="password" name="konfirmasi_password" class="form-control" id="basic-default-company" placeholder="Masukan konfirmasi password disini" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('konfirmasi_password')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('konfirmasi_password'); ?>
                            </div>
                        <?php } ?>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('tampil_dashboard') ?>" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
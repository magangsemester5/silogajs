<?= $this->extend('Template/layout') ?>
<?= $this->Section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <form id="formAccountSettings" method="POST" action="<?= base_url("prosesedit-profil") ?>" enctype="multipart/form-data">
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="<?= base_url('') ?>/uploads/<?= session()->get('foto_user'); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="foto_user" hidden class="account-file-input" />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= session()->get('id'); ?>">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="id_user" class="form-label">ID User</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?= session()->get('id_user'); ?>" placeholder="ex. Rizki Syarifudin" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= session()->get('nama'); ?>" placeholder="ex. Rizki Syarifudin" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                <input class="form-control" type="text" id="no_telepon" name="no_telepon" value="<?= session()->get('no_telepon'); ?>" placeholder="ex. 081294835578" />
                            </div>
                            <input class="form-control" type="hidden" name="jabatan" value="<?= session()->get('jabatan'); ?>" />
                            <input class="form-control" type="hidden" name="kriteria" value="<?= session()->get('kriteria'); ?>" />
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
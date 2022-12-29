<?= $this->extend('Template/layout') ?>
<?= $this->Section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span>Profil</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <form id="formAccountSettings" method="POST" action="<?= base_url("prosesedit-profil") ?>"
                    enctype="multipart/form-data">
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <?php if(session()->get('foto_user') == null) { ?>
                            <img src="<?= base_url('') ?>/uploads/blank_profile_picture.jpeg" alt="user-avatar"
                                class="d-block rounded" height="100" width="100" id="imgView" />
                            <?php }else if(!empty($tampildata->foto_user)){?>
                            <img src="<?= base_url('') ?>/uploads/<?= $tampildata->foto_user; ?>" alt="user-avatar"
                                class="d-block rounded" height="100" width="100" id="imgView" />
                            <?php } ?>
                            <div class="button-wrapper">
                                <label for="inputFile" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload foto baru</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="inputFile" name="foto_user" class="account-file-input"
                                        hidden />
                                </label>
                                <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button> -->
                                <p class="text-muted mb-0">Format yang diizinkan JPG, atau PNG</p>
                            </div>

                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <input type="hidden" name="id" class="form-control" id="id"
                            value="<?= session()->get('id'); ?>">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="id_user" class="form-label">ID User</label>
                                <input type="text" class="form-control" id="id_user" name="id_user"
                                    value="<?= $tampildata->id_user; ?>" placeholder="ex. Rizki Syarifudin" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?= $tampildata->nama; ?>" placeholder="ex. Rizki Syarifudin" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                <input class="form-control" type="text" id="no_telepon" name="no_telepon"
                                    value="<?= $tampildata->no_telepon; ?>" placeholder="ex. 081294835578" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="<?= $tampildata->email; ?>" placeholder="ex. yudistira@gmail.com" />
                            </div>
                            <input class="form-control" type="hidden" name="jabatan"
                                value="<?= $tampildata->jabatan; ?>" />
                            <input class="form-control" type="hidden" name="kriteria"
                                value="<?= $tampildata->kriteria; ?>" />
                            <input class="form-control" type="hidden" name="wilayah"
                                value="<?= $tampildata->wilayah; ?>" />
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url('tampil_dashboard') ?>" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
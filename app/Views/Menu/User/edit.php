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
                        <input type="hidden" name="id" class="form-control" id="id"
                            value="<?php echo $tampildata->id ?>">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"
                                value="<?php echo $tampildata->nama ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Email</label>
                            <input type="email" name="email" id="basic-default-phone" class="form-control phone-mask"
                                placeholder="Masukan Email" value="<?php echo $tampildata->email ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Id User</label>
                            <input type="text" name="id_user" class="form-control" id="basic-default-company"
                                value="<?= $tampildata->id_user ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Admin Pusat"
                                    <?php if($tampildata->jabatan == "Admin Pusat"){ echo 'selected="selected"';}?>>
                                    Admin Pusat</option>
                                <option value="Admin Wilayah"
                                    <?php if($tampildata->jabatan == "Admin Wilayah"){ echo 'selected="selected"';}?>>
                                    Admin Wilayah</option>
                                <option value="Rpm"
                                    <?php if($tampildata->jabatan == "Rpm"){ echo 'selected="selected"';}?>>
                                    Rpm</option>
                                <option value="PM"
                                    <?php if($tampildata->jabatan == "PM"){ echo 'selected="selected"';}?>>
                                    PM</option>
                                <option value="Direktur"
                                    <?php if($tampildata->jabatan == "Direktur"){ echo 'selected="selected"';}?>>
                                    Direktur</option>
                                <option value="Management"
                                    <?php if($tampildata->jabatan == "Management"){ echo 'selected="selected"';}?>>
                                    Management</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Kriteria</label>
                            <select name="kriteria" id="kriteria" class="form-control">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Admin Pusat"
                                    <?php if($tampildata->kriteria == "Admin Pusat"){ echo 'selected="selected"';}?>>
                                    Admin Pusat</option>
                                <option value="Admin Wilayah"
                                    <?php if($tampildata->kriteria == "Admin Wilayah"){ echo 'selected="selected"';}?>>
                                    Admin Wilayah</option>
                                <option value="Rpm"
                                    <?php if($tampildata->kriteria == "Rpm"){ echo 'selected="selected"';}?>>
                                    Rpm</option>
                                <option value="PM"
                                    <?php if($tampildata->kriteria == "PM"){ echo 'selected="selected"';}?>>
                                    PM</option>
                                <option value="Direktur"
                                    <?php if($tampildata->kriteria == "Direktur"){ echo 'selected="selected"';}?>>
                                    Direktur</option>
                                <option value="Management"
                                    <?php if($tampildata->kriteria == "Management"){ echo 'selected="selected"';}?>>
                                    Management</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Wilayah</label>
                            <?php if($tampildata->jabatan == 'Admin Pusat'){?>
                            <select name="wilayah" id="wilayah" class="form-control" placeholder="Masukan Wilayah">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Jakarta"
                                    <?php if($tampildata->wilayah == "Jakarta"){ echo 'selected="selected"';}?>>
                                    Jakarta
                                </option>
                            </select>
                            <?php } else if($tampildata->jabatan == 'PM'){?>
                            <select name="wilayah" id="wilayah" class="form-control" placeholder="Masukan Wilayah">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Jakarta"
                                    <?php if($tampildata->wilayah == "Jakarta"){ echo 'selected="selected"';}?>>
                                    Jakarta
                                </option>
                            </select>
                            <?php } else if($tampildata->jabatan == 'Direktur'){?>
                            <select name="wilayah" id="wilayah" class="form-control" placeholder="Masukan Wilayah">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Jakarta"
                                    <?php if($tampildata->wilayah == "Jakarta"){ echo 'selected="selected"';}?>>
                                    Jakarta
                                </option>
                            </select>
                            <?php } else if($tampildata->jabatan == 'Management'){?>
                            <select name="wilayah" id="wilayah" class="form-control" placeholder="Masukan Wilayah">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Jakarta"
                                    <?php if($tampildata->wilayah == "Jakarta"){ echo 'selected="selected"';}?>>
                                    Jakarta
                                </option>
                            </select>
                            <?php } else if($tampildata->jabatan == 'Admin Wilayah' || 'Rpm'){?>
                            <select name="wilayah" id="wilayah" class="form-control" placeholder="Masukan Wilayah">
                                <option value="">-- Silahkan Pilih --</option>
                                <option value="Padang"
                                    <?php if($tampildata->wilayah == "Padang"){ echo 'selected="selected"';}?>>
                                    Padang
                                </option>
                                <option value="Medan"
                                    <?php if($tampildata->wilayah == "Medan"){ echo 'selected="selected"';}?>>
                                    Medan</option>
                                <option value="Jawa Barat"
                                    <?php if($tampildata->wilayah == "Jawa Barat"){ echo 'selected="selected"';}?>>
                                    Jawa Barat</option>
                                <option value="Pasuruan"
                                    <?php if($tampildata->wilayah == "Pasuruan"){ echo 'selected="selected"';}?>>
                                    Pasuruan
                                </option>
                                <option value="Yogyakarta"
                                    <?php if($tampildata->wilayah == "Yogyakarta"){ echo 'selected="selected"';}?>>
                                    Yogyakarta</option>
                                <option value="Sulawesi"
                                    <?php if($tampildata->wilayah == "Sulawesi"){ echo 'selected="selected"';}?>>
                                    Sulawesi
                                </option>
                            </select>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Nomor Telepon</label>
                            <input type="number" name="no_telepon" class="form-control" id="basic-default-company"
                                placeholder="Masukan Nomor Telepon" value="<?= $tampildata->no_telepon ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Foto User</label>
                            <input type="file" name="image" id="inputFile" value="<?= $tampildata->foto_user ?>"
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Preview Foto User</label>
                            <img src="<?= base_url("../uploads/$tampildata->foto_user") ?>" width="150" id="imgView"
                                class="card-img-top img-fluid">
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
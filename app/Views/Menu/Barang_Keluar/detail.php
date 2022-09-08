<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman Detail Data Barang Keluar</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Data Barang Keluar</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url("edit-barang") ?>">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">ID Barang</label>
                            <input type="text" name="id_barang_keluar" class="form-control" id="id_barang_keluar" value="<?php echo $tampildata->id_barang_keluar ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Nama Barang</label>
                            <div class="input-group input-group-merge">
                                <select name="id_kategori" class="form-control" required disabled>
                                    <option value=""></option>
                                    <?php foreach ($tampildatabarang as $key => $value) : ?>
                                        <option value="<?= $value->id_barang ?>"<?= $tampildata->id_barang ==$value->id_barang ? 'selected' : null ?>><?= $value->nama_barang?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Jumlah Barang Keluar</label>
                            <input type="text" name="stok" id="basic-default-phone" value="<?= $tampildata->qty ?>" class="form-control phone-mask" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Serial Number</label>
                            <input type="text" name="stok" id="basic-default-phone" value="<?= $tampildata->serial_number ?>" class="form-control phone-mask" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Foto Serial Number</label>
                            <input type="text" name="stok" id="basic-default-phone" value="<?= $tampildata->foto_serial_number ?>" class="form-control phone-mask" disabled/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Foto Pengambilan Paket</label>
                            <input type="text" name="stok" id="basic-default-phone" value="<?= $tampildata->foto_pengambilan_paket ?>" class="form-control phone-mask" disabled />
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                        <button type="submit" class="btn btn-warning">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?> 
<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman Detail Data kabel Masuk</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Data kabel Masuk</h5>
                </div>
                <div class="card-body">
                    <?php foreach ($tampildatakabel as $td) : ?>
                    <form method="POST" action="<?= base_url("edit-kabel") ?>">
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                            <div class="col-md-2">
                                <input type="text" name="tanggal_masuk" class="form-control date"
                                    placeholder="Tanggal Masuk" value="<?= $td->tanggal_masuk ?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Kode kabel</label>
                            <input type="text" name="kode_kabel_masuk" class="form-control" id="kode_kabel_masuk"
                                value="<?= $td->kode_kabel_masuk ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Nomor Drum</label>
                            <input type="text" name="stok" id="basic-default-phone" value="<?= $td->nama_kabel ?>"
                                class="form-control phone-mask" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Jumlah kabel Masuk</label>
                            <input type="text" name="stok" id="basic-default-phone" value="<?= $td->jumlah_masuk ?>"
                                class="form-control phone-mask" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Serial Number</label>
                            <input type="text" name="stok" id="basic-default-phone" value="<?= $td->serial_number ?>"
                                class="form-control phone-mask" readonly />
                        </div>
                        <div class="col-md-3">
                            <label>Preview Foto Serial Number</label>
                            <img src="<?= base_url("../uploads/$td->foto_serial_number") ?>" width="150" id="imgView"
                                class="card-img-top img-fluid">
                        </div>
                        <br>
                        <div class="col-md-3">
                            <label>Preview Pengambilan kabel</label>
                            <img src="<?= base_url("../uploads/$td->foto_pengambilan_kabel") ?>" width="150"
                                id="imgView" class="card-img-top img-fluid">
                        </div>
                        <br>
                        <a href="<?= base_url('tampil-kabelmasuk') ?>" class="btn btn-warning">Kembali</a>
                    </form>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman Detail Data Barang</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Data Barang</h5>
                </div>
                <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" id="kode_barang" value="<?= $tampildatabarang->kode_barang ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-email">Nama Barang</label>
                                <input type="text" name="nama_barang" id="basic-default-phone" value="<?= $tampildatabarang->nama_barang ?>" class="form-control phone-mask" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Stok</label>
                                <input type="text" name="stok" id="basic-default-phone" value="<?= $tampildatabarang->stok ?>" class="form-control phone-mask" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-phone">Serial Number</label>
                                <input type="text" name="serial_number" id="basic-default-phone" value="<?= $tampildatabarang->serial_number ?>" class="form-control phone-mask" readonly />
                            </div>
                            <div class="col-md-3">
                                <label>Preview Foto Serial Number</label>
                                <img src="<?= base_url("../uploads/$tampildatabarang->foto_serial_number") ?>" width="150" id="imgView" class="card-img-top img-fluid">
                            </div>
                            <br>
                            <a href="<?= base_url('tampil-barang') ?>" class="btn btn-warning">Kembali</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
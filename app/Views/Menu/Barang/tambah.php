<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Data Barang</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data Barang</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url("prosestambah-barang") ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" id="kode_barang" readonly value="BRG<?= sprintf("%04s", $kode_barang) ?>"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="basic-default-company" placeholder="Masukan nama barang disini" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Kategori Barang</label>
                            <div class="input-group input-group-merge">
                                <select name="id_kategori" class="form-control" required>
                                    <option value=""></option>
                                    <?php foreach ($tampildatakategori as $key => $value) : ?>
                                        <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Satuan Barang</label>
                            <div class="input-group input-group-merge">
                                <select name="id_satuan" class="form-control" required>
                                    <option value=""></option>
                                    <?php foreach ($tampildatasatuan as $key => $value) : ?>
                                        <option value="<?= $value->id_satuan ?>"><?= $value->nama_satuan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Stok</label>
                            <input type="text" name="stok" id="basic-default-phone" class="form-control phone-mask" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Serial Number</label>
                            <input type="text" name="serial_number" id="basic-default-phone" class="form-control phone-mask" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Foto Serial Number</label>
                            <input type="file" name="foto_serial_number" id="inputFile" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Preview Foto Serial Number</label>
                            <img src="" id="imgView" class="card-img-top img-fluid">
                        </div>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <a href="<?= base_url('tampil-barang') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
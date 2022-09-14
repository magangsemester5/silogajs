<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Data Barang Keluar</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data Barang Keluar</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url(
                        'prosestambah-barangkeluar'
                    ) ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Kode Barang Keluar</label>
                            <input type="text" name="kode_barang_keluar" class="form-control" readonly value="BKR<?= sprintf(
                                '%04s',
                                $kode_barang_keluar
                            ) ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama_barang">Nama Barang</label>
                            <div class="input-group input-group-merge">
                                <select name="id_barang" class="form-control" id="nama_barang" required>
                                    <option value="" disabled selected>Pilih Nama Barang</option>
                                    <?php foreach (
                                        $tampildatabarang
                                        as $key => $value
                                    ): ?>
                                        <option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                    <label class="col-md-4 text-md-right" for="jumlah_masuk">Jumlah Barang Keluar</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input value="<?= set_value('qty'); ?>" name="qty" id="qty" type="number" class="form-control" placeholder="Jumlah Keluar...">
                            <div class="input-group-append">
                                <input type="text" id="nama_satuan" class="form-control" readonly required />
                            </div>
                        </div>
                    </div>
                    </div>
                        <div class="mb-3">
                            <label class="serial_number">Serial Number</label>
                            <input type="text" id="serial_number" class="form-control" readonly required />
                        </div>
                        <div class="mb-3">
                            <label class="serial_number">Foto Serial Number</label>
                            <div id="foto_serial_number">
                            </div>
                            <br>
                            <div class="mb-3">
                                <label class="custom-file-label">Foto Pengambilan Barang</label>
                                <input type="file" name="foto_pengambilan_barang" id="inputFile" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Preview Foto Pengambilan</label>
                                <img src="" id="imgView" class="card-img-top img-fluid">
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url(
                                'tampil-barangkeluar'
                            ) ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content') ?>

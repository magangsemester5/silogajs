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
                    <?php $validation = \Config\Services::validation(); ?>
                    <form method="POST" action="<?= base_url('prosestambah-barangkeluar') ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_keluar">Tanggal Keluar</label>
                            <div class="col-md-2">
                                <input type="text" id="flatpickrdate" name="tanggal_keluar" class="form-control date" placeholder="Tanggal Keluar" readonly>
                            </div>
                            <!-- Error Validation -->
                            <?php if ($validation->getError('tanggal_keluar')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('tanggal_keluar'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nomor Permintaan</label>
                            <div class="input-group input-group-merge">
                                <select class="form-control" id="id_permintaan">
                                    <option value="" disabled selected>Pilih Nomor Permintaan</option>
                                    <?php foreach ($tampildatapermintaan as $key => $value) : ?>
                                        <option value="<?= $value->id_permintaan ?>"><?= $value->no_permintaan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Wilayah</label>
                            <input readonly="readonly" id="wilayah" name="wilayah" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Kode Barang Keluar</label>
                            <input type="text" name="kode_barang_keluar" class="form-control" readonly value="BKR<?= sprintf('%04s', $kode_barang_keluar) ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama_barang">Nama Barang</label>
                            <div class="input-group input-group-merge">
                                <select name="id_barang" class="form-control" id="nama_barang">
                                    <option value="" disabled selected>Pilih Nama Barang</option>
                                    <?php foreach ($tampildatabarang as $key => $value) : ?>
                                        <option value="<?= $value->id_barang ?>"><?= $value->nama_barang ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- Error Validation -->
                            <?php if ($validation->getError('id_barang')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('id_barang'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label class="stok" for="stok">Stok</label>
                            <div class="input-group">
                                <input readonly="readonly" id="stok" name="stok" type="number" class="form-control">
                            </div>
                        </div>
                        <label class="col-md-4 text-md-right" for="jumlah_keluar">Jumlah Barang Keluar</label>
                        <div class="form-password-toggle col-md-3">
                            <div class="input-group">
                                <input value="<?= set_value('jumlah_keluar'); ?>" name="jumlah_keluar" id="jumlah_keluar" type="number" class="form-control" placeholder="Jumlah Keluar...">
                                <input id="nama_satuan" class="input-group-text col-md-4" disabled>
                            </div>
                        </div>
                        <!-- Error Validation -->
                        <?php /* if ($validation->getError('jumlah_keluar')) { ?> 
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('jumlah_keluar'); ?>
                            </div>
                        <?php } */ ?>
                        <div class="mb-3">
                            <label class="total_stok" for="total_stok">Total Stok</label>
                            <div class="input-group">
                                <input readonly id="total_stok" value="<?= set_value('total_stok'); ?>" name="total_stok" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="serial_number">Serial Number</label>
                            <input type="text" id="serial_number" class="form-control" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="serial_number">Foto Serial Number</label>
                            <div id="foto_serial_number">
                            </div>
                            <br>
                            <div class="mb-3">
                                <label class="custom-file-label">Foto Pengambilan Barang</label>
                                <input type="file" name="foto_pengambilan_barang" id="inputFile" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label>Preview Foto Pengambilan</label>
                                <img src="" id="imgView" class="card-img-top img-fluid">
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url('tampil-barangkeluar') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content') ?>
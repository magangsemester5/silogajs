<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Data kabel Masuk</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data kabel Masuk</h5>
                </div>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form method="POST" action="<?= base_url('prosestambah-kabelmasuk') ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                            <div class="col-md-2">
                                <input type="text" id="flatpickrdate" name="tanggal_masuk" class="form-control date" placeholder="Tanggal Masuk" readonly>
                            </div>
                            <!-- Error Validation -->
                            <?php if ($validation->getError('tanggal_masuk')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('tanggal_masuk'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="nama_kabel">Nomor Drum</label>
                            <div class="input-group input-group-merge">
                                <select name="id_kabel" class="form-control" id="nama_kabel">
                                    <option value="" disabled selected>Pilih Nomor Drum</option>
                                    <?php foreach ($tampildatakabel as $key => $value) : ?>
                                        <option value="<?= $value->id_kabel ?>"><?= $value->nama_kabel ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- Error Validation -->
                            <?php if ($validation->getError('id_kabel')) { ?>
                                <div class='alert alert-danger mt-2'>
                                    <?= $error = $validation->getError('id_kabel'); ?>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- <div class="mb-3">
                            <label class="stok" for="stok">Stok</label>
                            <div class="input-group">
                                <input readonly="readonly" id="stok" name="stok" type="number" class="form-control">
                            </div>
                        </div> -->
                        <label class="col-md-4 text-md-right" for="jumlah_masuk">Jumlah kabel Masuk</label>
                        <div class="form-password-toggle col-md-3">
                            <div class="input-group">
                                <input value="<?= set_value('jumlah_masuk'); ?>" name="jumlah_masuk" id="jumlah_masuk" type="number" class="form-control" placeholder="Jumlah Masuk...">
                                <input id="nama_satuan" class="input-group-text col-md-4" disabled>
                            </div>
                        </div>
                        <!-- Error Validation -->
                        <?php /* if ($validation->getError('jumlah_masuk')) { ?> 
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('jumlah_masuk'); ?>
                            </div>
                        <?php } */ ?>
                        <!-- <div class="mb-3">
                            <label class="total_stok" for="total_stok">Total Stok</label>
                            <div class="input-group">
                                <input readonly id="total_stok" value="<?= set_value('total_stok'); ?>" name="total_stok" type="number" class="form-control">
                            </div>
                        </div> -->
                        <div class="mb-3">
                            <label class="serial_number">Serial Number</label>
                            <input type="text" id="serial_number" class="form-control" readonly />
                        </div>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="custom-file-label">Foto Pengantaran kabel</label>
                                <input type="file" name="foto_pengantaran_kabel" id="inputFile" class="form-control" required>
                            </div>
                            <br>
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-company">Nama Penerima</label>
                                <input type="text" name="nama_penerima" class="form-control" id="basic-default-company" placeholder="Masukan nama penerima disini" />
                            </div>
                            <div class="mb-3">
                                <label class="custom-file-label">Foto Pengantaran kabel</label>
                                <input type="file" name="foto_pengantaran_kabel" id="inputFile" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label>Preview Foto Penerima</label>
                                <img src="" id="imgView" class="card-img-top img-fluid">
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url('tampil-kabelmasuk') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content') ?>
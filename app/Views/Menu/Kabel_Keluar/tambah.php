<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Tambah Data kabel Keluar</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Data kabel Keluar</h5>
                </div>
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form method="POST" action="<?= base_url('prosestambah-kabelkeluar') ?>" enctype="multipart/form-data">
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
                            <input readonly="readonly" id="wilayah" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="no_drum">Nomor Drum</label>
                            <div class="input-group input-group-merge">
                                <select name="id_kabel" class="form-control" id="no_drum">
                                    <option value="" disabled selected>Pilih Nomor Drum</option>
                                    <?php foreach ($tampildatakabel as $key => $value) : ?>
                                        <option value="<?= $value->id_kabel ?>"><?= $value->no_drum ?></option>
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
                        <div class="mb-3">
                            <label class="panjang" for="panjang">Panjang</label>
                            <div class="input-group">
                                <input readonly="readonly" id="panjang" name="panjang" type="number" class="form-control">
                            </div>
                        </div>
                        <label class="col-md-4 text-md-right" for="panjang_keluar">Jumlah Panjang Kabel Keluar</label>
                        <div class="form-password-toggle col-md-3">
                            <div class="input-group">
                                <input value="<?= set_value('panjang_keluar'); ?>" name="panjang_keluar" id="panjang_keluar" type="number" class="form-control" placeholder="Jumlah Keluar...">
                                <input id="nama_satuan" class="input-group-text col-md-4" disabled>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Nama Admin Wilayah</label>
                            <div class="input-group input-group-merge">
                                <select class="form-control" name="id" id="id">
                                    <option value="" disabled selected>Pilih Nama Admin Wilayah</option>
                                    <?php foreach ($tampildataadminwilayah as $key => $value) : ?>
                                        <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- Error Validation -->
                        <?php /* if ($validation->getError('jumlah_keluar')) { ?> 
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('jumlah_keluar'); ?>
                            </div>
                        <?php } */ ?>
                        <div class="mb-3">
                            <label class="total_panjang" for="total_panjang">Total panjang</label>
                            <div class="input-group">
                                <input readonly id="total_panjang" value="<?= set_value('total_panjang'); ?>" name="total_panjang" type="number" class="form-control">
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
                                <label class="custom-file-label">Foto Penerima</label>
                                <input type="file" name="foto_penerima" id="inputFile" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <img src="" id="imgView" class="card-img-top img-fluid">
                            </div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url('tampil-kabelkeluar') ?>" class="btn btn-warning">Cancel </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content') ?>
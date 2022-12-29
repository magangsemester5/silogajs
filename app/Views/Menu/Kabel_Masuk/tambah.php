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
                    <form method="POST" action="<?= base_url('prosestambah-kabelmasuk') ?>"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_masuk">Tanggal Masuk</label>
                            <div class="col-md-2">
                                <input type="text" id="flatpickrdate" name="tanggal_masuk" class="form-control date"
                                    placeholder="Tanggal masuk" readonly>
                            </div>
                            <!-- Error Validation -->
                            <?php if ($validation->getError('tanggal_masuk')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('tanggal_masuk'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="no_delivery_order">No Delivery Order</label>
                            <input type="text" name="no_delivery_order" id="no_delivery_order"
                                class="form-control phone-mask" readonly
                                value="KBM<?= sprintf('%04s', $kode_delivery_order) ?>" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="no_drum_masuk">Nomor Hasbell</label>
                            <div class="input-group input-group-merge">
                                <select class="form-control" name="id_kabel" id="no_drum_masuk">
                                    <option value="" disabled selected>Pilih nomor hasbell</option>
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
                        <input type="hidden" id="no_drum" name="no_hasbell" class="form-control" />
                        <input type="hidden" id="core" name="core" class="form-control" />
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Gudang</label>
                            <select name="gudang" id="gudang" class="form-control">
                                <option value="">Pilih gudang</option>
                                <option value="Jakarta">Jakarta</option>
                            </select>
                            <!-- Error Validation -->
                            <?php if ($validation->getError('gudang')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('gudang'); ?>
                            </div>
                            <?php } ?>
                        </div>
                        <label class="col-md-4 text-md-right" for="panjang">Stok</label>
                        <div class="form-password-toggle col-md-3">
                            <div class="input-group">
                                <input value="<?= set_value('panjang'); ?>" readonly name="panjang" id="panjang"
                                    type="number" class="form-control">
                                <input id="nama_satuan" name="nama_satuan" class="input-group-text col-md-4" hidden>
                            </div>
                        </div>
                        <label class="col-md-4 mt-3 text-md-right" for="panjang_masuk">Jumlah kabel Masuk</label>
                        <div class="form-password-toggle col-md-3">
                            <div class="input-group">
                                <input value="<?= set_value('panjang_masuk'); ?>" name="panjang_masuk"
                                    id="panjang_masuk" type="number" class="form-control"
                                    placeholder="Masukan jumlah masuk">
                                <!-- <input id="nama_satuan" class="input-group-text col-md-4" disabled> -->
                            </div>
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('panjang_masuk')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('panjang_masuk'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3 mt-3">
                            <label class="total_panjang" for="total_panjang">Total Stok</label>
                            <div class="input-group">
                                <input readonly id="total_panjang" value="<?= set_value('total_panjang'); ?>"
                                    name="total_panjang" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Merek</label>
                            <input type="text" name="merek" id="basic-default-phone" class="form-control phone-mask"
                                placeholder="Masukan nama merek" />
                        </div>
                        <!-- Error Validation -->
                        <?php if ($validation->getError('merek')) { ?>
                        <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('merek'); ?>
                        </div>
                        <?php } ?>
                        <div class="mb-3">
                            <div class="mb-3">
                                <label class="custom-file-label">Foto Penerima</label>
                                <input type="file" name="image" id="inputFile" class="form-control">
                            </div>
                            <!-- Error Validation -->
                            <?php if ($validation->getError('image')) { ?>
                            <div class='alert alert-danger mt-2'>
                                <?= $error = $validation->getError('image'); ?>
                            </div>
                            <?php } ?>
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
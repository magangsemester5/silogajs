<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Ubah Data Kategori</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="<?= base_url("C_Kategori/ubah") ?>">
                        <div class="row mb-3">
                            <input type="hidden" name="katid" id="katid" value="<?php echo $tampildata->katid ?>">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama Kategori</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="katnama" id="basic-icon-default-fullname" value="<?= $tampildata->katnama ?>" placeholder="Masukan nama kategori disini" aria-label="Masukan nama kategori disini" aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('content') ?>
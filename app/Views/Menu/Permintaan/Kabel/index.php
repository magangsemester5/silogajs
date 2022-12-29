<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Permintaan Kabel</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <?php if (session()->get('jabatan') == 'Admin Wilayah') { ?>
                <div class="card-header py-3 mt-2">
                    <h6 class="fw-bold fs-5">Form Permintaan Kabel</h6>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('tambahpermintaankabel') ?>" method="POST" id="add_form">
                        <?php
                            date_default_timezone_set("Asia/Jakarta");
                            $array_bln    = array(1 => "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
                            $tanggal = date('d');
                            $bln     = $array_bln[date('n')];
                            $tahun   = date('Y');
                            ?>
                        <div class="form-group">
                            <div class="col-xl-4">
                                <label>No Permintaan</label>
                                <input type="text" class="form-control" name="no_permintaan" id="no_permintaan" readonly
                                    value="<?= sprintf('%02s', $no_permintaan) ?>/LOG/KB/<?= session()->get('wilayah'); ?>/<?= $tanggal . "/" . $bln . "/" . $tahun; ?>" />
                            </div>
                        </div>
                        <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
                        <div id="show_item_kabel">
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="id_kabel[]" id="id_kabel" required>
                                            <option value="" disabled selected>Pilih Nomor Drum</option>
                                            <?php foreach ($tampildatakabel as $key => $value) : ?> <option
                                                value=" <?= $value->id_kabel ?>">
                                                <?= $value->no_drum ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="panjang[]"
                                        placeholder="Masukan Panjang Kabel" aria-label="Masukan Panjang Kabel">
                                </div>
                                <div class="col">
                                    <button class="btn btn-success add_item_btn_kabel">Tambah</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="col-xl-2">
                                <label>Wilayah</label>
                                <input type="text" readonly class="form-control"
                                    value="<?= session()->get('wilayah') ?>" />
                            </div>
                        </div>
                        <input type="submit" value="Kirim" class="btn btn-primary float-right mt-3">
                    </form>
                </div>
            </div>
            <?php } ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3 mt-2">
                    <h6 class="fw-bold fs-5">Data Permintaan Kabel</h6>
                </div>
                <div class="card-body">
                    <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                    <!-- <div class="col-md-1"> -->
                    <!-- Form Error -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped w-100 dt-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No Permintaan</th>
                                    <th>Nama Peminta</th>
                                    <th>Wilayah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                                foreach ($tampildata as $td) : ?>
                                <?php if (session()->get('jabatan') == ('Admin Wilayah' || 'Rpm') && session()->get('wilayah') == $td->wilayah) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $td->tanggal ?></td>
                                    <td><?= $td->no_permintaan ?></td>
                                    <td><?= $td->nama ?></td>
                                    <td><?= $td->wilayah ?></td>
                                    <td>
                                        <a class=" btn btn-info btn-sm"
                                            href="<?= base_url("detailpermintaan-kabel/$td->id_permintaan_kabel"); ?>"><i
                                                class="bx bx-show-alt"></i>Detail</a>
                                    </td>
                                </tr>
                                <?php } else if (session()->get('jabatan') == ('Admin Pusat' || 'PM' || 'Direktur' || 'Management') && session()->get('wilayah') == 'Jakarta') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $td->tanggal ?></td>
                                    <td><?= $td->no_permintaan ?></td>
                                    <td><?= $td->nama ?></td>
                                    <td><?= $td->wilayah ?></td>
                                    <td>
                                        <a class=" btn btn-info btn-sm"
                                            href="<?= base_url("detailpermintaan-kabel/$td->id_permintaan_kabel"); ?>"><i
                                                class="bx bx-show-alt"></i>Detail</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3 mt-2">
                    <h6 class="fw-bold fs-5">Data History Permintaan Kabel</h6>
                </div>
                <div class="card-body">
                    <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                    <!-- <div class="col-md-1"> -->
                    <!-- Form Error -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <div class="table-responsive">
                        <table id="AddOnTabel" class="table table-striped w-100 dt-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>No Permintaan</th>
                                    <th>Nama Peminta</th>
                                    <th>Wilayah</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1; foreach ($tampilgroupgetreqid as $tsk) : ?>
                                <?php if (session()->get('jabatan') == ('Admin Wilayah') && session()->get('wilayah') == $tsk->wilayah) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $tsk->tanggal ?></td>
                                    <td><?= $tsk->no_permintaan ?></td>
                                    <td><?= $tsk->nama ?></td>
                                    <td><?= $tsk->wilayah ?></td>
                                    <td>Selesai diproses</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailhistorydatapermintaankabel"
                                            data-id="<?= $tsk->req_id ?>"><i class="bx bx-show-alt"></i>Detail</button>
                                        <a class="btn btn-danger btn-sm" style="color:white"
                                            onclick="deletedatahistorypermintaankabel(<?= $tsk->req_id ?>)"><i
                                                class="bx bx-trash"></i>Hapus History</a>
                                    </td>
                                </tr>
                                <?php } else if (session()->get('jabatan') == ('Rpm') && session()->get('wilayah') == $tsk->wilayah) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $tsk->tanggal ?></td>
                                    <td><?= $tsk->no_permintaan ?></td>
                                    <td><?= $tsk->nama ?></td>
                                    <td><?= $tsk->wilayah ?></td>
                                    <td>Selesai diproses</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailhistorydatapermintaankabel"
                                            data-id="<?= $tsk->req_id ?>"><i class="bx bx-show-alt"></i>Detail</button>
                                    </td>
                                </tr>
                                <?php } else if (session()->get('jabatan') == ('Admin Pusat') && session()->get('wilayah') == 'Jakarta') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $tsk->tanggal ?></td>
                                    <td><?= $tsk->no_permintaan ?></td>
                                    <td><?= $tsk->nama ?></td>
                                    <td><?= $tsk->wilayah ?></td>
                                    <td>Selesai diproses</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailhistorydatapermintaankabel"
                                            data-id="<?= $tsk->req_id ?>"><i class="bx bx-show-alt"></i>Detail</button>
                                        <a class="btn btn-danger btn-sm" style="color:white"
                                            onclick="deletedatahistorypermintaankabel(<?= $tsk->req_id ?>)"><i
                                                class="bx bx-trash"></i>Hapus History</a>
                                    </td>
                                </tr>
                                <?php } else if (session()->get('jabatan') == ('PM' || 'Direktur' || 'Management') && session()->get('wilayah') == 'Jakarta') { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $tsk->tanggal ?></td>
                                    <td><?= $tsk->no_permintaan ?></td>
                                    <td><?= $tsk->nama ?></td>
                                    <td><?= $tsk->wilayah ?></td>
                                    <td>Selesai diproses</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailhistorydatapermintaankabel"
                                            data-id="<?= $tsk->req_id ?>"><i class="bx bx-show-alt"></i>Detail</button>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        <!--/ Borderless Table -->

        <!-- Hoverable Table rows -->
        <!--/ Hoverable Table rows -->

        <!-- Small table -->
        <!--/ Small table -->

        <!-- Contextual Classes -->
        <!--/ Contextual Classes -->

        <!-- Table within card -->
        <!--/ Table within card -->

        <!-- Responsive Table -->
        <!--/ Responsive Table -->
    </div>
    <!-- / Content -->
    <!-- Menampilkan Dynamic Form Permintaan Kabel -->
    <script src="../template/js/jquery-3.6.0.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".add_item_btn_kabel").click(function(e) {
            e.preventDefault();
            $("#show_item_kabel").prepend(`<div class="row mt-3 append_item_kabel">
                                <div class="col">
                                <div class="input-group input-group-merge">
                                        <select class="form-control" name="id_kabel[]" id="id_kabel" required>
                                            <option value="" disabled selected>Pilih Nomor Drum</option>
                                            <?php foreach ($tampildatakabel as $key => $value) : ?> <option
                                                value=" <?= $value->id_kabel ?>">
                                                <?= $value->no_drum ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="panjang[]" placeholder="Masukan Panjang Kabel"
                                        aria-label="Masukan Panjang Kabel">
                                </div>
                                <div class="col">
                                    <button class="btn btn-danger remove_item_btn_kabel">Remove</button>
                                </div>
                                </div>`);
            let len = $(".append_item_kabel").length;
            if (len == 3) {
                swal({
                    icon: "warning",
                    text: "Data permintaan kabel yang dimasukan maximal hanya 3"
                });
                $(".append_item_kabel").last().remove();
            }
        });
        $(document).on('click', '.remove_item_btn_kabel', function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
    });
    </script>
    <!-- Modal Detail Item Kabel yang akan keluar -->
    <!-- Modal -->
    <div class="modal fade" id="detailhistorydatapermintaankabel" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Kabel yang diminta
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content-wrapper">
                        <!-- Content -->
                        <!-- Basic Bootstrap Table -->
                        <div class="card shadow mb-4">
                            <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                            <!-- <div class="col-md-1"> -->
                            <!-- Form Error -->
                            <!-- </div> -->
                            <!-- </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="AddOnTabel" class="table table-striped w-20 dt-responsive">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No Drum</th>
                                                <th>Core</th>
                                                <th>Jumlah Keluar</th>
                                                <!-- <th>Serial Number</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="isitabeldetailhistorypermintaankabel" class="table-border-bottom-0"
                                            style="background-color:#D9DEE3">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Basic Bootstrap Table -->

                        <!--/ Borderless Table -->

                        <!-- Hoverable Table rows -->
                        <!--/ Hoverable Table rows -->

                        <!-- Small table -->
                        <!--/ Small table -->

                        <!-- Contextual Classes -->
                        <!--/ Contextual Classes -->

                        <!-- Table within card -->
                        <!--/ Table within card -->

                        <!-- Responsive Table -->
                        <!--/ Responsive Table -->
                        <!-- / Content -->
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <label>Wilayah : </label>
                    <input type="text" style="width:300px;border:0; background: transparent;outline:none;color:#697A8D;"
                        readonly id="wilayah" />
                    <br>
                    <label>No Telepon : </label>
                    <input type="text" style="width:300px;border:0; background: transparent;outline:none;color:#697A8D;"
                        readonly id="no_telepon" />
                    <br>
                    <h8>Data kabel yang ada pada tabel diatas ialah data yang sudah diapprove oleh
                        Direktur</h8>
                </div>
            </div>
        </div>
    </div>
    <!-- / Footer -->
    <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    <?= $this->endSection('content') ?>
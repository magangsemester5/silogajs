<?= $this->extend('Template/layout') ?>
<?= $this->section('content') ?>

<body>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span>Halaman Manajemen User</h4>
            <!-- Basic Bootstrap Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="fw-bold">Data user</h6>
                </div>
                <!-- <div class="row mt-2 ml-md-2 text-center"> -->
                <!-- <div class="col-md-1"> -->
                <!-- Form Error -->
                <!-- </div> -->
                <!-- </div> -->
                <div class="card-body">
                    <?php if (session()->get('jabatan') == 'Admin Pusat') { ?>
                    <a href="<?= base_url('tambah-user'); ?>" class="btn btn-info btn-icon-split mb-3">
                        <span class="icon text-green-50">
                            <i class="bx bx-plus-circle me-1"></i>
                        </span>
                        <span class="text">Tambah user</span>
                    </a>
                    <?php } ?>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped w-100 dt-responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <td><b>Email</b></td>
                                    <th>Id User</th>
                                    <th>Jabatan</th>
                                    <th>Kriteria</th>
                                    <th>Wilayah</th>
                                    <th>Nomor Telepon</th>
                                    <th>Foto user</th>
                                    <?php if (session()->get('jabatan') == 'Admin Pusat') { ?>
                                    <th>Aksi</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php $no = 1;
                                foreach ($tampildata as $td) : ?>
                                <?php if (session()->get('jabatan') == ('Rpm') && session()->get('wilayah') == $td->wilayah) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $td->nama ?></td>
                                    <td><?= $td->email ?></td>
                                    <td><?= $td->id_user ?></td>
                                    <td><?= $td->jabatan ?></td>
                                    <td><?= $td->kriteria ?></td>
                                    <td><?= $td->wilayah ?></td>
                                    <td><?= $td->no_telepon ?></td>
                                    <td>
                                        <?php if($td->foto_user == null) { ?>
                                        <img src="<?= base_url("../uploads/blank_profile_picture.jpeg") ?>"
                                            class="w-px-50 h-px-50 rounded-circle">
                                        <?php }else if(!empty($td->foto_user)){?>
                                        <img src="<?= base_url("../uploads/$td->foto_user") ?>"
                                            class="w-px-50 h-px-50 rounded-circle">
                                        <?php } ?>
                                    </td>
                                    <?php if (session()->get('jabatan') == 'Admin Pusat') { ?>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                            href="<?= base_url("edit-user/$td->id"); ?>"><i
                                                class="bx bx-edit-alt"></i>Edit</a>
                                        <a class="btn btn-danger btn-sm" style="color:white"
                                            onclick="deletedatauser(<?= $td->id?>)"><i class="bx bx-trash"></i>Hapus</a>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } else if (session()->get('jabatan') == ('Management'||'Direktur'||'PM'||'Admin Pusat')) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $td->nama ?></td>
                                    <td><?= $td->email ?></td>
                                    <td><?= $td->id_user ?></td>
                                    <td><?= $td->jabatan ?></td>
                                    <td><?= $td->kriteria ?></td>
                                    <td><?= $td->wilayah ?></td>
                                    <td><?= $td->no_telepon ?></td>
                                    <td>
                                        <?php if($td->foto_user == null) { ?>
                                        <img src="<?= base_url("../uploads/blank_profile_picture.jpeg") ?>"
                                            class="w-px-50 h-px-50 rounded-circle">
                                        <?php }else if(!empty($td->foto_user)){?>
                                        <img src="<?= base_url("../uploads/$td->foto_user") ?>"
                                            class="w-px-50 h-px-50 rounded-circle">
                                        <?php } ?>
                                    </td>
                                    <?php if (session()->get('jabatan') == 'Admin Pusat') { ?>
                                    <td>
                                        <a class="btn btn-warning btn-sm"
                                            href="<?= base_url("edit-user/$td->id"); ?>"><i
                                                class="bx bx-edit-alt"></i>Edit</a>
                                        <a class="btn btn-danger btn-sm" style="color:white"
                                            onclick="deletedatauser(<?= $td->id?>)"><i class="bx bx-trash"></i>Hapus</a>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                                <?php endforeach; ?>
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
        </div>
        <!-- / Content -->
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    <?= $this->endSection('content') ?>
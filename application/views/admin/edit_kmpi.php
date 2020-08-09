<!DOCTYPE html>
<html>

<head>
    <?php include("header.php") ?>
    <link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php include("menu_bar.php") ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Data Usulan KMPI</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Usulan KMPI</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <?= form_open_multipart('atur_kmpi/update_data/' . $id_kmpi) ?>
            <form role="form" method="POST" action="<?php echo site_url('atur_kmpi/update_data/' . $id_kmpi); ?>" enctype="multipart/form-data">
                <!-- Main content -->
                <section class="content" style="margin-left: 1%;margin-right: 1%">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pengusul KMPI</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nomor Induk</label>
                                        <input type="text" id="inputName" class="form-control" name="nomor_induk" readonly value="<?php echo $nomor_induk ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nama Pengusul</label>
                                        <input type="text" id="inputName" class="form-control" name="nama" value="<?php echo $nama ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Departemen</label>
                                        <input type="text" id="inputName" class="form-control" name="dept" value="<?php echo $dept ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Universitas</label>
                                        <input type="text" id="inputName" class="form-control" name="univ" value="<?php echo $univ ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Alamat Kantor</label>
                                        <input type="text" id="inputName" class="form-control" name="alamat_kantor" value="<?php echo $alamat_kantor ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Email</label>
                                        <input type="text" id="email" class="form-control" name="email" value="<?php echo $email ?>">
                                        <span class="error text-danger" id="invalid_email">Email yang anda masukkan invalid</span>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nomor HP</label>
                                        <input type="text" id="inputName" class="form-control" name="no_hp" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" value="<?php echo $no_hp ?>">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pembimbing</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">NIDN/NIP</label>
                                        <input type="text" id="nomor_pembimbing" class="form-control" name="nomor_pembimbing" value="<?php echo $nomor_pembimbing ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nama Dosen</label>
                                        <input type="text" id="nama_pembimbing" class="form-control" name="nama_pembimbing" value="<?php echo $nama_pembimbing ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Departemen</label>
                                        <input type="text" id="departemen_pembimbing" class="form-control" name="departemen_pembimbing" value="<?php echo $departemen_pembimbing ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Fakultas</label>
                                        <input type="text" id="fakultas_pembimbing" class="form-control" name="fakultas_pembimbing" value="<?php echo $fakultas_pembimbing ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Email</label>
                                        <input type="text" id="email_pembimbing" class="form-control" name="email_pembimbing" value="<?php echo $email_pembimbing ?>">
                                        <span class="error text-danger" id="invalid_email2">Email yang anda masukkan invalid</span>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Telepon</label>
                                        <input type="text" id="telepon" class="form-control" name="hp_pembimbing" maxlength="13" value="<?php echo $hp_pembimbing ?>">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- /.card -->
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Publikasi</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Judul</label>
                                        <input type="text" id="judul" class="form-control" name="judul_publikasi" value="<?php echo $judul_publikasi ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Publisher Tujuan</label>
                                        <input type="text" id="publisher" class="form-control" name="publisher" value="<?php echo $publisher ?>">
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Berkas</th>
                                                <th>Ubah Berkas</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('uploads/kmpi/' . $draft_publikasi); ?>" target="_black" class="btn btn-link">Draft Publikasi</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="draft_publikasi" id="draft_publikasi">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_draft"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('uploads/kmpi/' . $luaran_publikasi); ?>" target="_black" class="btn btn-link">Luaran Publikasi</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="luaran_publikasi" id="luaran_publikasi">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_luaran"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('uploads/kmpi/' . $mou_publikasi); ?>" target="_black" class="btn btn-link">MOU Publikasi</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="mou_publikasi" id="mou_publikasi">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_mou"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('uploads/kmpi/' . $mou_publikasi); ?>" target="_black" class="btn btn-link">File Luaran</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="luaran" id="luaran">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_luaran"></span>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-secondary" onclick="history.go(-1);">Batal </button>
                            <input type="submit" value="Save Changes" id="daftar" class="btn btn-success float-right">
                        </div>
                    </div>
                    <br>
                </section>
                <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include("footer.php") ?>
    </div>
    <!-- ./wrapper -->
    <script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/kmpi.js'); ?>"></script>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <?php include("header.php") ?>
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
                            <h1>Edit Data Usulan P3I</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Usulan P3I</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <?= form_open_multipart('atur_p3i/update_data/' . $id_p3i) ?>
            <!-- <form role="form" method="POST" action="<?php // echo site_url('atur_p3i/update_data/' . $id_p3i); 
                                                            ?>" enctype="multipart/form-data"> -->
            <!-- Main content -->
            <section class="content" style="margin-left: 1%;margin-right: 1%">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Pengusul</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Nomor Induk</label>
                                    <input type="text" id="inputName" class="form-control" name="nomor_induk" value="<?php echo $nomor_induk ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Nama Pengusul</label>
                                    <input type="text" id="inputName" class="form-control" name="nama" value="<?php echo $nama ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Departemen</label>
                                    <input type="text" id="inputName" class="form-control" name="departemen" value="<?php echo $departemen ?>">
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Universitas</label>
                                    <input type="text" id="inputName" class="form-control" name="universitas" value="<?php echo $universitas ?>">
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
                                    <input type="text" id="inputName" maxlength="13" class="form-control" name="no_hp" value="<?php echo $no_hp ?>">
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Dokumen</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Surat Pernyataan <a href="<?php echo base_url('uploads/p3i/' . $pernyataan); ?>" target="_blank" class="btn btn-link">Lihat File</a></th>
                                            <th>
                                                <div class="btn-group btn-group-sm">
                                                    <input type="file" placeholder="Upload Ulang?" name="pernyataan" id="pernyataan">
                                                </div>
                                                <br>
                                                <span class="error text-danger" id="invalid_pernyataan"></span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Draft Paper <a href="<?php echo base_url('uploads/p3i/' . $draf); ?>" target="_blank" class="btn btn-link">Lihat File</a></th>
                                            <th>
                                                <div class="btn-group btn-group-sm">
                                                    <input type="file" placeholder="Upload Ulang?" name="draf" id="draf">
                                                </div>
                                                <br>
                                                <span class="error text-danger" id="invalid_draf"></span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>NPWP <a href="<?php echo base_url('uploads/p3i/' . $npwp); ?>" target="_blank" class="btn btn-link">Lihat File</a></th>
                                            <th>
                                                <div class="btn-group btn-group-sm">
                                                    <input type="file" placeholder="Upload Ulang?" name="npwp" id="npwp">
                                                </div>
                                                <br>
                                                <span class="error text-danger" id="invalid_npwp"></span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Tabungan <a href="<?php echo base_url('uploads/p3i/' . $tabungan); ?>" target="_blank" class="btn btn-link">Lihat File</a></th>
                                            <th>
                                                <div class="btn-group btn-group-sm">
                                                    <input type="file" placeholder="Upload Ulang?" name="tabungan" id="tabungan">
                                                </div>
                                                <br>
                                                <span class="error text-danger" id="invalid_tabungan"></span>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Rekam Jejak Penelitian</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Skema</th>
                                            <th>Sumber Pendanaan</th>
                                            <th>Luaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1. </td>
                                            <td><input type="text" name="judul1" class="form-control" value="<?= $judul1 ?>" required></td>
                                            <td><input type="text" name="skema1" class="form-control" value="<?= $skema1 ?>" required></td>
                                            <td><input type="text" name="sumber1" class="form-control" value="<?= $sumber1 ?>" required></td>
                                            <td>
                                                <?php
                                                if (empty($luaran1)) { ?>
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="luaran1" id="luaran1">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_luaran"></span>
                                                <?php
                                                } else { ?>
                                                    <a href="<?php echo base_url('uploads/luaran/' . $luaran1); ?>" target="_blank" class="btn btn-link">Lihat File</a>
                                                <?php }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2. </td>
                                            <td><input type="text" name="judul2" class="form-control" value="<?= $judul2 ?>" required></td>
                                            <td><input type="text" name="skema2" class="form-control" value="<?= $skema2 ?>" required></td>
                                            <td><input type="text" name="sumber2" class="form-control" value="<?= $sumber2 ?>" required></td>
                                            <td>
                                                <?php
                                                if (empty($luaran2)) { ?>
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="luaran2" id="luaran2">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_luaran"></span>
                                                <?php
                                                } else { ?>
                                                    <a href="<?php echo base_url('uploads/luaran/' . $luaran2); ?>" target="_blank" class="btn btn-link">Lihat File</a>
                                                <?php }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3. </td>
                                            <td><input type="text" name="judul3" class="form-control" value="<?= $judul3 ?>" required></td>
                                            <td><input type="text" name="skema3" class="form-control" value="<?= $skema3 ?>" required></td>
                                            <td><input type="text" name="sumber3" class="form-control" value="<?= $sumber3 ?>" required></td>
                                            <td>
                                                <?php
                                                if (empty($luaran3)) { ?>
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="luaran3" id="luaran3">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_luaran"></span>
                                                <?php
                                                } else { ?>
                                                    <a href="<?php echo base_url('uploads/luaran/' . $luaran3); ?>" target="_blank" class="btn btn-link">Lihat File</a>
                                                <?php }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

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
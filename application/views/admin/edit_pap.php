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
                            <h1>Edit Data Usulan PAP</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Usulan PAP</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <form role="form" method="POST" action="<?php echo site_url('atur_pap/update_data/' . $id_pap); ?>" enctype="multipart/form-data">
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
                                        <label for="inputName">Nama Pengusul</label>
                                        <input type="text" id="inputName" class="form-control" name="nama_ketua" value="<?php echo $nama_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nomor Induk</label>
                                        <input type="text" id="inputName" class="form-control" name="nomor_induk_ketua" value="<?php echo $nomor_induk_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Departemen</label>
                                        <input type="text" id="inputName" class="form-control" name="departemen_ketua" value="<?php echo $departemen_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Universitas</label>
                                        <input type="text" id="inputName" class="form-control" name="universitas_ketua" value="<?php echo $universitas_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Alamat Kantor</label>
                                        <input type="text" id="inputName" class="form-control" name="alamat_ketua" value="<?php echo $alamat_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Email</label>
                                        <input type="text" id="inputName" class="form-control" name="email_ketua" value="<?php echo $email_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nomor HP</label>
                                        <input type="text" id="inputName" class="form-control" name="no_hp_ketua" value="<?php echo $no_hp_ketua ?>">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Penelitian</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nama Asisten Peneliti</label>
                                        <input type="text" id="inputName" class="form-control" name="nama_ap" value="<?php echo $nama_ap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Judul Penelitian</label>
                                        <input type="text" id="inputName" class="form-control" name="judul" value="<?php echo $judul ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Skema Penelitian</label>
                                        <input type="text" id="inputName" class="form-control" name="skema" value="<?php echo $skema ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Sumber Dana</label>
                                        <input type="text" id="inputName" class="form-control" name="pendanaan" value="<?php echo $pendanaan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Jumlah Hibah</label>
                                        <input type="text" id="inputName" class="form-control" name="jumlah_hibah" value="<?php echo $jumlah_hibah ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Honor</label>
                                        <input type="text" id="inputName" class="form-control" name="honor" value="<?php echo $honor ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Lama Penelitian</label>
                                        <input type="text" id="inputName" class="form-control" name="lama_bulan" value="<?php echo $lama_bulan ?>">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Berkas</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
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
                                                    <a href="<?php echo base_url('uploads/pap/' . $pernyataan); ?>" class="btn btn-link">Pernyataan</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <!--  <a href="#" class="btn btn-info"><i class="fas fa-eye"></i> </a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> </a> -->
                                                        <!-- <a href="#" class="btn btn-primary"><i class="fas fa-upload"></i> </a> -->

                                                        <input type="file" placeholder="Upload Ulang?" name="pernyataan">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('uploads/pap/' . $ktp); ?>" class="btn btn-link">KTP</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="ktp">
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-secondary" onclick="history.go(-1);">Batal </button>
                            <input type="submit" value="Save Changes" class="btn btn-success float-right">
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


</body>

</html>
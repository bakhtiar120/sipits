<!DOCTYPE html>
<html>

<head>
    <?php include("header.php") ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include("menu_bar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Detail Pengusul</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/bahan/pp.png'); ?>" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo $nama_ketua ?></h3>
                                    <p class="text-muted text-center">
                                        <?php
                                        if ($universitas_ketua == "ITS" || $universitas_ketua == "Institut Teknologi Sepuluh Nopember") echo "Dosen ITS";

                                        else echo "Dosen Non ITS";
                                        ?>
                                    </p>
                                    <p class="text-muted text-center">Tanggal Submit : <?php echo $tanggal_submit ?> </p>
                                    <!--  <p class="text-muted text-center">Status : <?php echo $status ?> </p> -->

                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Nomor Induk</strong>
                                    <p class="text-muted">
                                        <?php echo $nomor_induk_ketua ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Departemen</strong>
                                    <p class="text-muted">
                                        <?php echo $departemen_ketua ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Universitas</strong>
                                    <p class="text-muted">
                                        <?php echo $universitas_ketua ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Alamat Kantor</strong>
                                    <p class="text-muted">
                                        <?php echo $alamat_ketua ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Email</strong>
                                    <p class="text-muted">
                                        <?php echo $email_ketua ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Nomor HP</strong>
                                    <p class="text-muted">
                                        <?php echo $no_hp_ketua ?>
                                    </p>
                                    <hr>
                                </div>

                            </div>


                            <!-- Detail Penelitian -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Penelitian</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Nama Asisten Peneliti</strong>

                                    <p class="text-muted">
                                        <?php echo $nama_ap ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Judul Penelitian</strong>
                                    <p class="text-muted">
                                        <?php echo $judul ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Skema Penelitian</strong>
                                    <p class="text-muted">
                                        <?php echo $skema ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Sumber Dana</strong>
                                    <p class="text-muted">
                                        <?php echo $pendanaan ?>
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Jumlah Hibah</strong>
                                    <p class="text-muted">
                                        <?php echo $jumlah_hibah ?>
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Honor</strong>
                                    <p class="text-muted">
                                        <?php echo $honor ?>
                                    </p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Lama Penelitian</strong>
                                    <p class="text-muted">
                                        <?php echo $lama_bulan ?> bulan
                                    </p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Pernyataan</strong>
                                    <p class="text-muted">
                                        <a href="<?php echo base_url('uploads/pap/' . $pernyataan); ?>" class="btn btn-link">Lihat File</a>
                                    </p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> KTP</strong>
                                    <p class="text-muted">
                                        <a href="<?php echo base_url('uploads/pap/' . $ktp); ?>" class="btn btn-link">Lihat File</a>
                                    </p>
                                    <hr>

                                </div>

                            </div>

                            <!-- Detail Penelitian -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Aksi</h3>
                                </div>

                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a class="btn btn-warning btn-sm" href="<?php echo site_url('atur_pap/edit/' . $id_pap); ?>">
                                                <i class="fas fa-edit">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo site_url('atur_pap/hapus/' . $id_pap); ?>">
                                                <i class="fas fa-trash">
                                                </i>
                                                Hapus
                                            </a>

                                        </div>
                                        <div class="col-sm-9" style="text-align: right;">
                                            <a class="btn btn-info btn-sm" href="<?php echo site_url('atur_pap/update_status/' . $id_pap . '/' . '1'); ?>">
                                                <i class="fas fa-book">
                                                </i>
                                                Review
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="<?php echo site_url('atur_pap/update_status/' . $id_pap . '/' . '2'); ?>">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Revisi
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo site_url('atur_pap/update_status/' . $id_pap . '/' . '3'); ?>">
                                                <i class="fas fa-times">
                                                </i>
                                                Ditolak
                                            </a>

                                            <a class="btn btn-success btn-sm" href="<?php echo site_url('atur_kp/update_status/' . $id_pap . '/' . '4'); ?>">
                                                <i class="fas fa-check">
                                                </i>
                                                Diterima
                                            </a>
                                        </div>
                                    </div>




                                </div>

                            </div>

                        </div>

                    </div>
            </section>

        </div>


        <?php include("footer.php") ?>
</body>

</html>
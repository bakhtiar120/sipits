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
                            <h1>Detail Pengusul KMPI</h1>
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

                                    <h3 class="profile-username text-center"><?php echo $nama ?></h3>
                                    <p class="text-muted text-center">Tanggal Submit : <?php echo $tanggal_submit ?> </p>
                                    <!--  <p class="text-muted text-center">Status : <?php echo $status ?> </p> -->

                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Nomor Induk</strong>
                                    <p class="text-muted">
                                        <?php echo $nomor_induk ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Departemen</strong>
                                    <p class="text-muted">
                                        <?php echo $dept ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Universitas</strong>
                                    <p class="text-muted">
                                        <?php echo $univ ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Alamat Kantor</strong>
                                    <p class="text-muted">
                                        <?php echo $alamat_kantor ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Email</strong>
                                    <p class="text-muted">
                                        <?php echo $email ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-book mr-1"></i> Nomor HP</strong>
                                    <p class="text-muted">
                                        <?php echo $no_hp ?>
                                    </p>
                                    <hr>
                                </div>

                            </div>


                            <!-- Detail Pembimbing -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Identitas Pembimbing</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Nama Dosen</strong>

                                    <p class="text-muted">
                                        <?php echo $nomor_pembimbing ?>
                                        <?php echo $nama_pembimbing ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Departemen</strong>
                                    <p class="text-muted">
                                        <?php echo $departemen_pembimbing ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Fakultas</strong>
                                    <p class="text-muted">
                                        <?php echo $fakultas_pembimbing ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                                    <p class="text-muted">
                                        <?php echo $email_pembimbing ?>
                                    </p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Telepon</strong>
                                    <p class="text-muted">
                                        <?php echo $hp_pembimbing ?>
                                    </p>
                                    <hr>
                                </div>

                            </div>

                            <!-- Detail Publish -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Identitas Publikasi</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Judul</strong>

                                    <p class="text-muted">
                                        <?php echo $judul_publikasi ?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Publisher Tujuan</strong>
                                    <p class="text-muted">
                                        <?php echo $publisher ?>
                                    </p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Draft </strong>
                                    <p class="text-muted">
                                        <a href="<?php echo base_url('uploads/kmpi/' . $draft_publikasi); ?>" target="_blank" class="btn btn-link">Lihat File</a>
                                    </p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> Luaran </strong>
                                    <p class="text-muted">
                                        <a href="<?php echo base_url('uploads/kmpi/' . $luaran_publikasi); ?>" target="_blank" class="btn btn-link">Lihat File</a>
                                    </p>
                                    <hr>

                                    <strong><i class="far fa-file-alt mr-1"></i> MOU</strong>
                                    <p class="text-muted">
                                        <a href="<?php echo base_url('uploads/kmpi/' . $mou_publikasi); ?>" target="_blank" class="btn btn-link">Lihat File</a>
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
                                            <a class="btn btn-default btn-sm" href="<?php echo site_url('atur_kmpi'); ?>">
                                                <i class="fas fa-reply">
                                                </i>
                                                Kembali
                                            </a>
                                            <a class="btn btn-warning btn-sm" href="<?php echo site_url('atur_kmpi/edit/' . $id_kmpi); ?>">
                                                <i class="fas fa-edit">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo site_url('atur_kmpi/hapus/' . $id_kmpi); ?>">
                                                <i class="fas fa-trash">
                                                </i>
                                                Hapus
                                            </a>

                                        </div>
                                        <div class="col-sm-9" style="text-align: right;">
                                            <a class="btn btn-info btn-sm" href="<?php echo site_url('atur_kmpi/update_status/' . $id_kmpi . '/' . '1'); ?>">
                                                <i class="fas fa-book">
                                                </i>
                                                Review
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="<?php echo site_url('atur_kmpi/update_status/' . $id_kmpi . '/' . '2'); ?>">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Revisi
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo site_url('atur_kmpi/update_status/' . $id_kmpi . '/' . '3'); ?>">
                                                <i class="fas fa-times">
                                                </i>
                                                Ditolak
                                            </a>

                                            <a class="btn btn-success btn-sm" href="<?php echo site_url('atur_kmpi/update_status/' . $id_kmpi . '/' . '4'); ?>">
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
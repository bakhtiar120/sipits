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
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url('assets/bahan/pp.png');?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $nama ?></h3>
                <p class="text-muted text-center">
                  <?php 
                    if($kategori==0) echo "Dosen ITS";
                    elseif($kategori==1) echo "Mahasiswa ITS";
                    elseif($kategori==2) echo "Dosen Non-ITS";
                    elseif($kategori==3) echo "Mahasiswa Non-ITS";
                    else echo "Umum";
                  ?> 
                </p>
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
                   <?php echo $departemen ?>
                </p>
                <hr>

                <strong><i class="fas fa-book mr-1"></i> Universitas</strong>
                <p class="text-muted">
                   <?php echo $universitas ?>
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


            <!-- Detail Penelitian -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Penelitian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Ketua Peneliti</strong>

                <p class="text-muted">
                  <?php echo $ketua ?>
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
                  <?php echo $sumber ?>
                </p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Lama Penelitian</strong>
                <p class="text-muted">
                  <?php echo $lama_penelitian?> tahun
                </p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Anggota Peneliti</strong>
                <p class="text-muted">
                  <?php echo $anggota?>
                </p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Proposal</strong>
                <p class="text-muted">
                  <a href="<?php echo base_url('uploads/kp/'.$proposal);?>" class="btn btn-link">Lihat File</a>
                </p>
                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> MoU</strong>
                <p class="text-muted">
                  <a href="<?php echo base_url('uploads/kp/'.$mou);?>" class="btn btn-link">Lihat File</a>
                </p>
                <hr>

                 <strong><i class="far fa-file-alt mr-1"></i> MoA</strong>
                <p class="text-muted">
                  <a href="<?php echo base_url('uploads/kp/'.$moa);?>" class="btn btn-link">Lihat File</a>
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
                  <a class="btn btn-warning btn-sm" href="<?php echo site_url('atur_kp/edit/'.$id_kp);?>">
                      <i class="fas fa-edit">
                      </i>
                      Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="<?php echo site_url('atur_kp/hapus/'.$id_kp);?>">
                      <i class="fas fa-trash">
                      </i>
                      Hapus
                  </a>

                </div>
                <div class="col-sm-9" style="text-align: right;">
                  <a class="btn btn-info btn-sm" href="<?php echo site_url('atur_kp/update_status/'.$id_kp.'/'.'1');?>">
                    <i class="fas fa-book">
                    </i>
                    Review
                  </a>
                  <a class="btn btn-primary btn-sm" href="<?php echo site_url('atur_kp/update_status/'.$id_kp.'/'.'2');?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Revisi
                  </a>
                  <a class="btn btn-danger btn-sm" href="<?php echo site_url('atur_kp/update_status/'.$id_kp.'/'.'3');?>">
                      <i class="fas fa-times">
                      </i>
                      Ditolak
                  </a>

                  <a class="btn btn-success btn-sm" href="<?php echo site_url('atur_kp/update_status/'.$id_kp.'/'.'4');?>">
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

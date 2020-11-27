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
        <?php echo $this->session->flashdata("hasil"); ?>
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

                  <h3 class="profile-username text-center"><?php echo cetak($nama) ?></h3>
                  <p class="text-muted text-center">
                    <?php
                    if ($kategori == 0) echo "Dosen ITS";
                    elseif ($kategori == 1) echo "Mahasiswa ITS";
                    elseif ($kategori == 2) echo "Dosen Non-ITS";
                    elseif ($kategori == 3) echo "Mahasiswa Non-ITS";
                    else echo "Umum";
                    ?>
                  </p>
                  <p class="text-muted text-center">Tanggal Submit : <?php echo $tanggal_submit ?> </p>
                  <!--  <p class="text-muted text-center">Status : <?php echo $status ?> </p> -->

                  <hr>

                  <strong><i class="fas fa-book mr-1"></i> Nomor Induk</strong>
                  <p class="text-muted">
                    <?php echo cetak($nomor_induk) ?>
                  </p>
                  <hr>

                  <strong><i class="fas fa-book mr-1"></i> Departemen</strong>
                  <p class="text-muted">
                    <?php echo cetak($departemen) ?>
                  </p>
                  <hr>

                  <strong><i class="fas fa-book mr-1"></i> Universitas</strong>
                  <p class="text-muted">
                    <?php echo cetak($universitas) ?>
                  </p>
                  <hr>

                  <strong><i class="fas fa-book mr-1"></i> Alamat Kantor</strong>
                  <p class="text-muted">
                    <?php echo cetak($alamat_kantor) ?>
                  </p>
                  <hr>

                  <strong><i class="fas fa-book mr-1"></i> Email</strong>
                  <p class="text-muted">
                    <?php echo cetak($email) ?>
                  </p>
                  <hr>

                  <strong><i class="fas fa-book mr-1"></i> Nomor HP</strong>
                  <p class="text-muted">
                    <?php echo cetak($no_hp) ?>
                  </p>
                  <hr>
                </div>

              </div>


              <!-- Detail Penelitian -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Dokumen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Surat Pernyataan <a href="<?php echo base_url('uploads/p3i/' . $pernyataan); ?>" target="_blank" class="btn btn-link">Lihat File</a></th>
                        <th>Draft Paper <a href="<?php echo base_url('uploads/p3i/' . $draf); ?>" target="_blank" class="btn btn-link">Lihat File</a></th>
                        <th>NPWP <a href="<?php echo base_url('uploads/p3i/' . $npwp); ?>" target="_blank" class="btn btn-link">Lihat File</a></th>
                        <th>Tabungan <a href="<?php echo base_url('uploads/p3i/' . $tabungan); ?>" target="_blank" class="btn btn-link">Lihat File</a></th>
                      </tr>
                    </thead>
                  </table>
                </div>

              </div>

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
                        <td><?= $judul1 ?></td>
                        <td><?= $skema1 ?></td>
                        <td><?= $sumber1 ?></td>
                        <td>
                          <?php if (empty($luaran1)) {
                            echo 'Belum Upload';
                          } else { ?>
                            <a href="<?php echo base_url('uploads/luaran/' . $luaran1); ?>" target="_blank" class="btn btn-link">Lihat File</a>
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td>2. </td>
                        <td><?= $judul2 ?></td>
                        <td><?= $skema2 ?></td>
                        <td><?= $sumber2 ?></td>
                        <td>
                          <?php if (empty($luaran2)) {
                            echo 'Belum Upload';
                          } else { ?>
                            <a href="<?php echo base_url('uploads/luaran/' . $luaran2); ?>" target="_blank" class="btn btn-link">Lihat File</a>
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td>3. </td>
                        <td><?= $judul3 ?></td>
                        <td><?= $skema3 ?></td>
                        <td><?= $sumber3 ?></td>
                        <td>
                          <?php if (empty($luaran3)) {
                            echo 'Belum Upload';
                          } else { ?>
                            <a href="<?php echo base_url('uploads/luaran/' . $luaran3); ?>" target="_blank" class="btn btn-link">Lihat File</a>
                          <?php } ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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
                      <a class="btn btn-default btn-sm" href="<?php echo site_url('atur_p3i'); ?>">
                        <i class="fas fa-reply">
                        </i>
                        Kembali
                      </a>
                      <?php if (cekRole($this->session->userdata("id_user"), $this->uri->segment(1), "edit") == 1) { ?>
                        <a class="btn btn-warning btn-sm" href="<?php echo site_url('atur_p3i/edit/' . $id_p3i); ?>">
                          <i class="fas fa-edit">
                          </i>
                          Edit
                        </a>
                      <?php } ?>
                      <?php if (cekRole($this->session->userdata("id_user"), $this->uri->segment(1), "hapus") == 1) { ?>
                        <a class="btn btn-danger btn-sm" href="" data-toggle="modal" data-target="#deleteModal">
                          <i class="fas fa-trash">
                          </i>
                          Hapus
                        </a>
                      <?php } ?>

                    </div>
                    <div class="col-sm-9" style="text-align: right;">
                      <?php if (cekRole($this->session->userdata("id_user"), $this->uri->segment(1), "edit") == 1) { ?>
                        <a class="btn btn-info btn-sm" href="<?php echo site_url('atur_p3i/update_status/' . $id_p3i . '/' . '1'); ?>">
                          <i class="fas fa-book">
                          </i>
                          Review
                        </a>
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url('atur_p3i/update_status/' . $id_p3i . '/' . '2'); ?>">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Revisi
                        </a>
                        <a class="btn btn-danger btn-sm" href="<?php echo site_url('atur_p3i/update_status/' . $id_p3i . '/' . '3'); ?>">
                          <i class="fas fa-times">
                          </i>
                          Ditolak
                        </a>

                        <a class="btn btn-success btn-sm" href="<?php echo site_url('atur_p3i/update_status/' . $id_p3i . '/' . '4'); ?>">
                          <i class="fas fa-check">
                          </i>
                          Diterima
                        </a>
                      <?php } ?>
                    </div>
                  </div>




                </div>

              </div>

            </div>

          </div>
      </section>

    </div>

    <form action="<?php echo site_url('atur_p3i/hapus/'); ?>" method="post">
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <h4>Apakah kamu yakin menghapus data ini ?</h4>

            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_p3i" class="id_p3i" value="<?php echo $id_p3i ?>">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya</button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <?php include("footer.php") ?>
</body>

</html>
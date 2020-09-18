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


              <h1>Data Pengusul Kerjasama Penelitian</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Data Pengusul KP</li>
              </ol>
            </div>
            <?php echo $this->session->flashdata("hasil_kp"); ?>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">

            <!-- data KP -->
            <div class="card">

              <div class="card-header">
                <h3 class="card-title">
                  <?php if ($temp != " ")
                    echo "Data " . $temp;

                  ?>

                </h3>
              </div>
              <div class="col-10">
                <a class="btn btn-info btn-sm" href="<?php echo site_url('atur_kp/cetak_excel'); ?>">
                  <i class="fas fa-print">
                  </i>
                  Cetak Excel
                </a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Pengusul</th>
                      <th>Asal</th>
                      <th>Tanggal Usul</th>
                      <th>Luaran</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php foreach ($data as $key => $value) : ?>

                      <tr>

                        <td><?php echo $value['nama']; ?></td>
                        <td><?php echo $value['universitas'];; ?></td>
                        <td><?php echo $value['tanggal_submit']; ?></td>
                        <td>
                          <?php
                          if ($value['status_luaran'] == 1) echo "Luaran Terkumpul";
                          else echo "Belum Upload";
                          ?>
                        </td>
                        <td>
                          <?php
                          if ($value['status'] == 1) echo "Proses Review";
                          elseif ($value['status'] == 2) echo "Revisi Usulan";
                          elseif ($value['status'] == 3) echo "Usulan Ditolak";
                          elseif ($value['status'] == 4) echo "Usulan Diterima";
                          else echo "Usulan Baru";
                          ?>

                        </td>

                        <td>
                          <a class="btn btn-primary btn-sm" href="<?php echo site_url('atur_kp/detail/' . $value['id_kp']); ?>">
                            <i class="fas fa-folder">
                            </i>
                            Detail
                          </a>

                          <!-- <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default" href="<?php echo site_url('atur_kp/hapus/' . $value['id_kp']); ?>"> -->

                          <a class="btn btn-info btn-sm" href="<?php echo site_url('atur_kp/cetak_tanda_terima'); ?>">
                            <i class="fas fa-print">
                            </i>
                            Cetak Kontrak
                          </a>
                        </td>


                      </tr>
                    <?php endforeach; ?>

                  </tbody>

                </table>
              </div>
            </div>







            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->


    <?php include("footer.php") ?>
    <!-- page script -->
    <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script>
      $(function() {
        $("#example4").DataTable();
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "order": [
            [2, "asc"]
          ],
        });

      });
    </script>
</body>

</html>
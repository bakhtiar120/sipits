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
              <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a href="#">Home</a></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= jml_kp() ?></h3>

                  <p>KP</p>
                </div>
                <div class="icon">
                  <i class="far fa-clipboard"></i>
                </div>
                <a href="<?= base_url() ?>atur_kp" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= jml_pap() ?></h3>

                  <p>PAP</p>
                </div>
                <div class="icon">
                  <i class="fas fa-archive"></i>
                </div>
                <a href="<?= base_url() ?>atur_pap" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?= jml_kmpi() ?></h3>

                  <p>KMPI</p>
                </div>
                <div class="icon">
                  <i class="fas fa-book"></i>
                </div>
                <a href="<?= base_url() ?>atur_kmpi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= jml_p3i() ?></h3>

                  <p>P3I</p>
                </div>
                <div class="icon">
                  <i class="fas fa-file-alt"></i>
                </div>
                <a href="<?= base_url() ?>atur_p3i" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="card">
                <div class="card-header bg-info" align="center">
                  KP
                </div>
                <div class="card-body" style="padding:0px">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>JML</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Pengajuan</td>
                        <td><?= status_kp(0) ?></td>
                      </tr>
                      <tr>
                        <td>Review</td>
                        <td><?= status_kp(1) ?></td>
                      </tr>
                      <tr>
                        <td>Revisi</td>
                        <td><?= status_kp(2) ?></td>
                      </tr>
                      <tr>
                        <td>Tolak</td>
                        <td><?= status_kp(3) ?></td>
                      </tr>
                      <tr>
                        <td>Terima</td>
                        <td><?= status_kp(4) ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="card">
                <div class="card-header bg-success" align="center">
                  PAP
                </div>
                <div class="card-body" style="padding:0px">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>JML</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Pengajuan</td>
                        <td><?= status_pap(0) ?></td>
                      </tr>
                      <tr>
                        <td>Review</td>
                        <td><?= status_pap(1) ?></td>
                      </tr>
                      <tr>
                        <td>Revisi</td>
                        <td><?= status_pap(2) ?></td>
                      </tr>
                      <tr>
                        <td>Tolak</td>
                        <td><?= status_pap(3) ?></td>
                      </tr>
                      <tr>
                        <td>Terima</td>
                        <td><?= status_pap(4) ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="card">
                <div class="card-header bg-warning" align="center">
                  KMPI
                </div>
                <div class="card-body" style="padding:0px">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>JML</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Pengajuan</td>
                        <td><?= status_kmpi(0) ?></td>
                      </tr>
                      <tr>

                        <td>Review</td>
                        <td><?= status_kmpi(1) ?></td>
                      </tr>
                      <tr>
                        <td>Revisi</td>
                        <td><?= status_kmpi(2) ?></td>
                      </tr>
                      <tr>
                        <td>Tolak</td>
                        <td><?= status_kmpi(3) ?></td>
                      </tr>
                      <tr>
                        <td>Terima</td>
                        <td><?= status_kmpi(4) ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="card">
                <div class="card-header bg-danger" align="center">
                  P3I
                </div>
                <div class="card-body" style="padding:0px">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Status</th>
                        <th>JML</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Pengajuan</td>
                        <td><?= status_p3i(0) ?></td>
                      </tr>
                      <tr>
                        <td>Review</td>
                        <td><?= status_p3i(1) ?></td>
                      </tr>
                      <tr>
                        <td>Revisi</td>
                        <td><?= status_p3i(2) ?></td>
                      </tr>
                      <tr>
                        <td>Tolak</td>
                        <td><?= status_p3i(3) ?></td>
                      </tr>
                      <tr>
                        <td>Terima</td>
                        <td><?= status_p3i(4) ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
        </div>
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Pemberitahuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Untuk menghapus data ini, masuk ke detail kemudian klik tombol hapus</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" href="">OK</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <?php include("footer.php") ?>
    <!-- page script -->
    <script>
      $(function() {
        $("#example1").DataTable();
        $("#example2").DataTable();
        $("#example3").DataTable();
        $('#example4').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
    </script>
</body>

</html>
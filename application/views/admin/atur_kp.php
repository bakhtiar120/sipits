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
            <div class="alert alert-success col-12">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fa fa-check"></i> Berhasil!</h5>
              Data Pengusul Kerjasama Penelitian berhasil diupdate
            </div>
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

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Pengusul</th>
                      <th>Asal</th>
                      <th>Tanggal Usul</th>
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
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal">
                            Launch Primary Modal
                          </button>
                          <a class="btn btn-danger btn-sm btn-delete" href="#" data-toggle="modal" data-target="#deleteModal">
                            <i class="fas fa-trash">
                            </i>
                            Hapus
                          </a>
                          <a class="btn btn-info btn-sm" href="<?php echo site_url('laporanpdf'); ?>">
                            <i class="fas fa-print">
                            </i>
                            Cetak Kontrak
                          </a>
                        </td>


                      </tr>
                    <?php endforeach; ?>
                    <form action=<?php echo site_url('atur_kp/hapus/'); ?> method="post">
                      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input type="hidden" name="id_kp" class="id_kp">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary" href="">OK</button>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                          </>
                          <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </form>

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
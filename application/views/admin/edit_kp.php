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
            <h1>Edit Data Usulan KP</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Usulan KP</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<form role="form" method="POST" action="<?php echo site_url('atur_kp/update_data/'.$id_kp); ?>" enctype="multipart/form-data">
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
                <input type="text" id="inputName" class="form-control" name="nama" value="<?php echo $nama ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Nomor Induk</label>
                <input type="text" id="inputName" class="form-control" name="nomor_induk" value="<?php echo $nomor_induk ?>">
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
                <input type="text" id="inputName" class="form-control" name="email" value="<?php echo $email ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Nomor HP</label>
                <input type="text" id="inputName" class="form-control" name="no_hp" value="<?php echo $no_hp ?>">
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
                <label for="inputName">Ketua Peneliti</label>
                <input type="text" id="inputName" class="form-control" name="ketua" value="<?php echo $ketua ?>">
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
                <input type="text" id="inputName" class="form-control" name="sumber" value="<?php echo $sumber ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Lama Penelitian</label>
                <input type="text" id="inputName" class="form-control" name="lama_penelitian" value="<?php echo $lama_penelitian ?>">
              </div>
              <div class="form-group">
                <label for="inputName">Anggota Peneliti</label>
                <input type="text" id="inputName" class="form-control" name="anggota" value="<?php echo $anggota ?>">
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
                      <a href="<?php echo base_url('uploads/kp/'.$proposal);?>" class="btn btn-link">Draft Proposal</a>
                    </td>
                   
                    <td class="py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                       <!--  <a href="#" class="btn btn-info"><i class="fas fa-eye"></i> </a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> </a> -->
                        <!-- <a href="#" class="btn btn-primary"><i class="fas fa-upload"></i> </a> -->

                        <input type="file" placeholder="Upload Ulang?" name="proposal">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('uploads/kp/'.$mou);?>" class="btn btn-link">MoU</a>
                    </td>
                   
                    <td class="py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <input type="file" placeholder="Upload Ulang?" name="mou">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('uploads/kp/'.$moa);?>" class="btn btn-link">MoA</a>
                    </td>
                   
                    <td class="py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <input type="file" placeholder="Upload Ulang?" name="moa">
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

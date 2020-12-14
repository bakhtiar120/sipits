<!DOCTYPE html>
<html>

<head>
    <?php include("header.php") ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE/plugins/select2/css/select2.min.css">


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


                            <h1>Detail Rak</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Master Rak</a></li>
                                <li class="breadcrumb-item active">Detail Rak</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <?php echo $this->session->flashdata("hasil"); ?>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <!-- data KP -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">
                                    List Dokumen
                                </h3>
                            </div>

                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun</th>
                                            <th>Sumber Dana</th>
                                            <th>Skema</th>
                                            <th>Judul Dokumen</th>
                                            <th>Nama Ketua</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($rak as $key) {
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $key->tahun; ?></td>
                                                <td><?= $key->sumber; ?></td>
                                                <td><?= $key->skema; ?></td>
                                                <td><?= $key->judul; ?></td>
                                                <td><?= $key->nama_ketua; ?></td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
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

        <!-- /.modal -->

        <!-- <div class="modal fade" id="editRak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Master Rak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php // echo base_url() 
                                                ?>/Rak/update_rak">
                        <div class="modal-body">
                            <input type="hidden" name="id_rak3" id="id_rak3">

                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Nama Rak :</label>
                                <input type="text" id="nama_rak2" class="form-control" name="nama_rak">

                            </div>
                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Posisi :</label>
                                <input type="text" id="posisi2" class="form-control" name="posisi">

                            </div>
                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Jumlah Kolom :</label>
                                <input type="text" id="jumlah_kolom2" class="form-control" name="jumlah_kolom">

                            </div>
                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Jumlah Baris :</label>
                                <input type="text" id="jumlah_baris2" class="form-control" name="jumlah_baris">

                            </div>
                            <di>
                                <label for="nama_pengirim" class="col-form-label">Tanggal Beli :</label>
                                <input type="date" name="tgl_beli" id="tgl_beli2" class="form-control">
                            </di>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

        <?php include("footer.php") ?>
        <script src="<?php echo base_url() ?>/assets/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
            var table;
            $(document).ready(function() {
                //Initialize Select2 Elements
                $('.select2').select2();
                //datatables
                $('#table').DataTable();
            });
        </script>
</body>

</html>
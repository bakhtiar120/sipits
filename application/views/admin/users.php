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


                            <h1>Master Users</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Master Users</li>
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
                                    Master Users
                                </h3>
                                <?php if (cekRole($this->session->userdata("id_user"), $this->uri->segment(1), "tambah") == 1) { ?>
                                    <div class="text-right">
                                        <a href="<?php echo base_url() ?>users/tambah" class="btn btn-sm btn-primary">Tambah Users</a>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($users as $key) { ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $key->username ?></td>
                                                <td><?php foreach ($role as $value) {
                                                        if ($value->id_user == $key->id_user) {
                                                            echo $value->kode_menu . ' = ';
                                                            if ($value->tambah == 1) {
                                                                echo "create" . ', ';
                                                            }
                                                            if ($value->baca == 1) {
                                                                echo "read" . ', ';
                                                            }
                                                            if ($value->edit == 1) {
                                                                echo "update" . ', ';
                                                            }
                                                            if ($value->hapus == 1) {
                                                                echo "delete";
                                                            }
                                                            echo "<br>";
                                                        }
                                                    } ?></td>
                                                <td>
                                                    <?php if (cekRole($this->session->userdata("id_user"), $this->uri->segment(1), "edit") == 1) { ?> <a href="<?php echo base_url() ?>users/edit/<?php echo $key->id_user ?>" class="btn btn-sm btn-warning">Edit</a> <?php } ?>&nbsp; <?php if (cekRole($this->session->userdata("id_user"), $this->uri->segment(1), "hapus") == 1) { ?> <a href="" class="btn btn-sm btn-danger">Hapus</a><?php } ?></td>
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

        <?php include("footer.php") ?>
        <script src="<?php echo base_url() ?>/assets/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
            var table;
            $(document).ready(function() {
                //datatables
                $('#table').DataTable();
            });
        </script>
</body>

</html>
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
                            <h1>Tambah User</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <form role="form" method="POST" action="<?php echo site_url('users/simpanEdit'); ?>" enctype="multipart/form-data">
                <!-- Main content -->
                <section class="content" style="margin-left: 1%;margin-right: 1%">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data User</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" id="inputName" class="form-control" name="id_user" value="<?php echo $users->id_user ?>">
                                        <label for="inputName">Username</label>
                                        <input type="email" id="inputName" class="form-control" name="username" value="<?php echo $users->username ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Password</label>
                                        <input type="password" id="inputName" class="form-control" name="password" value="<?php echo $users->hash ?>">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-md-6">
                            <!-- /.card -->
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Role</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th style="text-align: center;">Create</th>
                                                <th style="text-align: center;">Read</th>
                                                <th style="text-align: center;">Update</th>
                                                <th style="text-align: center;">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($menu as $key) { ?>
                                                <tr>
                                                    <td><?php echo $key->nama_menu ?><input type="hidden" name="id_menu[]" value="<?php echo $key->id ?>"></td>
                                                    <td style="text-align: center;">
                                                        <?php if ($key->id == 58 || $key->id == 59) { ?><input type="checkbox" name="create<?php echo $key->id ?>" value="1" <?php if (cekRole($users->id_user, $key->kode_menu, "tambah")) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                } ?>><?php } ?></td>
                                                    <td style="text-align: center;"><input type="checkbox" name="read<?php echo $key->id ?>" value="1" <?php if (cekRole($users->id_user, $key->kode_menu, "baca")) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>></td>
                                                    <td style="text-align: center;"><input type="checkbox" name="update<?php echo $key->id ?>" value="1" <?php if (cekRole($users->id_user, $key->kode_menu, "edit")) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>></td>
                                                    <td style="text-align: center;"><input type="checkbox" name="delete<?php echo $key->id ?>" value="1" <?php if (cekRole($users->id_user, $key->kode_menu, "hapus")) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>></td>
                                                </tr>
                                            <?php } ?>
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
                            <a class="btn btn-secondary" href="<?php echo base_url('users') ?>">Batal </a>
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
    <script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/kp.js'); ?>"></script>


</body>

</html>
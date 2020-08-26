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
                            <h1>Edit Data Usulan PAP</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Usulan PAP</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <form role="form" method="POST" action="<?php echo site_url('atur_pap/update_data/' . $id_pap); ?>" enctype="multipart/form-data">
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
                                        <input type="text" id="inputName" class="form-control" name="nama_ketua" value="<?php echo $nama_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nomor Induk</label>
                                        <input type="text" id="inputName" class="form-control" name="nomor_induk_ketua" value="<?php echo $nomor_induk_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Departemen</label>
                                        <input type="text" id="inputName" class="form-control" name="departemen_ketua" value="<?php echo $departemen_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Universitas</label>
                                        <input type="text" id="inputName" class="form-control" name="universitas_ketua" value="<?php echo $universitas_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Alamat Kantor</label>
                                        <input type="text" id="inputName" class="form-control" name="alamat_ketua" value="<?php echo $alamat_ketua ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Email</label>
                                        <input type="text" id="inputName" class="form-control" id="email_ketua" name="email_ketua" value="<?php echo $email_ketua ?>">
                                        <span class="error text-danger" id="invalid_email">Email yang anda masukkan invalid</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nomor HP</label>
                                        <input type="text" id="inputName" class="form-control" name="no_hp_ketua" value="<?php echo $no_hp_ketua ?>" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')">
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
                                        <label for="inputName">Judul Penelitian</label>
                                        <input type="text" id="inputName" class="form-control" name="judul" value="<?php echo $judul ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Skema Penelitian</label>
                                        <input type="text" id="inputName" class="form-control" name="skema" value="<?php echo $skema ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Sumber Dana</label>
                                        <input type="text" id="inputName" class="form-control" name="pendanaan" value="<?php echo $pendanaan ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName">Honor</label>
                                        <input type="text" id="honor" class="form-control" name="honor" value="<?php echo "Rp. " .  number_format($honor, 0, ".", ".") ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Lama Penelitian</label>
                                        <div class="row">
                                            <div class="col-sm-4" style="margin-top:5px;">
                                                <input type="text" placeholder="Masukkan lama pekerjaan" value="<?php echo $lama_bulan ?>" name="lama_bulan" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" id="lama_bulan" required>

                                            </div>
                                            <div class="col-sm-4" style="margin-left: 30px;">
                                                <select class="form-control" name="jenis_lama" id="jenis_lama" required>
                                                    <option value="">--- Pilih ---</option>
                                                    <option value="Jam" <?php if ($jenis_lama == "Jam") echo 'selected="selected"'; ?>>Jam</option>
                                                    <option value="Hari" <?php if ($jenis_lama == "Hari") echo 'selected="selected"'; ?>>Hari</option>
                                                    <option value="Bulan" <?php if ($jenis_lama == "Bulan") echo 'selected="selected"'; ?>>Bulan</option>
                                                    <option value="Kegiatan" <?php if ($jenis_lama == "Kegiatan") echo 'selected="selected"'; ?>>Kegiatan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Total Honor</label>
                                        <input type="text" id="total_honor" class="form-control" name="total_honor" value="<?php echo "Rp. " .  number_format($total_honor, 0, ".", ".") ?> " readonly>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Asisten</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nama Asisten Peneliti</label>
                                        <input type="text" id="nama_ap" class="form-control" name="nama_ap" value="<?php echo $nama_ap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Status Peneliti</label>
                                        <select class="form-control" name="status_ap" id="status_ap" required>
                                            <option value="">--- Pilih ---</option>
                                            <option value="Mahasiswa" <?php if ($status_ap == "Mahasiswa") echo 'selected="selected"'; ?>>Mahasiswa</option>
                                            <option value="Karyawan" <?php if ($status_ap == "Karyawan") echo 'selected="selected"'; ?>>Karyawan</option>
                                            <option value="Tenaga Ahli" <?php if ($status_ap == "Tenaga Ahli") echo 'selected="selected"'; ?>>Tenaga Ahli</option>
                                            <option value="Umum" <?php if ($status_ap == "Umum") echo 'selected="selected"'; ?>>Umum</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Departemen</label>
                                        <input type="text" id="departemen_ap" class="form-control" name="departemen_ap" value="<?php echo $departemen_ap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Instansi</label>
                                        <input type="text" id="instansi_ap" class="form-control" name="instansi_ap" value="<?php echo $instansi_ap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Alamat KTP</label>
                                        <input type="text" id="alamat_ktp_ap" class="form-control" name="alamat_ktp_ap" value="<?php echo $alamat_ktp_ap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Alamat Domisili</label>
                                        <input type="text" id="alamat_domisili_ap" class="form-control" name="alamat_domisili_ap" value="<?php echo $alamat_domisili_ap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Email</label>
                                        <input type="text" id="email_ap" class="form-control" name="email_ap" value="<?php echo $email_ap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nomor HP</label>
                                        <input type="text" id="no_hp_ap" class="form-control" name="no_hp_ap" value="<?php echo $no_hp_ap ?>" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                        <div class="col-md-6">
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
                                                    <a href="<?php echo base_url('uploads/pap/' . $pernyataan); ?>" class="btn btn-link">Pernyataan</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <!--  <a href="#" class="btn btn-info"><i class="fas fa-eye"></i> </a>
                        <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i> </a> -->
                                                        <!-- <a href="#" class="btn btn-primary"><i class="fas fa-upload"></i> </a> -->

                                                        <input type="file" placeholder="Upload Ulang?" name="pernyataan" id="pernyataan">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_pernyataan"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('uploads/pap/' . $ktp); ?>" class="btn btn-link">KTP</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="ktp" id="ktp">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_ktp"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php
                                                    if ($luaran != NULL) {
                                                    ?>
                                                        <a href="<?php echo base_url('uploads/luaran/' . $luaran); ?>" class="btn btn-link">File Luaran</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="#" class="btn">File Luaran</a>
                                                    <?php } ?>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="luaran" id="luaran">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_luaran"></span>
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
        <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/pap.js'); ?>"></script>
        <!-- <script type='text/javascript'>
            var rupiah = document.getElementById('total_honor');
            //var rupiah2 = document.getElementById('total_honor');
            rupiah.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                //rupiah2.value = this.value;
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, 'Rp. ');

            });

            var honor = document.getElementById('honor');
            //var rupiah2 = document.getElementById('total_honor');
            honor.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                //rupiah2.value = this.value;
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                honor.value = formatRupiah(this.value, 'Rp. ');

            });

            var jumlah_hibah = document.getElementById('jumlah_hibah');
            //var rupiah2 = document.getElementById('total_honor');
            jumlah_hibah.addEventListener('keyup', function(e) {
                // tambahkan 'Rp.' pada saat form di ketik
                //rupiah2.value = this.value;
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                jumlah_hibah.value = formatRupiah(this.value, 'Rp. ');

            });

            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        </script> -->
    </div>
    <!-- ./wrapper -->


</body>

</html>
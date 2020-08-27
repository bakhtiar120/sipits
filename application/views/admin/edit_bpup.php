<!DOCTYPE html>
<html>

<head>
    <?php include("header.php") ?>
    <link href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" rel="stylesheet">
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
                            <h1>Edit Data BPUP</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit BPUP</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <?= form_open_multipart('atur_bpup/update_data/' . $id_bpup) ?>
            <form role="form" method="POST" action="<?php echo site_url('atur_bpup/update_data/' . $id_bpup); ?>" enctype="multipart/form-data">
                <!-- Main content -->
                <section class="content" style="margin-left: 1%;margin-right: 1%">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pengusul PBPU</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nomor Induk</label>
                                        <input type="text" id="inputName" class="form-control" name="nomor_induk" readonly value="<?php echo $nomor_induk ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nama Pengusul</label>
                                        <input type="text" id="inputName" class="form-control" name="nama" value="<?php echo $nama ?>">
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
                                        <input type="text" id="inputName" class="form-control" name="alamat_kampus" value="<?php echo $alamat_kampus ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Email</label>
                                        <input type="text" id="email" class="form-control" name="email" value="<?php echo $email ?>">
                                        <span class="error text-danger" id="invalid_email">Email yang anda masukkan invalid</span>
                                        <br>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nomor HP</label>
                                        <input type="text" id="inputName" class="form-control" name="no_hp" maxlength="4" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" value="<?php echo $no_hp ?>">
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
                                        <label for="inputName">Judul</label>
                                        <textarea id="nomor_pembimbing" class="form-control" name="judul" cols="20" rows="5"><?php echo $judul ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nomor Kontrak</label>
                                        <input type="text" id="no_kontrak" class="form-control" name="no_kontrak" value="<?php echo $no_kontrak ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Tanggal Kontrak Penelitian</label>
                                        <input type="text" id="tanggal_kontrak" class="form-control" name="tanggal_kontrak" value="<?php echo $tanggal_kontrak ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Skema</label>
                                        <input type="text" id="skema" class="form-control" name="skema" value="<?php echo $skema ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Sumber Pendanaan</label>
                                        <input type="text" id="sumber" class="form-control" name="sumber" value="<?php echo $sumber ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Tahun</label>
                                        <input type="text" id="tahun" class="form-control" name="tahun" maxlength="4" value="<?php echo $tahun ?>">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- /.card -->
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Detail Beasiswa</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">NRP</label>
                                        <input type="text" id="nrp" class="form-control" name="nrp" value="<?php echo $nrp ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nama Lengkap</label>
                                        <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" value="<?php echo $nama_lengkap ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Program Studi</label>
                                        <input type="text" id="program_studi" class="form-control" name="program_studi" value="<?php echo $program_studi ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Pendidikan</label>
                                        <input type="text" id="pendidikan" class="form-control" name="pendidikan" value="<?php echo $pendidikan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Alamat KTP</label>
                                        <input type="text" id="alamat_ktp" class="form-control" name="alamat_ktp" value="<?php echo $alamat_ktp ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Alamat Domisili</label>
                                        <input type="text" id="alamat_domisili" class="form-control" name="alamat_domisili" value="<?php echo $alamat_domisili ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Email</label>
                                        <input type="text" id="email_bea" class="form-control" name="email_bea" value="<?php echo $email_bea ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">No HP</label>
                                        <input type="text" id="no_hp_bea" class="form-control" name="no_hp_bea" value="<?php echo $no_hp_bea ?>">
                                    </div>

                                </div>
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('uploads/bpup/' . $ktp); ?>" target="_black" class="btn btn-link">KTP</a>
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
                                                    <a href="<?php echo base_url('uploads/bpup/' . $ktm); ?>" target="_black" class="btn btn-link">KTM</a>
                                                </td>

                                                <td class="py-0 align-middle">
                                                    <div class="btn-group btn-group-sm">
                                                        <input type="file" placeholder="Upload Ulang?" name="ktm" id="ktm">
                                                    </div>
                                                    <br>
                                                    <span class="error text-danger" id="invalid_ktm"></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php if (empty($luaran)) {
                                                        echo "Belum Upload Luaran";
                                                    } else { ?>
                                                        <a href="<?php echo base_url('uploads/luaran/' . $luaran); ?>" target="_black" class="btn btn-link">Luaran</a>
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
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="luaran"><b>Pilih Isi Luaran</b></label>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <select class="form-control" name="jenis_luaran" id="jenis_luaran">
                                                            <option value="">--- Pilih ---</option>
                                                            <option value="Jurnal Internasional" <?php if ($jenis_luaran == "Jurnal Internasional") {
                                                                                                        echo "selected";
                                                                                                    } ?>>Jurnal Internasional</option>
                                                            <option value="Publikasi Seminar Internasional" <?php if ($jenis_luaran == "Publikasi Seminar Internasional") {
                                                                                                                echo "selected";
                                                                                                            } ?>>Publikasi Seminar Internasional</option>
                                                            <option value="Produk" <?php if ($jenis_luaran == "Produk") {
                                                                                        echo "selected";
                                                                                    } ?>>Produk</option>
                                                            <option value="Prototipe" <?php if ($jenis_luaran == "Prototipe") {
                                                                                            echo "selected";
                                                                                        } ?>>Prototipe</option>
                                                            <option value="HKI" <?php if ($jenis_luaran == "HKI") {
                                                                                    echo "selected";
                                                                                } ?>>HKI</option>
                                                            <option value="Lainnya" <?php if ($jenis_luaran == "Lainnya") {
                                                                                        echo "selected";
                                                                                    } ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label for="luaran"><b>Isi Luaran <span style="red">Di isi jika jenis luaran lainnya</span></b></label>

                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" placeholder="Isi Luaran" name="isi_luaran" id="isi_luaran" value="<?php echo $isi_luaran ?>">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Reward Beasiswa</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                            <i class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Jenis Reward</label>
                                        <input type="text" id="jenis_reward" class="form-control" name="jenis_reward" value="<?php echo $jenis_reward ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Lama Pembiayaan <span style="color:red">(Semester)</span></b></label>
                                        <input type="text" id="lama_pembiayaan" class="form-control" name="lama_pembiayaan" maxlength="2" value="<?php echo $lama_pembiayaan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b>Sejak</b></label>
                                        <select class="form-control" name="sejak" id="sejak" required>
                                            <option value="">--- Pilih ---</option>
                                            <option value="Ganjil" <?php if ($sejak == 'Ganjil') {
                                                                        echo "selected";
                                                                    } ?>>Ganjil</option>
                                            <option value="Genap" <?php if ($sejak == 'Genap') {
                                                                        echo "selected";
                                                                    } ?>>Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b>Tahun Ajaran</b></label>
                                        <select class="form-control" name="sejak_tahun" id="sejak_tahun" required>
                                            <option value="">--- Pilih ---</option>
                                            <?php
                                            for ($a = 2016; $a < date("Y") + 1; $a++) { ?>
                                                <option value="<?php echo $a . '/';
                                                                echo $a + 1; ?>" <?php if ($sejak_tahun == $a . '/' . ($a + 1)) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $a . '/';
                                                                                            echo $a + 1; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b>Sampai</b></label>
                                        <select class="form-control" name="sampai" id="sampai" required>
                                            <option value="">--- Pilih ---</option>
                                            <option value="Ganjil" <?php if ($sampai == 'Ganjil') {
                                                                        echo "selected";
                                                                    } ?>>Ganjil</option>
                                            <option value="Genap" <?php if ($sampai == 'Genap') {
                                                                        echo "selected";
                                                                    } ?>>Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b>Tahun Ajaran</b></label>
                                        <select class="form-control" name="sampai_tahun" id="sampai_tahun" required>
                                            <option value="">--- Pilih ---</option>
                                            <?php
                                            for ($a = 2016; $a < date("Y") + 1; $a++) { ?>
                                                <option value="<?php echo $a . '/';
                                                                echo $a + 1; ?>" <?php if ($sampai_tahun == $a . '/' . ($a + 1)) {
                                                                                        echo 'selected';
                                                                                    } ?>><?php echo $a . '/';
                                                                                            echo $a + 1; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Satuan Biaya</label>
                                        <input type="text" id="satuan_biaya" class="form-control" name="satuan_biaya" value="<?php echo $satuan_biaya ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Total Biaya</label>
                                        <input type="text" id="total_biaya" class="form-control" name="total_biaya" value="<?php echo $total_biaya ?>">
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-secondary" onclick="history.go(-1);">Batal </button>
                            <input type="submit" value="Save Changes" id="daftar" class="btn btn-success float-right">
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
    <script src="<?php echo base_url('assets/js/bpup.js'); ?>"></script>

</body>

</html>
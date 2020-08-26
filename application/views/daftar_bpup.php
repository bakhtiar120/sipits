<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html lang="en">

<head>

    <?php include("header.php") ?>


    <?php include("stile.php") ?>
</head>

<body>
    <div class="container-fluid">

        <div class="row header">
            <?php include("menu_bar.php") ?>

        </div>

        <div class="clearfix"></div>





        <form role="form" method="POST" action="<?php echo site_url('pendaftaran/daftar_bpup'); ?>" enctype="multipart/form-data">
            <div class="container" style="background-color: white;">
                <h1>Pendaftaran Beasiswa Pascasarjana untuk Peneliti (BPUP)</h1>
                <p>Masukkan data anda dengan sebenar-benarnya. (untuk dosen non-ITS)</p>


                <hr>
                <?php echo $this->session->flashdata("hasil"); ?>
                <p>Identitas Ketua Peneliti</p>
                <label for="email"><b>NIP</b></label>
                <input type="text" placeholder="Masukkan NIP" name="nomor_induk" id="nomor_induk" required>
                <label for="email"><b>Nama Ketua Peneliti</b></label>
                <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" name="nama" id="nama" required>



                <label for="email"><b>Departemen/Fakultas</b></label>
                <input type="text" placeholder="Masukkan departemen dan/atau fakultas" name="departemen" id="departemen" required>

                <label for="email"><b>Universitas asal</b></label>
                <input type="text" placeholder="Masukkan Universitas (tidak disingkat)" name="universitas" id="universitas" required>

                <label for="email"><b>Alamat kampus asal</b></label>
                <input type="text" placeholder="Masukkan alamat lengkap kampus" name="alamat_kampus" id="alamat_kampus" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email" id="email" required>
                <span class="error text-danger" id="invalid_email">Email yang anda masukkan invalid</span><br>

                <label for="email"><b>No HP</b></label>
                <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp" id="no_hp" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>


                <p>Identitas Penelitian</p>

                <label for="email"><b>Judul</b></label>
                <input type="text" placeholder="Masukkan Judul Penelitian" name="judul" required>

                <label for="email"><b>Nomor Kontrak</b></label>
                <input type="text" placeholder="Masukkan Nomor Kontrak" name="no_kontrak" required>

                <label for="email"><b>Tanggal Kontrak Penelitian</b></label>
                <br>
                <input type="date" placeholder="Masukkan Tanggal Kontrak Penelitian" name="tanggal_kontrak" required>
                <br>
                <br>
                <label for="email"><b>Skema</b></label>
                <input type="text" placeholder="Masukkan Skema Penelitian" name="skema" required>

                <label for="email"><b>Sumber Pendanaan</b></label>
                <input type="text" placeholder="Masukkan sumber pendanaan" name="sumber" required>

                <label for="email"><b>Tahun</b></label>
                <input type="text" placeholder="Masukkan tahun" name="tahun" id="tahun" maxlength="4" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

                <hr>

                <p>Identitas Penerima Beasiswa</p>

                <label for="email"><b>NRP</b></label>
                <input type="text" placeholder="Masukkan NRP" name="nrp" id="nrp" required>
                <label for="email"><b>Nama Lengkap</b></label>
                <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" name="nama_lengkap" id="nama_lengkap" required>
                <label for="email"><b>Program Studi</b></label>
                <input type="text" placeholder="Masukkan Nama Program Studi" name="program_studi" id="program_studi" required>
                <label for="email"><b>Pendidikan</b></label>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <select class="form-control" name="pendidikan" id="pendidikan" required>
                            <option value="">--- Pilih ---</option>
                            <option value="Magister">Magister</option>
                            <option value="Doctor">Doctor</option>
                        </select>
                    </div>
                </div>
                <br>

                <label for="email"><b>Alamat KTP</b></label>
                <input type="text" placeholder="Masukkan alamat lengkap sesuai ktp" name="alamat_ktp" id="alamat_ktp" required>

                <label for="email"><b>Alamat Domisili</b></label>
                <input type="text" placeholder="Masukkan alamat lengkap domisisl" name="alamat_domisili" id="alamat_domisili" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_bea" id="email_bea" required>
                <span class="error text-danger" id="invalid_email_bea">Email yang anda masukkan invalid</span><br>
                <label for="email"><b>No HP</b></label>
                <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp_bea" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" id="no_hp_bea" required>
                <label for="email"><b>KTM</b></label>
                <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="ktm" id="ktm" required>

                <span class="error text-danger" id="invalid_ktm"></span><br>
                <label for="email"><b>KTP</b></label>
                <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="ktp" id="ktp" required>

                <span class="error text-danger" id="invalid_ktp"></span><br>
                <hr>
                <p>Reward Beasiswa</p>
                <label for="email"><b>Jenis Reward</b></label>
                <input type="text" placeholder="Beasiswa Biaya Pendidikan " name="jenis_reward" id="jenis_reward" value="Beasiswa Biaya Pendidikan " disabled>
                <label for="email"><b>Lama Pembiayaan <span style="color:red">(Semester)</span></b></label>
                <input type="text" placeholder="Masukkan lama pembiayaan" name="lama_pembiayaan" id="lama_pembiayaan" maxlength="1" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="email"><b>Sejak</b></label>
                        <select class="form-control" name="sejak" id="sejak" required>
                            <option value="">--- Pilih ---</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="email"><b>Tahun Ajaran</b></label>
                        <select class="form-control" name="sejak_tahun" id="sejak_tahun" required>
                            <option value="">--- Pilih ---</option>
                            <?php
                            for ($a = 2016; $a < date("Y") + 1; $a++) { ?>
                                <option value="<?php echo $a . '/';
                                                echo $a + 1; ?>"><?php echo $a . '/';
                                                                    echo $a + 1; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="email"><b>Sampai</b></label>
                        <select class="form-control" name="sampai" id="sampai" required>
                            <option value="">--- Pilih ---</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="email"><b>Tahun Ajaran</b></label>
                        <select class="form-control" name="sampai_tahun" id="sampai_tahun" required>
                            <option value="">--- Pilih ---</option>
                            <?php
                            for ($a = 2016; $a < date("Y") + 1; $a++) { ?>
                                <option value="<?php echo $a . '/';
                                                echo $a + 1; ?>"><?php echo $a . '/';
                                                                    echo $a + 1; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br>
                <label for="email"><b>Satuan Biaya</b></label>
                <input type="text" placeholder="Masukkan satuan biaya" name="satuan_biaya" id="satuan_biaya" required>

                <label for="email"><b>Total Biaya</b></label>
                <input type="text" placeholder="Masukkan total biaya" name="total_biaya" id="total_biaya" readonly required>

                <hr>


                <p>Dengan mendaftar skema BPUP ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p>

                <button type="submit" class="registerbtn" id="daftar">Daftar</button>
            </div>

            <div class="container signin">
                <p>Jika sudah pernah mendaftar, silakan <a href="#">Login</a> untuk mengecek status.</p>
            </div>
        </form>





    </div>

    <?php include("footer.php") ?>
    <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bpup.js'); ?>"></script>

</body>

</html>
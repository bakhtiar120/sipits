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





    <form role="form" method="POST" action="<?php echo site_url('pendaftaran/daftar_pap'); ?>" enctype="multipart/form-data">
      <div class="container" style="background-color: white;">
        <h1>Pendaftaran Penyelenggaraan Asisten Peneliti (PAP)</h1>
        <p>Masukkan data anda dengan sebenar-benarnya. (untuk dosen non-ITS)</p>


        <hr>
        <?php echo $this->session->flashdata("hasil"); ?>
        <p>Identitas Ketua Peneliti</p>
        <label for="email"><b>NIP</b></label>
        <input type="text" placeholder="Masukkan NIP" name="nomor_induk_ketua" id="nomor_induk_ketua" required>
        <label for="email"><b>Nama Ketua Peneliti</b></label>
        <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" name="nama_ketua" id="nama_ketua" required>



        <label for="email"><b>Departemen/Fakultas</b></label>
        <input type="text" placeholder="Masukkan departemen dan/atau fakultas" name="departemen_ketua" id="departemen_ketua" required>

        <label for="email"><b>Universitas asal</b></label>
        <input type="text" placeholder="Masukkan Universitas (tidak disingkat)" name="universitas_ketua" id="universitas_ketua" required>

        <label for="email"><b>Alamat kampus asal</b></label>
        <input type="text" placeholder="Masukkan alamat lengkap kampus" name="alamat_ketua" id="alamat_ketua" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_ketua" id="email_ketua" required>
        <span class="error text-danger" id="invalid_email">Email yang anda masukkan invalid</span><br>

        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp_ketua" id="no_hp_ketua" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <p>Identitas Asisten Peneliti</p>

        <label for="email"><b>NRP</b></label>
        <input type="text" placeholder="Masukkan NRP" name="nomor_induk_ap" id="nomor_induk_ap" required>
        <label for="email"><b>Nama Asisten Peneliti</b></label>
        <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" name="nama_ap" id="nama_ap" required>
        <label for="email"><b>Status</b></label>
        <br>
        <div class="row">
          <div class="col-sm-4">
            <select class="form-control" name="status_ap" id="status_ap" required>
              <option value="">--- Pilih ---</option>
              <option value="Mahasiswa">Mahasiswa</option>
              <option value="Karyawan">Karyawan</option>
              <option value="Tenaga Ahli">Tenaga Ahli</option>
              <option value="Umum">Umum</option>
            </select>
          </div>
        </div>
        <br />
        <label for="email"><b>Departemen/Unit</b></label>
        <input type="text" placeholder="Masukkan Nama departemen" name="departemen_ap" id="departemen_ap" required>
        <label for="email"><b>Instansi</b></label>
        <input type="text" placeholder="Masukkan Nama Instansi" name="instansi_ap" id="instansi_ap" required>

        <label for="email"><b>NIK</b></label>
        <input type="text" placeholder="Masukkan NIK" name="nik_ap" id="nik_ap" required>



        <label for="email"><b>Alamat KTP</b></label>
        <input type="text" placeholder="Masukkan alamat lengkap sesuai ktp" name="alamat_ktp_ap" id="alamat_ktp_ap" required>

        <label for="email"><b>Alamat Domisili</b></label>
        <input type="text" placeholder="Masukkan alamat lengkap domisisl" name="alamat_domisili_ap" id="alamat_domisili_ap" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_ap" id="email_ap" required>
        <span class="error text-danger" id="invalid_email_ap">Email yang anda masukkan invalid</span><br>
        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp_ap" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" id="no_hp_ap" required>
        <label for="email"><b>KTP</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="ktp" id="ktp" required>

        <span class="error text-danger" id="invalid_ktp"></span><br>
        <hr>

        <p>Identitas Penelitian</p>

        <label for="email"><b>Judul</b></label>
        <input type="text" placeholder="Masukkan Judul Penelitian" name="judul" required>

        <label for="email"><b>Nomor Kontrak</b></label>
        <input type="text" placeholder="Masukkan Nomor Kontrak" name="nomor_kontrak" required>

        <label for="email"><b>Tanggal Kontrak Penelitian</b></label>
        <br>
        <input type="date" placeholder="Masukkan Tanggal Kontrak Penelitian" name="tanggal_kontrak" required>
        <br>
        <br>
        <label for="email"><b>Skema</b></label>
        <input type="text" placeholder="Masukkan Skema Penelitian" name="skema" required>

        <label for="email"><b>Sumber Pendanaan</b></label>
        <input type="text" placeholder="Masukkan sumber pendanaan" name="pendanaan" required>

        <label for="email"><b>Tahun</b></label>
        <input type="text" placeholder="Masukkan tahun" name="tahun" id="tahun" maxlength="4" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <hr>
        <hr>

        <p>Reward Honor</p>
        <label for="email"><b>Lama Pekerjaan</b></label>
        <div class="row">
          <div class="col-sm-4">
            <input type="text" placeholder="Masukkan lama pekerjaan" name="lama_bulan" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" id="lama_bulan" required>

          </div>
          <div class="col-sm-4" style="margin:10px;">
            <select class="form-control" name="jenis_lama" id="jenis_lama" required>
              <option value="">--- Pilih ---</option>
              <option value="Jam">Jam</option>
              <option value="Hari">Hari</option>
              <option value="Bulan">Bulan</option>
              <option value="Kegiatan">Kegiatan</option>
            </select>
          </div>
        </div>
        <label for="email"><b>Satuan Biaya</b></label>
        <input type="text" placeholder="Masukkan honor yang akan didapatkan" name="honor" id="honor" required>
        <label for="email"><b>Jobdesk</b></label>
        <input type="text" placeholder="Masukkan jobdesk" name="jobdesk" id="jobdesk" required>


        <label for="email"><b>Total Honor</b></label>
        <input type="text" placeholder="Masukkan total honor yang didapatkan" name="total_honor" id="total_honor" readonly required>

        <hr>

        <label for="email"><b>Surat Pernyataan</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="pernyataan" id="pernyataan" required>
        <span class="error text-danger" id="invalid_pernyataan"></span><br>

        <hr>

        <p>Dengan mendaftar skema PAP ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p>

        <button type="submit" class="registerbtn" id="daftar">Daftar</button>
      </div>

      <div class="container signin">
        <p>Jika sudah pernah mendaftar, silakan <a href="#">Login</a> untuk mengecek status.</p>
      </div>
    </form>





  </div>

  <?php include("footer.php") ?>
  <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/pap.js'); ?>"></script>

</body>

</html>
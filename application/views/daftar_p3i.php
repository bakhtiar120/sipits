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


    <form role="form" method="POST" action="<?php echo site_url('pendaftaran/daftar_p3i'); ?>" enctype="multipart/form-data">


      <!-- <form action="/action_page.php"> -->
      <div class="container" style="background-color: white;">
        <h1>Program Percepatan Publikasi Internasional (P3I)</h1>
        <p>Masukkan data anda dengan sebenar-benarnya. </p>
        <hr>
        <p>Identitas Pengusul</p>
        <label for="email"><b>NIP/NIDN</b></label>
        <input type="text" class="form-control" placeholder="Masukkan NIP/NIDN" name="nomor_induk" id="nomor_induk" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Nama</b></label>
        <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" id="nama" name="nama" required>


        <label for="email"><b>Departemen/Fakultas</b></label>
        <input type="text" class="form-control" placeholder="Masukkan departemen dan/atau fakultas" name="departemen" id="dept" required>

        <label for="email"><b>Universitas asal</b></label>
        <input type="text" class="form-control" placeholder="Masukkan Universitas (tidak disingkat)" name="universitas" id="univ" required>

        <label for="email"><b>Alamat Kantor</b></label>
        <input type="text" class="form-control" placeholder="Masukkan alamat lengkap kantor" name="alamat_kantor" id="alamat_kantor" required>

        <label for="email"><b>Pilih Status anda</b></label><br>
        <input type="radio" id="male" name="kategori" value="dosen">
        <label for="male">Dosen</label><br>
        <input type="radio" id="female" name="kategori" value="mahasiswa">
        <label for="female">Mahasiswa</label><br>
        <br>

        <label for="email"><b>Email</b></label>
        <input type="text" class="form-control" placeholder="Masukkan email (diperbolehkan email instansi)" name="email" id="email" required>
        <span class="error text-danger" id="invalid_email">Email yang anda masukkan invalid</span>
        <br>

        <label for="email"><b>No HP</b></label>
        <input type="text" class="form-control" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp" id="no_hp" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>
        <br>

        <label for="email"><b>H-Index Scopus</b></label>
        <input type="text" class="form-control" placeholder="Masukkan H-Index Scopus anda" name="hindex" required>

        <hr>
        <p>Unggah Dokumen</p>
        <label for="email"><b>Surat Pernyataan</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="pernyataan" id="pernyataan" required>
        <span class="error text-danger" id="invalid_pernyataan"></span><br>

        <label for="email"><b>Draf Paper</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="draf" id="draf" required>
        <span class="error text-danger" id="invalid_draf"></span><br>

        <label for="email"><b>NPWP</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="npwp" id="npwp" required>
        <span class="error text-danger" id="invalid_npwp"></span><br>

        <label for="email"><b>Buku Tabungan (halaman pertama)</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="tabungan" id="tabungan" required>
        <span class="error text-danger" id="invalid_tabungan"></span><br>

        <hr>

        <p>Rekam Jejak Penelitian (3 penelitian terbaik sebagai ketua)</p>
        <p>Penelitian 1:</p>
        <label for="email"><b>Judul</b></label>
        <input type="text" class="form-control" placeholder="Masukkan judul penelitian" name="judul1" required>

        <label for="email"><b>Skema</b></label>
        <input type="text" class="form-control" placeholder="Masukkan skema penelitian" name="skema1" required>

        <label for="email"><b>Sumber Pendanaan</b></label>
        <input type="text" class="form-control" placeholder="Masukkan sumber pendanaan" name="sumber1" required>

        <p>Penelitian 2:</p>
        <label for="email"><b>Judul</b></label>
        <input type="text" class="form-control" placeholder="Masukkan judul penelitian" name="judul2" required>

        <label for="email"><b>Skema</b></label>
        <input type="text" class="form-control" placeholder="Masukkan skema penelitian" name="skema2" required>

        <label for="email"><b>Sumber Pendanaan</b></label>
        <input type="text" class="form-control" placeholder="Masukkan sumber pendanaan" name="sumber2" required>

        <p>Penelitian 3:</p>
        <label for="email"><b>Judul</b></label>
        <input type="text" class="form-control" placeholder="Masukkan judul penelitian" name="judul3" required>

        <label for="email"><b>Skema</b></label>
        <input type="text" class="form-control" placeholder="Masukkan skema penelitian" name="skema3" required>

        <label for="email"><b>Sumber Pendanaan</b></label>
        <input type="text" class="form-control" placeholder="Masukkan sumber pendanaan" name="sumber3" required>


        <p>Dengan mendaftar skema P3I ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p>

        <button type="submit" class="registerbtn" id="daftar">Daftar</button>
      </div>

      <div class="container signin">
        <p>Jika sudah pernah mendaftar, silakan <a href="#">Login</a> untuk mengecek status.</p>
      </div>
    </form>





  </div>

  <?php include("footer.php") ?>

  <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/p3i.js'); ?>"></script>
</body>

</html>
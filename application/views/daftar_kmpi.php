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



    <form role="form" method="POST" action="<?php echo site_url('pendaftaran/daftar_kmpi'); ?>" enctype="multipart/form-data">
      <div class="container" style="background-color: white;">
        <h1>Pendaftaran Klinik Makalah Publikasi Ilmiah International (KMPI)</h1>
        <p>Masukkan data anda dengan sebenar-benarnya. (untuk dosen non-ITS)</p>
        <hr>
        <?php echo $this->session->flashdata("hasil"); ?>


        <p>Identitas Pengusul</p>
        <label for="email"><b>NIP/NIDN</b></label>
        <input type="text" class="form-control" placeholder="Masukkan NIP/NIDN" name="nomor_induk" id="nomor_induk" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Nama</b></label>
        <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" id="nama" name="nama" required>


        <label for="email"><b>Departemen/Fakultas</b></label>
        <input type="text" class="form-control" placeholder="Masukkan departemen dan/atau fakultas" name="dept" id="dept" required>

        <label for="email"><b>Universitas asal</b></label>
        <input type="text" class="form-control" placeholder="Masukkan Universitas (tidak disingkat)" name="univ" id="univ" required>

        <label for="email"><b>Email</b></label>
        <input type="text" class="form-control" placeholder="Masukkan email (diperbolehkan email instansi)" name="email" id="email" required>
        <span class="error text-danger" id="invalid_email">Email yang anda masukkan invalid</span>
        <br>


        <label for="email"><b>No HP</b></label>
        <input type="text" class="form-control" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp" maxlength="13" id="no_hp" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>


        <label for="email"><b>Alamat Kantor</b></label>
        <input type="text" class="form-control" placeholder="Masukkan alamat lengkap kantor" name="alamat_kantor" id="alamat_kantor" required>

        <label for="email"><b>Telepon Kantor</b></label>
        <input type="text" class="form-control" placeholder="Masukkan telepon kantor" name="telepon_kantor" maxlength="13" id="telepon_kantor" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <hr>

        <p>Identitas Pembimbing Dosen ITS</p>
        <label for="email"><b>NIP/NIDN</b></label>
        <input type="text" class="form-control" placeholder="Masukkan NIP/NIDN" name="nomor_pembimbing" id="nomor_pembimbing" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Nama</b></label>
        <input type="text" class="form-control" placeholder="Masukkan Nama Pembimbing" name="nama_pembimbing" id="nama_pembimbing" required>


        <label for="email"><b>Departemen</b></label>
        <input type="text" class="form-control" placeholder="Masukkan departemen" name="departemen_pembimbing" id="departemen_pembimbing" required>

        <label for="email"><b>Fakultas</b></label>
        <input type="text" class="form-control" placeholder="Masukkan fakultas" name="fakultas_pembimbing" id="fakultas_pembimbing" required>

        <label for="email"><b>Email</b></label>
        <input type="text" class="form-control" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_pembimbing" id="email_pembimbing" required>
        <span class="error text-danger" id="invalid_email2">Email yang anda masukkan invalid</span>
        <br>

        <label for="email"><b>No HP</b></label>
        <input type="text" class="form-control" placeholder="Masukkan No HP yang bisa dihubungi" maxlength="13" name="hp_pembimbing" id="hp_pembimbing" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <hr>
        <p>Identitas Publikasi</p>

        <label for="email"><b>Judul Publikasi</b></label>
        <input type="text" class="form-control" placeholder="Masukkan judul artikel publikasi" name="judul_publikasi" required>

        <label for="email"><b>Publisher Tujuan</b></label>
        <input type="text" class="form-control" placeholder="Masukkan tujuan publisher tempat publikasi" name="publisher" required>

        <label for="email"><b>Draft Artikel Publikasi</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="draft_publikasi" id="draft_publikasi" required>
        <span class="error text-danger" id="invalid_draft"></span><br>

        <label for="email"><b>Luaran Publikasi</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="luaran_publikasi" id="luaran_publikasi" required>
        <span class="error text-danger" id="invalid_luaran"></span><br>

        <label for="email"><b>MoU</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="mou_publikasi" id="mou_publikasi" required>
        <span class="error text-danger" id="invalid_mou"></span><br>

        <hr>
        <p>Dengan mendaftar skema KP ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p>

        <button type="submit" id="daftar" class="registerbtn">Daftar</button>
      </div>

      <div class="container signin">
        <p>Jika sudah pernah mendaftar, silakan <a href="#">Login</a> untuk mengecek status.</p>
      </div>
    </form>





  </div>

  <?php include("footer.php") ?>
  <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/kmpi.js'); ?>"></script>

</body>

</html>
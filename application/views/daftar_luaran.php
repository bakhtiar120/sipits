<!DOCTYPE html>
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


    <?= form_open_multipart('pendaftaran/daftar_luaran') ?>
    <div class="container" style="background-color: white;">
      <h1>Pengumpulan Luaran</h1>
      <p>Silahkan Upload File Anda</p>
      <hr>
      <?php echo $this->session->flashdata("hasil"); ?>

      <label for="luaran"><b>Pilih Luaran Yang Ingin Di Upload</b></label>
      <select class="form-control" style="width:20%" name="luaran" id="luaran">
        <option value="">--- Pilih ---</option>
        <option value="kp">KP</option>
        <option value="pap">PAP</option>
        <option value="kmpi">KMPI</option>
        <option value="p3i">P3I</option>
      </select>
      <br>
      <label for="email"><b>Upload</b></label>
      <input type="file" name="upload" id="upload" required>


      <label for="email"><b>Judul</b></label>
      <input type="text" class="form-control" placeholder="Judul" name="judul" id="judul" required>
      <input type="hidden" name="id" id="id_x" required>

      <label for="email"><b>NIP/NIDN</b></label>
      <input type="text" class="form-control" placeholder="Masukkan NIP/NIDN" name="nomor_induk" id="nomor_induk" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required readonly>

      <label for="email"><b>Nama</b></label>
      <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" id="nama" name="nama" required readonly>


      <label for="email"><b>Departemen/Fakultas</b></label>
      <input type="text" class="form-control" placeholder="Masukkan departemen dan/atau fakultas" name="dept" id="dept" required readonly>

      <label for="email"><b>Universitas asal</b></label>
      <input type="text" class="form-control" placeholder="Masukkan Universitas (tidak disingkat)" name="univ" id="univ" required readonly>

      <label for="email"><b>Email</b></label>
      <input type="text" class="form-control" placeholder="Masukkan email (diperbolehkan email instansi)" name="email" id="email" required readonly>
      <br>


      <!-- <hr> -->
      <!-- <p>Dengan mendaftar skema KP ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p> -->

      <button type="submit" id="daftar" class="registerbtn">Kumpulkan</button>
    </div>

    <!-- <div class="container signin">
      <p>Jika sudah pernah mendaftar, silakan <a href="#">Login</a> untuk mengecek status.</p>
    </div> -->
    </form>





  </div>

  <?php include("footer.php") ?>
  <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/luaran.js'); ?>"></script>

</body>

</html>
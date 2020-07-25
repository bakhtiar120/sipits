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

    <p>Identitas Ketua Peneliti</p>

    <label for="email"><b>Nama Ketua Peneliti</b></label>
    <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" name="nama_ketua" required>

    <label for="email"><b>NIP/NIDN</b></label>
    <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_induk_ketua" required>

    <label for="email"><b>Departemen/Fakultas</b></label>
    <input type="text" placeholder="Masukkan departemen dan/atau fakultas" name="departemen_ketua" required>

    <label for="email"><b>Universitas asal</b></label>
    <input type="text" placeholder="Masukkan Universitas (tidak disingkat)" name="universitas_ketua" required>

    <label for="email"><b>Alamat kampus asal</b></label>
    <input type="text" placeholder="Masukkan alamat lengkap kampus" name="alamat_ketua" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_ketua" required>

    <label for="email"><b>No HP</b></label>
    <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp_ketua" required>

    <hr>

    <p>Identitas Asisten Peneliti</p>

    <label for="email"><b>Nama Asisten Peneliti</b></label>
    <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" name="nama_ap" required>

    <label for="email"><b>NIK</b></label>
    <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_induk_ap" required>

    <label for="email"><b>Alamat KTP</b></label>
    <input type="text" placeholder="Masukkan alamat lengkap sesuai ktp" name="alamat_ktp_ap" required>

    <label for="email"><b>Alamat Domisili</b></label>
    <input type="text" placeholder="Masukkan alamat lengkap domisisl" name="alamat_domisili_ap" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_ap" required>

    <label for="email"><b>No HP</b></label>
    <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp_ap" required>

    <hr>

    <p>Identitas Penelitian</p>

    <label for="email"><b>Judul</b></label>
    <input type="text" placeholder="Masukkan Judul Penelitian" name="judul" required>

    <label for="email"><b>Nomor Kontrak</b></label>
    <input type="text" placeholder="Masukkan Nomor Kontrak" name="nomor_kontrak" required>

    <label for="email"><b>Tanggal Kontrak Penelitian</b></label>
    <input type="date" placeholder="Masukkan Tanggal Kontrak Penelitian" name="tanggal_kontrak" required>

    <label for="email"><b>Skema</b></label>
    <input type="text" placeholder="Masukkan Skema Penelitian" name="skema" required>

    <label for="email"><b>Sumber Pendanaan</b></label>
    <input type="text" placeholder="Masukkan sumber pendanaan" name="pendanaan" required>

    <label for="email"><b>Jumlah Hibah</b></label>
    <input type="text" placeholder="Masukkan jumlah hibah yang didapat" name="jumlah_hibah" required>

    <label for="email"><b>Target Luaran</b></label>
    <input type="text" placeholder="Masukkan target luaran penelitian" name="target_luaran" required>

    <hr>

    <p>Reward Honor</p>

    <label for="email"><b>Jumlah Honor per Bulan</b></label>
    <input type="text" placeholder="Masukkan honor yang akan didapatkan per bulan" name="honor" required>

    <label for="email"><b>Total lama bulan</b></label>
    <input type="text" placeholder="Masukkan lama bulan" name="lama_bulan" required>

    <label for="email"><b>Total Honor</b></label>
    <input type="text" placeholder="Masukkan total honor yang didapatkan" name="total_honor" required>

    <hr>

    <label for="email"><b>Surat Pernyataan</b></label>
    <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="pernyataan" required>

    <label for="email"><b>KTP</b></label>
    <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="ktp" required>

    <hr>

    <p>Dengan mendaftar skema PAP ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p>

    <button type="submit" class="registerbtn">Daftar</button>
  </div>
  
  <div class="container signin">
    <p>Jika sudah pernah mendaftar, silakan <a href="#">Login</a> untuk mengecek status.</p>
  </div>
</form>





 </div>

 <?php include("footer.php") ?>


</body>
</html>
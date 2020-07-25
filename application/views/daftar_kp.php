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


<form role="form" method="POST" action="<?php echo site_url('pendaftaran/daftar_kp'); ?>" enctype="multipart/form-data">


<!-- <form action="/action_page.php"> -->
  <div class="container" style="background-color: white;">
    <h1>Pendaftaran Kerjasama Penelitian (KP)</h1>
    <p>Masukkan data anda dengan sebenar-benarnya. (untuk dosen non-ITS</p>
    <hr>
    <p>Identitas Pengusul</p>
    <label for="nama"><b>Nama</b></label>
    <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" name="nama" required>

    <label for="email"><b>NIP/NIDN</b></label>
    <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_induk" required>

    <label for="email"><b>Departemen/Fakultas</b></label>
    <input type="text" placeholder="Masukkan departemen dan/atau fakultas" name="departemen" required>

    <label for="email"><b>Universitas asal</b></label>
    <input type="text" placeholder="Masukkan Universitas (tidak disingkat)" name="universitas" required>

    <label for="email"><b>Alamat kantor</b></label>
    <input type="text" placeholder="Masukkan alamat lengkap kantor" name="alamat_kantor" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email" required>

    <label for="email"><b>No HP</b></label>
    <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp" required>

    <hr>

    <p>Identitas Penelitian</p>
    <label for="email"><b>Ketua</b></label>
    <input type="text" placeholder="Masukkan Nama Ketua Penelitian dalam KP" name="ketua" required>

    <label for="email"><b>Judul</b></label>
    <input type="text" placeholder="Masukkan judul penelitian" name="judul" required>

    <label for="email"><b>Skema</b></label>
    <input type="text" placeholder="Masukkan skema penelitian" name="skema" required>

    <label for="email"><b>Sumber Pendanaan</b></label>
    <input type="text" placeholder="Masukkan sumber pendanaan" name="sumber" required>

    <label for="email"><b>Lama Penelitian</b></label>
    <input type="text" placeholder="Masukkan lama penelitian (dalam bulan)" name="lama_penelitian" required>

    <label for="email"><b>Anggota peneliti</b></label>
    <input type="text" placeholder="Masukkan anggota peneliti (dipisah dengan semicolon ;)" name="anggota" required>

    <label for="email"><b>Draft Proposal</b></label>
    <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="proposal" required>

    <label for="email"><b>MoU (memorandum of understanding)</b></label>
    <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="mou" required>

    <label for="email"><b>MoA (Memorandum of Agreement)</b></label>
    <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="moa" required>

    <p>Dengan mendaftar skema KP ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p>

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
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
        <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_induk" id="nomor_induk" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Nama</b></label>
        <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" id="nama" name="nama" required>


        <label for="email"><b>Departemen/Fakultas</b></label>
        <input type="text" placeholder="Masukkan departemen dan/atau fakultas" name="departemen" id="dept" required>

        <label for="email"><b>Universitas asal</b></label>
        <input type="text" placeholder="Masukkan Universitas (tidak disingkat)" name="universitas" id="univ" required>

        <label for="email"><b>Alamat Kantor</b></label>
        <input type="text" placeholder="Masukkan alamat lengkap kantor" name="alamat_kantor" id="alamat_kantor" required>

        <label for="email"><b>Pilih Status anda</b></label><br>
        <input type="radio" id="male" name="kategori" value="dosen">
        <label for="male">Dosen</label><br>
        <input type="radio" id="female" name="kategori" value="mahasiswa">
        <label for="female">Mahasiswa</label><br>
        <br>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email" id="email" required>

        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp" id="no_hp" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>H-Index Scopus</b></label>
        <input type="text" placeholder="Masukkan H-Index Scopus anda" name="hindex" required>

        <hr>
        <p>Unggah Dokumen</p>
        <label for="email"><b>Surat Pernytaan</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="pernyataan" required>

        <label for="email"><b>Draf Paper</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="draf" required>

        <label for="email"><b>NPWP</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="npwp" required>

        <label for="email"><b>Buku Tabungan (halaman pertama)</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="tabungan" required>

        <hr>

        <p>Rekam Jejak Penelitian (3 penelitian terbaik sebagai ketua)</p>
        <p>Penelitian 1:</p>
        <label for="email"><b>Judul</b></label>
        <input type="text" placeholder="Masukkan judul penelitian" name="judul1" required>

        <label for="email"><b>Skema</b></label>
        <input type="text" placeholder="Masukkan skema penelitian" name="skema1" required>

        <label for="email"><b>Sumber Pendanaan</b></label>
        <input type="text" placeholder="Masukkan sumber pendanaan" name="sumber1" required>

        <p>Penelitian 2:</p>
        <label for="email"><b>Judul</b></label>
        <input type="text" placeholder="Masukkan judul penelitian" name="judul2" required>

        <label for="email"><b>Skema</b></label>
        <input type="text" placeholder="Masukkan skema penelitian" name="skema2" required>

        <label for="email"><b>Sumber Pendanaan</b></label>
        <input type="text" placeholder="Masukkan sumber pendanaan" name="sumber2" required>

        <p>Penelitian 3:</p>
        <label for="email"><b>Judul</b></label>
        <input type="text" placeholder="Masukkan judul penelitian" name="judul3" required>

        <label for="email"><b>Skema</b></label>
        <input type="text" placeholder="Masukkan skema penelitian" name="skema3" required>

        <label for="email"><b>Sumber Pendanaan</b></label>
        <input type="text" placeholder="Masukkan sumber pendanaan" name="sumber3" required>


        <p>Dengan mendaftar skema P3I ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p>

        <button type="submit" class="registerbtn">Daftar</button>
      </div>

      <div class="container signin">
        <p>Jika sudah pernah mendaftar, silakan <a href="#">Login</a> untuk mengecek status.</p>
      </div>
    </form>





  </div>

  <?php include("footer.php") ?>

  <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
  <script type='text/javascript'>
    $(document).ready(function() {

      // Initialize 
      $("#nomor_induk").autocomplete({
        source: function(request, response) {
          // Fetch data
          $.ajax({
            url: "<?= base_url() ?>pendaftaran/cekDosen",
            type: 'post',
            dataType: "json",
            data: {
              nidn: request.term
            },
            success: function(res) {
              var result;
              result = [{
                label: 'Tidak ketemu ' + request.term,
                value: ''
              }];

              // console.log("Before format", res);


              if (res.length) {
                result = $.map(res, function(obj) {
                  return {
                    label: obj.nama,
                    value: obj.NIDN,
                    data: obj
                  };
                });
              }

              response(result);
            }
          });
        },
        select: function(event, ui) {
          var resArr;
          resArr = ui.item.data;
          $('#nama').val(resArr.nama);
          $('#dept').val(resArr.departemen);
          $('#univ').val(resArr.universitas);
          $('#email').val(resArr.email);
          $('#no_hp').val(resArr.telepon);
          $('#alamat_kantor').val(resArr.Alamat);

        }
      });

    });
  </script>
</body>

</html>
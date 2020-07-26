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
        <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_induk" id="nomor_induk" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Nama</b></label>
        <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" id="nama" name="nama" required>


        <label for="email"><b>Departemen/Fakultas</b></label>
        <input type="text" placeholder="Masukkan departemen dan/atau fakultas" name="dept" id="dept" required>

        <label for="email"><b>Universitas asal</b></label>
        <input type="text" placeholder="Masukkan Universitas (tidak disingkat)" name="univ" id="univ" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email" id="email" required>

        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp" id="no_hp" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Alamat Kantor</b></label>
        <input type="text" placeholder="Masukkan alamat lengkap kantor" name="alamat_kantor" id="alamat_kantor" required>

        <label for="email"><b>Telepon Kantor</b></label>
        <input type="text" placeholder="Masukkan telepon kantor" name="telepon_kantor" id="telepon_kantor" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <hr>

        <p>Identitas Pembimbing Dosen ITS</p>
        <label for="email"><b>NIP/NIDN</b></label>
        <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_pembimbing" id="nomor_pembimbing" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Nama</b></label>
        <input type="text" placeholder="Masukkan Nama Pembimbing" name="nama_pembimbing" id="nama_pembimbing" required>


        <label for="email"><b>Departemen</b></label>
        <input type="text" placeholder="Masukkan departemen" name="departemen_pembimbing" id="departemen_pembimbing" required>

        <label for="email"><b>Fakultas</b></label>
        <input type="text" placeholder="Masukkan fakultas" name="fakultas_pembimbing" id="fakultas_pembimbing" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_pembimbing" id="email_pembimbing" required>

        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="hp_pembimbing" id="hp_pembimbing" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <hr>
        <p>Identitas Publikasi</p>

        <label for="email"><b>Judul Publikasi</b></label>
        <input type="text" placeholder="Masukkan judul artikel publikasi" name="judul_publikasi" required>

        <label for="email"><b>Publisher Tujuan</b></label>
        <input type="text" placeholder="Masukkan tujuan publisher tempat publikasi" name="publisher" required>

        <label for="email"><b>Draft Artikel Publikasi</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="draft_publikasi" required>

        <label for="email"><b>Luaran Publikasi</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="luaran_publikasi" required>

        <label for="email"><b>MoU</b></label>
        <input type="file" placeholder="Unggah file dalam bentuk doc/pdf" name="mou_publikasi" required>

        <hr>
        <p>Dengan mendaftar skema KP ini, berarti anda telah menyetujui <a href="#">syarat dan ketentuan</a>.</p>

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
          $('#alamat_kantor').val(resArr.alamat);
          $('#telepon_kantor').val(resArr.telepon);

        }
      });

      $("#nomor_pembimbing").autocomplete({
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
          $('#nama_pembimbing').val(resArr.nama);
          $('#departemen_pembimbing').val(resArr.departemen);
          $('#fakultas_pembimbing').val(resArr.fakultas);
          $('#email_pembimbing').val(resArr.email);
          $('#hp_pembimbing').val(resArr.telepon);
        }
      });
    });
  </script>
</body>

</html>
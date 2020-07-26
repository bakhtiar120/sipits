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
        <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_induk" id="nomor_induk" required>

        <label for="email"><b>Nama</b></label>
        <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" id="nama" name="nama" required>


        <label for="email"><b>Departemen/Fakultas</b></label>
        <input type="text" placeholder="Masukkan departemen dan/atau fakultas" name="dept" id="dept" required>

        <label for="email"><b>Universitas asal</b></label>
        <input type="text" placeholder="Masukkan Universitas (tidak disingkat)" name="univ" id="univ" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email" id="email" required>

        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp" id="no_hp" required>

        <label for="email"><b>Alamat Kantor</b></label>
        <input type="text" placeholder="Masukkan alamat lengkap kantor" name="alamat_kantor" id="alamat_kantor" required>

        <label for="email"><b>Telepon Kantor</b></label>
        <input type="text" placeholder="Masukkan telepon kantor" name="telepon_kantor" id="telepon_kantor" required>

        <hr>

        <p>Identitas Pembimbing Dosen ITS</p>
        <label for="email"><b>NIP/NIDN</b></label>
        <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_pembimbing" required>

        <label for="email"><b>Nama</b></label>
        <input type="text" placeholder="Masukkan Nama Pembimbing" name="nama_pembimbing" required>


        <label for="email"><b>Departemen</b></label>
        <input type="text" placeholder="Masukkan departemen" name="departemen_pembimbing" required>

        <label for="email"><b>Fakultas</b></label>
        <input type="text" placeholder="Masukkan fakultas" name="fakultas_pembimbing" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_pembimbing" required>

        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="hp_pembimbing" required>

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
                label: 'There is no matching record found for ' + request.term,
                value: ''
              }];

              console.log("Before format", res);


              if (res.length) {
                result = $.map(res, function(obj) {
                  return {
                    label: obj.nama,
                    value: obj.nama,
                    data: obj
                  };
                });
              }

              console.log("formatted response", result);
              response(result);
            }
          });
        },
        select: function(event, selectedData) {

          if (selectedData && selectedData.item && selectedData.item.data) {
            var data = selectedData.item.data;
            $('#nomor_induk').val(data.item.label);
            $('#nama').val(data.nama);
            $('#dept').val(data.departemen);
            $('#univ').val(data.universitas);
            $('#email').val(data.email);
            $('#no_hp').val(data.telepon);
            $('#alamat_kantor').val(data.alamat);
            $('#telepon_kantor').val(data.telepon);
          }

        }
      });

    });
  </script>
</body>

</html>
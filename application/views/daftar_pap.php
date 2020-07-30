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
        <label for="email"><b>NIP/NIDN</b></label>
        <input type="text" placeholder="Masukkan NIP/NIDN" name="nomor_induk_ketua" id="nomor_induk_ketua" required>
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
        <span class="error text-danger" id="invalid_email">Email yang anda masukkan invalid</span>

        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp_ketua" id="no_hp_ketua" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <p>Identitas Asisten Peneliti</p>

        <label for="email"><b>NRP</b></label>
        <input type="text" placeholder="Masukkan NRP" name="nomor_induk_ap" id="nomor_induk_ap" required>
        <label for="email"><b>Nama Asisten Peneliti</b></label>
        <input type="text" placeholder="Masukkan Nama Lengkap dan gelar (jika ada)" name="nama_ap" id="nama_ap" required>



        <label for="email"><b>Alamat KTP</b></label>
        <input type="text" placeholder="Masukkan alamat lengkap sesuai ktp" name="alamat_ktp_ap" id="alamat_ktp_ap" required>

        <label for="email"><b>Alamat Domisili</b></label>
        <input type="text" placeholder="Masukkan alamat lengkap domisisl" name="alamat_domisili_ap" id="alamat_domisili_ap" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Masukkan email (diperbolehkan email instansi)" name="email_ap" id="email_ap" required>

        <label for="email"><b>No HP</b></label>
        <input type="text" placeholder="Masukkan No HP yang bisa dihubungi" name="no_hp_ap" maxlength="13" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" id="no_hp_ap" required>

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

        <label for="email"><b>Jumlah Hibah</b></label>
        <input type="text" placeholder="Masukkan jumlah hibah yang didapat" name="jumlah_hibah" id="jumlah_hibah" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Target Luaran</b></label>
        <input type="text" placeholder="Masukkan target luaran penelitian" name="target_luaran" required>

        <hr>

        <p>Reward Honor</p>

        <label for="email"><b>Jumlah Honor per Bulan</b></label>
        <input type="text" placeholder="Masukkan honor yang akan didapatkan per bulan" name="honor" id="honor" required>

        <label for="email"><b>Total lama bulan</b></label>
        <input type="text" placeholder="Masukkan lama bulan" name="lama_bulan" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

        <label for="email"><b>Total Honor</b></label>
        <input type="text" placeholder="Masukkan total honor yang didapatkan" name="total_honor" id="total_honor" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" required>

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
  <script src="<?php echo base_url('assets/js/jquery-1.12.1.js'); ?>"></script>
  <script type='text/javascript'>
    var rupiah = document.getElementById('total_honor');
    //var rupiah2 = document.getElementById('total_honor');
    rupiah.addEventListener('keyup', function(e) {
      // tambahkan 'Rp.' pada saat form di ketik
      //rupiah2.value = this.value;
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');

    });

    var jumlahhibah = document.getElementById('jumlah_hibah');
    jumlahhibah.addEventListener('keyup', function(e) {
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      jumlahhibah.value = formatRupiah(this.value, 'Rp. ');

    });

    var honor = document.getElementById('honor');
    honor.addEventListener('keyup', function(e) {
      // tambahkan 'Rp.' pada saat form di ketik
      honor.value = this.value;
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      honor.value = formatRupiah(this.value, 'Rp. ');

    });

    var email = document.getElementById('email_ketua');
    email.onblur = function() {
      console.log('hasil email ', email.value)
      if (IsEmail(email.value) == false) { // not email
        $('#invalid_email').show();
      }
    };
    email.onfocus = function() {
      // remove the "error" indication, because the user wants to re-enter something
      $('#invalid_email').hide();
    };


    function IsEmail(email) {
      console.log("email ", email)
      var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (!regex.test(email)) {
        return false;
      } else {

        return true;
      }
    }
    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }


    $(document).ready(function() {
      $('.error').hide();
      // Initialize 
      $("#nomor_induk_ketua").autocomplete({
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
          $('#nama_ketua').val(resArr.nama);
          $('#departemen_ketua').val(resArr.departemen);
          $('#universitas_ketua').val(resArr.universitas);
          $('#email_ketua').val(resArr.email);
          $('#no_hp_ketua').val(resArr.telepon);
          $('#alamat_ketua').val(resArr.alamat);

        }
      });
      $("#nomor_induk_ap").autocomplete({
        source: function(request, response) {
          // Fetch data
          $.ajax({
            url: "<?= base_url() ?>pendaftaran/cariMahasiswa",
            type: 'post',
            dataType: "json",
            data: {
              nrp: request.term
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
                    value: obj.nrp,
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
          $('#nama_ap').val(resArr.nama);
          $('#departemen_ap').val(resArr.departemen);
          $('#universitas_ap').val(resArr.universitas);
          $('#email_ap').val(resArr.email);
          $('#no_hp_ap').val(resArr.no_hp);
          $('#alamat_ktp_ap').val(resArr.alamat_KTP);
          $('#alamat_domisili_ap').val(resArr.alamat_domisili);
        }
      });

    });
  </script>

</body>

</html>
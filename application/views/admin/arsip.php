<!DOCTYPE html>
<html>

<head>
    <?php include("header.php") ?>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/AdminLTE/plugins/select2/css/select2.min.css">


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php include("menu_bar.php") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">


                            <h1>Data Arsip 2011 - <?php echo date("Y") ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Arsip</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <?php echo $this->session->flashdata("hasil"); ?>
            </section>


            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <!-- data KP -->
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">
                                    Data Arsip
                                </h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form id="filter">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="input"><b>Tahun</b></label>
                                                        <select class="form-control select2" name="tahun" id="tahun">
                                                            <option value="">--- Pilih ---</option>
                                                            <?php
                                                            foreach ($tahun as $th) {
                                                                echo "<option value='.$th->tahun.'>" . $th->tahun . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="input"><b>Skema</b></label>
                                                        <select class="form-control select2" name="skema" id="skema">
                                                            <option value="">--- Pilih ---</option>
                                                            <?php
                                                            foreach ($skema as $sk) {
                                                                echo "<option value='.$sk->skema.'>" . $sk->skema . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="input"><b>Departemen</b></label>
                                                        <select class="form-control select2" name="departemen" id="departemen">
                                                            <option value="">--- Pilih ---</option>
                                                            <?php
                                                            foreach ($departemen as $dp) {
                                                                echo "<option value='.$dp->departemen.'>" . $dp->departemen . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="input"><b>Fakultas</b></label>
                                                        <select class="form-control select2" name="fakultas" id="fakultas">
                                                            <option value="">--- Pilih ---</option>
                                                            <?php
                                                            foreach ($fakultas as $fk) {
                                                                echo "<option value='.$fk->fakultas.'>" . $fk->fakultas . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <a class="btn btn-sm btn-info" id="cari" style="cursor:pointer;color:#ffffff">Cari</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tahun</th>
                                            <th>Skema</th>
                                            <th>Sumber Dana</th>
                                            <th>Judul Kegiatan</th>
                                            <th>Nama Ketua</th>
                                            <th>Departemen</th>
                                            <th>Fakultas</th>
                                            <th>Dana Disetujui</th>
                                            <th>Dana Terpakai</th>
                                            <th>Dana Sisa</th>
                                            <th>Nomor Kontrak</th>
                                            <th>Tanggal Kontrak</th>
                                            <th>Nomor SK</th>
                                            <th>Tanggal SK</th>
                                            <th>Kode Unik</th>
                                            <th>Rak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                    </tbody>

                                </table>
                            </div>
                        </div>







                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
        <!-- /.content-wrapper -->

        <!-- /.modal -->

        <div class="modal fade" id="editDanaSisa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Dana Sisa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo base_url() ?>/arsip/simpanDanaSisa">
                            <input type="hidden" name="id_arsip" id="id_arsip">
                            <div class="form-group">
                                <label for="nama_ketua" class="col-form-label">Nama Ketua:</label>
                                <input type="text" class="form-control" id="nama_ketua" readonly>
                            </div>
                            <div class="form-group">
                                <label for="judul_kegiatan" class="col-form-label">Judul Kegiatan:</label>
                                <textarea class="form-control" id="judul_kegiatan" disabled></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="tahun" class="col-form-label">Tahun:</label>
                                        <input type="text" class="form-control" id="tahun_modal" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="departemen" class="col-form-label">Departemen:</label>
                                        <input type="text" class="form-control" id="departemen_modal" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fakultas" class="col-form-label">Fakultas:</label>
                                        <input type="text" class="form-control" id="fakultas_modal" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sumber" class="col-form-label">Sumber Dana:</label>
                                <input type="text" class="form-control" id="sumber" readonly>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="setuju" class="col-form-label">Dana Disetujui:</label>
                                        <input type="text" class="form-control" id="setuju" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="terpakai" class="col-form-label">Dana Terpakai:</label>
                                        <input type="text" class="form-control" id="terpakai" name="terpakai">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Update">
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editRak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url() ?>/arsip/simpanRak">
                        <div class="modal-body">
                            <input type="hidden" name="id_arsip" id="id_arsip2">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="nama_rak" class="col-form-label">Nama Rak:</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-control select2" name="id_rak" id="id_rak">
                                            <option value="">--- Pilih ---</option>
                                            <?php
                                            foreach ($rak as $key) {
                                                echo "<option value='$key->id_rak'>" . $key->nama_rak . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="judul_kegiatan" class="col-form-label">Baris:</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-control select2" name="baris" id="baris">
                                            <option value="">--- Pilih ---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="judul_kegiatan" class="col-form-label">Kolom:</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="form-control select2" name="kolom" id="kolom">
                                            <option value="">--- Pilih ---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="judul_kegiatan" class="col-form-label">Keterangan:</label>
                                <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="lihatRak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lihat Rak</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="#">
                        <div class="modal-body">
                            <input type="hidden" name="id_arsip" id="id_arsip2">
                            <div class="form-group">
                                <label for="nama_rak" class="col-form-label">Nama Rak:</label>
                                <input type="text" class="form-control" id="nama_rak" name="nama_rak" readonly>
                            </div>
                            <div class="form-group">
                                <label for="judul_kegiatan" class="col-form-label">Baris:</label>
                                <input type="text" class="form-control" id="jumlah_baris" name="jumlah_baris" readonly>
                            </div>
                            <div class="form-group">
                                <label for="judul_kegiatan" class="col-form-label">Kolom:</label>
                                <input type="text" class="form-control" id="jumlah_kolom" name="jumlah_kolom" readonly>
                            </div>
                            <div class="form-group">
                                <label for="judul_kegiatan" class="col-form-label">Keterangan:</label>
                                <textarea class="form-control" id="_keterangan" name="keterangan" disabled></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cetak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tanda Terima</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="<?php echo base_url() ?>/arsip/cetak_tanda_terima">
                        <div class="modal-body">
                            <input type="hidden" name="id_arsip3" id="id_arsip3">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kategori as $key) { ?>
                                            <tr>
                                                <td><?= $key->kategori ?></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" name="status[]" value="<?= $key->id_kategori; ?>" class="form-check-input">
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Nama Pengirim :</label>
                                <input type="text" id="nama_pengirim" class="form-control" name="nama_pengirim">
                            </div>
                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Nomor HP Pengirim :</label>
                                <input type="text" id="no_hp_pengirim" class="form-control" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" name="no_hp_pengirim">

                            </div>
                            <div class="form-group">
                                <label for="nama_pengirim" class="col-form-label">Nama Penerima :</label>
                                <input type="text" id="nama_penerima" class="form-control" name="nama_penerima">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include("footer.php") ?>
        <script src="<?php echo base_url() ?>/assets/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
            var table;
            $(document).ready(function() {
                //Initialize Select2 Elements
                $('.select2').select2();

                $("#cari").click(function() {
                    var cari = "Cari";
                    var thn = $("#tahun").val();
                    var skema = $("#skema").val();
                    var dep = $("#departemen").val();
                    var fak = $("#fakultas").val();
                    $('#table').DataTable({
                        "responsive": true,
                        "scrollX": true,
                        "pageLength": 10,
                        "destroy": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        "ajax": {
                            "url": "http://localhost:81/sipits/arsip/get_data2",
                            "type": "POST",
                            "dataType": "json",
                            "data": function(d) {
                                var frm_data = $('#filter').serializeArray();
                                $.each(frm_data, function(key, val) {
                                    d[val.name] = val.value;
                                });
                            }
                        }
                    });
                });

                //datatables
                table = $('#table').DataTable({
                    "scrollX": true,
                    // "responsive": true,
                    "processing": true,
                    "serverSide": true,
                    "order": [],

                    "ajax": {
                        "url": "<?php echo site_url('arsip/get_data') ?>",
                        "type": "POST"
                    },

                    "columnDefs": [{
                        "targets": [0],
                        "orderable": false,
                    }, ],


                });
            });

            $("#id_rak").change(function() {
                var rak = $("#id_rak").val();
                $.ajax({
                    url: base_url + "arsip/cekRak",
                    type: "post",
                    dataType: 'json',
                    data: 'id_rak=' + rak,
                    success: function(res) {
                        $("#baris").html(res.baris);
                        $("#kolom").html(res.kolom);
                    }
                });
            });

            function editDana(id) {
                $.ajax({
                    url: base_url + "arsip/cekEdit",
                    type: 'post',
                    dataType: "json",
                    data: 'id_arsip=' + id,
                    success: function(res) {
                        $("#id_arsip").val(res.id_arsip);
                        $("#nama_ketua").val(res.nama_ketua);
                        $("#judul_kegiatan").text(res.judul);
                        $("#departemen_modal").val(res.departemen);
                        $("#fakultas_modal").val(res.fakultas);
                        $("#setuju").val(res.setujui);
                        $("#terpakai").val(res.sptb);
                        $("#sumber").val(res.sumber);
                        $("#tahun_modal").val(res.tahun);
                        $("#editDanaSisa").modal();
                    }
                });
            }

            function editRak(id) {
                // $.ajax({
                //     url: base_url + "arsip/cekEdit",
                //     type: 'post',
                //     dataType: "json",
                //     data: 'id_arsip=' + id,
                //     success: function(res) {
                $("#id_arsip2").val(id);
                //         $("#nama_ketua").val(res.nama_ketua);
                //         $("#judul_kegiatan").text(res.judul);
                //         $("#departemen_modal").val(res.departemen);
                //         $("#fakultas_modal").val(res.fakultas);
                //         $("#setuju").val(res.setujui);
                //         $("#sisa").val(res.sisa);
                //         $("#sumber").val(res.sumber);
                //         $("#tahun_modal").val(res.tahun);
                $("#editRak").modal();
                //     }
                // });
            }

            function cetakData(id) {
                $("#id_arsip3").val(id);
                $("#cetak").modal();

            }

            function lihatRak(id) {
                $.ajax({
                    url: base_url + "arsip/lihatRak",
                    type: 'post',
                    dataType: "json",
                    data: 'id_arsip=' + id,
                    success: function(res) {
                        $("#nama_rak").val(res.nama_rak);
                        $("#jumlah_baris").val(res.nomor_baris);
                        $("#jumlah_kolom").val(res.nomor_kolom);
                        $("#_keterangan").val(res.keterangan);
                        $("#lihatRak").modal();
                    }
                });
            }

            var sisa = document.getElementById('sisa');
            sisa.addEventListener('keyup', function(e) {
                sisa.value = formatRupiah(this.value, 'Rp. ');
            });
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
                return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
            }
        </script>
</body>

</html>
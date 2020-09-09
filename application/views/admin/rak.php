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


                            <h1>Master Rak</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Master Rak</li>
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
                                    Master Rak
                                </h3>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form method="post" action="<?php echo base_url() ?>/rak/simpan_rak">
                                            <input type="hidden" name="id_rak" id="id_rak" class="form-control">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="input"><b>Nama Rak</b></label>
                                                        <input type="text" name="nama_rak" id="nama_rak" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="input"><b>Posisi</b></label>
                                                        <input type="text" name="posisi" id="posisi" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="input"><b>Jumlah Kolom</b></label>
                                                        <input type="text" name="jumlah_kolom" maxlength="3" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" id="jumlah_kolom" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="input"><b>Jumlah Baris</b></label>
                                                        <input type="text" name="jumlah_baris" maxlength="3" onKeyUp="this.value=this.value.replace(/[^0-9]/g,'')" id="jumlah_baris" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <label for="input"><b>Tgl Beli</b></label>
                                                        <input type="date" name="tgl_beli" id="tgl_beli" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <input class="btn btn-sm btn-info" type="submit" value="Simpan">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Rak</th>
                                            <th>Posisi</th>
                                            <th>Jumlah Kolom</th>
                                            <th>Jumlah Baris</th>
                                            <th>Tanggal Beli</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($rak as $key) {
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $key->nama_rak; ?></td>
                                                <td><?= $key->posisi; ?></td>
                                                <td><?= $key->jumlah_kolom; ?></td>
                                                <td><?= $key->jumlah_baris; ?></td>
                                                <td><?= tgl($key->tgl_beli); ?></td>
                                                <?php
                                                $kirim = $key->id_rak . "|" . $key->nama_rak . "|" . $key->posisi . "|" . $key->jumlah_kolom . "|" . $key->jumlah_baris . "|" . tgl2($key->tgl_beli);
                                                ?>
                                                <td><a class="btn btn-xs btn-success" onclick="rakEdit('<?= $kirim ?>')" style="cursor:pointer;color:#ffffff"> Edit</a> &nbsp; </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
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
                                        <label for="sisa" class="col-form-label">Dana Sisa:</label>
                                        <input type="text" class="form-control" id="sisa" name="sisa">
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

        <?php include("footer.php") ?>
        <script src="<?php echo base_url() ?>/assets/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
        <!-- page script -->
        <script type="text/javascript">
            var table;
            $(document).ready(function() {
                //Initialize Select2 Elements
                $('.select2').select2();
                //datatables
                $('#table').DataTable();
            });

            function rakEdit(id) {

                alert(id); // var pecah = id.split("|");
                // $("#id_rak").val(pecah[0]);
                // $("#nama_rak").val(pecah[1]);

                // $.ajax({
                //     url: base_url + "rak/rakEdit",
                //     type: 'post',
                //     dataType: "json",
                //     data: 'id_arsip=' + id,
                //     success: function(res) {
                //         $("#id_arsip").val(res.id_arsip);
                //         $("#nama_ketua").val(res.nama_ketua);
                //         $("#judul_kegiatan").text(res.judul);
                //         $("#departemen_modal").val(res.departemen);
                //         $("#fakultas_modal").val(res.fakultas);
                //         $("#setuju").val(res.setujui);
                //         $("#sisa").val(res.sisa);
                //         $("#sumber").val(res.sumber);
                //         $("#tahun_modal").val(res.tahun);
                //         $("#editDanaSisa").modal();
                //     }
                // });
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
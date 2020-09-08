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
                                            <th>Dana Sisa</th>
                                            <th>Nomor Kontrak</th>
                                            <th>Tanggal Kontrak</th>
                                            <th>Nomor SK</th>
                                            <th>Tanggal SK</th>
                                            <th>Kode Unik</th>
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
                                        <input type="text" class="form-control" id="tahun" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="departemen" class="col-form-label">Departemen:</label>
                                        <input type="text" class="form-control" id="departemen" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fakultas" class="col-form-label">Fakultas:</label>
                                        <input type="text" class="form-control" id="fakultas" readonly>
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
                        $("#departemen").val(res.departemen);
                        $("#fakultas").val(res.fakultas);
                        $("#setuju").val(res.data_disetujui);
                        $("#sumber").val(res.sumber);
                        $("#tahun").val(res.tahun);
                        $("#editDanaSisa").modal();
                    }
                });
            }
        </script>
</body>

</html>



// var rupiah = document.getElementById('total_honor');
// //var rupiah2 = document.getElementById('total_honor');
// rupiah.addEventListener('keyup', function(e) {
//     // tambahkan 'Rp.' pada saat form di ketik
//     //rupiah2.value = this.value;
//     // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
//     rupiah.value = formatRupiah(this.value, 'Rp. ');

// });


var honor = document.getElementById('honor');
var lama_bulan = document.getElementById('lama_bulan');
var total_honor = document.getElementById('total_honor');
honor.addEventListener('keyup', function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // honor.value = this.value;
    // // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    honor.value = formatRupiah(this.value, 'Rp. ');
    var num = honor.value.replace(/[^0-9]/g,'');
    var total = num * lama_bulan.value;
    total_honor.value = total;
    total_honor.value = formatRupiah(total_honor.value,'Rp. ');
    // honor.value = formatRupiah(this.value, 'Rp. ');
	// var hapus_rp = honor.value.replace(/[^0-9]/g,'');
	// total = honor.value * lama_bulan.value;
	// total_honor.value = total;


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
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}


$(document).ready(function() {
    // Initialize 
    $("#nomor_induk_ketua").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: base_url + "pendaftaran/cekDosen",
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
                url: base_url + "pendaftaran/cariMahasiswa",
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

    $('#invalid_email').hide();
    $('#invalid_email_ap').hide();
    $("#email_ketua").change(function() {
        var email = $('#email_ketua').val();
        if (IsEmail(email) == false) { // not email
            $('#invalid_email').show();
            $('#email_ketua').focus();
            $('#daftar').prop("disabled", true);
        } else {
            $('#invalid_email').hide();
            $('#daftar').prop("disabled", false);
        }
    });

    $("#email_ap").change(function() {
        var email = $('#email_ap').val();
        if (IsEmail(email) == false) { // not email
            $('#invalid_email_ap').show();
            $('#email_ap').focus();
            $('#daftar').prop("disabled", true);
        } else {
            $('#invalid_email_ap').hide();
            $('#daftar').prop("disabled", false);
        }
    });

    function IsEmail(email) {
        console.log("email ", email)
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {

            return true;
        }
    }

    var allowedFiles = [".doc", ".docx", ".pdf"];
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    $("#pernyataan").change(function() {
        var pernyataan = $("#pernyataan").val();
        if (!regex.test(pernyataan.toLowerCase())) {
            $("#invalid_pernyataan").html("File Pernyataan harus : <b>" + allowedFiles.join(', '));
            this.value = "";
            return false;
        } else {
            if (this.files[0].size > 2048000) {
                $("#invalid_pernyataan").html("File <b>" + this.name + "</b> terlalu besar!");
                // invalid_draft.innerHTML = "File terlalu besar!";
                this.value = "";
            } else {
                $("#invalid_pernyataan").html("");
            }
            return true;
        };
    });

    var allowedFiles2 = [".jpg", ".jpeg", ".png"];
    var regex2 = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles2.join('|') + ")$");
    $("#ktp").change(function() {
        var ktp = $("#ktp").val();
        if (!regex2.test(ktp.toLowerCase())) {
            $("#invalid_ktp").html("File KTP harus : <b>" + allowedFiles2.join(', '));
            this.value = "";
            return false;
        } else {
            if (this.files[0].size > 2048000) {
                $("#invalid_ktp").html("File <b>" + this.name + "</b> terlalu besar!");
                // invalid_draft.innerHTML = "File terlalu besar!";
                this.value = "";
            } else {
                $("#invalid_ktp").html("");
            }
            return true;
        };
    });

});
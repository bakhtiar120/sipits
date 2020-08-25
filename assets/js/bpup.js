var rupiah = document.getElementById('satuan_biaya');
var lama_pembiayaan = document.getElementById('lama_pembiayaan');
var total_biaya = document.getElementById('total_biaya');
var total;
//var rupiah2 = document.getElementById('total_honor');
rupiah.addEventListener('keyup', function (e) {
	// tambahkan 'Rp.' pada saat form di ketik
	//rupiah2.value = this.value;
	// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
	rupiah.value = formatRupiah(this.value, 'Rp. ');
	var hapus_rp = rupiah.value.replace("Rp. ", "");
	total = hapus_rp.replace(".", "") * lama_pembiayaan.value;
	total_biaya.value = total;
});


// total_biaya.addEventListener('keyup', function (e) {
// 	// tambahkan 'Rp.' pada saat form di ketik
// 	// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
// 	total_biaya.value = formatRupiah(this.value, 'Rp. ');
// });

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

	// rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	// return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	return rupiah;
}


$(document).ready(function () {
	// Initialize 
	$("#nomor_induk").autocomplete({
		source: function (request, response) {
			// Fetch data
			$.ajax({
				url: base_url + "pendaftaran/cekDosen",
				type: 'post',
				dataType: "json",
				data: {
					nidn: request.term
				},
				success: function (res) {
					var result;
					result = [{
						label: 'Tidak ketemu ' + request.term,
						value: ''
					}];

					console.log("Before format", res);


					if (res.length) {
						result = $.map(res, function (obj) {
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
		select: function (event, ui) {
			var resArr;
			resArr = ui.item.data;
			$('#nama').val(resArr.nama);
			$('#departemen').val(resArr.departemen);
			$('#universitas').val(resArr.universitas);
			$('#email').val(resArr.email);
			$('#no_hp').val(resArr.telepon);
			$('#alamat_kampus').val(resArr.Alamat);

		}
	});

	$('#invalid_email').hide();
	$("#email").change(function () {
		var email = $('#email').val();
		if (IsEmail(email) == false) { // not email
			$('#invalid_email').show();
			$('#email').focus();
			$('#daftar').prop("disabled", true);
		} else {
			$('#invalid_email').hide();
			$('#daftar').prop("disabled", false);
		}
	});

	$('#invalid_email_bea').hide();
	$("#email_bea").change(function () {
		var email = $('#email_bea').val();
		if (IsEmail(email) == false) { // not email
			$('#invalid_email_bea').show();
			$('#email_bea').focus();
			$('#daftar').prop("disabled", true);
		} else {
			$('#invalid_email_bea').hide();
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
	$("#ktm").change(function () {
		var ktm = $("#ktm").val();
		if (!regex.test(ktm.toLowerCase())) {
			$("#invalid_ktm").html("File KTM harus : <b>" + allowedFiles.join(', '));
			this.value = "";
			return false;
		} else {
			if (this.files[0].size > 2048000) {
				$("#invalid_ktm").html("File <b>" + this.name + "</b> terlalu besar!");
				// invalid_draft.innerHTML = "File terlalu besar!";
				this.value = "";
			} else {
				$("#invalid_ktm").html("");
			}
			return true;
		};
	});

	$("#ktp").change(function () {
		var ktp = $("#ktp").val();
		if (!regex.test(ktp.toLowerCase())) {
			$("#invalid_ktp").html("File KTP harus : <b>" + allowedFiles.join(', '));
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

$(document).ready(function () {

	// Initialize 
	$("#nomor_induk").autocomplete({
		source: function (request, response) {
			// Fetch data
			$.ajax({
				url: "<?= base_url() ?>pendaftaran/cekDosen",
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

					// console.log("Before format", res);


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
			$('#dept').val(resArr.departemen);
			$('#univ').val(resArr.universitas);
			$('#email').val(resArr.email);
			$('#no_hp').val(resArr.telepon);
			$('#alamat_kantor').val(resArr.Alamat);

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

	$("#pernyataan").change(function () {
		var pernyataan = $("#pernyataan").val();
		if (!regex.test(pernyataan.toLowerCase())) {
			$("#invalid_pernyataan").html("File harus : <b>" + allowedFiles.join(', '));
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

	$("#draf").change(function () {
		var draf = $("#draf").val();
		if (!regex.test(draf.toLowerCase())) {
			$("#invalid_draf").html("File harus : <b>" + allowedFiles.join(', '));
			this.value = "";
			return false;
		} else {
			if (this.files[0].size > 2048000) {
				$("#invalid_draf").html("File <b>" + this.name + "</b> terlalu besar!");
				this.value = "";
			} else {
				$("#invalid_draf").html("");
			}
			return true;
		};
	});

	$("#npwp").change(function () {
		var npwp = $("#npwp").val();
		if (!regex.test(npwp.toLowerCase())) {
			$("#invalid_npwp").html("File harus : <b>" + allowedFiles.join(', '));
			this.value = "";
			return false;
		} else {
			if (this.files[0].size > 2048000) {
				$("#invalid_npwp").html("File <b>" + this.name + "</b> terlalu besar!");
				this.value = "";
			} else {
				$("#invalid_npwp").html("");
			}
			return true;
		};
	});

	$("#tabungan").change(function () {
		var tabungan = $("#tabungan").val();
		if (!regex.test(tabungan.toLowerCase())) {
			$("#invalid_tabungan").html("File harus : <b>" + allowedFiles.join(', '));
			this.value = "";
			return false;
		} else {
			if (this.files[0].size > 2048000) {
				$("#invalid_tabungan").html("File <b>" + this.name + "</b> terlalu besar!");
				this.value = "";
			} else {
				$("#invalid_tabungan").html("");
			}
			return true;
		};
	});

});

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
			$('#telepon_kantor').val(resArr.telepon);

		}
	});

	$("#nomor_pembimbing").autocomplete({
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
			$('#nama_pembimbing').val(resArr.nama);
			$('#departemen_pembimbing').val(resArr.departemen);
			$('#fakultas_pembimbing').val(resArr.fakultas);
			$('#email_pembimbing').val(resArr.email);
			$('#hp_pembimbing').val(resArr.telepon);
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

	$('#invalid_email2').hide();

	$("#email_pembimbing").change(function () {
		var email = $('#email_pembimbing').val();
		if (IsEmail(email) == false) { // not email
			$('#invalid_email2').show();
			$('#email_pembimbing').focus();
			$('#daftar').prop("disabled", true);
		} else {
			$('#invalid_email2').hide();
			$('#daftar').prop("disabled", false);
		}
	});

	// $('#telp_kantor').hide();
	// $("#telp_kantor").change(function () {
	// 	var hp = $('#telp_kantor').val();
	// 	if (hp.length >= 13) { // not email
	// 		$('#telp_kantor').show();
	// 		$('#no_hp').focus();
	// 		$('#daftar').prop("disabled", true);
	// 	} else {
	// 		$('#telp_kantor').hide();
	// 		$('#daftar').prop("disabled", false);
	// 	}
	// });

	// $('#invalid_no_hp').hide();
	// $("#no_hp").change(function () {
	// 	var hp = $('#no_hp').val();
	// 	if (hp.length >= 13) { // not email
	// 		$('#invalid_no_hp').show();
	// 		$('#no_hp').focus();
	// 		$('#daftar').prop("disabled", true);
	// 	} else {
	// 		$('#invalid_no_hp').hide();
	// 		$('#daftar').prop("disabled", false);
	// 	}
	// });

	// $('#invalid_no_hp2').hide();
	// $("#hp_pembimbing").change(function () {
	// 	var hp = $('#hp_pembimbing').val();
	// 	if (hp.length >= 13) { // not email
	// 		$('#invalid_no_hp2').show();
	// 		$('#hp_pembimbing').focus();
	// 		$('#daftar').prop("disabled", true);
	// 	} else {
	// 		$('#invalid_no_hp2').hide();
	// 		$('#daftar').prop("disabled", false);
	// 	}
	// });

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

	$("#draft_publikasi").change(function () {
		var draft_publikasi = $("#draft_publikasi").val();
		if (!regex.test(draft_publikasi.toLowerCase())) {
			$("#invalid_draft").html("File harus : <b>" + allowedFiles.join(', '));
			this.value = "";
			return false;
		} else {
			if (this.files[0].size > 2048000) {
				$("#invalid_draft").html("File <b>" + this.name + "</b> terlalu besar!");
				// invalid_draft.innerHTML = "File terlalu besar!";
				this.value = "";
			} else {
				$("#invalid_draft").html("");
			}
			return true;
		};
	});

	$("#luaran_publikasi").change(function () {
		var luaran_publikasi = $("#luaran_publikasi").val();
		if (!regex.test(luaran_publikasi.toLowerCase())) {
			$("#invalid_luaran").html("File harus : <b>" + allowedFiles.join(', '));
			this.value = "";
			return false;
		} else {
			if (this.files[0].size > 2048000) {
				$("#invalid_luaran").html("File <b>" + this.name + "</b> terlalu besar!");
				this.value = "";
			} else {
				$("#invalid_luaran").html("");
			}
			return true;
		};
	});

	$("#mou_publikasi").change(function () {
		var mou_publikasi = $("#mou_publikasi").val();
		if (!regex.test(mou_publikasi.toLowerCase())) {
			$("#invalid_mou").html("File harus : <b>" + allowedFiles.join(', '));
			this.value = "";
			return false;
		} else {
			if (this.files[0].size > 2048000) {
				$("#invalid_mou").html("File <b>" + this.name + "</b> terlalu besar!");
				this.value = "";
			} else {
				$("#invalid_mou").html("");
			}
			return true;
		};
	});

});

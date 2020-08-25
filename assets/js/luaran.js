$(document).ready(function () {
	$("#jenis").hide();
	$("#jenis_luaran_isi").hide();
	// x.style.display = "none";
	// if (x.style.display === "none") {
	// 	x.style.display = "block";
	// } else {
	// }

	$("#daftar").prop("disabled", true);
	var nilai = '';
	$('#judul').prop("readonly", true);
	$('#luaran').change(function () {
		var pilihan = $('#luaran').val();
		if (pilihan == 0) {
			$('#judul').prop("readonly", true);
		} else {
			$('#judul').prop("readonly", false);
			nilai = pilihan;
			if ($('#luaran').val() == "bpup") {
				$("#jenis").show();
			} else {
				$("#jenis").hide();
			}
		}
	});

	$('#jenis_luaran').change(function () {
		var pilihan = $('#jenis_luaran').val();
		if (pilihan == 6) {
			$("#jenis_luaran_isi").show();
		} else {
			$("#jenis_luaran_isi").hide();
		}
	});

	// $('#jenis_luaran').change(function () {
	// 	var jenis_luaran = $('#jenis_luaran').val();
	// 	if (jenis_luaran == 6) {
	// 		$('#judul').prop("readonly", true);
	// 	} else {
	// 		$('#judul').prop("readonly", false);
	// 	}
	// });

	// var judul = $('#judul').val();
	$("#judul").autocomplete({
		source: function (request, response) {
			// Fetch data
			$.ajax({
				url: base_url + "pendaftaran/cekJudul/" + nilai,
				type: 'post',
				dataType: "json",
				data: {
					judul: request.term
				},
				success: function (res) {
					$("#daftar").prop("disabled", false);
					var result;
					result = [{
						label: 'Tidak ketemu ' + request.term,
						value: ''
					}];

					// console.log("Before format", res);


					if (res.length) {
						result = $.map(res, function (obj) {
							return {
								label: obj.judul,
								value: obj.judul,
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
			$('#id_x').val(resArr.id);
			$('#nomor_induk').val(resArr.nidn);
			$('#nama').val(resArr.nama);
			$('#dept').val(resArr.departemen);
			$('#univ').val(resArr.universitas);
			$('#email').val(resArr.email);

		}
	});




});

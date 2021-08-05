$(document).ready(function () {
	SemuaKendaraan();
	RiwayatKendaraan();
});

function SemuaKendaraan() {
	var table = $("#table_semua_kendaraan");
	grid = table.DataTable({
		// scrollX: true,
		// scrollCollapse: true,
		aaSorting: [],
		initComplete: function (settings, json) {},
		retrieve: true,
		processing: true,
		ajax: {
			type: "GET",
			url: base_url + "Kendaraan/getAllKendaraan",
			data: function (d) {
				no = 0;
			},
			dataSrc: "",
		},
		columns: [
			{
				render: function (data, type, full, meta) {
					no += 1;

					return no;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.nomor_kendaraan;
				},
				className: "text-center",
			},

			{
				render: function (data, type, full, meta) {
					return full.merk_type;
				},
				className: "text-center",
			},

			{
				render: function (data, type, full, meta) {
					return full.tahun;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.no_rangka;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.no_mesin;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.warna;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.nama_trayek;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return `<div class="row">
                      <div class="col-md-12">
                          <button onclick="edit_kendaraan(${full.id_kendaraan})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                          <button onclick="hapus_kendaraan(${full.id_kendaraan})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                          <button onclick="kepemilikan_kendaraan(${full.id_kendaraan})" type="button" class="btn btn-info btn-sm"><i class="fa fa-feather-alt"></i></button>
                      </div>
                  </div>`;
				},
				className: "text-center",
			},
		],
	});
}

function RiwayatKendaraan() {
	var table = $("#table_riwayat");
	grid_riwayat = table.DataTable({
		// scrollX: true,
		// scrollCollapse: true,
		aaSorting: [],
		initComplete: function (settings, json) {},
		retrieve: true,
		processing: true,
		ajax: {
			type: "GET",
			url: base_url + "Kendaraan/getRiwayat",
			data: function (d) {
				no_riwayat = 0;
			},
			dataSrc: "",
		},
		columns: [
			{
				render: function (data, type, full, meta) {
					no_riwayat += 1;

					return no_riwayat;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.nomor_kendaraan;
				},
				className: "text-center",
			},

			{
				render: function (data, type, full, meta) {
					return full.merk_type;
				},
				className: "text-center",
			},

			{
				render: function (data, type, full, meta) {
					return full.tahun;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.no_rangka;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.no_mesin;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.warna;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.nama_trayek;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.deleted_at;
				},
				className: "text-center",
			},
			{
				render: function (data, type, full, meta) {
					return full.keterangan;
				},
				className: "text-center",
			},
		],
	});
}

$("#btn_cari_anggota").on("click", function (e) {
	e.preventDefault();
	let key = $("#cari_anggota").val();

	$.ajax({
		url: base_url + "Kendaraan/searchAnggota",
		type: "POST",
		dataType: "JSON",
		data: { key: key },
		success: function (data) {
			if (data.status == false) {
				$(".not_found").text(data.alert);
				$(".result-search").html("");
			} else {
				if (data.is_active == 1) {
					var stat = `<button type="button" class="btn btn-sm btn-success" style="color: white;">Aktif</button>`;
				} else if (data.is_active == 2) {
					var stat = `<button type="button" class="btn btn-sm btn-danger" style="color: white;">Tidak Aktif</button>`;
				}
				$(".not_found").text("");
				$(".result-search").html(
					`
          <div class="col-md-12 text-center">
              <img src="${base_url}assets/foto_anggota/${data.foto_anggota}" alt=" foto_anggota" class="img-thumbnail rounded-circle mb-2 mt-3" style="width: 150px; height: 150px;">
              <p class="fs-3 text-monospace mt-0">${data.kode_anggota}</p>
              <p class="fs-2 font-weight-bold mt-0">${data.nama_anggota}</p>
              ` +
						stat +
						`
          </div>
        `
				);

				$("#id_anggota").val(data.id_anggota);
			}
		},
	});
});

function kepemilikan_kendaraan(id) {
	$("#editKepemilikanModal").modal("show");
	$("#editKepemilikanModalLabel").text("Edit Data Kepemilikan");
	$("#submit_kepemilikan_kendaraan").text("Edit Kepemilikan");
	$("#cancel_kepemilikan_kendaraan").text("Batal");
	$("#form-edit-kepemilikan")[0].reset();

	$("label[for='pemilik_awal']").html("");
	$.ajax({
		url: base_url + "Kendaraan/getKepemilikan/" + id,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			if (data.is_active == 1) {
				var stats = `  <span class="badge badge-success">Aktif</span>`;
			} else if (data.is_active == 2) {
				var stats = `  <span class="badge badge-danger">Tidak Aktif</span>`;
			}
			$("#pemilik_awal").val(data.nama_anggota);
			$("label[for='pemilik_awal']").append(stats);
		},
	});

	$("#submit_kepemilikan_kendaraan").on("click", function (e) {
		e.preventDefault();
		let data = {
			id_anggota: $("#id_anggota").val(),
		};
		$.ajax({
			url: base_url + "Kendaraan/editKepemilikan/" + id,
			type: "POST",
			data: data,
			dataType: "JSON",
			success: function (data) {
				sukses(data.alert);
				$("#form-edit-kepemilikan")[0].reset();
				$("#editKepemilikanModal").modal("hide");
				grid.ajax.reload();
				grid_riwayat.ajax.reload();
			},
		});
	});
}

$("#key_anggota").on("keyup", function () {
	let key = $("#key_anggota").val();
	$("label[for='pemilik_baru']").html("");
	if (!key) {
		$("#pemilik_baru").val("");
		$("#kode_anggota").val("");
		$(".not_found").text("");
	} else {
		$.ajax({
			url: base_url + "Kendaraan/searchAnggota",
			type: "POST",
			dataType: "JSON",
			data: { key: key },
			success: function (data) {
				console.log(data);

				if (data.is_active == 1) {
					var stats = `  <span class="badge badge-success">Aktif</span>`;
				} else if (data.is_active == 2) {
					var stats = `  <span class="badge badge-danger">Tidak Aktif</span>`;
				}

				if (data.status == false) {
					$(".not_found").text(data.alert);
				}

				$("#pemilik_baru").val(data.nama_anggota);
				$("#kode_anggota").val(data.kode_anggota);
				$("#id_anggota").val(data.id_anggota);
				$("label[for='pemilik_baru']").append(stats);
			},
		});
	}
});

$("#submit_kendaraan").on("click", function (e) {
	save = "add";
	e.preventDefault();

	var formData = new FormData($("#form-kendaraan")[0]);
	console.log(formData);
	$.ajax({
		url: base_url + "Kendaraan/addKendaraan",
		dataType: "JSON",
		type: "POST",
		contentType: false,
		processData: false,
		data: formData,
		success: function (data) {
			if (data.status) {
				sukses(data.alert);
				$("#nomor_kendaraan").val("");
				$("#no_rangka").val("");
				$("#no_mesin").val("");
				$("#type").val("");
				$("#tahun").val("");
				$("#warna").val("");
				$("#merk").val("");
				grid.ajax.reload();
			} else {
				$("#nomor_kendaraan_error").html(data.nomor_kendaraan_error);
				$("#no_rangka_error").html(data.no_rangka_error);
				$("#no_mesin_error").html(data.no_mesin_error);
				$("#merk_error").html(data.merk_error);
				$("#type_error").html(data.type_error);
				$("#tahun_error").html(data.tahun_error);
				$("#warna_error").html(data.warna_error);
			}
		},
	});
});

$("#cancel_kendaraan").click(function () {
	$("#form-kendaraan")[0].reset();
	$("#modalKendaraan").modal("hide");
});

function trayek() {
	$.ajax({
		url: base_url + "ManajemenData/trayek",
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			data.forEach((Element) => {
				$("#trayek").append(
					`<option value="${Element.id_trayek}">${Element.nama_trayek} / ${Element.trayek}</option>`
				);
			});
		},
	});
}

function edit_kendaraan(id) {
	save = "edit";
	$("#form-edit-kendaraan")[0].reset();
	$("#kendaraanModal").modal("show");
	$("#kendaraanModalLabel").text("Edit Data Kendaraan");
	$("#submit_edit_kendaraan").text("Edit Data");
	$("#cancel_edit_kendaraan").text("Batal");
	$("#submit_kendaraan").attr("disabled", false);
	$(".text-danger").empty();

	$("#trayek").html("");
	$.ajax({
		url: base_url + "Kendaraan/getKendaraanByID/" + id,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			console.log(data);

			$.ajax({
				url: base_url + "Kendaraan/getEditTrayek/" + data.id_jenis_trayek,
				type: "POST",
				dataType: "JSON",
				success: function (resp) {
					console.log(resp);
					const idTrayek = data.id_trayek;
					resp.forEach((Element) => {
						if (idTrayek === Element.id_trayek) {
							$("#trayek").append(
								`<option value="${Element.id_trayek}" selected>${Element.nama_trayek} / ${Element.trayek}</option>`
							);
						} else {
							$("#trayek").append(
								`<option value="${Element.id_trayek}">${Element.nama_trayek} / ${Element.trayek}</option>`
							);
						}
					});
				},
			});

			$("#trayek").val(data.id_trayek);
			var merk_type = data.merk_type;
			var str = merk_type.split("/");
			var merk = str[0];
			var type = str[1];

			$("#id_kendaraan").val(data.id_kendaraan);
			$("#is_active").val(data.is_active);
			$("#created_at").val(data.created_at);
			$("#id_kepemilikan").val(data.id_kepemilikan);
			$("#id_trayek").val(data.id_trayek);
			$("#nomor_kendaraan").val(data.nomor_kendaraan);
			$("#no_rangka").val(data.no_rangka);
			$("#no_mesin").val(data.no_mesin);
			$("#merk").val(merk);
			$("#type").val(type);
			$("#tahun").val(data.tahun);
			$("#warna").val(data.warna);
			$("#kategori_trayek").val(data.id_jenis_trayek);
		},
	});
}

$("#submit_edit_kendaraan").on("click", function (e) {
	e.preventDefault();
	var formData = new FormData($("#form-edit-kendaraan")[0]);
	$.ajax({
		url: base_url + "Kendaraan/editKendaraan",
		data: formData,
		type: "POST",
		dataType: "JSON",
		contentType: false,
		processData: false,
		success: function (data) {
			sukses(data.alert);
			$("#form-edit-kendaraan")[0].reset();
			$("#kendaraanModal").modal("hide");
			grid.ajax.reload();
			grid_riwayat.ajax.reload();
		},
	});
});

function listTrayek() {
	$("#trayek").html("");
	let id = $("#kategori_trayek").val();
	$.ajax({
		url: base_url + "ManajemenData/getListTrayek/" + id,
		dataType: "JSON",
		type: "POST",
		success: function (data) {
			console.log(data);
			data.forEach((Element) => {
				$("#trayek").append(
					`<option value="${Element.id_trayek}">${Element.nama_trayek} / ${Element.trayek}</option>`
				);
			});
		},
	});
}

function btnAktifKendaraan(id_kendaraan) {
	$.ajax({
		url: base_url + "ManajemenData/aktifKendaraan/" + id_kendaraan,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			sukses(data.alert);
			grid.ajax.reload();
		},
	});
}

function btnNonAktifKendaraan(id_kendaraan) {
	$.ajax({
		url: base_url + "ManajemenData/NonaktifKendaraan/" + id_kendaraan,
		type: "POST",
		dataType: "JSON",
		success: function (data) {
			sukses(data.alert);
			grid.ajax.reload();
		},
	});
}

function hapus_kendaraan(id) {
	Swal.fire({
		title: "Yakin Menghapus Data ?",
		text: "Data yang dihapus akan hilang secara permanen",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			const inputValue = "";
			const { value: keterangan } = Swal.fire({
				title: "Silahkan Masukan keterangan",
				input: "text",
				inputLabel: "",
				inputValue: inputValue,
				showCancelButton: true,
				inputValidator: (value) => {
					if (!value) {
						return "Keterangan harus diisi !!";
					} else {
						$.ajax({
							url: base_url + "Kendaraan/hapusKendaraan/" + id,
							data: { value: value },
							type: "POST",
							dataType: "JSON",
							success: function (data) {
								sukses(data.alert);
								grid.ajax.reload();
								grid_riwayat.ajax.reload();
							},
						});
					}
				},
			});
		}
	});
}

function error(alert) {
	Swal.fire({
		icon: "error",
		title: "Oops...",
		text: alert,
	});
}

function sukses(alert) {
	Swal.fire({
		icon: "success",
		title: "Data Kendaraan " + alert,
		text: "",
		timer: 1500,
		showConfirmButton: false,
	});
}

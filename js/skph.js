$(document).ready(function(){
    semua_skph();
});

function semua_skph() {
    var table = $("#table_semua_skph");
    grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "PelepasanHak/get_All_SKPH",
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
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.no_pelepasan_hak
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.nama_anggota;
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.nomor_kendaraan;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.no_mesin
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.nama_trayek+'/'+full.trayek
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.nama_baru
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.tanggal_skph
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          <a href="${base_url}SKKK/RepeatPrint/${full.id_pelepasan_hak}" target="_blank" type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
                          <button onclick="hapus_skkk(${full.id_pelepasan_hak})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
    ],
  });
}

$("#key_kendaraan").on("keyup", function () {
	let key =  $("#key_kendaraan").val();
  if(!key){
		$(".not-found").text("");
    $('#nomor_kendaraan').val('');
    $('#tahun').val('');
    $('#merk_type').val('');
    $('#id_kendaraan').val('')
    $('#no_rangka').val('');
    $('#no_mesin').val('');
    $('#warna').val('');
    $('#trayek').val('');
    $('#nama_trayek').val('');
    $('#pemilik_lama').val('')
    $('#id_anggota').val('')
  }else{
    	$.ajax({
			url: base_url + "PelepasanHak/searchData/",
      data:{key:key},
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
        if(data.status){
              $('#id_kendaraan').val(data.kendaraan.id_kendaraan);
              $('#nomor_kendaraan').val(data.kendaraan.nomor_kendaraan);
              $('#tahun').val(data.kendaraan.tahun);
              $('#id_anggota').val(data.kendaraan.id_anggota);
              $('#merk_type').val(data.kendaraan.merk_type);
              $('#no_rangka').val(data.kendaraan.no_rangka);
              $('#no_mesin').val(data.kendaraan.no_mesin);
              $('#warna').val(data.kendaraan.warna);
              $('#trayek').val(data.kendaraan.trayek);
              $('#nama_trayek').val(data.kendaraan.nama_trayek);
              $('#pemilik_lama').val(data.kendaraan.nama_anggota)
        }else{
          $('#id_kendaraan').val('')
          $('#id_anggota').val('')
          $('.not-found').text(data.alert);
          $('#nomor_kendaraan').val('');
          $('#tahun').val('');
          $('#merk_type').val('');
          $('#no_rangka').val('');
          $('#no_mesin').val('');
          $('#warna').val('');
          $('#trayek').val('');
          $('#nama_trayek').val('');
          $('#pemilik_lama').val('')
        }
			},
		});
  }
});
$(document).ready(function(){
    var table = $("#table_semua_skkk");
    grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "SKKK/get_All_SKKK",
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
        return full.no_skkk
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.no_kesepahaman;
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.nama_anggota ;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.nomor_kendaraan
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
        return full.nama_trayek
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.tanggal_skkk
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          <a href="${base_url}Anggota/detailAnggota/${full.id_anggota}" target="_blank" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></a>
                          <button onclick="edit_anggota(${full.id_anggota})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                          <button onclick="hapus_anggota(${full.id_anggota})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
    ],
  });
});


$("#key_anggota").on("keyup", function () {
	let key = $("#key_anggota").val();
  $('#nomor_kendaraan').html('<option>---List Nomor Kendaraan-----</option>')
  if(!key){
		$(".not-found").text("");
    $('#no_kesepahaman').val('');
    $('#nama_anggota').val('');
    $('#nik_anggota').val('');
    $('#alamat').val('');
    $('#nomor_kendaraan').html('<option>---List Nomor Kendaraan-----</option>')
    $('#merk_type').val('');
    $('#no_rangka').val('');
    $('#no_mesin').val('');
    $('#warna').val('')
  }else{
    	$.ajax({
			url: base_url + "SKKK/searchData/"+key,
			type: "POST",
			dataType: "JSON",
			success: function (data) {
				console.log(data);
        if(data.status){
          let alamat = data.anggota.alamat+', Kel. '+data.anggota.kelurahan+' Kec.'+data.anggota.kecamatan
          $('#id_kesepahaman').val(data.kesepahaman.id_kesepahaman);
          $('#no_kesepahaman').val(data.kesepahaman.no_kesepahaman);
          $('#nama_anggota').val(data.anggota.nama_anggota);
          $('#nik_anggota').val(data.anggota.nik_anggota);
          $('#alamat').val(alamat);
          $.each(data.kendaraan, function(i, data){
            $('#nomor_kendaraan').append(`<option value="${data.id_kendaraan}">${data.nomor_kendaraan}</option>`)
          })
          $(".not-found").text("");
        }else{
          $('.not-found').text(data.alert);
          $('#no_kesepahaman').val('');
          $('#nama_anggota').val('');
          $('#nik_anggota').val('');
          $('#alamat').val('');
          $('#nomor_kendaraan').html('<option>---List Nomor Kendaraan-----</option>')
          $('#merk_type').val('');
          $('#no_rangka').val('');
          $('#no_mesin').val('');
          $('#warna').val('')
        }
			},
		});
  }
});


function dataKendaraan(){
  let id = $('#nomor_kendaraan').val();
  $.ajax({
    url : base_url + 'SKKK/getKendaranBYID/'+id,
    type : 'POST',
    dataType : "JSON",
    success : function (data) {
      $('#id_kendaraan').val(data.id_kendaraan)
      $('#no_kendaraan').val(data.nomor_kendaraan);
      $('#merk_type').val(data.merk_type+'/'+data.tahun);
      $('#no_rangka').val(data.no_rangka);
      $('#no_mesin').val(data.no_mesin);
      $('#warna').val(data.warna)
    }
  })
}



// $('#btn_anggota').on('click', function(e){
//   let key = $('#key_anggota').val();
// e.preventDefault();
//   $.ajax({
//     url : base_url+'SKKK/searchData/'+key,
//     type : 'POST',
//     dataType : 'JSON',
//     success : function (data){
//       if(data.status){

//       }else{
//         $('.not-found').text('Anggota Tidak Ditemukan');
//       }
//     }
//   })
// });
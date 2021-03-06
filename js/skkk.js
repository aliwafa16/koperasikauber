$(document).ready(function(){
  semua_skkk();
  riwayat_skkk();
});

function semua_skkk(){
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
                          <a href="${base_url}SKKK/RepeatPrint/${full.id_skkk}" target="_blank" type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
                          <button onclick="hapus_skkk(${full.id_skkk})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
    ],
  });
}

function riwayat_skkk(){
      var table = $("#table_riwayat");
    grid_riawayat = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "SKKK/get_riwayat_SKKK",
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
        render: function (data, type, full, meta) {
        return full.deleted_at
      },
          className: "text-center"
      }
    ],
  });
}


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
			url: base_url + "SKKK/searchData/",
			type: "POST",
      data : {key:key},
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

function hapus_skkk(id){
  Swal.fire({
    title: 'Yakin Menghapus Data ?',
    text: "Data yang dihapus akan hilang secara permanen",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus',
    cancelButtonText : 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
          url : base_url+'SKKK/hapus/'+id,
          type : 'POST',
          dataType : 'JSON',
          success : function(data){
            sukses(data.alert);
            grid_all.ajax.reload();
            grid_riawayat.ajax.reload();
          }
        })
    }
  })
}


function error(alert) {
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: alert,
})
}

function sukses(alert) {
 Swal.fire({
  icon: 'success',
  title: 'Data SKKK ' + alert,
  text: '',
  timer:1500,
  showConfirmButton: false,
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
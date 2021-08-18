$(document).ready(function(){
    semua_kesepahaman();
    keluar();
    riwayat();
});

function semua_kesepahaman(){
    var table = $("#table_semua_kesepahaman");
    grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Kesepahaman/get_All_Kesepahaman",
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
        return full.no_kesepahaman
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.kode_anggota;
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
        return full.tanggal_kesepahaman
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          <a href="${base_url}Kesepahaman/RepeatPrint/${full.id_kesepahaman}" target="_blank" type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
    ],
  });
}

function keluar(){
    var table = $("#table_keluar");
    grid_keluar = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Kesepahaman/get_keluar",
      data: function (d) {
        no_keluar = 0;
      },
      dataSrc: "",
    },
    columns: [
    {
        render: function (data, type, full, meta) {
          no_keluar += 1;

        return no_keluar;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.no_kesepahaman
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.kode_anggota;
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
        return full.tanggal_kesepahaman
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return `<div class="row">
                      <div class="col-md-12">
                          <a href="${base_url}Kesepahaman/RepeatPrint/${full.id_kesepahaman}" target="_blank" type="button" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
                          <button onclick="hapus_kesepahaman(${full.id_kesepahaman})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
      },
          className: "text-center"
    },
    ],
  });
}

function riwayat(){
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
      url: base_url + "Kesepahaman/get_riwayat",
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
        return full.no_kesepahaman
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.kode_anggota;
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
        return full.deleted_at
      },
          className: "text-center"
    },
    ],
  });
}

$("#key_anggota").on("keyup", function () {
	let key = $("#key_anggota").val();
  if(!key){
		$(".not-found").text("");
    $('#nama_anggota').val('');
    $('#id_anggota').val('');
    $('#nik_anggota').val('');
    $('#kode_anggota').val('');
    $('#alamat').val('');
  }else{
    	$.ajax({
			url: base_url + "Kesepahaman/searchData/",
			type: "POST",
			dataType: "JSON",
      data : {key:key},
			success: function (data) {
				console.log(data);
        if(data.status){
          let alamat = data.anggota.alamat+', Kel. '+data.anggota.kelurahan+' Kec.'+data.anggota.kecamatan
          $('#nama_anggota').val(data.anggota.nama_anggota);
          $('#id_anggota').val(data.anggota.id_anggota);
          $('#nik_anggota').val(data.anggota.nik_anggota);
          $('#kode_anggota').val(data.anggota.kode_anggota);
          $('#alamat').val(alamat);
          $(".not-found").text("");
        }else{
          $('.not-found').text(data.alert);
          $('#nama_anggota').val('');
          $('#nik_anggota').val('');
          $('#alamat').val('');
          $('#kode_anggota').val('');
          $('#id_anggota').val('');
        }
			},
		});
  }
});


function hapus_kesepahaman(id){
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
          url : base_url+'Kesepahaman/hapus/'+id,
          type : 'POST',
          dataType : 'JSON',
          success : function(data){
            sukses(data.alert);
            grid_all.ajax.reload();
            grid_riwayat.ajax.reload();
            grid_keluar.ajax.reload();
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
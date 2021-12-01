$(document).ready(function(){
simpananPokok();
riwayat();
});

function simpananPokok(){
     var table = $("#table_semua_simpanan_pokok");
    grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Simpanan_Pokok/get_All_Simpanan",
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
        return full.kode_simpanan_pokok
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.nama_anggota
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
          return full.debet
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.credit
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.total
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          <button onclick="detail_sp(${full.id_simpanan_pokok})" target="_blank" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></button>
                          <button onclick="tambah_sp(${full.id_simpanan_pokok})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-donate"></i></button>
                          <button onclick="hapus_sp(${full.id_simpanan_pokok})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
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
      url: base_url + "Simpanan_Pokok/get_riwayat",
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
        return full.kode_simpanan_pokok
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.nama_anggota
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
          return full.debet
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.credit
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.total
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return full.deleted_at
        },
      className: "text-center"
    }
    ],
  });
}


$("#key_anggota").on('keyup', function(){
  let key = $("#key_anggota").val();
  console.log(key);
  if(!key){
    $(".not_found").text("");
    $('#kode_anggota').val("");
    $('#nama_anggota').val("");
    $('#id_anggota').val('');
  }else{
    $.ajax({
      type:'POST',
      url : base_url+'Simpanan_Pokok/searchAnggota/',
      data : {key:key},
      dataType : 'JSON',
      success : function(data){
        console.log(data);
        if(data){
          $('.not_found').text('');
          $('#id_anggota').val(data.id_anggota);
          $('#kode_anggota').val(data.kode_anggota);
          $('#nama_anggota').val(data.nama_anggota)
        }else{
          $('.not_found').text('Data tidak ditemukan');
          $('#kode_anggota').val("");
          $('#nama_anggota').val("");
          $('#id_anggota').val('');
        }
      }

    })
  }
})

function addSimpananPokok(){
  save = 'add';
  $('#form_simpanan_pokok')[0].reset();
  $('#simpananPokokModal').modal('show');
  $('#simpananPokokModalLabel').text('Tambah Data Simpanan Pokok');
  $('#submit_simpan_pokok').text('Tambah Data');
  $('#cancel_simpan_pokok').text('Batal')
  $('#submit_simpan_pokok').attr('disabled', false)
  $('#cancel_simpan_pokok').on('click', function(){
    $('#cancel_simpan_pokok').modal('hide')
  });
  $('.text-danger').empty();
}


function tambah_sp(id){
  save = 'tambah_sp'
  $('#form_simpanan_pokok')[0].reset();
  $('#simpananPokokModal').modal('show');
  $('#simpananPokokModalLabel').text('Tambah Data Simpanan Pokok');
  $('#submit_simpan_pokok').text('Tambah Data');
  $('#cancel_simpan_pokok').text('Batal')
  $('#submit_simpan_pokok').attr('disabled', false)
  $('#cancel_simpan_pokok').on('click', function(){
    $('#cancel_simpan_pokok').modal('hide')
  });
  $('.text-danger').empty();

  $.ajax({
    url:base_url+'Simpanan_Pokok/simpananPokokByID/'+id,
    type:'GET',
    dataType : 'JSON',
    success : function(data){
          $('#id_anggota').val(data.id_anggota);
          $('#kode_anggota').val(data.kode_anggota);
          $('#nama_anggota').val(data.nama_anggota);
          $('#kode_simpanan_pokok').val(data.kode_simpanan_pokok);
          $('#id_simpanan_pokok').val(data.id_simpanan_pokok);
          $('#created_at').val(data.created_at);
    }
  })
}

$('#submit_simpan_pokok').on('click', function(e){
  e.preventDefault();
  if(save=='add'){
    let formData = new FormData($('#form_simpanan_pokok')[0]);
    $.ajax({
      url:base_url+'Simpanan_Pokok/addSimpananPokok/',
      type:'POST',
      dataType: 'JSON',
      contentType : false,
      processData : false,
      data:formData,
      success: function(data){
        if(data.status){
          sukses(data.alert);
          $('#form_simpanan_pokok')[0].reset();
          $('#simpananPokokModal').modal('hide');
          grid_all.ajax.reload()
          grid_riwayat.ajax.reload();
        }else{
          $("#nama_anggota_error").html(data.nama_anggota_error);
          $("#kode_anggota_error").html(data.kode_anggota_error);
          $("#nominal_error").html(data.nominal_error);
        }
      }
    })
  }else{
      let formData = new FormData($('#form_simpanan_pokok')[0]);
      $.ajax({
        url : base_url+'Simpanan_Pokok/editSimpananPokok',
        type:'POST',
        dataType: 'JSON',
        contentType : false,
        processData : false,
        data:formData,
        success : function(data){
          if(data.status){
            sukses(data.alert);
            $('#form_simpanan_pokok')[0].reset();
            $('#simpananPokokModal').modal('hide');
            grid_all.ajax.reload()
            grid_riwayat.ajax.reload();
          }else{
          $("#nama_anggota_error").html(data.nama_anggota_error);
          $("#kode_anggota_error").html(data.kode_anggota_error);
          $("#nominal_error").html(data.nominal_error);
        }
      }
      })
  }
})


function detail_sp(id){
  $.ajax({
    url:base_url+'Simpanan_Pokok/getDetail/'+id,
    type:'GET',
    dataType : 'JSON',
    success : function(data){
      console.log(data);
    }
  })
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
		title: "Data Simpanan Pokok " + alert,
		text: "",
		timer: 1500,
		showConfirmButton: false,
	});
}

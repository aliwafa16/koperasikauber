$(document).ready(function(){
simpananSukarela();
riwayat();
});

function simpananSukarela(){
  var table = $("#table_semua_simpanan_sukarela");
  grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Simpanan_Sukarela/get_All_Simpanan",
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
        return full.tanggal_bayar
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.kode_simpanan_sukarela;
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
        return full.nominal
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          <button onclick="hapus_ss(${full.id_simpanan_sukarela})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
      url: base_url + "Simpanan_Sukarela/get_Riwayat",
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
        return full.tanggal_bayar
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.kode_simpanan_sukarela;
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
        return full.nominal
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

function addSimpananSukarela(){
  save = 'add';
  $('#form_simpanan_sukarela')[0].reset();
  $('#simpananSukarelaModal').modal('show');
  $('#simpananSukarelaModalLabel').text('Tambah Data Simpanan Sukarela');
  $('#submit_simpanan_sukarela').text('Tambah Data');
  $('#cancel_simpanan_sukarela').text('Batal')
  $('#submit_simpanan_sukarela').attr('disabled', false)
  $('#cancel_simpanan_sukarela').on('click', function(){
    $('#cancel_simpanan_sukarela').modal('hide')
  });
  $('.text-danger').empty();
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

$('#submit_simpanan_sukarela').on('click', function(e){
  e.preventDefault();
  if(save=='add'){
    let formData = new FormData($('#form_simpanan_sukarela')[0]);
    $.ajax({
      url:base_url+'Simpanan_Sukarela/addSimpananSukarela/',
      type:'POST',
      dataType: 'JSON',
      contentType : false,
      processData : false,
      data:formData,
      success: function(data){
        if(data.status){
          sukses(data.alert);
          $('#form_simpanan_sukarela')[0].reset();
          $('#simpananSukarelaModal').modal('hide');
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

function hapus_ss(id){
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
          url : base_url+'Simpanan_Sukarela/hapus/'+id,
          type : 'POST',
          dataType : 'JSON',
          success : function(data){
            sukses(data.alert);
            grid_all.ajax.reload();
            grid_riwayat.ajax.reload();
          }
        })
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
    title: "Data Simpanan Sukarela " + alert,
    text: "",
    timer: 1500,
    showConfirmButton: false,
  });
}

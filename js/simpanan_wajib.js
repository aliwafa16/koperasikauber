$(document).ready(function(){
simpananWajib();
});

function simpananWajib(){
    var table = $("#table_semua_simpanan_wajib");
    grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Simpanan_Wajib/get_All_Simpanan",
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
        return full.kode_simpanan_wajib
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
    	render : function(data, type, full, meta){
    		return `<button type="button" onclick="addPembayaran(${full.id_simpanan_wajib})" class="btn btn-success btn-sm">Tambah Pembayaran</button>`
    	},
    	className : "text-center"
    },
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          <button onclick="detail_sp(${full.id_simpanan_wajib})" target="_blank" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></button>
                          <button onclick="hapus_sp(${full.id_simpanan_wajib})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
    ],
  });
}

function addSimpananWajib(){
  save = 'add';
  $('#form_simpanan_wajib')[0].reset();
  $('#simpananWajibModal').modal('show');
  $('#simpananWajibModalLabel').text('Tambah Data Simpanan Wajib');
  $('#submit_simpan_wajib').text('Tambah Data');
  $('#cancel_simpan_wajib').text('Batal')
  $('#submit_simpan_wajib').attr('disabled', false)
  $('#cancel_simpan_wajib').on('click', function(){
    $('#cancel_simpan_wajib').modal('hide')
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
    $('#tagihan').val('');
  }else{
    $.ajax({
      type:'POST',
      url : base_url+'Simpanan_Wajib/searchAnggota/',
      data : {key:key},
      dataType : 'JSON',
      success : function(data){
        console.log(data);
        let anggota = data.anggota
        if(data){
          $('.not_found').text('');
          $('#id_anggota').val(anggota.id_anggota);
          $('#kode_anggota').val(anggota.kode_anggota);
          $('#nama_anggota').val(anggota.nama_anggota);
          $('#tagihan').val(20000*data.jumlah_kendaraan);
        }else{
          $('.not_found').text('Data tidak ditemukan');
          $('#kode_anggota').val("");
          $('#nama_anggota').val("");
          $('#id_anggota').val('');
          $('#tagihan').val('');
        }
      }

    })
  }
})


$('#submit_simpan_wajib').on('click',function(e){
  e.preventDefault();

   let formData = new FormData($('#form_simpanan_wajib')[0]);
    $.ajax({
      url:base_url+'Simpanan_Wajib/addSimpananWajib/',
      type:'POST',
      dataType: 'JSON',
      contentType : false,
      processData : false,
      data:formData,
      success: function(data){
        if(data.status){
          sukses(data.alert);
          $('#form_simpanan_wajib')[0].reset();
          $('#simpananWajibModal').modal('hide');
          grid_all.ajax.reload()
        }else{
          $("#nama_anggota_error").html(data.nama_anggota_error);
          $("#kode_anggota_error").html(data.kode_anggota_error);
          $("#nominal_error").html(data.nominal_error);
        }
      }
    })
})


function addPembayaran(id){
  save = 'add';
  $('#form_add_pembayaran')[0].reset();
  $('#addPembayaranModal').modal('show');
  $('#addPembayaranModalLabel').text('Tambah Data Pembayaran');
  $('#submit_add_pembayaran').text('Tambah Data');
  $('#cancel_add_pembayaran').text('Batal')
  $('#submit_add_pembayaran').attr('disabled', false)
  $('#cancel_add_pembayaran').on('click', function(){
    $('#cancel_add_pembayaran').modal('hide')
  });
  $('.text-danger').empty();


  $.ajax({
    url:base_url+'Simpanan_Wajib/getLatestPembayaran/'+id,
    type:'GET',
    dataType : 'JSON',
    success : function(data){
      let pembayaran = data.pembayaran;
      $('#re_id_anggota').val(pembayaran.id_anggota);
      $('#re_kode_anggota').val(pembayaran.kode_anggota);
      $('#re_nama_anggota').val(pembayaran.nama_anggota);
      $('#re_kode_simpanan_wajib').val(pembayaran.kode_simpanan_wajib);
      $('#re_id_simpanan_wajib').val(pembayaran.id_simpanan_wajib);
      $('#re_created_at').val(pembayaran.created_at);
      $('#re_credit').val(pembayaran.credit);
      $('#re_tagihan').val(20000*data.kendaraan);
    }
  })
}


$('#submit_add_pembayaran').on('click',function(e){
  e.preventDefault();

  let formPembayaran = new FormData($('#form_add_pembayaran')[0]);
  $.ajax({
    url:base_url+'Simpanan_Wajib/addPembayaran/',
    type:'POST',
    data:formPembayaran,
    dataType : 'JSON',
    contentType : false,
    processData : false,
    success : function(data){
      console.log(data)
    }

  })
})


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
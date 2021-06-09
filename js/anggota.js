$(document).ready(function() {
  getAllAnggota();
  getAllActiveAnggota();
  getAllNonAnggota();
})

function getAllAnggota(){
  var table = $("#Table_Anggota");
  grid_all = table.DataTable({
    scrollX: true,
    scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "ManajemenData/getAllAnggota",
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
        return full.kode_anggota
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
        return full.nik_anggota ;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.jenis_kelamin
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
          if(full.is_active==0){
            var buttonstatus = `<button type="button" onclick="btnAktifAnggota(${full.id_anggota})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                <button type="button" onclick="btnNonAktifAnggota(${full.id_anggota})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }else if(full.is_active==1){
            var buttonstatus = `<button type="button" onclick="btnNonAktifAnggota(${full.id_anggota})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>`
          }else if(full.is_active==2){
            var buttonstatus = `<button type="button" onclick="btnAktifAnggota(${full.id_anggota})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }
          return buttonstatus;
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
              return `<div class="row">
                        <div class="col-md-12">
                            <a href="${base_url}ManajemenData/detailAnggota/${full.id_anggota}" type="button" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-info"></i></a>
                            <button onclick="edit_anggota(${full.id_anggota})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                            <button onclick="hapus_anggota(${full.id_anggota})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>`
          },
          className: "text-center"
      }
    ],
  });
}

function getAllActiveAnggota(){
  var table = $("#table_anggota_aktif");
  grid_active = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
     ajax: {
      type: "GET",
      url: base_url + "ManajemenData/getAllActiveAnggota",
      data: function (d) {
        no_active = 0;
      },
      dataSrc: "",
    },
    columns: [
      {
        render: function (data, type, full, meta) {
          no_active += 1;

        return no_active;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.kode_anggota
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
        return full.nik_anggota ;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.jenis_kelamin
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
        if(full.is_active==0){
            var buttonstatus = `<button type="button" onclick="btnAktifAnggota(${full.id_anggota})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                <button type="button" onclick="btnNonAktifAnggota(${full.id_anggota})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }else if(full.is_active==1){
            var buttonstatus = `<button type="button" onclick="btnNonAktifAnggota(${full.id_anggota})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>`
          }else if(full.is_active==2){
            var buttonstatus = `<button type="button" onclick="btnAktifAnggota(${full.id_anggota})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }
          return buttonstatus;
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
             return `<div class="row">
                        <div class="col-md-12">
                            <a href="${base_url}ManajemenData/detailAnggota/${full.id_anggota}" type="button" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-info"></i></a>
                            <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>`
          },
          className: "text-center"
      }
    ],
})
}

function getAllNonAnggota(){
  var table = $("#table_anggota_nonaktif");
  grid_nonactive = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "ManajemenData/getAllNonActiveAnggota",
      data: function (d) {
        no_nonactive = 0;
      },
      dataSrc: "",
    },
    columns: [
      {
        render: function (data, type, full, meta) {
          no_nonactive += 1;

        return no_nonactive;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.kode_anggota
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
        return full.nik_anggota ;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.jenis_kelamin
      },
          className: "text-center"
    },
    {
        render : function (data, type, full, meta){
          if(full.is_active==0){
            var buttonstatus = `<button type="button" onclick="btnAktifAnggota(${full.id_anggota})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                <button type="button" onclick="btnNonAktifAnggota(${full.id_anggota})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }else if(full.is_active==1){
            var buttonstatus = `<button type="button" onclick="btnNonAktifAnggota(${full.id_anggota})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>`
          }else if(full.is_active==2){
            var buttonstatus = `<button type="button" onclick="btnAktifAnggota(${full.id_anggota})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }
          return buttonstatus;
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
          return `<div class="row">
                        <div class="col-md-12">
                            <a href="${base_url}ManajemenData/detailAnggota/${full.id_anggota}" type="button" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-info"></i></a>
                            <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>`
          },
          className: "text-center"
      }
    ],
})
}

function edit_anggota(id){
  console.log(id);
  save = 'edit';
  $('#form-anggota')[0].reset();
  $('#modalAnggota').modal('show');
  $('#modalAnggotaLabel').text('Edit Data Anggota');
  $('#submit_anggota').text('Edit Data');
  $('#cancel_anggota').text('Batal')
  $('#submit_anggota').attr('disabled', false)
  $.ajax({
   url : base_url+'ManajemenData/getAnggotaByID/'+id,
   type : 'POST',
   dataType : 'JSON',
    success : function (data){

    var html = `<img src="${base_url}assets/foto_anggota/${data.foto_anggota}" alt=""  width="50%" hight="50%" style="border-radius:10%">`
    console.log(data);
    $('#id_anggota').val(data.id_anggota);
    $('#kode_anggota').val(data.kode_anggota);
    $('#nama_anggota').val(data.nama_anggota);
    $('#nik_anggota').val(data.nik_anggota);
    $('#tempat_lahir').val(data.tempat_lahir);
    $('#tanggal_lahir').val(data.tanggal_lahir);
    $('#pekerjaan').val(data.pekerjaan);
    $('#no_telp').val(data.no_telp);
    $('#alamat').val(data.alamat);
    $('#kelurahan').val(data.kelurahan);
    $('#kecamatan').val(data.kecamatan);
    $('#kota_kab').val(data.kota_kab);
    $('#keterangan').val(data.keterangan);
    $('#created_at').val(data.created_at);
    $('#is_active').val(data.is_active);
    $('#tanggal_masuk').val(data.tanggal_masuk);
    $('#preview_foto').html(html);
    }
  })
}

function hapus_anggota(id){
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
          url : base_url+'ManajemenData/hapus/'+id,
          type : 'POST',
          dataType : 'JSON',
          success : function(data){
            sukses(data.alert);
            grid_all.ajax.reload();
            grid_active.ajax.reload();
            grid_nonactive.ajax.reload();
          }
        })
    }
  })
}


function addAnggota(){
  save = 'add';
  $('#form-anggota')[0].reset();
  $('#modalAnggota').modal('show');
  $('#modalAnggotaLabel').text('Tambah Data Anggota');
  $('#submit_anggota').text('Tambah Data');
  $('#cancel_anggota').text('Batal')
  $('#submit_anggota').attr('disabled', false)
  $('#cancel_anggota').on('click', function(){
    $('#cancel_anggota').modal('hide')
  });
  $('.text-danger').empty();

  $.ajax({
    url : base_url + 'ManajemenData/getKodeAnggota',
    type : 'GET',
    dataType : 'JSON',
    success : function(data){
      $('#kode_anggota').val(data)
    }
  })
}

$('#submit_anggota').on('click', function(e){
  e.preventDefault();
  var foto = $('#foto_anggota').val();
  if(save == 'add'){

    if(foto==''){
      error('Foto harus diiisi !!!');
    }

    var formData = new FormData($('#form-anggota')[0]);
    $.ajax({
        url : base_url + 'ManajemenData/addAnggota',
        type : 'POST',
        data : formData,
        contentType : false,
        processData : false,
        dataType : 'JSON',
        success : function(data) {
            if(data.status){
                sukses(data.alert);
                $('#form-anggota')[0].reset();
                $('#modalAnggota').modal('hide');
                grid_all.ajax.reload();
                grid_active.ajax.reload();
                grid_nonactive.ajax.reload();
            }else{
                $('#nama_anggota_error').html(data.nama_anggota_error);
                $('#nik_anggota_error').html(data.nik_anggota_error);
                $('#tempat_lahir_error').html(data.tempat_lahir_error);
                $('#tanggal_lahir_error').html(data.tanggal_lahir_error);
                $('#pekerjaan_error').html(data.pekerjaan_error);
                $('#no_telp_error').html(data.no_telp_error);
                $('#alamat_error').html(data.alamat_error);
                $('#kelurahan_error').html(data.kelurahan_error);
                $('#kecamatan_error').html(data.kecamatan_error);
                $('#kota_kab_error').html(data.kota_kab_error);
                $('#keterangan_error').html(data.keterangan_error);
            }
        }
    })
  }else{
    var formData = new FormData($('#form-anggota')[0]);
    $.ajax({
        url : base_url + 'ManajemenData/editAnggota',
        type : 'POST',
        data : formData,
        contentType : false,
        processData : false,
        dataType : 'JSON',
        success : function(data) {
            if(data.status){
                sukses(data.alert);
                $('#form-anggota')[0].reset();
                $('#modalAnggota').modal('hide');
                grid_all.ajax.reload();
                grid_active.ajax.reload();
                grid_nonactive.ajax.reload();
            }
        }
    })
  }
})

$('#cancel_anggota').click(function(){
  $('#form-anggota')[0].reset();
  $('#modalAnggota').modal('hide');
})

function btnAktifAnggota(id_anggota){
  $.ajax({
    url : base_url+'ManajemenData/aktifAnggota/'+id_anggota,
    type : 'POST',
    dataType : 'JSON',
    success : function (data){
      sukses(data.alert);
      grid_all.ajax.reload();
      grid_active.ajax.reload();
      grid_nonactive.ajax.reload();
  }
  })
}

function btnNonAktifAnggota(id_anggota){
  $.ajax({
    url : base_url+'ManajemenData/NonaktifAnggota/'+id_anggota,
    type : 'POST',
    dataType : 'JSON',
    success : function (data){
      sukses(data.alert);
      grid_all.ajax.reload();
      grid_active.ajax.reload();
      grid_nonactive.ajax.reload();
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
  title: 'Data Anggota ' + alert,
  text: '',
  timer:1500,
  showConfirmButton: false,
})
}
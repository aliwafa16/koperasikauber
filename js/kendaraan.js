$(document).ready(function(){
    var table = $("#table_kendaraan");
    grid = table.DataTable({
    scrollX: true,
    scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "ManajemenData/getAllKendaraan",
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
        return full.nomor_kendaraan
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.merk_type;
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.tahun ;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return full.no_rangka
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
            return full.warna
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
});


function addKendaraan(){
    save = 'add';
    $('#form-kendaraan')[0].reset();
    $('#modalKendaraan').modal('show');
    $('#modalKendaraanLabel').text('Tambah Data Kendaraan');
    $('#submit_kendaraan').text('Tambah Data');
    $('#cancel_kendaraan').text('Batal')
    $('#submit_kendaraan').attr('disabled', false)
    $('#cancel_kendaraan').on('click', function(){
      $('#cancel_kendaraan').modal('hide')
    });
    $('.text-danger').empty();

    $('.result-search').html('');
    $('#search-notfound').html('');
    $('.form-input-kendaraan').html('');
}

$('#cari_anggota').on('click', function(e){
    console.log('ok')
    e.preventDefault();

    $('.result-search').html('');
    $('#search-notfound').html('');
    $('.form-input-kendaraan').html('');
    
    var key =$('#key_anggota').val();
    $.ajax({
        url : base_url+'ManajemenData/searchAnggota',
        type : 'POST',
        dataType : 'JSON',
        data : {key:key},
        success : function(data){

            if(data.status==false){
                $('#search-notfound').html(`<h4 class="">${data.alert}</h4>`)
            }else{
                if(data.is_active==1){
                    var aktif = 'Anggota Aktif';
                }else if(data.is_active==2){
                    var aktif = 'Anggota NonAktif';
                }else{
                    var aktif = 'Anggota Terdaftar'
                }

                var html = `
                <div class="profile-pic centered">
                <input type="hidden" class="form-control" id="id_anggota" name="id_anggota" value="${data.id_anggota}">
                    <h1 class="">`+aktif+`</h1>
                    <img src="${base_url}assets/foto_anggota/${data.foto_anggota}" class="img-circle">
                    <h1 class="">${data.nama_anggota}</h1>
                    <h6>${data.kode_anggota}</h6>
                </div>
                `

                var form = `<div class="mb-4">
                            <label for="nomor_kendaraan" class="form-label">Nomor Kendaraan</label>
                            <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan">
                            <div class="text-danger" id="nomor_kendaraan_error"></div>
                        </div>
                        
                        
                        <div class="mb-4">
                            <label for="no_rangka" class="form-label">Nomor Rangka</label>
                            <input type="text" class="form-control" id="no_rangka" name="no_rangka">
                            <div class="text-danger" id="no_rangka_error"></div>
                        </div>

                        <div class="mb-4">
                            <label for="no_mesin" class="form-label">Nomor Mesin</label>
                            <input type="text" class="form-control" id="no_mesin" name="no_mesin">
                            <div class="text-danger" id="no_mesin_error"></div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-3">
                        <div class="mb-4">
                            <label for="merk" class="form-label">Merek</label>
                            <input type="text" class="form-control" id="merk" name="merk">
                            <div class="text-danger" id="merk_error"></div>
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="mb-4">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" class="form-control" id="type" name="type">
                            <div class="text-danger" id="type_error"></div>
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="mb-4">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun">
                            <div class="text-danger" id="tahun_error"></div>
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="mb-4">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna">
                            <div class="text-danger" id="warna_error"></div>
                        </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <label for="kategori_trayek" class="form-label">Kategori Trayek</label>
                            <select class="form-control" id="kategori_trayek" name="kategori_trayek" onChange=listTrayek(this)>
                              <option value="1">----Pilih Kategori Trayek----</option>
                              <option value="1">Angkutan Perkotaan</option>
                              <option value="2">Angkutan Kota Dalam Propinsi</option>
                              <option value="3">Trans Pakuan Koridor</option>
                              <option value="4">Angkutan Barang</option>
                            </select>
                            <div class="text-danger" id="kategori_trayek_error"></div>
                        </div>
                        </div>

                      <div class="col-md-6">
                      <div class="mb-4">
                          <label for="trayek" class="form-label list-trayek">Trayek</label>
                          <select class="form-control" id="trayek" name="trayek">
                            <option value="1">----Pilih Trayek----</option>
                          </select>
                          <div class="text-danger" id="trayek_error"></div>
                      </div>
                      </div>


                    </div>
                    `
                $('.result-search').html(html);
                $('.form-input-kendaraan').html(form);
            }
            

        }
    });
})

function listTrayek(){
  $('#trayek').html('');
  let id = $('#kategori_trayek').val();
  $.ajax({
    url:base_url+'ManajemenData/getListTrayek/'+id,
    dataType : 'JSON',
    type : 'POST',
    success : function (data) {
      data.forEach(Element => {
        $('#trayek').append(`<option value="${Element.id_trayek}">${Element.nama_trayek} / ${Element.trayek}</option>`)
      });
    }
  })
}
  


// function getTrayek(){
//   $.ajax({
//     url:base_url+'ManajemenData/getListTrayek',
//     dataType : 'JSON',
//     type : 'POST',
//     success : function (data) {

//     }
//   })
  
// }

$('#submit_kendaraan').on('click', function(e){
    save = 'add'
    e.preventDefault();

    var formData = new FormData($('#form-kendaraan')[0])
    console.log(formData)
    $.ajax({
      url : base_url+'ManajemenData/addKendaraan',
      dataType : 'JSON',
      type : 'POST',
      contentType : false,
      processData : false,
      data : formData,
      success : function (data) {
        if(data.status){
          sukses(data.alert);
                $('#form-kendaraan')[0].reset();
                $('#modalKendaraan').modal('hide');
                grid.ajax.reload();
        }else {
          $('#nomor_kendaraan_error').html(data.nomor_kendaraan_error);
          $('#no_rangka_error').html(data.no_rangka_error);
          $('#no_mesin_error').html(data.no_mesin_error);
          $('#merk_error').html(data.merk_error);
          $('#type_error').html(data.type_error);
          $('#tahun_error').html(data.tahun_error);
          $('#warna_error').html(data.warna_error);
        }
      }
    })
})


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
  title: 'Data Kepemilikan Kendaraan ' + alert,
  text: '',
  timer:1500,
  showConfirmButton: false,
})
}
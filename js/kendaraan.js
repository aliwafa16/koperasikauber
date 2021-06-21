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
            var buttonstatus = `<button type="button" onclick="btnAktifKendaraan(${full.id_kendaraan})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                <button type="button" onclick="btnNonAktifKendaraan(${full.id_kendaraan})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }else if(full.is_active==1){
            var buttonstatus = `<button type="button" onclick="btnNonAktifKendaraan(${full.id_kendaraan})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>`
          }else if(full.is_active==2){
            var buttonstatus = `<button type="button" onclick="btnAktifKendaraan(${full.id_kendaraan})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }
          return buttonstatus;
        },
      className: "text-center"
    },
    {
        render : function (data, type, full, meta){
              return `<div class="row">
                        <div class="col-md-12">
                            <a href="${base_url}ManajemenData/detailAnggota/${full.id_kendaraan}" type="button" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-info"></i></a>
                            <button onclick="edit_kendaraan(${full.id_kendaraan})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                            <button onclick="hapus_kendaraan(${full.id_kendaraan})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
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
    $('.search-anggota').html(`
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukan Nama/Kode Anggota..." name="key_anggota" id="key_anggota">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" id="cari_anggota" name="cari_anggota" type="button">Cari</button>
                                    </span>
                                </div>
                                <div class="text-danger" id="search-notfound"></div>
                            `);
    $('.result-search').html('');
    $('#search-notfound').html('');
    $('.form-input-kendaraan').html('');
     $('.biodata').html('');
}

$('#form-kendaraan').on('click','#cari_anggota',function(e){
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

function btnAktifKendaraan(id_kendaraan){
  $.ajax({
    url : base_url+'ManajemenData/aktifKendaraan/'+id_kendaraan,
    type : 'POST',
    dataType : 'JSON',
    success : function (data){
      sukses(data.alert);
      grid.ajax.reload();
  }
  })
}

function btnNonAktifKendaraan(id_kendaraan){
  $.ajax({
    url : base_url+'ManajemenData/NonaktifKendaraan/'+id_kendaraan,
    type : 'POST',
    dataType : 'JSON',
    success : function (data){
      sukses(data.alert);
      grid.ajax.reload();
  }
  })
}

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


$('#cancel_kendaraan').click(function(){
  $('#form-kendaraan')[0].reset();
  $('#modalKendaraan').modal('hide');
})

function trayek(){
  $.ajax({
    url : base_url+'ManajemenData/trayek',
    type : 'POST',
    dataType : 'JSON',
    success : function (data) {
       data.forEach(Element => {
        $('#trayek').append(`<option value="${Element.id_trayek}">${Element.nama_trayek} / ${Element.trayek}</option>`)
      });
    }
  })
}

function edit_kendaraan(id){
    save = 'edit';
    $('#form-edit-kendaraan')[0].reset();
    $('#modalEditKendaraan').modal('show');
    $('#modalEditKendaraanLabel').text('Edit Data Kendaraan');
    $('#submit_edit_kendaraan').text('Edit Data');
    $('#cancel_edit_kendaraan').text('Batal')
    $('#submit_kendaraan').attr('disabled', false)

    $('.text-danger').empty();
    $('.search-anggota').html('');
    $('.result-search').html('');
    $('#search-notfound').html('');
    $('.form-input-kendaraan').html('');

    $('#anggota_search-notfound').html('');
    $('.result_kepemilikan_baru').html('');
    $('.kepemilikan_baru').html('')

    $('#trayek').html('');
    $.ajax({
        url : base_url+'ManajemenData/getKendaraanByID/'+id,
        type : 'POST',
        dataType : 'JSON',
        success : function (data) {

          trayek();

          var merk_type = data.merk_type;
          var str = merk_type.split('/');
          var merk = str[0];
          var type = str[1];

          console.log(merk, type);
          var html = `
                <div class="profile-pic centered">
                <h4 class="">Pemilik</h4>
                    <img src="${base_url}assets/foto_anggota/${data.foto_anggota}" class="img-circle">
                    <h1 class="">${data.nama_anggota} <a href="javascript:;" onclick="editKepemilikan()"><i class="fa fa-pencil aria-hidden="true""></i></a></h1> 
                    <h6>${data.kode_anggota}</h6>
                </div>
                `
          $('.biodata').html(html);

          $('#edit_id_anggota').val(data.id_anggota);
          $('#edit_id_kendaraan').val(data.id_kendaraan);
          $('#edit_id_kepemilikan').val(data.id_kepemilikan);
          $('#edit_id_trayek').val(data.id_trayek);
          

          $('#edit_nomor_kendaraan').val(data.nomor_kendaraan);
          $('#edit_no_rangka').val(data.no_rangka);
          $('#edit_no_mesin').val(data.no_mesin);
          $('#edit_merk').val(merk);
          $('#edit_type').val(type);
          $('#edit_tahun').val(data.tahun);
          $('#edit_warna').val(data.warna);
          $('#kategori_trayek').val(data.id_jenis_trayek);
          $('#trayek').val(data.id_trayek);
          
        }
    })
}

function editKepemilikan(){
  var html = `<div class="input-group">
                  <input type="text" class="form-control" placeholder="Masukan Nama/Kode Anggota...." name="key_pemilik" id="key_pemilik">
                  <span class="input-group-btn">
                  <button class="btn btn-default" id="cari_pemilik" name="cari_pemilik" type="button">Cari</button>
                  </span>
                  </div>
                  <div class="text-danger" id="anggota_search-notfound">
                  </div>
                  <div class="result_kepemilikan_baru">
                  </div>
                  `
  $('.kepemilikan_baru').html(html);

  $('#cari_pemilik').on('click', function() {
    var key = $('#key_pemilik').val();
     $('#anggota_search-notfound').html('');
      $('.result_kepemilikan_baru').html('')
    $.ajax({
        url : base_url+'ManajemenData/searchAnggota',
        type : 'POST',
        dataType : 'JSON',
        data : {key:key},
        success : function (data){
          if(data.status==false){
            $('#anggota_search-notfound').html(`<h4 class="">${data.alert}</h4>`)
          }else{
             if(data.is_active==1){
                    var aktif = 'Anggota Aktif';
                }else if(data.is_active==2){
                    var aktif = 'Anggota NonAktif';
                }else{
                    var aktif = 'Anggota Terdaftar'
                }

            var result = `<div class="profile-pic centered">
                    <h4 class="">`+aktif+`</h4>
                    <h1 class="">${data.nama_anggota}</h1> 
                    <h6>${data.kode_anggota}</h6>
                </div>`
            $('.result_kepemilikan_baru').html(result);
          }
        }
    })
  })
  
}

$('#submit_edit_kendaraan').on('click', function(e){
   e.preventDefault();
  var formData = new FormData($('#form-edit-kendaraan')[0]);
  $.ajax({
    url : base_url+'ManajemenData/editKendaraan',
    data : formData,
    type : 'POST',
    dataType : 'JSON',
    contentType : false,
    processData : false,
    success : function (data) {
      
    }
  })
})

function hapus_kendaraan(id){
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
          url : base_url+'ManajemenData/hapusKendaraan/'+id,
          type : 'POST',
          dataType : 'JSON',
          success : function(data){
            sukses(data.alert);
            grid.ajax.reload();
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
  title: 'Data Kepemilikan Kendaraan ' + alert,
  text: '',
  timer:1500,
  showConfirmButton: false,
})
}
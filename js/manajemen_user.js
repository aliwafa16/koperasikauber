$(document).ready(function() {
  SemuaUser();
  UserAktif();
  UserTidakAktif();
  Riwayat();
})

function SemuaUser(){
  var table = $("#table_semua_user");
  grid_all = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Manajemen_User/getAllUser",
      data: function (d) {
        no = 0;
      },
      dataSrc: "",
    },
    columns:[
      {
        render:function(data, type, full, meta){
          no +=1;
          return no;
        },
        className : "text-center"
      },
      {
        render:function(data, type, full, meta){
          return full.kode_anggota
        },
        className : 'text-center'
      },
      {
        render:function(data, type, full, meta){
          return full.nama_user
        },
        className : "text-center"
      },
      {
        render:function(data, type, full, meta){
          return full.email_user
        },
        className : "text-center"
      },
      {
        render:function(data, type, full, meta){
          return `<button onclick="edit_password(${full.id_user})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-lock"></i></button>`
        }
      },
      {
        render:function(data, type, full, meta){
          return full.nama_role;
        },
        className : 'text-center'
      },
      {
        render:function(data, type, full, meta){
          if(full.is_active==0){
            var buttonstatus = `<button type="button" onclick="btnAktifUser(${full.id_user})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                <button type="button" onclick="btnNonAktifUser(${full.id_user})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }else if(full.is_active==1){
            var buttonstatus = `<button type="button" onclick="btnNonAktifUser(${full.id_user})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>`
          }else if(full.is_active==2){
            var buttonstatus = `<button type="button" onclick="btnAktifUser(${full.id_user})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }
          return buttonstatus;
        },
        className: "text-center"
      },
      {
        render:function(data, type, full, meta){
          return `<div class="row">
                      <div class="col-md-12">
                          
                          <button onclick="edit_user(${full.id_user})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                          <button onclick="hapus_user(${full.id_user})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
        },
        className : 'text-center'
      }
    ]
  });
}


function UserAktif(){
  var table = $("#table_user_aktif");
  grid_aktif = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Manajemen_User/getUserAktif",
      data: function (d) {
        no_aktif = 0;
      },
      dataSrc: "",
    },
    columns: [
      {
        render: function (data, type, full, meta) {
          no_aktif += 1;

        return no_aktif;
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
        return full.nama_user;
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.email_user ;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return `<button onclick="edit_password(${full.id_user})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-lock"></i></button>`
      },
          className: "text-center"
    },
    {
      render:function(data, type, full, meta){
        return full.nama_role
      },
      className:'text-center'
    },
    {
        render : function (data, type, full, meta){
          if(full.is_active==0){
            var buttonstatus = `<button type="button" onclick="btnAktifUser(${full.id_user})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                <button type="button" onclick="btnNonAktifUser(${full.id_user})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }else if(full.is_active==1){
            var buttonstatus = `<button type="button" onclick="btnNonAktifUser(${full.id_user})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>`
          }else if(full.is_active==2){
            var buttonstatus = `<button type="button" onclick="btnAktifUser(${full.id_user})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }
          return buttonstatus;
        },
      className: "text-center"
    },
    
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          
                          <button onclick="edit_user(${full.id_user})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                          <button onclick="hapus_user(${full.id_user})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
    ],
  });
}

function UserTidakAktif(){
  var table = $("#table_user_tidak_aktif");
  grid_tidak_aktif = table.DataTable({
    // scrollX: true,
    // scrollCollapse: true,
    aaSorting: [],
    initComplete: function (settings, json) {},
    retrieve: true,
    processing: true,
    ajax: {
      type: "GET",
      url: base_url + "Manajemen_User/getUserTidakAktif",
      data: function (d) {
        no_aktif = 0;
      },
      dataSrc: "",
    },
    columns: [
      {
        render: function (data, type, full, meta) {
          no_aktif += 1;

        return no_aktif;
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
        return full.nama_user;
      },
          className: "text-center"
    },

    {
      render: function (data, type, full, meta) {
        return full.email_user ;
      },
          className: "text-center"
    },
    {
      render: function (data, type, full, meta) {
        return `<button onclick="edit_password(${full.id_user})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-lock"></i></button>`
      },
          className: "text-center"
    },
    {
      render:function(data, type, full, meta){
        return full.nama_role
      },
      className:'text-center'
    },
    {
        render : function (data, type, full, meta){
         if(full.is_active==0){
            var buttonstatus = `<button type="button" onclick="btnAktifUser(${full.id_user})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                <button type="button" onclick="btnNonAktifUser(${full.id_user})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }else if(full.is_active==1){
            var buttonstatus = `<button type="button" onclick="btnNonAktifUser(${full.id_user})" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>`
          }else if(full.is_active==2){
            var buttonstatus = `<button type="button" onclick="btnAktifUser(${full.id_user})" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>`
          }
          return buttonstatus;
        },
      className: "text-center"
    },
    
    {
        render : function (data, type, full, meta){
            return `<div class="row">
                      <div class="col-md-12">
                          
                          <button onclick="edit_user(${full.id_user})" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                          <button onclick="hapus_user(${full.id_user})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </div>
                  </div>`
          },
          className: "text-center"
      }
    ],
  });
}

function Riwayat(){
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
      url: base_url + "Manajemen_User/getRiwayat",
      data: function (d) {
        no_riwayat = 0;
      },
      dataSrc: "",
    },
    columns:[{
      render:function(data, type, full, meta){
        no_riwayat+=1;
        return no_riwayat;
      },
      className : 'text-center'
    },
    {
      render:function(data, type, full, meta){
        return full.kode_anggota;
      },
      className:'text-center'
    },
    {
      render:function(data,type,full,meta){
        return full.nama_user;
      },
      className:'text-center'
    },
    {
      render:function(data, type, full, meta){
        return full.email_user
      },
      className:'text-center'
    },
    {
      render:function(data,type,full,meta){
        return full.deleted_at
      },
      className:'text-center'
    }
  ]
})
}


function addUser(){
  save = 'add';

  $('#addUserModal').modal('show');
  $('#addUserModalLabel').text('Tambah Data User');
  $('#submit_user').text('Tambah Data');
  $('#cancel_user').text('Batal')
  $('#submit_user').attr('disabled', false)
  $('#cancel_user').on('click', function(){
    $('#cancel_user').modal('hide')
  });
  $('.text-danger').empty();
  $('.field_password').html(`<label for="password">Password</label>
  <input type="text" class="form-control" id="password" name="password">
  <div class="text-danger" id="password_error"></div>`)
  
  $('#role_id').html('')
  getRole()
}



$("#key_anggota").on('keyup', function(){
  let key = $("#key_anggota").val();
  console.log(key);
  if(!key){
    $(".not_found").text("");
    $('#kode_anggota').val("");
    $('#nama_anggota').val("");
  }else{
    $.ajax({
      type:'POST',
      url : base_url+'Manajemen_User/searchAnggota/',
      data : {key:key},
      dataType : 'JSON',
      success : function(data){
        console.log(data);
        if(data){
          $('.not_found').text('');
          $('#kode_anggota').val(data.kode_anggota);
          $('#nama_anggota').val(data.nama_anggota)
        }else{
          $('.not_found').text('Data tidak ditemukan');
          $('#kode_anggota').val("");
          $('#nama_anggota').val("");
        }
      }

    })
  }
})

function edit_user(id){
  save = 'edit';
  $('#addUserModal').modal('show');
  $('#addUserModalLabel').text('Edit data user');
  $('#submit_user').text('Edit Data');
  $('#cancel_user').text('Batal')
  $('#submit_user').attr('disabled', false)
  $('#cancel_user').on('click', function(){
    $('#cancel_user').modal('hide')
    $("#key_anggota").val("");
		$("#kode_anggota").val("");
	  $("#nama_anggota").val("");
		$("#user_name").val("");
		$("#email_user").val("");
		$("#password").val("");
  });
  $('#role_id').html('')
  $('.field_password').html('');
  $('.text-danger').empty();
  
  $.ajax({
    url : base_url+'Manajemen_User/getUser/'+id,
    type:'GET',
    dataType :'JSON',
    success : function(data){
      getRole()
      console.log(data)
      $('#nama_anggota').val(data.nama_anggota);
      $('#kode_anggota').val(data.kode_anggota);
      $('#email_user').val(data.email_user);
      $('#user_name').val(data.nama_user);
      $('#id_user').val(data.id_user)
    }
  })

}

$('#submit_user').on('click',function(e){

  if(save=='add'){
    e.preventDefault();
    var formData = new FormData($("#form_user")[0]);
    $.ajax({
      url:base_url+'Manajemen_User/addUser/',
      type : 'POST',
      dataType :'JSON',
      contentType: false,
      processData: false,
      data : formData,
      success : function(data){
        if(data.status){
          sukses(data.alert);
          $("#key_anggota").val("");
          $("#kode_anggota").val("");
          $("#nama_anggota").val("");
          $("#user_name").val("");
          $("#email_user").val("");
          $("#password").val("");
          $("#addUserModal").modal("hide");
          grid_all.ajax.reload();
          grid_aktif.ajax.reload();
          grid_tidak_aktif.ajax.reload();
          grid_riwayat.ajax.reload();
        }else if(data.status==false){
          error('Kode anggota sudah digunakan');
        }else {
          $("#email_user_error").html(data.email_user_error);
          $("#user_name_error").html(data.user_name_error);
          $("#password_error").html(data.password_error);
        }
      }
    })
  }else if(save=='edit'){
    var formData = new FormData($('#form_user')[0]);
    $.ajax({
        url : base_url + 'Manajemen_User/editUser',
        type : 'POST',
        data : formData,
        contentType : false,
        processData : false,
        dataType : 'JSON',
        success : function(data) {
            if(data.status){
                sukses(data.alert);
                $('#form_user')[0].reset();
                $("#addUserModal").modal("hide");
                grid_all.ajax.reload();
                grid_aktif.ajax.reload();
                grid_tidak_aktif.ajax.reload();
                grid_riwayat.ajax.reload();
            }else{
                $("#email_user_error").html(data.email_user_error);
                $("#user_name_error").html(data.user_name_error);
            }
        }
    })
  }
})

function edit_password(id){
  $('#editPasswordModal').modal('show');
  $('#editPasswordModalLabel').text('Edit Password');
  $('#submit_edit_password').text('Edit');
  $('#cancel_edit_password').text('Batal')
  $('#submit_edit_password').attr('disabled', false)
  $('#cancel_edit_password').on('click', function(){
    $('#cancel_edit_password').modal('hide')
    $('#new_password').val('')
  });
  $('.text-danger').empty();

  

  $('#submit_edit_password').on('click',function(e){
    e.preventDefault();
    let new_password = $('#new_password').val();
    $.ajax({
      url:base_url+'Manajemen_User/editPassword/'+id,
      type:'POST',
      dataType:'JSON',
      data : {new_password:new_password},
      success:function(data){
        if(data.status){
          sukses(data.alert);
          $('#editPasswordModal').modal('hide');
          $('#new_password').val('')
        }else{
          $("#new_password_error").html(data.new_password_error);
        }
      }
    
    })

  })
}

function hapus_user(id){
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
          url : base_url+'Manajemen_User/hapus/'+id,
          type : 'POST',
          dataType : 'JSON',
          success : function(data){
            sukses(data.alert);
      grid_all.ajax.reload();
      grid_aktif.ajax.reload();
      grid_tidak_aktif.ajax.reload();
      grid_riwayat.ajax.reload();
          }
        })
    }
  })
}

function getRole(){
  $.ajax({
    url : base_url+'Manajemen_User/getRole/',
    type : 'GET',
    dataType : 'JSON',
    success : function(data){
      data.forEach(element => {
        $('#role_id').append(`<option value="${element.id_role}">${element.nama_role}</option>`)
      });
    }
  })
}


function btnAktifUser(id_user){
  $.ajax({
    url : base_url+'Manajemen_User/AktifUser/'+id_user,
    type : 'POST',
    dataType : 'JSON',
    success : function (data){
      sukses(data.alert);
      grid_all.ajax.reload();
      grid_aktif.ajax.reload();
      grid_tidak_aktif.ajax.reload();
      grid_riwayat.ajax.reload();
  }
  })
}

function btnNonAktifUser(id_user){
  $.ajax({
    url : base_url+'Manajemen_User/NonaktifUser/'+id_user,
    type : 'POST',
    dataType : 'JSON',
    success : function (data){
      sukses(data.alert);
      grid_all.ajax.reload();
      grid_aktif.ajax.reload();
      grid_tidak_aktif.ajax.reload();
      grid_riwayat.ajax.reload();
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
		title: "Data User " + alert,
		text: "",
		timer: 1500,
		showConfirmButton: false,
	});
}

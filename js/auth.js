$(document).ready(function(){
    $('#auth_button').on('click', function(e){
        e.preventDefault();
        let email_user = $('#email_user').val();
        if(email_user==''){
            error('Email Tidak Boleh Kosong');
        }else{
            let password_user = $('#password_user').val();
            if(password_user==''){
                error('Password Tidak Boleh Kosong');
            }else{
                var formData = new FormData($('#form-login')[0]);
                $.ajax({
                    url : base_url+'auth/login',
                    method : 'POST',
                    data : formData,
                    dataType : 'JSON',
                    contentType:false,
                    processData:false,
                    success: function (data){
                        if(data.status==true){
                            if(data.id_role==1){
                            sukses(data.alert);
                            setTimeout(function(){
                                location.href = base_url + 'dashboard'
                            }, 1000)
                            }else if(data.id_role==4){
                                sukses(data.alert);
                                setTimeout(function(){
                                    location.href = base_url + 'profil'
                                },1000)
                            }
                        }else{
                            error(data.alert);
                        }
                    }
                })
            }
        }
    })
})


$('#cek_kode_button').on('click', function(e){
    e.preventDefault();
    let kode_anggota = $('#kode_anggota').val();
    if(!kode_anggota){
        error('Kode Anggota Harus Diisi !!')
    }else{
    var formData = new FormData($('#form-cekAnggota')[0])
    $.ajax({
        url : base_url+'Auth/cekAnggota',
        method : "POST",
        data : formData,
        dataType : 'JSON',
        contentType:false,
        processData:false,
        success : function(data){
            if(data.status){
                sukses(data.alert);
                setTimeout(function(){
                    location.href = base_url + 'Auth/v_registrasi'
                }, 1000)
            }else{
                error(data.alert)
            }
        }
    })
    }
})

$('#registrasi_button').on('click', function(e){
    e.preventDefault();
    var formData = new FormData($('#form-registrasi')[0]);
    $.ajax({
        url : base_url+'Auth/registrasi',
        method : "POST",
        data : formData,
        dataType : 'JSON',
        contentType:false,
        processData:false,
        success : function(data){
            if(data.status){
                sukses(data.alert)
                setTimeout(function(){
                    location.href = base_url + 'Auth'
                }, 1000)
            }else{
                $('#email_user_error').html(data.email_user_error)
                $('#password1_error').html(data.password1_error)
                $('#password2_error').html(data.password2_error)
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
  title: alert,
  text: '',
  timer:1500,
  showConfirmButton: false,
})
}
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
                    url : base_url+'admin/auth/login',
                    method : 'POST',
                    data : formData,
                    dataType : 'JSON',
                    contentType:false,
                    processData:false,
                    success: function (data){
                        if(data.status==true){
                            sukses(data.alert);
                            location.href = base_url + 'admin/admin'
                        }else{
                            error(data.alert);
                        }
                    }
                })
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
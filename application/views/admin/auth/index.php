<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url()           ?>assets/backend/css/bootstrap.min.css">
    <title>Document</title>

    <style>
        body {
            background: url('<?= base_url() ?>assets/backend/img/background.jpg') no-repeat fixed;
            -webkit-background-size: 100% 100%;
            -moz-background-size: 100% 100%;
            -o-background-size: 100% 100%;
            background-size: 100% 100%;
        }
    </style>
</head>

<body>
    <script>
        var base_url = '<?= base_url() ?>'
    </script>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form class="user" id="form-login" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email_user" name="email_user" placeholder="Silahkan masukan email...">
                                            <small class="form-text text-danger"><?= $this->form_validation->error('email_user'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password_user" name="password_user" placeholder="Password">
                                            <small class="form-text text-danger"><?= $this->form_validation->error('password_user'); ?></small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" id="auth_button">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>


<script src="<?= base_url() ?>assets/backend/js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url() ?>js/auth.js"></script>
<script src="<?= base_url() ?>assets/backend/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/backend/js/sweetalert2.all.min.js"></script>



</html>
<body class="bg-default">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="dashboard.html">
                <img src="<?= base_url('assets/backend')             ?>/assets/img/brand/icon2-removebg-preview.png" style="width: 100px; height: 100px;">
            </a>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-success py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Halaman Registrasi</h1>
                            <p class="text-lead text-white">Aplikasi Koperasi Jasa Angkutan Usaha Bersama (KAUBER)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Silahkan Masukan Kode anggota</small>
                            </div>
                            <form role="form" method="POST" id="form-cekAnggota">
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa fa-check-square"></i></span>
                                        </div>
                                        <input class="form-control" id="kode_anggota" name="kode_anggota" placeholder="contoh : 17/KAUBER/03.08.21/2021" type="text">
                                    </div>
                                    <small class="text-danger"><sup>*</sup> Apabila terjadi kesalahan silahkan hubungi admin</small>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="cek_kode_button" class="btn btn-primary my-4">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="<?= base_url() ?>auth/lupaPassword" class="text-light"><small>Lupa Password ?</small></a>
                        </div>
                        <div class="col-6 text-right">
                            <small>Sudah Punya akun ?. Silahkan <a href="<?= base_url() ?>auth" class="text-light">Login</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="py-5" id="footer-main">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-12">
                        <div class="text-center">
                            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Koperasi Kauber</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?= base_url()            ?>js/auth.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
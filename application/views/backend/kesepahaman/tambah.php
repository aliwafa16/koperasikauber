<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-between py-4">
                <div class="col-md-8">
                    <h6 class="h2 text-dark d-inline-block mb-0"><i class="fa fa fa-align-justify text-success"></i> <?= $headline ?></h6>
                </div>
                <!-- <div class="col-md-4 py-1">
                    <nav class="nav" id="nav-tab">
                        <a href="#semua_simpanan_pokok" class="btn btn-sm btn-primary mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Semua</a>
                        <a href="#riwayat" class="btn btn-sm btn-warning mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Riwayat</a>
                    </nav>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <h1 class="text-dark font-weight-bold text-center mt-3">Form Tambah Kesepahaman</h1>
                <div class="container">
                    <form action="" id="form-search">
                        <div class="row justify-content-end">
                            <div class="col-md-4 mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukan nama / kode anggota...." name="key_anggota" id="key_anggota" aria-label="Masukan nama / kode anggota...." aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="btn_anggota"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <h3 class="text-danger not-found"></h3>
                            </div>
                    </form>
                </div>
                <form action="<?= base_url() ?>Kesepahaman/cetakKesepahaman/" target="_blank" id="form-data-skkk" method="get">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="no_kesepahaman" class="col-sm-5 col-form-label">No Kesepahaman</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="no_kesepahaman" name="no_kesepahaman" value="<?= $kode_kesepahaman ?>" readonly>
                                </div>
                            </div>
                            <input type="text" id="id_anggota" name="id_anggota">
                            <div class="mb-3 row">
                                <label for="kode_anggota" class="col-sm-5 col-form-label">Kode Anggota</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama_anggota" class="col-sm-5 col-form-label">Nama Anggota</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nik_anggota" class="col-sm-5 col-form-label">NIK</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nik_anggota" name="nik_anggota" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-5 col-form-label">Alamat</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="alamat" name="alamat" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_kesepahaman" class="col-sm-5 col-form-label">Tanggal Kesepahaman</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="tanggal_kesepahaman" name="tanggal_kesepahaman" value="<?= $hari . ', ' . $tanggal; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning float-right mb-3 btn_print"><i class="fa fa fa-print"></i> Cetak</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->


<!-- Modal -->
<script src="<?= base_url() ?>js/kesepahaman.js"></script>
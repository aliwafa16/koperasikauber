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
                <h1 class="text-dark font-weight-bold text-center mt-3">Form Tambah SKKK</h1>
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
                <form action="<?= base_url() ?>SKKK/cetakSKKK/" target="_blank" id="form-data-skkk" method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="no_skkk" class="col-sm-5 col-form-label">Kode SKKK</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="no_skkk" name="no_skkk" value="<?= $kode_skkk ?>" readonly>
                                </div>
                            </div>
                            <input type="hidden" id="id_kesepahaman" name="id_kesepahaman">
                            <div class="mb-3 row">
                                <label for="no_kesepahaman" class="col-sm-5 col-form-label">No Kesepahaman</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="no_kesepahaman" name="no_kesepahaman" readonly>
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
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label for="nomor_kendaraan" class="col-sm-5 col-form-label">Nomor Kendaraan</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <select class="form-control" id="nomor_kendaraan" onChange="dataKendaraan(this)">
                                            <option>---List Nomor Kendaraan-----</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_kendaraan" id="id_kendaraan">
                            <input type="hidden" name="no_kendaraan" id="no_kendaraan">
                            <div class="mb-3 row">
                                <label for="merk_type" class="col-sm-5 col-form-label">Merk/Type</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="merk_type" name="merk_type" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_rangka" class="col-sm-5 col-form-label">Nomor Rangka</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="no_rangka" name="no_rangka" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_mesin" class="col-sm-5 col-form-label">Nomor Mesin</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="warna" class="col-sm-5 col-form-label">Warna</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="warna" name="warna" readonly>
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
<script src="<?= base_url() ?>js/skkk.js"></script>
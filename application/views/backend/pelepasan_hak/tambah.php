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
                <h1 class="text-dark font-weight-bold text-center mt-3">Form Tambah SKPH</h1>
                <div class="container">
                    <form action="" id="form-search">
                        <div class="row justify-content-end">
                            <div class="col-md-4 mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Masukan nomor kendaraan" name="key_kendaraan" id="key_kendaraan" aria-describedby="button-addon2" htmlspecialchars>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="btn_anggota"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <h3 class="text-danger not-found"></h3>
                            </div>
                    </form>
                </div>
                <form action="<?= base_url() ?>PelepasanHak/cetakSKPH/" target="_blank" id="form-data-skkk" method="get">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="no_pelepasan_hak" class="col-sm-5 col-form-label">Kode SKPH</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="no_pelepasan_hak" name="no_pelepasan_hak" value="<?= $kode_skph ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_skph" class="col-sm-5 col-form-label">Tanggal</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="tanggal_skph" name="tanggal_skph" value="<?= $hari . ', ' . $tanggal ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nomor_kendaraan" class="col-sm-5 col-form-label">Nomor Kendaraan</label>
                                <div class="col-sm-7">
                                    <input type="text" id="id_kendaraan" name="id_kendaraan">
                                    <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_mesin" class="col-sm-5 col-form-label">Nomor Mesin</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="no_rangka" class="col-sm-5 col-form-label">Nomor Rangka</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="no_rangka" name="no_rangka" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="merk_type" class="col-sm-5 col-form-label">Merk Type</label>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <input type="text" class="form-control" id="merk_type" name="merk_type" readonly>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <input type="text" class="form-control" id="tahun" name="tahun" readonly>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="warna" name="warna" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama_trayek" class="col-sm-5 col-form-label">Trayek</label>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <input type="text" class="form-control" id="nama_trayek" name="nama_trayek" readonly>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="trayek" name="trayek" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jenis" class="col-sm-5 col-form-label">Jenis</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="jenis" name="jenis" value="Mobil Penumpang">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="model" class="col-sm-5 col-form-label">Model</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="model" name="model" value="Minibus">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="isi_silinder" class="col-sm-5 col-form-label">Isi Silinder</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="isi_silinder" name="isi_silinder">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="pemilik_lama" class="col-sm-5 col-form-label">Pemilik Lama</label>
                                <div class="col-sm-7">
                                    <input type="text" id="id_anggota" name="id_anggota">
                                    <input type="text" class="form-control" id="pemilik_lama" name="pemilik_lama" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama_baru" class="col-sm-5 col-form-label">Pemilik Baru</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nama_baru" name="nama_baru">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nik_baru" class="col-sm-5 col-form-label">NIK Pemilik Baru</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="nik_baru" name="nik_baru">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tempat_baru" class="col-sm-5 col-form-label">Tempat Tanggal Lahir</label>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <input type="text" class="form-control" id="tempat_baru" name="tempat_baru">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" class="form-control" id="tanggal_lahir_baru" name="tanggal_lahir_baru">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamat_baru" class="col-sm-5 col-form-label">Alamat</label>
                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <textarea class="form-control" name="alamat_baru" id="alamat_baru" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning float-right mb-3 btn_print"><i class="fa fa fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->


<!-- Modal -->
<script src="<?= base_url() ?>js/skph.js"></script>
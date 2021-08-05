<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-between py-4">
                <div class="col-md-8">
                    <h6 class="h2 text-dark d-inline-block mb-0"><i class="fa fa fa-truck text-warning"></i> <?= $headline ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="row p-4 justify-content-between">
                    <div class="col-md-4">
                        <form action="" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Masukan nama / kode anggota..." name="cari_anggota" id="cari_anggota">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="btn_cari_anggota" name="btn_cari_anggota">Cari</button>
                                </div>
                            </div>
                        </form>
                        <h3 class="text-danger not_found"></h3>
                        <div class="row result-search">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <form action="" method="POST" class="p-4" id="form-kendaraan">
                                <div class="form-group">
                                    <input type="hidden" id="id_anggota" name="id_anggota">
                                    <label for="nomor_kendaraan">Nomor Kendaraan</label>
                                    <input type="text" class="form-control form-control-sm" id="nomor_kendaraan" name="nomor_kendaraan">
                                    <div class="text-danger" id="nomor_kendaraan_error"></div>
                                </div>
                                <div class="form-group">
                                    <label for="no_rangka">Nomor Rangka</label>
                                    <input type="text" class="form-control form-control-sm" id="no_rangka" name="no_rangka">
                                    <div class="text-danger" id="no_rangka_error"></div>
                                </div>
                                <div class="form-group">
                                    <label for="no_mesin">Nomor Mesin</label>
                                    <input type="text" class="form-control form-control-sm" id="no_mesin" name="no_mesin">
                                    <div class="text-danger" id="no_mesin_error"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="merk">Merk</label>
                                            <input type="text" class="form-control form-control-sm" id="merk" name="merk">
                                            <div class="text-danger" id="merk_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="type">Type</label>
                                            <input type="text" class="form-control form-control-sm" id="type" name="type">
                                            <div class="text-danger" id="type_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <input type="text" class="form-control form-control-sm" id="tahun" name="tahun">
                                            <div class="text-danger" id="tahun_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="warna">Warna</label>
                                            <input type="text" class="form-control form-control-sm" id="warna" name="warna">
                                            <div class="text-danger" id="warna_error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori_trayek">Kategori Trayek</label>
                                            <select class="form-control form-control-sm" id="kategori_trayek" name="kategori_trayek" onChange="listTrayek(this)">
                                                <option value="">----Pilih Kategori Trayek----</option>
                                                <option value="1">Angkutan Perkotaan</option>
                                                <option value="2">Angkutan Kota Dalam Propinsi</option>
                                                <option value="3">Trans Pakuan Koridor</option>
                                                <option value="4">Angkutan Barang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="trayek">Trayek</label>
                                            <select class="form-control form-control-sm" id="trayek" name="trayek">
                                                <option value="">----Pilih Trayek----</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right" id="submit_kendaraan">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->


    <script src="<?= base_url() ?>js/kendaraan.js"></script>
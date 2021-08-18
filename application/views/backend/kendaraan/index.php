<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-between py-4">
                <div class="col-md-8">
                    <h6 class="h2 text-dark d-inline-block mb-0"><i class="fa fa fa-truck text-warning"></i> <?= $headline ?></h6>
                </div>
                <div class="col-md-4 py-1">
                    <nav class="nav" id="nav-tab">
                        <a href="#semua_kendaraan" class="btn btn-sm btn-primary mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Semua</a>
                        <a href="#riwayat" class="btn btn-sm btn-warning mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Riwayat</a>
                    </nav>
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
                <!-- Card header -->
                <div class="card-header border-0">
                    <a href="<?= base_url() ?>kendaraan/tambahKendaraan/" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Kendaraan</a>
                </div>
                <!-- Light table -->
                <div class="tab-content mb-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="semua_kendaraan" role="tabpanel">
                        <p class="text-primary fs-4 pl-4" style="font-weight: bold;">Semua Kendaraan</p>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="table_semua_kendaraan" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nomor Kendaraan</th>
                                        <th class="text-center">Merk / Type</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">No Rangka</th>
                                        <th class="text-center">No Mesin</th>
                                        <th class="text-center">Warna</th>
                                        <th class="text-center">Trayek</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="riwayat" role="tabpanel">
                        <p class="text-warning fs-4 pl-4" style="font-weight: bold;">Riwayat Kendaraan</p>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="table_riwayat" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nomor Kendaraan</th>
                                        <th class="text-center">Merk / Type</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">No Rangka</th>
                                        <th class="text-center">No Mesin</th>
                                        <th class="text-center">Warna</th>
                                        <th class="text-center">Trayek</th>
                                        <th class="text-center">Tanggal Keluar</th>
                                        <th class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="kendaraanModal" tabindex="-1" aria-labelledby="kendaraanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kendaraanModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="" method="POST" id="form-edit-kendaraan">
                            <div class="form-group">
                                <input type="hidden" name="id_kendaraan" id="id_kendaraan">
                                <input type="hidden" name="created_at" id="created_at">
                                <input type="hidden" name="is_active" id="is_active">
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
                                        <label for="kategori_trayek">Example select</label>
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
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary" id="cancel_edit_kendaraan" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submit_edit_kendaraan">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editKepemilikanModal" tabindex="-1" aria-labelledby="editKepemilikanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editKepemilikanModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="form-edit-kepemilikan">
                        <div class="row justify-content-end">
                            <div class="col-md-8">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukan nama / kode anggota...." name="key_anggota" id="key_anggota" aria-label="Masukan nama / kode anggota...." aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" id="btn_cari_pemilik"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                                <h4 class="text-danger not_found"></h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pemilik_awal">Pemilik awal</label>
                            <input type="text" class="form-control" id="pemilik_awal" name="pemilik_awal" readonly>
                        </div>
                        <div class="form-group">
                            <label for="pemilik_baru">Pemilik baru</label>
                            <input type="text" class="form-control" id="pemilik_baru" name="pemilik_baru" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kode_anggota">Kode Anggota</label>
                            <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" readonly>
                        </div>
                        <input type="hidden" id="id_anggota" name="id_anggota">

                </div>
                <div class="modal-footer">
                    <button type="button" id="cancel_kepemilikan_kendaraan" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit_kepemilikan_kendaraan" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="<?= base_url() ?>js/kendaraan.js"></script>
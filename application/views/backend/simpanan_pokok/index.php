<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-between py-4">
                <div class="col-md-8">
                    <h6 class="h2 text-dark d-inline-block mb-0"><i class="fa fa fa-coins text-info"></i> <?= $headline ?></h6>
                </div>
                <div class="col-md-4 py-1">
                    <nav class="nav" id="nav-tab">
                        <a href="#semua_simpanan_pokok" class="btn btn-sm btn-primary mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Semua</a>
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
                    <button type="button" onclick="addSimpananPokok()" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Simpanan Pokok</button>
                </div>
                <!-- Light table -->
                <div class="tab-content mb-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="semua_simpanan_pokok" role="tabpanel">
                        <p class="text-primary fs-4 pl-4 py-2" style="font-weight: bold;">Rekap simpanan pokok</p>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="table_semua_simpanan_pokok" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Simpanan Pokok</th>
                                        <th class="text-center">Tanggal Bayar</th>
                                        <th class="text-center">Nama Anggota</th>
                                        <th class="text-center">Debit (RP)</th>
                                        <th class="text-center">Credit (RP)</th>
                                        <th class="text-center">Total (RP)</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="riwayat" role="tabpanel">
                        <p class="text-warning fs-4 pl-4" style="font-weight: bold;">Riwayat Simpanan Pokok</p>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="table_riwayat" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Simpanan Pokok</th>
                                        <th class="text-center">Tanggal Bayar</th>
                                        <th class="text-center">Nama Anggota</th>
                                        <th class="text-center">Debit (RP)</th>
                                        <th class="text-center">Credit (RP)</th>
                                        <th class="text-center">Total (RP)</th>
                                        <th class="text-center">Tanggal Anggota Keluar</th>
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

    <div class="modal fade" id="simpananPokokModal" tabindex="-1" aria-labelledby="simpananPokokModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="simpananPokokModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="form_simpanan_pokok">
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
                            <label for="nama_anggota">Nama Anggota</label>
                            <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" readonly>
                            <div class="text-danger" id="nama_anggota_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="kode_anggota">Kode Anggota</label>
                            <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" readonly>
                            <div class="text-danger" id="kode_anggota_error"></div>
                        </div>

                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control" id="nominal" name="nominal">
                            <div class="text-danger" id="nominal_error"></div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="cancel_simpan_pokok" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="submit_simpan_pokok" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <script src="<?= base_url() ?>js/simpanan_pokok.js"></script>
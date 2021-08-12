<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-between py-4">
                <div class="col-md-8">
                    <h6 class="h2 text-dark d-inline-block mb-0"><i class="fa fa fa-money-bill-wave-alt text-warning"></i> <?= $headline ?></h6>
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
                <!-- <div class="card-header border-0">
                    <a href="<?= base_url() ?>kendaraan/tambahKendaraan/" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Kendaraan</a>
                </div> -->
                <!-- Light table -->
                <div class="tab-content mb-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="semua_simpanan_pokok" role="tabpanel">
                        <p class="text-primary fs-4 pl-4 py-2" style="font-weight: bold;">Rekap simpanan wajib</p>
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


    <!-- Modal -->
    <script src="<?= base_url() ?>js/simpanan_wajib.js"></script>
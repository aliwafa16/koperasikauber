<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> <?= $title ?> - Kendaraan</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> List Data Kendaraan</h4>
                    <div class="row">
                        <div class="panel-heading">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" onclick="addKendaraan()" id="addKendaraan" style="margin-left: 15px;" data-bs-toggle="modal" data-bs-target="#modalKendaraan"> <i class="fa fa-plus-square"></i> Tambah Data Kendaraan</button>
                            </div>
                            <!-- <div class="col-md-12">
                                <a data-toggle="tab" href="#semua_anggota" onclick="getAllAnggota()" type="button" class="btn btn-info btn-sm" style="margin-top: 10px; margin-left:15px">Semua</a>
                                <a data-toggle="tab" href="#aktif_anggota" onclick="getAllActiveAnggota()" type="button" class="btn btn-success btn-sm" style="margin-top: 10px;">Aktif</a>
                                <a data-toggle="tab" href="#nonaktif_anggota" type="button" class="btn btn-danger btn-sm" style="margin-top: 10px;">Tidak Aktif</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="semua_kendaraan">
                                            <section id="unseen">
                                                <table class="table table-bordered table-striped table-condensed" id="table_kendaraan" width="150%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Nomor Kendaraan</th>
                                                            <th class="text-center">Merk / Type</th>
                                                            <th class="text-center">Tahun</th>
                                                            <th class="text-center">No Rangka</th>
                                                            <th class="text-center">No Mesin</th>
                                                            <th class="text-center">Warna</th>
                                                            <th class="text-center">Trayek</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- /wrapper -->
</section>

<div class="modal fade" id="modalKendaraan" tabindex="-1" aria-labelledby="modalKendaraanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalKendaraanLabel"></h4>
            </div>
            <div class="modal-body">
                <form action="" id="form-kendaraan">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Masukan Nama/Kode Anggota..." name="key_anggota" id="key_anggota">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="cari_anggota" name="cari_anggota" type="button">Cari</button>
                                </span>
                            </div>
                            <div class="text-danger" id="search-notfound"></div>
                            <div class="result-search">
                            </div>
                        </div>
                        <div class="col-md-8 form-input-kendaraan"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel_kendaraan" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit_kendaraan" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>js/anggota.js"></script>
<script src="<?= base_url() ?>js/kendaraan.js"></script>
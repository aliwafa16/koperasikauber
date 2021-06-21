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
                            <div class="search-anggota">
                            </div>
                            <div class="result-search">
                            </div>
                            <div class="biodata">
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

<div class="modal fade" id="modalEditKendaraan" tabindex="-1" aria-labelledby="modalEditKendaraanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalEditKendaraanLabel"></h4>
            </div>
            <div class="modal-body">
                <form action="" id="form-edit-kendaraan">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="biodata">
                            </div>
                            <div class="kepemilikan_baru">
                            </div>
                        </div>
                        <div class="col-md-8 form-edit-kendaraan">

                            <input type="hidden" name="edit_id_anggota" id="edit_id_anggota">
                            <input type="hidden" name="edit_id_kendaraan" id="edit_id_kendaraan">
                            <input type="hidden" name="edit_id_kepemilikan" id="edit_id_kepemilikan">
                            <input type="hidden" name="edit_id_trayek" id="edit_id_trayek">


                            <div class="mb-4">
                                <label for="edit_nomor_kendaraan" class="form-label">Nomor Kendaraan</label>
                                <input type="text" class="form-control" id="edit_nomor_kendaraan" name="edit_nomor_kendaraan">
                                <div class="text-danger" id="edit_nomor_kendaraan_error"></div>
                            </div>


                            <div class="mb-4">
                                <label for="edit_no_rangka" class="form-label">Nomor Rangka</label>
                                <input type="text" class="form-control" id="edit_no_rangka" name="edit_no_rangka">
                                <div class="text-danger" id="edit_no_rangka_error"></div>
                            </div>

                            <div class="mb-4">
                                <label for="edit_no_mesin" class="form-label">Nomor Mesin</label>
                                <input type="text" class="form-control" id="edit_no_mesin" name="edit_no_mesin">
                                <div class="text-danger" id="edit_no_mesin_error"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-4">
                                        <label for="edit_merk" class="form-label">Merek</label>
                                        <input type="text" class="form-control" id="edit_merk" name="edit_merk">
                                        <div class="text-danger" id="edit_merk_error"></div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-4">
                                        <label for="edit_type" class="form-label">Type</label>
                                        <input type="text" class="form-control" id="edit_type" name="edit_type">
                                        <div class="text-danger" id="edit_type_error"></div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-4">
                                        <label for="edit_tahun" class="form-label">Tahun</label>
                                        <input type="text" class="form-control" id="edit_tahun" name="edit_tahun">
                                        <div class="text-danger" id="edit_tahun_error"></div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-4">
                                        <label for="edit_warna" class="form-label">Warna</label>
                                        <input type="text" class="form-control" id="edit_warna" name="edit_warna">
                                        <div class="text-danger" id="edit_warna_error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="kategori_trayek" class="form-label">Kategori Trayek</label>
                                        <select class="form-control" id="kategori_trayek" name="kategori_trayek" onChange=listTrayek(this)>
                                            <option value="">----Pilih Kategori Trayek----</option>
                                            <option value="1">Angkutan Perkotaan</option>
                                            <option value="2">Angkutan Kota Dalam Propinsi</option>
                                            <option value="3">Trans Pakuan Koridor</option>
                                            <option value="4">Angkutan Barang</option>
                                        </select>
                                        <div class="text-danger" id="kategori_trayek_error"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="trayek" class="form-label list-trayek">Trayek</label>
                                        <select class="form-control" id="trayek" name="trayek">
                                            <option value="">----Pilih Trayek----</option>
                                        </select>
                                        <div class="text-danger" id="trayek_error"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel_edit_kendaraan" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit_edit_kendaraan" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script src="<?= base_url() ?>js/anggota.js"></script>
<script src="<?= base_url() ?>js/kendaraan.js"></script>
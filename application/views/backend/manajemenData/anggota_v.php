<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> <?= $title ?> - Anggota</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> List Data Anggota</h4>
                    <div class="row">
                        <div class="panel-heading">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" onclick="addAnggota()" id="addAnggota" style="margin-left: 15px;" data-bs-toggle="modal" data-bs-target="#modalAnggota"> <i class="fa fa-plus-square"></i> Tambah Data Anggota</button>
                            </div>
                            <div class="col-md-12">
                                <a data-toggle="tab" href="#semua_anggota" onclick="getAllAnggota()" type="button" class="btn btn-info btn-sm" style="margin-top: 10px; margin-left:15px">Semua</a>
                                <a data-toggle="tab" href="#aktif_anggota" onclick="getAllActiveAnggota()" type="button" class="btn btn-success btn-sm" style="margin-top: 10px;">Aktif</a>
                                <a data-toggle="tab" href="#nonaktif_anggota" type="button" class="btn btn-danger btn-sm" style="margin-top: 10px;">Tidak Aktif</a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row mt">
                            <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="semua_anggota">
                                            <section id="unseen">
                                                <table class="table table-bordered table-striped table-condensed" id="Table_Anggota" width="150%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Kode Anggota</th>
                                                            <th class="text-center">Nama Anggota</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Jenis Kelamin</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                        <div class="tab-pane" id="aktif_anggota">
                                            <section id="unseen">
                                                <table class="table table-bordered table-striped table-condensed" id="table_anggota_aktif" width="150%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Kode Anggota</th>
                                                            <th class="text-center">Nama Anggota</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Jenis Kelamin</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </section>
                                        </div>
                                        <div class="tab-pane" id="nonaktif_anggota">
                                            <section id="unseen">
                                                <table class="table table-bordered table-striped table-condensed" id="table_anggota_nonaktif" width="150%">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Kode Anggota</th>
                                                            <th class="text-center">Nama Anggota</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">Jenis Kelamin</th>
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


<div class="modal fade" id="modalAnggota" tabindex="-1" aria-labelledby="modalAnggotaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalAnggotaLabel"></h4>
            </div>
            <div class="modal-body">
                <form action="" id="form-anggota">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="id_anggota" name="id_anggota">
                            <input type="text" class="form-control" id="created_at" name="created_at">
                            <input type="text" class="form-control" id="is_active" name="is_active">
                        </div>
                            <div class="mb-3">
                                <label for="kode_anggota" class="form-label">Kode Anggota</label>
                                <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" readonly>
                                <div class="text-danger" id="kode_anggota_error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="nama_anggota" class="form-label" style="margin-top: 5px;">Nama Anggota</label>
                                <input type="text" class="form-control" id="nama_anggota" name="nama_anggota">
                                <div class="text-danger" id="nama_anggota_error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="nik_anggota" class="form-label" style="margin-top: 5px;">NIK</label>
                                <input type="text" class="form-control" id="nik_anggota" name="nik_anggota">
                                <div class="text-danger" id="nik_anggota_error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label" style="margin-top: 5px;">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                <div class="text-danger" id="tempat_lahir_error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label" style="margin-top: 5px;">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                <div class="text-danger" id="tanggal_lahir_error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label" style="margin-top: 5px;">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label" style="margin-top: 5px;">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                                <div class="text-danger" id="pekerjaan_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="no_telp" class="form-label" style="margin-top: 5px;">No Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp">
                                <div class="text-danger" id="no_telp_error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label" style="margin-top: 5px;">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="3" name="alamat"></textarea>
                                <div class="text-danger" id="alamat_error"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="kelurahan" class="form-label" style="margin-top: 5px;">Kelurahan</label>
                                        <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                                        <div class="text-danger" id="kelurahan_error"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="kecamatan" class="form-label" style="margin-top: 5px;">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                                        <div class="text-danger" id="kecamatan_error"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="kota_kab" class="form-label" style="margin-top: 5px;">Kota/Kab</label>
                                        <input type="text" class="form-control" id="kota_kab" name="kota_kab">
                                        <div class="text-danger" id="kota_kab_error"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label" style="margin-top: 5px;">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                                <div class="text-danger" id="keterangan_error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="foto_anggota" class="form-label" style="margin-top: 5px;">Foto Anggota</label>
                                <div id="preview_foto">
                                
                                </div>
                                <input class="form-control" type="file" id="foto_anggota" name="foto_anggota">
                                <div class="text-danger" id="foto_anggota_error"></div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="cancel_anggota" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="submit_anggota" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>js/anggota.js"></script>
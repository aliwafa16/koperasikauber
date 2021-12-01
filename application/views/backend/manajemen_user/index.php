<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-between py-4">
                <div class="col-md-8">
                    <h6 class="h2 text-dark d-inline-block mb-0"><i class="fa fa-id-badge text-danger"></i> <?= $headline ?></h6>
                </div>
                <div class="col-md-4 py-1">
                    <nav class="nav" id="nav-tab">
                        <a href="#semua_user" class="btn btn-sm btn-primary mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Semua</a>
                        <a href="#user_aktif" class="btn btn-sm btn-success mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Aktif</a>
                        <a href="#user_tidak_aktif" class="btn btn-sm btn-danger mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Tidak Aktif</a>
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
                    <button type="button" class="btn btn-primary" onclick="addUser()"><i class="fa fa-plus"></i> Tambah User</button>
                </div>
                <!-- Light table -->
                <div class="tab-content mb-2" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="semua_user" role="tabpanel">
                        <p class="text-primary fs-4 pl-4" style="font-weight: bold;">Semua User</p>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="table_semua_user" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Anggota</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <!-- <?php $i = 1; ?>
                                    <?php foreach ($anggotas as $anggota) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i ?></td>
                                            <td class="text-center"><?= $anggota['kode_anggota'] ?></td>
                                            <td class="text-center"><?= $anggota['nama_anggota'] ?></td>
                                            <td class="text-center"><?= $anggota['nik_anggota'] ?></td>
                                            <td class="text-center"><?= $anggota['jenis_kelamin'] ?></td>
                                            <td class="text-center">
                                                <?php if ($anggota['is_active'] == 0) : ?>
                                                    <button type="button" onclick="btnAktifAnggota()" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                                    <button type="button" onclick="btnNonAktifAnggota()" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>
                                                <?php elseif ($anggota['is_active'] == 1) : ?>
                                                    <button type="button" onclick="btnNonAktifAnggota()" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                                <?php elseif ($anggota['is_active'] == 2) : ?>
                                                    <button type="button" onclick="btnAktifAnggota()" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button onclick="edit_anggota()" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></button>
                                                        <button onclick="edit_anggota()" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                                        <button onclick="hapus_anggota()" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="user_aktif" role="tabpanel">
                        <p class="text-success fs-4 pl-4" style="font-weight: bold;">User Aktif</p>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="table_user_aktif" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Anggota</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php $j = 1; ?>
                                    <?php foreach ($anggota_aktif as $ak) : ?>
                                        <tr>
                                            <td><?= $j ?></td>
                                            <td class="text-center"><?= $ak['kode_anggota'] ?></td>
                                            <td class="text-center"><?= $ak['nama_anggota'] ?></td>
                                            <td class="text-center"><?= $ak['nik_anggota'] ?></td>
                                            <td class="text-center"><?= $ak['jenis_kelamin'] ?></td>
                                            <td class="text-center">
                                                <?php if ($ak['is_active'] == 0) : ?>
                                                    <button type="button" onclick="btnAktifAnggota()" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                                    <button type="button" onclick="btnNonAktifAnggota()" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>
                                                <?php elseif ($ak['is_active'] == 1) : ?>
                                                    <button type="button" onclick="btnNonAktifAnggota()" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                                <?php elseif ($ak['is_active'] == 2) : ?>
                                                    <button type="button" onclick="btnAktifAnggota()" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button onclick="edit_anggota()" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></button>
                                                        <button onclick="edit_anggota()" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                                        <button onclick="hapus_anggota()" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $j++ ?>
                                    <?php endforeach; ?> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="user_tidak_aktif" role="tabpanel">
                        <p class="text-danger fs-4 pl-4" style="font-weight: bold;">User Tidak Aktif</p>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="table_user_tidak_aktif" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Anggota</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php $k = 1; ?>
                                    <?php foreach ($anggota_tidak_aktif as $atk) : ?>
                                        <tr>
                                            <td><?= $k ?></td>
                                            <td class="text-center"><?= $atk['kode_anggota'] ?></td>
                                            <td class="text-center"><?= $atk['nama_anggota'] ?></td>
                                            <td class="text-center"><?= $atk['nik_anggota'] ?></td>
                                            <td class="text-center"><?= $atk['jenis_kelamin'] ?></td>
                                            <td class="text-center">
                                                <?php if ($atk['is_active'] == 0) : ?>
                                                    <button type="button" onclick="btnAktifAnggota()" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                                    <button type="button" onclick="btnNonAktifAnggota()" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>
                                                <?php elseif ($atk['is_active'] == 1) : ?>
                                                    <button type="button" onclick="btnNonAktifAnggota()" class="btn btn-success btn-sm"><i class="fa fa-check"> Aktif</i></button>
                                                <?php elseif ($atk['is_active'] == 2) : ?>
                                                    <button type="button" onclick="btnAktifAnggota()" class="btn btn-danger btn-sm"><i class="fa fa-times"> Tidak Aktif</i></button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button onclick="edit_anggota()" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-info"></i></button>
                                                        <button onclick="edit_anggota()" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                                        <button onclick="hapus_anggota()" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $k++ ?>
                                    <?php endforeach; ?> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="riwayat" role="tabpanel">
                        <p class="text-warning fs-4 pl-4" style="font-weight: bold;">Riwayat</p>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" id="table_riwayat" style="width: 100%;">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Anggota</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Tanggal dihapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <?php $l = 1; ?>
                                    <?php foreach ($riwayat as $rwyt) : ?>
                                        <tr>
                                            <td class="text-center"><?= $l ?></td>
                                            <td class="text-center"><?= $rwyt['kode_anggota'] ?></td>
                                            <td class="text-center"><?= $rwyt['nama_anggota'] ?></td>
                                            <td class="text-center"><?= $rwyt['nik_anggota'] ?></td>
                                            <td class="text-center"><?= $rwyt['jenis_kelamin'] ?></td>
                                            <td class="text-center"><?= $rwyt['deleted_at'] ?></td>
                                        </tr>
                                        <?php $l++ ?>
                                    <?php endforeach; ?> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="form_user">
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
                            <label for="email_user">Email user</label>
                            <input type="text" class="form-control" id="email_user" name="email_user">
                            <div class="text-danger" id="email_user_error"></div>
                        </div>
                        <div class="form-group">
                            <label for="user_name">User name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name">
                            <div class="text-danger" id="user_name_error"></div>
                        </div>
                        <div class="form-group field_password">
                            
                        </div>
                        <div class="form-group">
                            <label for="role_id">Status</label>
                            <select class="form-control" id="role_id" name="role_id">

                            </select>
                        </div>
                        <input type="hidden" id="id_user" name="id_user">

                </div>
                <div class="modal-footer">
                    <button type="button" id="cancel_user" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit_user" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="editPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPasswordModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="form_edit_password">
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="text" class="form-control" id="new_password" name="new_password">
                            <div class="text-danger" id="new_password_error"></div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancel_edit_password" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit_edit_password" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- <div class="modal fade" id="modalAnggota" tabindex="-1" aria-labelledby="modalAnggotaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAnggotaLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="form-anggota">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="id_anggota" id="id_anggota">
                                <input type="hidden" name="created_at" id="created_at">
                                <input type="hidden" name="is_active" id="is_active">
                                <input type="hidden" name="tanggal_masuk" id="tanggal_masuk">
                                <div class="form-group">
                                    <label for="kode_anggota">Kode Anggota</label>
                                    <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama_anggota">Nama Anggota</label>
                                    <input type="text" class="form-control" id="nama_anggota" name="nama_anggota">
                                    <div class="text-danger" id="nama_anggota_error"></div>
                                </div>
                                <div class="form-group">
                                    <label for="nik_anggota">NIK Anggota</label>
                                    <input type="text" class="form-control" id="nik_anggota" name="nik_anggota">
                                    <div class="text-danger" id="nik_anggota_error"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                            <div class="text-danger" id="tempat_lahir_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                            <div class="text-danger" id="tanggal_lahir_error"></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="pria" selected>Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                                <div class="form-group mt-4">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                                    <div class="text-danger" id="pekerjaan_error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_telp">Nomor Telp</label>
                                    <input type="text" class="form-control" id="no_telp" name="no_telp">
                                    <div class="text-danger" id="no_telp_error"></div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                    <div class="text-danger" id="alamat_error"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kelurahan">Kelurahan</label>
                                            <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                                            <div class="text-danger" id="kelurahan_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kecamatan">Kecamatan</label>
                                            <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                                            <div class="text-danger" id="kecamatan_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kota_kab">Kota/Kabupaten</label>
                                            <input type="text" class="form-control" id="kota_kab" name="kota_kab">
                                            <div class="text-danger" id="kota_kab_error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                                    <div class="text-danger" id="keterangan_error"></div>
                                </div>
                                <div class="form-group">
                                    <label for="foto_anggota">Foto Anggota</label>
                                    <input type="file" class="form-control" id="foto_anggota" name="foto_anggota">
                                </div>
                                <div id="preview_foto"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="cancel_anggota" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit_anggota" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->


    <script src="<?= base_url() ?>js/manajemen_user.js"></script>
<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row justify-content-between py-4">
                <div class="col-md-8">
                    <h6 class="h2 text-dark d-inline-block mb-0"><i class="fa fa-id-badge text-danger"></i> <?= $headline ?></h6>
                </div>
                <!-- <div class="col-md-4 py-1">
                    <nav class="nav" id="nav-tab">
                        <a href="#semua_anggota" class="btn btn-sm btn-primary mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Semua</a>
                        <a href="#anggota_aktif" class="btn btn-sm btn-success mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Aktif</a>
                        <a href="#anggota_tidak_aktif" class="btn btn-sm btn-danger mb-2 nav-item nav-link" style="color: white;" data-toggle="tab">Tidak Aktif</a>
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
                <div class="row mt-4 p-4">
                    <div class="col-md-5 text-center">
                        <h2 class="text-left">Biodata Anggota</h2>
                        <img src="<?= base_url() ?>assets/foto_anggota/<?= $anggota['anggota']['foto_anggota'] ?>" alt="foto_anggota" class="img-thumbnail rounded-circle mb-2" style="width: 150px; height: 150px;">
                        <p class="fs-3 text-monospace mt-0"><?= $anggota['anggota']['kode_anggota'] ?></p>
                        <p class="fs-2 font-weight-bold mt-0"><?= $anggota['anggota']['nama_anggota'] ?></p>
                        <?php if ($anggota['anggota']['is_active'] == 1) : ?>
                            <button type="button" class="btn btn-sm btn-success" style="color: white;">Aktif</button>
                        <?php else : ?>
                            <button type="button" class="btn btn-sm btn-danger" style="color: white;">Tidak Aktif</button>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-6">
                                <ul style="list-style-type: none;" class="text-left">
                                    <li><i class="fa fa-user text-warning mb-3"></i> <?= $anggota['anggota']['jenis_kelamin'] ?></li>
                                    <li><i class="fa fa-calendar-day text-success mb-3"></i> <?= $anggota['anggota']['tempat_lahir'] ?>, <?= $anggota['anggota']['tanggal_lahir'] ?></li>
                                    <li><i class="fa fa-address-card text-primary mb-3"></i> <?= $anggota['anggota']['nik_anggota'] ?></li>
                                    <li><i class="fa fa-map-marker-alt text-danger mb-3"></i> <?= $anggota['anggota']['alamat'] ?>, Kel. <?= $anggota['anggota']['kelurahan'] ?>, Kec. <?= $anggota['anggota']['kecamatan'] ?></li>
                                    <li><i class="fa fa-city text-warning mt-3"></i> <?= $anggota['anggota']['kota_kab'] ?></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul style="list-style-type: none;" class="text-left">
                                    <li><i class="fa fa-phone-alt text-warning mb-3"></i> <?= $anggota['anggota']['no_telp'] ?></li>
                                    <li><i class="fa fa-wrench text-success mb-3"></i> <?= $anggota['anggota']['pekerjaan'] ?></li>
                                    <li><i class="fa fa-clock text-primary mb-3"></i> <?= $anggota['anggota']['tanggal_masuk'] ?></li>
                                    <li><i class="fa fa-crosshairs text-warning mb-3"></i> <?= $anggota['anggota']['keterangan'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <h2 class="text-left pl-2 py-2">Kendaraan</h2>
                            <div class="table-responsive pb-2">
                                <table class="table align-items-center table-flush" id="table_kendaraan_details">
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($anggota['kendaraan'] as $kendaraan) : ?>
                                            <tr>
                                                <td class="text-center"><?= $i; ?></td>
                                                <td class="text-center"><?= $kendaraan['nomor_kendaraan'] ?></td>
                                                <td class="text-center"><?= $kendaraan['merk_type']; ?></td>
                                                <td class="text-center"><?= $kendaraan['tahun']; ?></td>
                                                <td class="text-center"><?= $kendaraan['no_rangka']; ?></td>
                                                <td class="text-center"><?= $kendaraan['no_mesin']; ?></td>
                                                <td class="text-center"><?= $kendaraan['warna']; ?></td>
                                                <td class="text-center"><?= $kendaraan['nama_trayek']; ?></td>
                                            </tr>
                                            <?php $i++ ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="card">
                            <h2 class="text-left pl-2 py-2">Simpanan Wajib</h2>
                            <div class="table-responsive pb-2">
                                <table class="table align-items-center table-flush" id="table_keuangan_simpanan_wajib">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode Simpanan Wajib</th>
                                            <th class="text-center">Tanggal Bayar</th>
                                            <th class="text-center">Debit</th>
                                            <th class="text-center">Kredit</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                        <?php $j = 1 ?>
                                        <?php foreach ($anggota['simpanan_wajib'] as $simpanan_wajib) : ?>
                                            <tr>
                                                <th class="text-center"><?= $j ?></th>
                                                <th class="text-center"><?= $simpanan_wajib['kode_simpanan_wajib'] ?></th>
                                                <th class="text-center"><?= $simpanan_wajib['tanggal_bayar'] ?></th>
                                                <th class="text-center"><?= $simpanan_wajib['debit'] ?></th>
                                                <th class="text-center"><?= $simpanan_wajib['credit'] ?></th>
                                                <th class="text-center"><?= $simpanan_wajib['total'] ?></th>
                                            </tr>
                                            <?php $j++ ?>
                                        <?php endforeach; ?>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                        <div class="card">
                            <h2 class="text-left pl-2 py-2">Simpanan Pokok</h2>
                            <div class="table-responsive pb-2">
                                <table class="table align-items-center table-flush" id="table_keuangan_simpanan_pokok">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode Simpanan Pokok</th>
                                            <th class="text-center">Tanggal Bayar</th>
                                            <th class="text-center">Debit</th>
                                            <th class="text-center">Kredit</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $k = 1; ?>
                                        <?php foreach ($anggota['simpanan_pokok'] as $simpanan_pokok) : ?>
                                            <tr>
                                                <td class="text-center"><?= $k ?></td>
                                                <td class="text-center"><?= $simpanan_pokok['kode_simpanan_pokok'] ?></td>
                                                <?php if ($simpanan_pokok['tanggal']) : ?>
                                                    <td class="text-center"><?= $simpanan_pokok['tanggal'] ?></td>
                                                <?php else : ?>
                                                    <td class="text-center"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"> Belum bayar</i></button></td>
                                                <?php endif; ?>
                                                <td class="text-center"><?= $simpanan_pokok['debet'] ?></td>
                                                <td class="text-center"><?= $simpanan_pokok['credit'] ?></td>
                                                <td class="text-center"><?= $simpanan_pokok['total'] ?></td>
                                            </tr>
                                            <?php $k++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#table_kendaraan_details').DataTable({
                "lengthChange": false,
                'pageLength': 5,
                "bInfo": false
            })

            $('#table_keuangan_simpanan_pokok').DataTable({
                "lengthChange": false,
                'pageLength': 5,
                "bInfo": false
            })

            $('#table_keuangan_simpanan_wajib').DataTable({
                "lengthChange": false,
                'pageLength': 5,
                "bInfo": false
            })
        })
    </script>


    <!-- Modal -->
    <!-- <script src="<?= base_url() ?>js/anggota.js"></script> -->
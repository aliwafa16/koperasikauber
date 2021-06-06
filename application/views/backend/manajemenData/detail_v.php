<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="row mt">
            <!-- /col-lg-12 -->
            <div class="col-lg-12 mt">
                <div class="row content-panel">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a data-toggle="tab" href="#profil">Profil</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#contact" class="contact-map">Kendaraan</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#edit">Riwayat</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /panel-heading -->
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="profil" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="profile-pic centered">
                                            <img src="<?= base_url() ?>assets/foto_anggota/<?= $anggota['foto_anggota'] ?>" class="img-circle">
                                            <h1 class=""><?= $anggota['nama_anggota'] ?></h1>
                                            <h6><?= $anggota['keterangan'] ?></h6>
                                        </div>
                                    </div>
                                    <div class="col-md-8 profile-text">
                                        <h3><?= $title ?></h3>
                                        <h6><?= $anggota['kode_anggota'] ?></h6>
                                        <p><i class="fa fa-female"></i> / <i class="fa fa-male"></i> <?= $anggota['jenis_kelamin'] ?></p>
                                        <p><i class="fa fa-chevron-circle-down"></i> <?= $anggota['nik_anggota'] ?></p>
                                        <p><i class="fa fa-map-marker"></i> Alamat <?= $anggota['alamat'] ?>, Kel. <?= $anggota['kelurahan'] ?>, Kec. <?= $anggota['kecamatan'] ?></p>
                                        <p>Kab/Kota <?= $anggota['kota_kab'] ?></p>
                                        <p><i class="fa fa-calendar-o"></i> <?= $anggota['tempat_lahir'] ?>, <?= $anggota['tanggal_lahir'] ?></p>
                                        <p><i class="fa fa-phone"></i> <?= $anggota['no_telp'] ?></p>
                                        <p><i class="fa fa-briefcase"></i> <?= $anggota['pekerjaan'] ?></p>
                                    </div>
                                </div>
                                <!-- /OVERVIEW -->
                            </div>
                            <!-- /tab-pane -->
                            <div id="contact" class="tab-pane">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="map"></div>
                                    </div>
                                    <!-- /col-md-6 -->
                                    <div class="col-md-6 detailed">
                                        <h4>Location</h4>
                                        <div class="col-md-8 col-md-offset-2 mt">
                                            <p>
                                                Postal Address<br /> PO BOX 12988, Sutter Ave<br /> Brownsville, New York.
                                            </p>
                                            <br>
                                            <p>
                                                Headquarters<br /> 844 Sutter Ave,<br /> 9003, New York.
                                            </p>
                                        </div>
                                        <h4>Contacts</h4>
                                        <div class="col-md-8 col-md-offset-2 mt">
                                            <p>
                                                Phone: +33 4898-4303<br /> Cell: 48 4389-4393<br />
                                            </p>
                                            <br>
                                            <p>
                                                Email: hello@dashiotheme.com<br /> Skype: UseDashio<br /> Website: http://Alvarez.is
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /col-md-6 -->
                                </div>
                                <!-- /row -->
                            </div>
                            <!-- /tab-pane -->
                            <div id="edit" class="tab-pane">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2 detailed">
                                        <h4 class="mb">Personal Information</h4>
                                        <form role="form" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label"> Avatar</label>
                                                <div class="col-lg-6">
                                                    <input type="file" id="exampleInputFile" class="file-pos">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Company</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="c-name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Lives In</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="lives-in" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Country</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="country" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Description</label>
                                                <div class="col-lg-10">
                                                    <textarea rows="10" cols="30" class="form-control" id="" name=""></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-8 col-lg-offset-2 detailed mt">
                                        <h4 class="mb">Contact Information</h4>
                                        <form role="form" class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Address 1</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="addr1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Address 2</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="addr2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Phone</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="phone" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Cell</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="cell" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Email</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Skype</label>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder=" " id="skype" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button class="btn btn-theme" type="submit">Save</button>
                                                    <button class="btn btn-theme04" type="button">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /col-lg-8 -->
                                </div>
                                <!-- /row -->
                            </div>
                            <!-- /tab-pane -->
                        </div>
                        <!-- /tab-content -->
                    </div>
                    <!-- /panel-body -->
                </div>
                <!-- /col-lg-12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </section>
    <!-- /wrapper -->
</section>

<script src="<?= base_url() ?>js/anggota.js"></script>
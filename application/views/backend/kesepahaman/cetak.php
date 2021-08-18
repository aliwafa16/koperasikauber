<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KESEPAHAMAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="font-family: times-new-roman; margin-left: 1cm; margin-right: 1cm;">

    <!-- START KOP SURAT -->
    <div class="container">
        <div class="row">
            <center>
                <div class="col-12">
                    <font face="Times New Roman, Times, serif" style="font-weight: bold; text-align:center;">
                        <font size="5">KESEPAHAMAN KERJASAMA <br></font>
                        <font size="3">ANTARA <br> KETUA KOPERASI <br> DENGAN <br> <?= strtoupper($nama_anggota)  ?> <br> PENGUSAHA ANGKUTAN </font><br><br>
                        <font size="5">TENTANG <br></font>
                        <font size="3">KEANGGOTAAN KOPERASI DAN OPERASIONAL KENDARAAN ANGKOT</font>
                    </font>
                </div>
                <font size="3">Nomor : <?= $no_kesepahaman ?></font>
            </center>
        </div>
    </div>
    <?php $hari = explode(',', $tanggal_kesepahaman) ?>
    <div class="col-6" style="line-height: 30px;">Pada Hari ini,<?= $hari[0] ?> tanggal <?= $hari[1] ?> Yang bertanda tangan dibawah ini:</div>

    <table class="table table-borderless" width=900 style="text-align: justify;" border="0" cellpadding="5" cellspacing="10" bgcolor="white">
        <tbody>
            <tr>
                <td>1</td>
                <td>Parid Wahdi,S.H </td>
                <td>:</td>
                <td>Ketua Koperasi Jasa Angkutan Usaha Bersama (KAUBER) Beralamat di Jalan Raya Tajur BLK 54 Bogor, Bertindak untuk dan atas nama Koperasi selanjutnya disebut sebagai PIHAK KESATU.</td>
            </tr>
            <tr>
                <td>2</td>
                <td><?= strtoupper($nama_anggota) ?></td>
                <td>:</td>
                <td>pemilik/PENGUSAHA ANGKUTAN BERALAMAT di: <br>
                    <?= $alamat ?> <br>
                    bertindak untuk dan atas nama sendiri selanjutnya disebut PIHAK KEDUA</td>
            </tr>
        </tbody>
    </table>
    <!-- END KOP SURAT -->
    <!-- START TABLE UNDANG -->

    <div class="col-6">Berdasarkan :</div>
    <table class="table table-borderless" width=900 style="text-align: justify;" border="0" cellpadding="5" cellspacing="5" bgcolor="white">
        <tbody>
            <tr>
                <td>1.</td>
                <td>Undang Undang No 22 Tahun 2009 Tentang Lalu Lintas dan Angkutan Jalan;</td>
            </tr>

            <tr>
                <td>2.</td>
                <td>PP NO 74 Tahun 2014;</td>
            </tr>

            <tr>
                <td>3.</td>
                <td>PERDA Provinsi Jawa Barat No.3 Tahun 2011;</td>
            </tr>

            <tr>
                <td>4.</td>
                <td>Surat Edaran Sekda Provinsi Jawa Barat No. 551.2/18/Dishub tentang Peralihan Penyedia Jasa Angkutan Penumpang Umum Perseorangan menjadi badan hukum;</td>
            </tr>

            <tr>
                <td>5.</td>
                <td>Surat Kepala Dinas Perhubungan Provinsi Jawa Barat No. 551.21/850/KD-SEKRE/T.DAT Tanggal 12 Agustus 2014 Hal. Pengendalian Perizinan Angkutan Penumpang Umum;</td>
            </tr>

            <tr>
                <td>6.</td>
                <td>Peraturan Daerah Kota Bogor No 3 Tahun 2013 Tentang Penyelenggaraan Lalu Lintas dan Angkutan Jalan;</td>
            </tr>

            <tr>
                <td>7.</td>
                <td>Perwali No.17 Tahun 2012 tentang Penyelengaraan Sistem Angkutan Umum Masal;</td>
            </tr>

            <tr>
                <td>8.</td>
                <td>Surat Edaran Walikota Bogor Nomor 551.21/124 – DLLAJ Tanggal 17 Januari 2014 Tentang Peralihan Penyedia Jasa Angkutan Penumpang Umum Perseorangan Menjadi Badan Hukum;</td>
            </tr>
        </tbody>
    </table>
    <!-- END SURAT UNDANG -->
    <div class="col-12" style="text-align: justify;">
        <p>Para pihak menerangkan terlebih dahulu, <br>Bahwa dalam rangka melaksanakan ketentuan UU No 22 Tahun 2009 berkaitan kepengusahaan jasa angkutan umum wajib berbadan hukum, antara pengusaha perseorangan dan pengelola badan usaha berbadan hukum (KOPERASI) diperlukan adanya kesepahaman dalam pengelolaan angkutan kota. Berdasarkan pertimbangan tersebut, maka PIHAK KESATU dan PIHAK KEDUA bertindak dalam jabatanya masing-masing sepakat untuk mengadakan kesepahaman kerjasama dengan ketentuan dan syarat </p>
    </div>
    <!-- START BAB UNDANG-UNDANG -->
    <!-- BAB 1 -->
    <center>
        <div class="col-12">
            <h6> BAB I</h6>
        </div>
        <div class="col-12">
            <p>Maksud dan Tujuan <br> Pasal 1</p>
        </div>
    </center>

    <div class="col-12" style="text-align: justify;">Maksud dan tujuan kesepahaman kerja sama ini adalah untuk mewujudkan ketentuan sebagaimana dimaksud Pasal 139 ayat (4) Undang Undang No 22 Tahun 2009 tentang Lalu Lintas dan Angkutan Jalan bahwa, “Penyediaan jasa angkutan umum dilaksanakan oleh badan usaha milik negara, badan usaha milik daerah, dan/atau badan hukum lain sesuai dengan ketentuan perundang-undangan“. <br>
        Disamping dapat memberi manfaat bagi PIHAK KESATU maupun PIHAK KEDUA dalam keberlangsungan pengelolaan usaha dibidang Jasa angkutan umum.</div>

    <div class="w-100"></div>
    <!-- BAB 2 -->
    <center>
        <div class="col-12" style="margin-top: 10px;">
            <h6> BAB II</h6>
        </div>
        <div class="col-12">
            <p>Obyek <br> Pasal 2</p>
        </div>
    </center>
    <div class="col-12" style="text-align: justify;">Obyek Kesepahaman Kerja Sama adalah pengelolaan angkutan kota / AKDP / Perkotaan / Angkutan Barang oleh badan usaha berbadan hukum (Koperasi). </div>

    <!-- BAB III -->
    <center>
        <div class="col-12" style="margin-top: 10px;">
            <h6> BAB III</h6>
        </div>
        <div class="col-12">
            <p>PENGELOLAAN ANGKUTAN KOTA BERBADAN HUKUM <br> Pasal 3</p>
        </div>
    </center>
    <div class="col-12" style="text-align: justify;">Dalam pelaksanaan pengelolaan angkutan Umum oleh badan usaha berbadan hukum sebagaimana dimaksud dalam pasal 2, masing-masing pihak mempunyai hak dan kewajiban sebagai berikut : <br><br>PIHAK KESATU dan PIHAK KEDUA mempunyai hak dan kewajiban sebagai berikut : </div>

    <table class="table table-borderless" width=900 style="text-align: justify;" border="0" cellpadding="5" cellspacing="10" bgcolor="white">
        <tbody>
            <tr>
                <td>1.</td>
                <td>Kepemilikan kendaraan angkutan umum adalah kepemilikan pengusaha sendiri ( PIHAK KEDUA ) yang dititipkan kepengusahaannya melalui koperasi dengan dan atas nama koperasi;</td>
            </tr>

            <tr>
                <td>2.</td>
                <td>Tanggung jawab dalam hal pembiayaan pengurusan perizinan Surat-surat menjadi tanggung jawab PIHAK KEDUA</td>
            </tr>

            <tr>
                <td>3.</td>
                <td>PIHAK KESATU bersedia berpartisipasi serta mendukung terhadap program PIHAK KEDUA dalam hal rencana; sewa penyediaan sarana dan prasarana operasional kendaraan (pool/garasi dan bengkel)</td>
            </tr>

            <tr>
                <td>4.</td>
                <td>Dalam hal usia kendaraan dan wajib peremajaan, PIHAK KEDUA berkewajiban untuk meremajakan kendaraan sesuai ketentuan perundang-undangan yang berlaku dan dilaksanakan melalui / oleh PIHAK KESATU.</td>
            </tr>

            <tr>
                <td>5.</td>
                <td>PIHAK KEDUA bertanggung jawab tentang pengadaan pengemudi / Supir dan dalam sistim pengupahan;</td>
            </tr>

            <tr>
                <td>6.</td>
                <td>PIHAK KESATU dan PIHAK KEDUA berkewajiban melaksanakan pembinaan terhadap pengemudi;</td>
            </tr>

            <tr>
                <td>7.</td>
                <td>PIHAK KEDUA mempunyai hak penuh untuk menjual, menjaminkan kepemilikan kendaraannya kepada PIHAK KETIGA.</td>
            </tr>
        </tbody>
    </table>

    <!-- PASAL 4 -->

    <center>
        <div class="col-6" style="margin-top: 10px; margin-bottom:5px;">Pasal 4</div>
    </center>

    <div class="col-12">Sistim pengelolaan sebagaimana pasal 3 diberlakukan setelah ketentuan dasar keanggotaan koperasi terpenuhi meliputi : </div>
    <div class="row">
        <div class="col-auto">A.</div>
        <div class="col-auto">Mendaftarkan diri menjadi anggota Koperasi;</div>
        <div class="w-100"></div>


        <div class="col-auto">B.</div>
        <div class="col-auto">Membayar Simpanan Pokok Koperasi;</div>

        <div class="w-100"></div>

        <div class="col-auto">C.</div>
        <div class="col-auto">Membayar Simpanan Wajib setiap bulan per kendaraan</div>
    </div>

    <!-- PASAL 5 -->

    <center>
        <div class="col-6" style="margin-top: 10px; margin-bottom:5px;">Pasal 5</div>
    </center>
    <div class="row">
        <div class="col-auto">(1)</div>
        <div class="col-11" style="text-align: justify;">Pelaksanaan sistim pengelolaan angkutan Umum berbadan hukum sebagaimana dimaksud pasal 3 akan dilaksanakan setelah ditandatanganinya kesepahaman kerja sama ini;</div>
        <div class="w-100"></div>
        <div class="col-auto">(2)</div>
        <div class="col-11" style="text-align: justify;">Setiap proses penambahan armada disesuaikan dengan ketentuan sebagaimana tercantum dalam pasal 3 dan harus diketahui oleh kedua belah pihak</div>
    </div>

    <!-- BAB IV -->

    <center>
        <div class="col-12" style="margin-top: 10px;">
            <h6> BAB IV</h6>
        </div>
        <div class="col-12">
            <p>PENGAWASAN <br> Pasal 6</p>
        </div>
    </center>

    <div class="row">
        <div class="col-auto">(1)</div>
        <div class="col-11" style="text-align: justify;">
            Evaluasi sistim pengelolaan angkutan Umum sebagaimana dimaksud dalam pasal 3 dan pasal 4 dilaksanakan sekurang-kurangnya sekali dalam satu tahun, yang pelaksanaanya dilakukan oleh PIHAK KESATU dan PIHAK KEDUA;</div>
        <div class="w-100"></div>
        <div class="col-auto">(2)</div>
        <div class="col-11" style="text-align: justify;">Petugas lapangan dari PIHAK KESATU dan PIHAK KEDUA atau secara bersama-sama (gabungan) melakukan pengawasan operasional kendaraan angkutan kota pada tiap trayek.</div>
    </div>

    <!-- BAB V -->

    <center>
        <div class="col-12" style="margin-top: 10px;">
            <h6> BAB V</h6>
        </div>
        <div class="col-12">
            <p>PEMBIAYAAN <br> Pasal 7</p>
        </div>
    </center>
    <div class="col-12" style="text-align: justify;">Segala biaya yang timbul berkenaan dengan pelaksanaan operasional, Administrasi dan sistim pengelolaan angkutan umum dalam kesepahaman kerja sama ini dibebankan pada para pihak. </div>

    <!-- BAB VI -->
    <center>
        <div class="col-12" style="margin-top: 10px;">
            <h6> BAB VI</h6>
        </div>
        <div class="col-12">
            <p>PERSELISIHAN <br> Pasal 8</p>
        </div>
    </center>
    <div class="col-12" style="text-align: justify;">Dalam hal terjadi perselisihan dalam menafsirkan dan atau dalam melaksanakan isi kesepahaman kerja sama ini, maka kedua belah pihak sepakat untuk menyelesaikannya secara musyawarah untuk mufakat. </div>


    <center>
        <div class="col-12" style="margin-top: 10px;">
            <p>JANGKA WAKTU <br> Pasal 9</p>
        </div>
    </center>
    <div class="col-12" style="text-align:justify">Kesepahaman kerjasama ini berlaku sejak ditandatanganinya kesepahaman ini hingga berakhirnya masa berlaku izin penyelenggaraan dan dapat diperpanjang atau diakhiri berdasarkan kesepakatan kedua belah pihak. </div>

    <center>
        <div class="col-12" style="margin-top: 10px;">
            <h6> BAB V</h6>
        </div>
        <div class="col-12">
            <p>KETENTUAN PENUTUP <br> Pasal 10</p>
        </div>
    </center>

    <div class="row">
        <div class="col-auto">(1)</div>
        <div class="col-11" style="text-align: justify;">
            Kesepahaman Kerja Sama ini berlaku setelah ditandatanganinya oleh PIHAK KESATU dan PIHAK KEDUA;</div>
        <div class="w-100"></div>
        <div class="col-auto">(2)</div>
        <div class="col-11" style="text-align: justify;">Hal-hal yang tidak atau belum cukup diatur dalam Kesepahaman Kerja Sama ini akan diatur kemudian oleh PIHAK KESATU dan PIHAK KEDUA.</div>
        <div class="w-100"></div>
    </div>

    <div class="col-12" style="text-align: justify; margin-top:10px">Demikian Kesepahaman Kerja Sama ini dibuat dan ditandatanganinya oleh PIHAK KESATU dan PIHAK KEDUA di Bogor pada hari dan tanggal tersebut diatas dalam rangkap 2 (dua) Asli bermaterai cukup dan mempunyai kekuatan hukum yang sama disimpan oleh masing-masing pihak.</div>
    <div class="row" style="justify-content: space-between;margin-top:3cm">
        <div class="col-4">
            <p style="text-align: center;">PIHAK KEDUA<br>PENGUSAHA ANGKUTAN</p>
            <div class="row">
                <p style="text-align: center; margin-top:3cm"><b><u><?= strtoupper($nama_anggota) ?></u></b></p>
            </div>
        </div>
        <div class="col-6">
            <p style="text-align: center;">PIHAK KESATU<br>KETUA KOPERASI JASA ANGKUTAN USAHA BERSAMA "KAUBER"</p>
            <div class="row">
                <p style="text-align: center; margin-top:90px"><b><u>PARID WAHDI S.H</u></b></p>
            </div>
        </div>
    </div>
    <!-- <div class="position-relative">
        <div class="position-absolute bottom start-50 translate-middle-x" style="margin-top: 50px;">
            <table cellpadding="5" cellspacing="10">
                <tbody>
                    <td width="250" valign="top" style="text-align:center; position:relative; right:170px;">PIHAK KEDUA<br>PENGUSAHA ANGKUTAN<br><br><br><br><br>
                        <b><u><?= strtoupper($nama_anggota) ?></u></b><br>
                    </td>
                    <td width="200" valign="top" style="text-align:center; position:relative; left:150px;">PIHAK KESATU<br>KETUA KOPERASI JASA ANGKUTAN USAHA BERSAMA "KAUBER"<br><br><br>
                        <b><u>PARID WAHDI SH</u></b><br>
                    </td>
                </tbody>
            </table>
        </div>
    </div> -->
    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
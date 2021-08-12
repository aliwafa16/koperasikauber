<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/backend/assets/css/') ?>style.css">
    <style>
        hr {
            display: block;
            border-color: black;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
            width: 100%;
            opacity: .95;
        }
    </style>
</head>



<body>
    <center>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-2">
                    <img src="<?= base_url('assets/backend/assets/img/cetak/') ?>/koperasi.png" class="rounded float-start" style="width:110px;">
                </div>
                <div class="col">
                    <font face="Times New Roman, Times, serif">
                        <font size="4" style="font-weight: bolder;">KOPERASI JASA ANGKUTAN USAHA BERSAMA</font> <br>
                        <font size="6" style="font-weight: bolder;">"KAUBER"</font><br>
                        <font size="3" style="font-weight: bolder;">Nomor Badan Hukum : 54/BH/PAD/XIII.5/KOP, 08 Juli 2015</font><br>
                        <font size="3" style="font-weight: bolder;">Jl. Raya Tajur BLK No. 54 RT. 001/004 Kel. Pakuan Kec. Bogor Selatan</font><br>
                        <font size="3" style="font-weight: bolder;">Telp. 0251 - 7557156 - 8222364 Fax : 0251 – 8335623 Email: kop_kauber@yahoo.com</font><br>
                    </font>
                </div>
                <div class="col-2">
                    <img src="<?= base_url('assets/backend/assets/img/cetak/') ?>/logo.png" class="rounded float-end" style="width:140px;">
                </div>
                <hr>
            </div>

            <div class="row">
                <font face="Times New Roman, Times, serif">
                    <font size="5" style="font-weight: bold; line-height: 50px;"><u>SURAT KETERANGAN KEPEMILIKAN KENDARAAN</u></font><br>
                </font>
            </div>

            <table class="table1" width="900" style="margin-bottom: 10px;" border="0" cellpadding="5" cellspacing="5" bgcolor="white">
                <tbody>
                    <tr>
                        <td align="center"> <span class="#">Nomor : <?= $no_skkk ?></span></td>
                    </tr>
                </tbody>
            </table>
    </center>
    <div class="row" style="margin-left: 35px;">
        <div class="col-auto"><b>Sesuai Kepemahaman </b>:
        </div>
        <div class="col-1"><?= $no_kesepahaman ?></div>

        <div class="w-100"></div>
    </div>
    <div class="row">
        <div class="col-12" style="margin-left:44px ;">
            <p><b>Yang telah ditandatangani, dengan ini Koperasi Jasa Angkutan Usaha Bersama KAUBER menerangkan :</b></p>
        </div>
    </div>


    <table style="margin-left:55px ;" width="900" border="0" cellpadding="5" cellspacing="5" bgcolor="white" style="margin-left: 42px; ">
        <tbody>
            <tr>
                <td>
                    Nama
                </td>
                <td>:</td>
                <td style="font-weight: bold;">
                    <?= $nama_anggota ?>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td>:</td>
                <td>
                    <?= $alamat ?>
                </td>
            </tr>

            <tr>
                <td>
                    NIK
                </td>
                <td>:</td>
                <td>
                    <?= $nik_anggota ?>
                </td>
            </tr>
        </tbody>
    </table>


    <div class="row" style="margin-left:35px; margin-bottom:15px; margin-top:15px">
        <div class="col-6">Selaku pemegang Hak dan Pemilik Kendaraan :</div>
    </div>

    <table class="table table-bordered" style="text-align: center; margin-left:50px">
        <thead>
            <tr>
                <th>No.Kendaraan</th>
                <th>Merk/Type</th>
                <th>No.Rangka</th>
                <th>No.Mesin</th>
                <th>Warna</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $nomor_kendaraan ?></td>
                <td><?= $merk_type ?></td>
                <td><?= $no_rangka ?></td>
                <td><?= $no_mesin ?></td>
                <td><?= $warna ?></td>
            </tr>
        </tbody>
    </table>

    <div class="row" style="margin-left:35px">
        <div class="col-12">
            <p>Surat Keterangan ini berlaku selama kendaraan belum diperjualbelikan kepada pihak lain. Demikian surat keterangan ini untuk diketahui dan kepada yang berkepentingan agar maklum.</p>
        </div>
    </div>
    <table style="margin-top: 80px;">
        <tbody>
            <td width="150" valign="top" style="text-align:center; position:absolute; left:700px">Bogor, <?= $tanggal ?> <br><br><br>
                <b><u>PARID WAHDI., S.I</u></b><br>Ketua
            </td>
        </tbody>
    </table>
    </table>
    </div>
</body>

<script>
    window.print();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
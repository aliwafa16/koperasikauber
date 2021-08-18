 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

 <body style="font-family: time-new-roman;">
     <!-- START KOP SURAT -->
     <center>
         <div class="container">
             <div class="row align-items-start">
                 <div class="col-2">
                     <img src="<?= base_url('assets/backend/assets/img/cetak/') ?>koperasi.png" class="rounded float-start" style="width:110px;">
                 </div>
                 <div class="col">
                     <font face="Times New Roman, Times, serif">
                         <font size="4" style="font-weight: bolder;">KOPERASI JASA ANGKUTAN USAHA BERSAMA</font> <br>
                         <font size="6" style="font-weight: bolder;">"KAUBER"</font><br>
                         <font size="3" style="font-weight: bolder;">Nomor Badan Hukum : 54/BH/XIII.5/KanKop, 29 April 2013</font><br>
                         <font size="3" style="font-weight: bolder;">Jl. Raya Tajur BLK No. 54 RT. 001/004 Kel. Pakuan Kec. Bogor Selatan</font><br>
                         <font size="3" style="font-weight: bolder;">Telp. 0251 - 7557156 - 8222364 Fax : 0251 – 8335623 Email: kop_kauber@yahoo.com</font><br>
                         <hr>
                         <font size="5" style="font-weight: bold; line-height: 50px;"><u>SURAT KETERANGAN KEPELEPASAN HAK</u></font><br>
                     </font>
                 </div>
                 <div class="col-2">
                     <img src="<?= base_url('assets/backend/assets/img/cetak/') ?>logo.png" class="rounded float-end" style="width:140px;">
                 </div>
             </div>
         </div>
         <table class="table1" width="900" border="0" cellpadding="5" cellspacing="5" bgcolor="white">
             <tbody>
                 <tr>
                     <td align="center"> <span class="#">Nomor : <?= $no_pelepasan_hak ?></span> </td>
                 </tr>
             </tbody>
         </table>
     </center>
     <!-- END KOP SURAT -->

     <!-- START ISI SURAT -->
     <div class="row">
         <div class="col-12 col-lm-7" style="margin-left:44px ;">Yang bertandatangan di bawah ini kami Pengurus KOPERASI JASA ANGKUTAN USAHA BERSAMA <b><i>"KAUBER"</i></b> :</div>
     </div>

     <!-- START HAK MILIK -->
     <table style="margin-left:55px ;" width="800px" border="0" cellpadding="5" cellspacing="5" bgcolor="white" style="margin-left: 42px; ">
         <tbody>
             <tr>
                 <td>No.Polisi</td>
                 <td>:</td>
                 <td><?= $nomor_kendaraan ?></td>
             </tr>
             <tr>
                 <td>Nama Pemilik</td>
                 <td>:</td>
                 <td>KOPERASI KAUBER</td>
             </tr>
             <tr>
                 <td>ALAMAT</td>
                 <td>:</td>
                 <td>FJl. RAYA TAJUR NO.54 RT.001 RW.004 PAKUAN BOGOR SELATAN</td>
             </tr>
             <tr>
                 <td>Merk / Type</td>
                 <td>:</td>
                 <td><?= $merk_type ?> / <?= $tahun ?></td>
             </tr>
             <tr>
                 <td>Jenis</td>
                 <td>:</td>
                 <td><?= $jenis ?></td>
             </tr>
             <tr>
                 <td>Model</td>
                 <td>:</td>
                 <td><?= $model ?></td>
             </tr>
             <tr>
                 <td>Tahun Pembuatan</td>
                 <td>:</td>
                 <td><?= $tahun ?></td>
             </tr>
             <tr>
                 <td>Isi Silinder</td>
                 <td>:</td>
                 <td><?= $isi_silinder ?> CC</td>
             </tr>
             <tr>
                 <td>Warna</td>
                 <td>:</td>
                 <td><?= $warna ?></td>
             </tr>
             <tr>
                 <td>No.Rangka</td>
                 <td>:</td>
                 <td><?= $no_rangka ?></td>
             </tr>
             <tr>
                 <td>No.Mesin</td>
                 <td>:</td>
                 <td><?= $no_mesin ?></td>
             </tr>
             <tr>
                 <td>No.BPKB</td>
                 <td>:</td>
                 <td>-</td>
             </tr>
             <tr>
                 <td>Jurusan / Trayek</td>
                 <td>:</td>
                 <td><?= $trayek ?></td>
             </tr>
             <tr>
                 <td>No/Kode/Trayek</td>
                 <td>:</td>
                 <td><?= $nama_trayek ?></td>
             </tr>
         </tbody>
     </table>
     <!-- END HAK MILIK -->
     <div class="col-8 col-lm-7" style="margin-left:44px ; line-height:30px">Telah dipindah tangankan / dilepas hak kepemilikannya kepada :</div>

     <!-- START PINDAH HAK -->
     <table style="margin-left:55px ;" width="350" border="0" cellpadding="5" cellspacing="5" bgcolor="white" style="margin-left: 42px; ">
         <tbody>
             <tr>
                 <td>Nama</td>
                 <td>:</td>
                 <td><?= $nama_baru ?></td>
             </tr>
             <tr>
                 <td>Tempat & Tgl Lahir</td>
                 <td>:</td>
                 <td><?= $tempat_baru ?>, <?= $tanggal_lahir_baru ?></td>
             </tr>
             <tr>
                 <td>Alamat</td>
                 <td>:</td>
                 <td><?= $alamat_baru ?></td>
             </tr>
             <tr>
                 <td>NIK</td>
                 <td>:</td>
                 <td><?= $nik_baru ?></td>
             </tr>
         </tbody>
     </table>
     <!-- END PINDAH HAK -->
     <div class="col-12 col-lm-7" style="margin-left:44px ; line-height:30px">Demikian surat pelepasan hak ini dibuat dengan sebenarnya dan agar dipergunakan seperlunya</div><br>
     <!-- END ISI SURAT -->

     <!-- TANDA TANGAN -->
     <?php $tanggal = explode(',', $tanggal_skph) ?>
     <table>
         <tbody>
             <td width="150" valign="top" style="text-align:center; position:absolute; left:500px">Bogor, <?= $tanggal[1] ?> <br><br><br>
                 <b><u>YADI INDRA MULYADI</u></b><br>Sekretaris
             </td>
             <td width="150" valign="top" style="text-align:center; position:absolute; left:250px">Bogor, <?= $tanggal[1] ?> <br><br><br>
                 <b><u>PARID WAHDI.SI</u></b><br>Ketua
             </td>
         </tbody>
     </table>

     <script>
         window.print();
     </script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>

 </html>
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>SIAKAD STAK-RRI | Cetak Nilai</title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/bootstrap/dist/css/bootstrap.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/font-awesome/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="<?= base_url() ?>/template/bower_components/Ionicons/css/ionicons.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/AdminLTE.min.css">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

      <style type="text/css" media="print">
        /* @page {size:landscape}  */   
        body {
        page-break-before: avoid;
        width:100%;
        height:100%;
        zoom: 100%    }
      </style>
    </head>

  <body onload="window.print();">
    <div class="wrapper">
      <section class="invoice">
        <div class="row">
          <div class="page-header">
            <table>
              <tr>
                  <th class="text-center" width="150px"><img src="<?= base_url() ?>/foto/stak-rri.png" width="85px" height="55px"></th>
                  <th></th>
                  <th></th>
                  <th class="text-center" width="950px"><b>SEKOLAH TINGGI AGAMA KRISTEN REFORMED REMNANT INTERNASIONAL <br>
                  Program Studi <?= $jadwal['nama_prodi'] ?></b></th>
              </tr>
            </table>            
          </div>
          <h4 class="text-center"><b>REKAP NILAI  MAHASISWA <?= $jadwal['nama_kelas'] ?> - <?= $jadwal['angkatan'] ?>/TA. <?= $ta['ta'] ?> (<?= $ta['semester'] ?>)</b></h4>
        </div>
        
        <br>

        <div class="row invoice-info">
          <div class="col-xs-3">
            <table class="table-striped table-responsive">
              <tr>
                  <td>Program Studi</td>
                  <td width="15px" class="text-center">:</td>
                  <td> <?= $jadwal['nama_prodi'] ?></td>
              </tr>
              <tr>
                  <td>Kode Mata Kuliah</td>
                  <td class="text-center">:</td>
                  <td><?= $jadwal['kode_makul'] ?></td>
              </tr>
              <tr>
                  <td>Mata Kuliah</td>
                  <td class="text-center">:</td>
                  <td><?= $jadwal['nama_makul'] ?></td>
              </tr>
            </table>
          </div>
        
          <div class="col-xs-3">
            <table class="table-striped table-responsive">
              <tr>
                  <td>Waktu</td>
                  <td width="15px" class="text-center">:</td>
                  <td><?= $jadwal['hari'] ?>, <?= $jadwal['waktu'] ?></td>
              </tr>
              <tr>
                  <td>Dosen</td>
                  <td class="text-center">:</td>
                  <td><?= $jadwal['nama_dosen'] ?></td>
              </tr>
            </table>
          </div>
        </div>
        
        <br>

        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped table-bordered table-responsive text-sm">
              <thead>
                <tr class="bg-purple">
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">NIM</th>
                    <th rowspan="2" class="text-center">Mahasiswa</th>
                    <th colspan="6" class="text-center">Nilai</th>
                </tr>
                <tr class="bg-purple">
                    <th class="text-center">Absensi <br> (15%)</th>
                    <th class="text-center" width="90px">Tugas <br> (15%)</th>
                    <th class="text-center" width="80px">UTS <br> (30%)</th>
                    <th class="text-center" width="80px">UAS <br> (40%)</th>
                    <th class="text-center">NA <br> (Total Keseluruhan)</th>
                    <th class="text-center">Huruf</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $no = 1;
                    foreach ($mhs as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['nim'] ?></td>
                        <td class="text-center"><?= $value['nama_mhs'] ?></td>
                        <td class="text-center">
                            <?php
                            $absensi = ($value['p1'] + 
                            $value['p2'] + 
                            $value['p3'] + 
                            $value['p4'] + 
                            $value['p5'] + 
                            $value['p6'] + 
                            $value['p7'] + 
                            $value['p8'] + 
                            $value['p9'] + 
                            $value['p10'] + 
                            $value['p11'] + 
                            $value['p12'] + 
                            $value['p13'] + 
                            $value['p14'] + 
                            $value['p15'] + 
                            $value['p16'] + 
                            $value['p17'] + 
                            $value['p18']) / 36 * 100; 
                            echo number_format($absensi, 0);
                            ?>
                        </td>
                        <td class="text-center"><?= $value['nilai_tugas'] ?></td>
                        <td class="text-center"><?= $value['nilai_uts'] ?></td>
                        <td class="text-center"><?= $value['nilai_uas'] ?></td>
                        <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                        <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                    </tr>
                    <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      
        <div class="row">
          <div class="col-sm-4 invoice-col text-center text-center">
          </div>
          <div class="col-sm-4 invoice-col text-center text-center">
          </div>
          <div class="col-sm-4 invoice-col text-center text-center">
            Surabaya, <?= date('d M Y') ?><br>
            Dosen Pengampu,<br>    
            <br>
            <br>
            <br>
            <?= $jadwal['nama_dosen'] ?>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>

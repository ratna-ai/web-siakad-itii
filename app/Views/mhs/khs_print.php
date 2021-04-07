<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>SIAKAD STAK-RRI | Cetak KHS</title>
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
    </head>

    <body onload="window.print();">
      <div class="wrapper">
        <section class="invoice">
          <div class="row">
            <div class="col-xs-12">
              <div class="page-header">
                <table>
                  <tr>
                      <th><img src="<?= base_url() ?>/foto/stak-rri.png" width="85px" height="55px"></th>
                      <th class="text-center" width="630px"><b>SEKOLAH TINGGI AGAMA KRISTEN <br> REFORMED REMNANT INTERNASIONAL</b></th>
                  </tr>
                  <tr class="text-center">
                      <td></td>
                      <td><b>Program Studi <?= $mhs['nama_prodi'] ?></b></td>
                  </tr>
                </table>            
              </div>
              <h4 class="text-center"><b>KARTU HASIL STUDI</b></h4>
            </div>
          </div>

          <div class="row invoice-info">
            <div class="col-sm-12">
              <table class="table-striped table-responsive">
                <tr>
                    <th width="150px">Nama</th>
                    <th width="10px">:</th>
                    <th><?= $mhs['nama_mhs'] ?></th>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?= $mhs['nim'] ?></td>
                </tr>
                <tr>
                    <td width="150px">Tahun Akademik</td>
                    <td width="20px">:</td>
                    <td><?= $ta_aktif['ta'] ?> - <?= $ta_aktif['semester'] ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td><?= $mhs['nama_prodi'] ?></td>
                </tr>
                <tr>
                    <td>Dosen PA</td>
                    <td>:</td>
                    <td><?= $mhs['nama_dosen'] ?></td>
                </tr>
              </table>
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr class="bg-purple">
                        <th>No</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>SMT</th>
                        <th>Nilai</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $sks = 0;
                    $grand_tot_bobot = 0;
                    foreach ($data_makul as $key => $value) { 
                        $sks = $sks + $value['sks'];
                        $tot_bobot = $value['sks'] * $value['bobot'];
                        $grand_tot_bobot = $grand_tot_bobot + $tot_bobot;      
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_makul'] ?></td>
                        <td><?= $value['nama_makul'] ?></td>
                        <td><?= $value['sks'] ?></td>
                        <td><?= $value['smt'] ?></td>
                        <td><?= $value['nilai_huruf'] ?></td>
                        <td><?= $value['bobot'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
                <h5><b>Jumlah SKS: <?= $sks ?></b></h5>
                <h5><b>IP: <?php if (empty($data_makul)) {
                    echo 0;
                } else {
                    echo number_format($grand_tot_bobot / $sks,2);
                } ?></b></h5>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4 invoice-col text-center">        
            </div>
            <div class="col-sm-4 invoice-col text-center">
              <br>
              KA Prodi,<br>
              <br>
              <br>
              <br>
              <?= $mhs['kaprodi'] ?>
            </div>
            <div class="col-sm-4 invoice-col text-center">
              Surabaya, <?= date('d M Y') ?><br>
              Dosen Pembimbing Akademik,<br>    
              <br>
              <br>
              <br>
              <?= $mhs['nama_dosen'] ?>
            </div>
          </div>
        </section>
      </div>
    </body>
  </html>

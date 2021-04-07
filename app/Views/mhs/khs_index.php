<section class="content-header">
  <h1>
      <p class="text-center"><b><?= $title ?></b></p>
      <p class="text-center"><b>Tahun Akademik: <?= $ta_aktif['ta'] ?> - <?= $ta_aktif['semester'] ?></b></p>
  </h1>
  <h1> </h1>
</section>

<div class="row">
    <div class="col-md-12">            
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table-bordered table-striped table-responsive">
                <tr>
                    <th rowspan="7"><img src="<?= base_url('fotomhs/'.$mhs['foto_mhs']) ?>" width="120px" height="170px"></th>
                    <th width="150px">Tahun Akademik</th>
                    <th width="20px">:</th>
                    <th><?= $ta_aktif['ta'] ?> - <?= $ta_aktif['semester'] ?></th>
                    <th rowspan="7"></th>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><?= $mhs['nim'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $mhs['nama_mhs'] ?></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td><?= $mhs['nama_prodi'] ?></td>
                </tr>
                <tr>
                    <td>Nama Kelas</td>
                    <td>:</td>
                    <td><?= $mhs['nama_kelas'] ?> / <?= $mhs['angkatan'] ?></td>
                </tr>
                <tr>
                    <td>Dosen PA</td>
                    <td>:</td>
                    <td><?= $mhs['nama_dosen'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box-body">
            <a href="<?= base_url('mhs/print_khs') ?>" target="_blank" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-print"> Cetak KHS</i></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="box-body">
            <?php 
            if (session()->getFlashdata('pesan')) {
            echo  '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
            } ?>
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
</div>
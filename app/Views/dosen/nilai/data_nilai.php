<section class="content-header">
  <h1>
        <?= $title ?> Kelas: <br>
        <?= $jadwal['nama_kelas'] ?> - <?= $jadwal['angkatan'] ?>/TA. <?= $ta['ta'] ?> (<?= $ta['semester'] ?>)
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dsn/NilaiMahasiswa') ?>"><i class="fa fa-dashboard"></i> Nilai Mhs</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<div class="row">
    <div class="col-md-12">            
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table-bordered table-striped table-responsive">
                <tr>
                    <td>Program Studi</td>
                    <td width="15px" class="text-center">:</td>
                    <td><?= $jadwal['nama_prodi'] ?></td>
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
                <tr>
                    <td>Waktu</td>
                    <td class="text-center">:</td>
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
    <div class="col-md-12">
        <div class="box-body">
            <a href="<?= base_url('dsn/PrintNilai/' . $jadwal['id_jadwal']) ?>" target="_blank" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-print"> Cetak Nilai</i></a>
        </div>
    </div>
    <div class="col-md-12">
        <?php 
        if (session()->getFlashdata('pesan')) {
            echo  '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        } ?>
        <div class="box-body">
            <?php echo form_open('dsn/SimpanNilai/'.$jadwal['id_jadwal']) ?>
            <table class="table table-striped table-bordered table-responsive text-sm">
                <thead>
                    <tr class="bg-purple">
                        <th rowspan="2" class="text-center">No</th>
                        <th rowspan="2" class="text-center">NIM</th>
                        <th rowspan="2" class="text-center">Mahasiswa</th>
                        <th colspan="7" class="text-center">Nilai</th>
                    </tr>
                    <tr class="bg-purple">
                        <th class="text-center">Absensi (15%)</th>
                        <th class="text-center" width="90px">Tugas (15%)</th>
                        <th class="text-center" width="80px">UTS (30%)</th>
                        <th class="text-center" width="80px">UAS (40%)</th>
                        <th class="text-center">NA <br> (Total Keseluruhan)</th>
                        <th class="text-center">Huruf</th>
                        <th class="text-center">Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($mhs as $key => $value) { 
                        echo form_hidden($value['id_krs'] . 'id_krs', $value['id_krs']); ?>
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
                            echo form_hidden($value['id_krs'] . 'absen', number_format($absensi, 0));
                            ?>
                        </td>
                        <td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_tugas" value="<?= $value['nilai_tugas'] ?>" class="form-control"></td>
                        <td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_uts" value="<?= $value['nilai_uts'] ?>" class="form-control"></td>
                        <td class="text-center"><input name="<?= $value['id_krs'] ?>nilai_uas" value="<?= $value['nilai_uas'] ?>" class="form-control"></td>
                        <td class="text-center"><?= $value['nilai_akhir'] ?></td>
                        <td class="text-center"><?= $value['nilai_huruf'] ?></td>
                        <td class="text-center"><?= $value['bobot'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button class="btn bg-green btn-flat btn-sm"><i class="fa fa-save"></i> Simpan dan Proses</button>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
    
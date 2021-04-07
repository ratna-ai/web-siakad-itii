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
        <div class="box-body text-right">
            <button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus"> Tambah Mata Kuliah</i></button>
            <a href="<?= base_url('krs/print') ?>" target="_blank" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-print"> Cetak KRS</i></a>
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
                        <th>Kelas</th>
                        <th>Dosen</th>
                        <th>Waktu</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $sks = 0;
                    foreach ($data_makul as $key => $value) { 
                        $sks = $sks + $value['sks']; ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_makul'] ?></td>
                        <td><?= $value['nama_makul'] ?></td>
                        <td><?= $value['sks'] ?></td>
                        <td><?= $value['smt'] ?></td>
                        <td><?= $value['nama_kelas'] ?> - <?= $value['angkatan'] ?></td>
                        <td><?= $value['nama_dosen'] ?></td>
                        <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_krs'] ?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h5>
             <b>Jumlah SKS: <?= $sks ?></b>
            </h5>
        </div>
    </div>
</div>

<!-- /.modal delete-->
<?php foreach ($data_makul as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_krs'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus <?= $title ?></h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus <b><?= $value['kode_makul'] ?> (<?= $value['nama_makul'] ?>)</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close"> Keluar</i></button>
        <a href="<?= base_url('krs/delete/'. $value['id_krs']) ?>" class="btn btn-success btn-flat"><i class="fa fa-trash"> Hapus?</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<!-- /.modal tambah makul-->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Daftar Mata Kuliah</h4>
            </div>
        <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped text-sm">
                <thead>
                    <tr class="bg-purple">
                        <th>No</th>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>SMT</th>
                        <th>Kelas</th>
                        <th>Dosen</th>
                        <th>Waktu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($pilih_makul as $key => $value) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['kode_makul'] ?></td>
                        <td>
                            <?= $value['nama_makul'] ?> (<?= $value['kode_prodi'] ?>)
                        </td>
                        <td><?= $value['sks'] ?></td>
                        <td><?= $value['smt'] ?></td>
                        <td><?= $value['nama_kelas'] ?> - <?= $value['angkatan'] ?></td>
                        <td><?= $value['nama_dosen'] ?></td>
                        <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('krs/tambah_makul/'.$value['id_jadwal']) ?>" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
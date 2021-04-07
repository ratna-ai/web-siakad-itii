<section class="content-header">
  <h1>
      <?= $title ?>
      <small><?= $prodi['nama_prodi'] ?></small>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('jadwalkuliah') ?>"><i class="fa fa-dashboard"></i> Daftar Jadwal Kuliah</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tr>
          <th width="150px">Program Studi</th>
          <td width="30px">:</td>
          <td><?= $prodi['nama_prodi'] ?></td>
        </tr>
        <tr>
          <th>Jenjang</th>
          <td>:</td>
          <td><?= $prodi['jenjang'] ?></td>
        </tr>
        <tr>
          <th>Tahun Akademik</th>
          <td>:</td>
          <td><?= $ta_aktif['ta'] ?> - <?= $ta_aktif['semester'] ?></td>
        </tr>
      </table>
    </div>
  </div>

<div class="row">
  <div class="col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title ?></h3>
        
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" data-target="#add">
            <i class="fa fa-plus"> Tambah Data</i>
          </button>
        </div>

      </div>

      <div class="box-body">
        <?php $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
          <div class="alert alert-danger" role="alert">
            <ul>
              <?php foreach ($errors as $ky => $value) { ?>
                <li><?= esc($value) ?></li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>

        <?php 
        if (session()->getFlashdata('pesan')) {
          echo  '<div class="alert alert-success" role="alert">';
          echo session()->getFlashdata('pesan');
          echo '</div>';
        } 
        ?>

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
              <th width="50px">No</th>
              <th width="70px">Semester</th>
              <th>Kode Mata Kuliah</th>
              <th>Mata Kuliah</th>
              <th>SKS</th>
              <th>Kelas</th>
              <th>Dosen Pengampu</th>
              <th>Hari</th>
              <th>waktu</th>
              <th width="50px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($jadwal as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['smt'] ?></td>
                    <td><?= $value['kode_makul'] ?></td>
                    <td><?= $value['nama_makul'] ?></td>
                    <td><?= $value['sks'] ?></td>
                    <td><?= $value['nama_kelas'] ?> - <?= $value['angkatan'] ?></td>
                    <td><?= $value['nama_dosen'] ?></td>
                    <td><?= $value['hari'] ?></td>
                    <td><?= $value['waktu'] ?></td>
                    <td class="text-center">
                      <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_jadwal'] ?>"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

<!-- /.modal tambah-->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah <?= $title ?></h4>
      </div>
      <div class="modal-body">
        <?php 
        echo form_open('jadwalkuliah/add/'.$prodi['id_prodi']); 
        ?>

        <div class="col-sm-12">
          <div class="form-group">
            <label>Mata Kuliah</label>
            <select name="id_makul" class="form-control">
                <option value="">---Pilih Mata Kuliah---</option>
                <?php foreach ($makul as $key => $value) { ?>
                  <?php if ($value['semester'] == $ta_aktif['semester']) { ?>
                    <option value="<?= $value['id_makul'] ?>"><?= $value['smt'] ?> | <?= $value['kode_makul'] ?> - <?= $value['nama_makul'] ?> (<?= $value['sks'] ?> SKS)</option>
                  <?php } ?>
                <?php } ?>
            </select>
          </div>
          </div>
          
          <div class="col-sm-12">
          <div class="form-group">
            <label>Dosen Pengampu</label>
            <select name="id_dosen" class="form-control">
              <option value="">---Pilih Dosen---</option>
              <?php foreach ($dosen as $key => $value) { ?>
                  <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
              <?php } ?>
            </select>
          </div>
          </div>

          <div class="col-sm-12">
          <div class="form-group">
            <label>Kelas</label>
            <select name="id_kelas" class="form-control">
                    <option value="">---Pilih Kelas---</option>
                    <?php foreach ($kelas as $key => $value) { ?>
                        <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?> - <?= $value['angkatan'] ?></option>
                    <?php } ?>
            </select>
          </div>
          </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>Hari</label>
                <select name="hari" class="form-control">
                    <option value="">---Pilih Hari---</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
            <label>Waktu</label>
            <input name="waktu" placeholder="Ex: 08.00 - 10.00" class="form-control">
            </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close"> Keluar</i></button>
        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"> Simpan</i></button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal delete-->
<?php foreach ($jadwal as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_jadwal'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus <?= $title ?></h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus <b><?= $value['kode_makul'] ?></b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close">Keluar</i></button>
        <a href="<?= base_url('jadwalkuliah/delete/'. $value['id_jadwal'].'/'.$prodi['id_prodi']) ?>" class="btn btn-success btn-flat"><i class="fa fa-trash"> Hapus?</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<?php foreach ($jadwal as $key => $value) { ?>
<div class="modal fade" id="delete_all<?= $value['id_jadwal'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus <?= $title ?></h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus <b>Semua data</b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close">Keluar</i></button>
        <a href="<?= base_url('jadwalkuliah/clearalldata/'. $value['id_jadwal'].'/'.$prodi['id_prodi']) ?>" class="btn btn-success btn-flat"><i class="fa fa-trash"> Hapus?</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<section class="content-header">
  <h1>
      <?= $title ?>
      <small><?= $prodi['nama_prodi'] ?></small>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('makul') ?>"><i class="fa fa-dashboard"></i> Daftar Mata Kuliah</a></li>
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
              <th>Kode</th>
              <th>Mata Kuliah</th>
              <th class="text-center">SKS</th>
              <th>Kategori</th>
              <th>Semester</th>
              <th width="50px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach ($makul as $key => $value) { ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['kode_makul'] ?></td>
            <td><?= $value['nama_makul'] ?></td>
            <td class="text-center"><?= $value['sks'] ?></td>
            <td><?= $value['kategori'] ?></td>
            <td><?= $value['smt'] ?> (<?= $value['semester'] ?>)</td>
            <td class="text-center">
            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_makul'] ?>"><i class="fa fa-trash"></i></button>
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
        <?php echo form_open('makul/add/'.$prodi['id_prodi']); ?>

          <div class="form-group">
            <label>Kode Mata Kuliah</label>
            <input name="kode_makul" class="form-control" placeholder="Kode Mata Kuliah"> </input>
          </div>
          
          <div class="form-group">
            <label>Mata Kuliah</label>
            <input name="nama_makul" class="form-control" placeholder="Mata Kuliah"> </input>
          </div>

          <div class="form-group">
            <label>SKS</label>
            <select name="sks" class="form-control">
              <option value="">---Pilih SKS---</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>

          <div class="form-group">
            <label>Semester</label>
            <select name="smt" class="form-control">
              <option value="">---Pilih Semester---</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
          </div>

          <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
              <option value="">---Pilih Kategori---</option>
              <option value="Wajib">Wajib</option>
              <option value="Pilihan">Pilihan</option>
            </select>
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
<?php foreach ($makul as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_makul'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus <?= $title ?></h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus <b><?= $value['nama_makul'] ?></b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close"> Keluar</i></button>
        <a href="<?= base_url('makul/delete/'. $prodi['id_prodi'].'/'. $value['id_makul']) ?>" class="btn btn-success btn-flat"><i class="fa fa-trash"> Hapus?</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->
<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data <?= $title ?></h3>
        
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" data-target="#add">
            <i class="fa fa-plus"> Tambah Data</i>
          </button>
        </div>
      
      <!-- /.box-tools -->
      </div>
  <!-- /.box-header -->
    <div class="box-body">

      <?php 
      if (session()->getFlashdata('pesan')) {
        echo  '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
      } ?>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th width="50px">No</th>
              <th>Tahun Akademik</th>
              <th>Semester</th>
              <th width="170px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($ta as $key => $value) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['ta'] ?></td>
            <td><?= $value['semester'] ?></td>
            <td  class="text-center">
              <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_ta'] ?>"><i class="fa fa-pencil"></i></button>
              <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_ta'] ?>"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
          <?php } ?>
       </tbody>
      </table>
    </div>
  </div>
</div>

<!-- /.modal tambah-->
<div class="modal fade" id="add">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah <?= $title ?></h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('ta/add'); ?>
          
          <div class="form-group">
            <label>Tahun Akademik</label>
            <input name="ta" class="form-control" placeholder="Tahun Akademik" required> </input>
          </div>

          <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control" placeholder="Semester" required> 
                <option value="">---Semester---</option>
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
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

<!-- /.modal edit-->
<?php foreach ($ta as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_ta'] ?>">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit <?= $title ?></h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('ta/edit/'. $value['id_ta']); ?>

          <div class="form-group">
            <label>Password</label>
            <input name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Tahun Akademik"> 
            </input>
          </div>

          <div class="form-group">
            <label>Semester</label>
            <select name="semester" value="<?= $value['semester'] ?>" class="form-control" placeholder="Semester" required> 
                <option value="Ganjil"<?php if ($value['semester'] == 'Ganjil') {
                    echo 'Selected';
                } ?>>Ganjil</option>
                <option value="Genap" <?php if ($value['semester'] == 'Genap') {
                    echo 'Selected';
                } ?>>Genap</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close"> Keluar</i></button>
        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"> Simpan Perubahan</i></button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->

<!-- /.modal delete-->
<?php foreach ($ta as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_ta'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus <?= $title ?></h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus <b><?= $value['ta'] ?></b> semester <b><?= $value['semester'] ?></b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close">Keluar</i></button>
        <a href="<?= base_url('ta/delete/'. $value['id_ta']) ?>" class="btn btn-success btn-flat"><i class="fa fa-trash"> Hapus?</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->
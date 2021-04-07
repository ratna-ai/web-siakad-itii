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
              <th>Jabatan</th>
              <th width="170px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($jabatan as $key => $value) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['nama_jabatan'] ?></td>
            <td  class="text-center">
              <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_jabatan'] ?>"><i class="fa fa-pencil"></i></button>
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
        <?php echo form_open('jabatan/add'); ?>
          
          <div class="form-group">
            <label>Jabatan</label>
            <input name="nama_jabatan" class="form-control" placeholder="Masukkan Jabatan" required> </input>
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
<?php foreach ($jabatan as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value['id_jabatan'] ?>">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit <?= $title ?></h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('jabatan/edit/'. $value['id_jabatan']); ?>

          <div class="form-group">
            <label>Jabatan</label>
            <input name="nama_jabatan" value="<?= $value['nama_jabatan'] ?>" class="form-control"> 
            </input>
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
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
          <a href="<?= base_url('dosen/add') ?>" class="btn btn-sm btn-primary btn-flat">
            <i class="fa fa-plus"> Tambah Data</i>
          </a>
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
      }

      ?>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th width="50px">No</th>
              <th>Kode Dosen</th>
              <th>NIDN</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Foto</th>
              <th width="170px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($dosen as $key => $value) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['kode_dosen'] ?></td>
            <td><?= $value['nidn'] ?></td>
            <td><?= $value['nama_dosen'] ?></td>
            <td><?= $value['nama_jabatan'] ?></td>
            <td><img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="70px" height="70px" class="img-circle"></td>
            <td class="text-center">
                <a href="<?= base_url('dosen/rincian/'.$value['id_dosen']) ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-search"></i></a>
                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_dosen'] ?>"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
          <?php } ?>
       </tbody>
      </table>
    </div>
  </div>
</div>

<!-- /.modal delete-->
<?php foreach ($dosen as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_dosen'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus <?= $title ?></h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus <b><?= $value['nama_dosen'] ?></b> dengan NIDN <b><?= $value['nidn'] ?></b>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close"> Keluar</i></button>
        <a href="<?= base_url('dosen/delete/'. $value['id_dosen']) ?>" class="btn btn-success btn-flat"><i class="fa fa-trash"> Hapus?</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->
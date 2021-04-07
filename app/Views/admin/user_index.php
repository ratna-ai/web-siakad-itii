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
      }

      ?>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th width="50px">No</th>
              <th>Nama User</th>
              <th>Username</th>
              <th>Password</th>
              <th>Foto</th>
              <th width="170px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($user as $key => $value) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['name_user'] ?></td>
            <td><?= $value['username'] ?></td>
            <td><?= $value['password'] ?></td>
            <td class="text-center"><img src="<?= base_url('foto/'.$value['foto']) ?>" width="70px" height="70px" class="img-circle"></td>
            <td>
              <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fa fa-pencil"></i></button>
              <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
          <?php } ?>
       </tbody>
      </table>
    </div>
  </div>
</div>
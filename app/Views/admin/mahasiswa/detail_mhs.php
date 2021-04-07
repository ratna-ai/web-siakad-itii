<section class="content-header">
  <h1>
      <?= $title ?>
      <small><?= $mhs['nama_mhs'] ?></small>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('mahasiswa') ?>"><i class="fa fa-dashboard"></i> Daftar Mahasiswa</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<?php 
  echo form_open_multipart('mahasiswa/rincian/'. $mhs['id_mhs']); 
?>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
  <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tr>
          <th width="150px">NIM</th>
          <td width="30px">:</td>
          <td><?= $mhs['nim'] ?></td>
        </tr>
        <tr>
          <th>Nama Mahasiswa</th>
          <td>:</td>
          <td><?= $mhs['nama_mhs'] ?></td>
        </tr>
      </table>
    </div>
  </div>

<div class="row">
  <div class="col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $mhs['nama_mhs'] ?></h3>
      </div>

      <div class="box-body">
        <?php $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
          <div class="alert alert-danger" role="alert">
            <ul>
              <?php foreach ($errors as $key => $value) { ?>
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

          <tr>
            <th>Program Studi</th>
            <td>:</td>
              <td value="<?= $mhs['id_prodi'] ?>"><?= $mhs['jenjang'] ?> - <?= $mhs['nama_prodi'] ?></td>
          </tr>

          <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td><?= $mhs['gender'] ?></td>
          </tr>

          <tr>
            <th>Tempat/Tanggal Lahir</th>
            <td>:</td>
            <td><?= $mhs['tmp_lahir'] ?>, <?= $mhs['tgl_lahir'] ?></td>
          </tr>

          <tr>
            <th>Alamat</th>
            <td>:</td>
            <td><?= $mhs['alamat'] ?></td>
          </tr>

          <tr>
            <th>Alamat E-Mail</th>
            <td>:</td>
            <td><?= $mhs['email'] ?></td>
          </tr>

          <tr>
            <th>Foto</th>
            <td>:</td>
            <td><img src="<?= base_url('fotomhs/'. $mhs['foto_mhs']) ?>" id="gambar_load" width="250px"></td>
          </tr>
      </table>
      <div class="modal-footer">
        <a href="<?= base_url('mahasiswa') ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-reply"> Kembali</i></a>
        <a href="<?= base_url('mahasiswa/edit/'.$mhs['id_mhs']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"> Edit Data</i></a>
      </div>
      <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
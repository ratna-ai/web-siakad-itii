<section class="content-header">
  <h1>
      <?= $title ?>
      <small><?= $dosen['nama_dosen'] ?></small>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dosen') ?>"><i class="fa fa-dashboard"></i> Daftar Dosen</a></li>
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
          <th width="150px">Kode Dosen</th>
          <td width="30px">:</td>
          <td><?= $dosen['kode_dosen'] ?></td>
        </tr>
        <tr>
          <th>Nama Dosen</th>
          <td>:</td>
          <td><?= $dosen['nama_dosen'] ?></td>
        </tr>
        <tr>
          <th>Jabatan</th>
          <td>:</td>
          <td><?= $dosen['nama_jabatan'] ?></td>
        </tr>
      </table>
    </div>
  </div>

<div class="row">
  <div class="col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $dosen['nama_dosen'] ?></h3>
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
            <th>NIDN</th>
            <td>:</td>
            <td><?= $dosen['nidn'] ?></td>
          </tr>

          <tr>
            <th>Pendidikan Terakhir</th>
            <td>:</td>
            <td><?= $dosen['pend_akhir'] ?></td>
          </tr>

          <tr>
            <th>Program Studi</th>
            <td>:</td>
            <td><?= $dosen['prodi_pend'] ?></td>
          </tr>

          <tr>
            <th>Jenis Kelamin</th>
            <td>:</td>
            <td><?= $dosen['nidn'] ?></td>
          </tr>

          <tr>
            <th>Tempat/Tanggal Lahir</th>
            <td>:</td>
            <td><?= $dosen['tempat_lahir'] ?>, <?= $dosen['tanggal_lahir'] ?></td>
          </tr>

          <tr>
            <th>Alamat</th>
            <td>:</td>
            <td><?= $dosen['alamat'] ?></td>
          </tr>

          <tr>
            <th>Alamat E-Mail</th>
            <td>:</td>
            <td><?= $dosen['email'] ?></td>
          </tr>

          <tr>
            <th>Foto</th>
            <td>:</td>
            <td><img src="<?= base_url('fotodosen/'. $dosen['foto_dosen']) ?>" id="gambar_load" width="250px"></td>
          </tr>
      </table>
      <div class="modal-footer">
        <a href="<?= base_url('dosen') ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-reply"> Kembali</i></a>
        <a href="<?= base_url('dosen/edit/'.$dosen['id_dosen']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"> Edit Data</i></a>
      </div>
      <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div>
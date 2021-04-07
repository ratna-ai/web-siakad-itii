<section class="content-header">
  <h1>
    <?= $title ?>
    <small><?= $books['kode_buku'] ?></small>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('books') ?>"><i class="fa fa-dashboard"></i> Daftar Buku</a></li>
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
            <th width="150px">Kode Buku</th>
            <td width="30px">:</td>
            <td><?= $books['kode_buku'] ?></td>
          </tr>
          <tr>
            <th>Judul</th>
            <td>:</td>
            <td><?= $books['judul'] ?></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?= $title ?></h3>
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
            } ?>

            <table class="table table-bordered table-striped">
              <tr>
                <th width="160px">Penulis</th>
                <td width="30px">:</td>
                <td><?= $books['penulis'] ?></td>
              </tr>
              <tr>
                <th width="160px">Penerbit</th>
                <td width="30px">:</td>
                <td><?= $books['penerbit'] ?></td>
              </tr>
              <tr>
                <th width="160px">Tanggal Publish</th>
                <td width="30px">:</td>
                <td><?= $books['tgl_publish'] ?></td>
              </tr>
              <tr>
                <th  width="160px">Tanggal Entry</th>
                <td>:</td>
                <td><?= $books['tgl_entry'] ?></td>
              </tr>
              <tr>
                <th width="160px">Sinopsis Buku</th>
                <td width="30px">:</td>
                <td><?= $books['isi_buku'] ?></td>
              </tr>
              <tr>
                <th width="160px">Cover Buku</th>
                <td width="30px">:</td>
                <td><img src="<?= base_url('fotobuku/'. $books['foto_buku']) ?>" id="gambar_load" width="250px"></td>
              </tr>
            </table>
            <div class="modal-footer">
              <a href="<?= base_url('books') ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-reply"> Kembali</i></a>
              <a href="<?= base_url('books/edit/'.$books['id_buku']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"> Edit Data</i></a>
            </div>
            <?php echo form_close() ?>
        </div>
      </div>
    </div>
  </div>
<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('prodi') ?>"><i class="fa fa-dashboard"></i> Daftar Prodi</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data <?= $title ?></h3>       
      <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
        <div class="box-body">
            <?php 
            $errors = session()->getFlashdata('errors');
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
                echo form_open_multipart('prodi/update/'. $prodi['id_prodi']); 
            ?>

            
            <div class="form-group">
            <label>Kode Program Studi</label>
            <input name="kode_prodi" value="<?= $prodi['kode_prodi'] ?>" class="form-control"> 
            </input>
          </div>

          <div class="form-group">
            <label>Program Studi</label>
            <input name="nama_prodi" value="<?= $prodi['nama_prodi'] ?>" class="form-control"> 
            </input>
          </div>

          <div class="form-group">
            <label>KA Prodi</label>
            <select name="kaprodi" class="form-control">
              <option value="<?= $prodi['kaprodi'] ?>"><?= $prodi['kaprodi'] ?></option>
              <?php foreach ($dosen as $key => $value) { ?>
                <option value="<?= $value['nama_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Jenjang Pendidikan</label>
            <select name="jenjang" value="<?= $prodi['jenjang'] ?>" class="form-control" placeholder="Jenjang Pendidikan" required> 
                <option value="D1"<?php if ($prodi['jenjang'] == 'D1') {
                    echo 'Selected';
                } ?>>Diploma 1</option>
                <option value="D2" <?php if ($prodi['jenjang'] == 'D2') {
                    echo 'Selected';
                } ?>>Diploma 2</option>
                <option value="D3" <?php if ($prodi['jenjang'] == 'D3') {
                    echo 'Selected';
                } ?>>Diploma 3</option>
                <option value="D4" <?php if ($prodi['jenjang'] == 'D4') {
                    echo 'Selected';
                } ?>>Diploma 4</option>
                <option value="S1" <?php if ($prodi['jenjang'] == 'S1') {
                    echo 'Selected';
                } ?>>Strata 1</option>
                <option value="S2" <?php if ($prodi['jenjang'] == 'S2') {
                    echo 'Selected';
                } ?>>Strata 2</option>
                <option value="S3" <?php if ($prodi['jenjang'] == 'S3') {
                    echo 'Selected';
                } ?>>Strata 3</option>
            </select>
          </div>

    <div class="modal-footer">
        <a href="<?= base_url('prodi') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"> Keluar</i></a>
        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"> Simpan</i></button>
    </div>
    <?php echo form_close() ?>


</div>
</div>
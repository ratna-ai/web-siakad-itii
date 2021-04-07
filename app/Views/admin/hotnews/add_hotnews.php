<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('headline') ?>"><i class="fa fa-dashboard"></i> Daftar Berita</a></li>
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
            echo form_open_multipart('headline/insert'); 
            ?>

    <div class="col-sm-6">
        <div class="form-group">
            <img src="<?= base_url('hotnews/default.jpg') ?>" id="gambar_load" height="100px" width="200px">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Hotnews</label>
            <input type="file" name="hotnews_gbr" id="preview_gambar" class="form-control">
        </div>
    </div>
</div>
    <div class="modal-footer">
        <a href="<?= base_url('headline') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"> Keluar</i></a>
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"> Simpan</i></button>
    </div>
    <?php echo form_close() ?>
</div>
</div>
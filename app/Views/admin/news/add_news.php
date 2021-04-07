<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('news') ?>"><i class="fa fa-dashboard"></i> Daftar Berita</a></li>
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
            echo form_open_multipart('news/insert'); 
            ?>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Kode Berita</label>
            <input name="kode_news" class="form-control" placeholder="Kode Berita">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Judul Berita</label>
            <input name="judul_news" class="form-control" placeholder="Judul Berita">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Penulis</label>
            <input name="penulis" class="form-control" placeholder="Penulis">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Tanggal Entry</label>
            <input name="tgl_entry" type="date" class="form-control">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="isi_news" id="editor1" cols="30" rows="10">
            </textarea>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <img src="<?= base_url('fotonews/default.jpg') ?>" id="gambar_load" height="500px">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="dokumentasi" id="preview_gambar" class="form-control">
        </div>
    </div>
</div>
    <div class="modal-footer">
        <a href="<?= base_url('news') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"> Keluar</i></a>
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"> Simpan</i></button>
    </div>
    <?php echo form_close() ?>
</div>
</div>
<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
  <li><a href="<?= base_url('news') ?>"><i class="fa fa-dashboard"></i> Daftar Berita</a></li>
    <li><a href="<?= base_url('news/rincian/'. $news['id_news']) ?>"> Detail Berita</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title ?></h3>       
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
            echo form_open_multipart('news/update/'. $news['id_news']); 
            ?>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Kode Berita</label>
            <input name="kode_news" value="<?= $news['kode_news'] ?>" class="form-control" placeholder="Kode Berita">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Judul Berita</label>
            <input name="judul_news" value="<?= $news['judul_news'] ?>" class="form-control" placeholder="Judul Berita">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Penulis</label>
            <input name="penulis" value="<?= $news['penulis'] ?>" class="form-control" placeholder="Penulis">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Tanggal Entry</label>
            <input name="tgl_entry" value="<?= $news['tgl_entry'] ?>" type="date" class="form-control">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Isi Berita</label>
            <textarea name="isi_news" id="editor1" cols="30" rows="10"><?= $news['isi_news'] ?>
            </textarea>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <img src="<?= base_url('fotonews/'. $news['dokumentasi']) ?>" id="gambar_load" width="250px">
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
        <a href="<?= base_url('news/rincian/'.$news['id_news']) ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-reply"> Kembali</i></a>
        <a href="<?= base_url('news') ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-close"> Keluar</i></a>
        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-save"> Simpan</i></button>
    </div>
    <?php echo form_close() ?>
</div>
</div>
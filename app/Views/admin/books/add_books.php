<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <h2> </h2>
    <ol class="breadcrumb">
        <li>
            <a href="<?= base_url('books') ?>"><i class="fa fa-dashboard"></i> Daftar Buku</a>
        </li>
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
            echo form_open_multipart('books/insert'); 
            ?>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Kode Buku</label>
                    <input name="kode_buku" class="form-control" placeholder="Kode Buku">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Judul Buku</label>
                    <input name="judul" class="form-control" placeholder="Judul Buku">
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
                    <label>Penerbit</label>
                    <input name="penerbit" class="form-control" placeholder="Penerbit">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Publish</label>
                    <input name="tgl_publish" type="date" class="form-control">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tanggal Entry</label>
                    <input name="tgl_entry" type="date" class="form-control">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label>Sinopsis Buku</label>
                    <textarea name="isi_buku" id="editor1" cols="30" rows="10">
                    </textarea>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <img src="<?= base_url('fotobuku/default.jpg') ?>" id="gambar_load" height="500px">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label>Cover Buku</label>
                    <input type="file" name="foto_buku" id="preview_gambar" class="form-control">
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <a href="<?= base_url('books') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"> Keluar</i></a>
            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"> Simpan</i></button>
        </div>
           
        <?php echo form_close() ?>
    </div>
</div>
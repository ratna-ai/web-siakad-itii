<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('mahasiswa') ?>"><i class="fa fa-dashboard"></i> Daftar Mahasiswa</a></li>
    <li><a href="<?= base_url('mahasiswa/rincian/'.$mhs['id_mhs']) ?>"> Detail Mahasiswa</a></li>
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
            echo form_open_multipart('mahasiswa/update/'. $mhs['id_mhs']); 
            ?>

    <div class="col-sm-6">
        <div class="form-group">
            <label>NIM</label>
            <input name="nim" value="<?= $mhs['nim'] ?>" class="form-control" readonly>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Program Studi</label>
            <select name="id_prodi" class="form-control">
                <option value="<?= $mhs['id_prodi'] ?>"><?= $mhs['jenjang'] ?> - <?= $mhs['nama_prodi'] ?></option>
                <?php foreach ($prodi as $key => $value) { ?>
                    <option value="<?= $value['id_prodi'] ?>"><?= $value['jenjang'] ?> - <?= $value['nama_prodi'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input name="nama_mhs" value="<?= $mhs['nama_mhs'] ?>" class="form-control" placeholder="Nama Mahasiswa">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" value="<?= $mhs['alamat'] ?>" class="form-control" placeholder="Alamat">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input name="tmp_lahir" value="<?= $mhs['tmp_lahir'] ?>" class="form-control" placeholder="Tempat Lahir">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-groups">
            <label>Tanggal Lahir</label>
            <input name="tgl_lahir" value="<?= $mhs['tgl_lahir'] ?>" type="date" class="form-control">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Jenis Kelamin</label>
                <select name="gender" value="<?= $mhs['gender'] ?>" class="form-control" placeholder="Jenis Kelamin" required> 
                    <option value="Laki-laki"<?php if ($mhs['gender'] == 'Laki-laki') {
                        echo 'Selected';
                    } ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($mhs['gender'] == 'Perempuan') {
                        echo 'Selected';
                    } ?>>Perempuan</option>
                </select>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Alamat E-mail</label>
            <input name="email" value="<?= $mhs['email'] ?>" type="email" class="form-control" placeholder="E-mail">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <img src="<?= base_url('fotomhs/'. $mhs['foto_mhs']) ?>" id="gambar_load" width="250px">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Foto Mahasiswa</label>
            <input type="file" name="foto_mhs" id="preview_gambar" class="form-control">
        </div>
    </div>
</div>
    <div class="modal-footer">
        <a href="<?= base_url('mahasiswa/rincian/'.$mhs['id_mhs']) ?>" class="btn btn-primary btn-flat"><i class="fa fa-reply"> Kembali</i></a>
        <a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"> Keluar</i></a>
        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"> Simpan</i></button>
    </div>
    <?php echo form_close() ?>


</div>
</div>
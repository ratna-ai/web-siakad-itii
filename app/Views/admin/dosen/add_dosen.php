<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('dosen') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
            echo form_open_multipart('dosen/insert'); 
            ?>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Kode Dosen</label>
            <input name="kode_dosen" class="form-control" placeholder="Kode Dosen">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>NIDN</label>
            <input name="nidn" class="form-control" placeholder="NIDN">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Nama Dosen</label>
            <input name="nama_dosen" class="form-control" placeholder="Nama Dosen">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Jabatan</label>
            <select name="id_jabatan" class="form-control">
                <option value="">---Pilih Jabatan---</option>
                <?php foreach ($jabatan as $key => $value) { ?>
                    <option value="<?= $value['id_jabatan'] ?>"><?= $value['nama_jabatan'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <input name="pend_akhir" class="form-control" placeholder="Pendidikan Terakhir">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Program Studi</label>
            <input name="prodi_pend" class="form-control" placeholder="Program Studi">
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" class="form-control" placeholder="Alamat">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input name="tanggal_lahir" type="date" class="form-control">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="gender" class="form-control">
            <option value="">---Pilih Jenis Kelamin---</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Alamat E-mail</label>
            <input name="email" type="email" class="form-control" placeholder="E-mail">
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Password</label>
            <input name="pass_dosen" type="password" class="form-control" placeholder="Password">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <img src="<?= base_url('fotodosen/default.png') ?>" id="gambar_load" width="250px">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Foto Dosen</label>
            <input type="file" name="foto_dosen" id="preview_gambar" class="form-control">
        </div>
    </div>
</div>
    <div class="modal-footer">
        <a href="<?= base_url('dosen') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"> Keluar</i></a>
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"> Simpan</i></button>
    </div>
    <?php echo form_close() ?>


</div>
</div>
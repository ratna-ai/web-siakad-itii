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
            echo form_open('prodi/insert'); 
            ?>

            <div class="form-group">
            <label>Kode Program Studi</label>
            <input name="kode_prodi" class="form-control" placeholder="Kode Program Studi" required> </input>
          </div>
          
          <div class="form-group">
            <label>Program Studi</label>
            <input name="nama_prodi" class="form-control" placeholder="Program Studi" required> </input>
          </div>

          <div class="form-group">
            <label>KA Prodi</label>
            <select name="kaprodi" class="form-control">
              <option value="">---Pilih KA Prodi---</option>
              <?php foreach ($dosen as $key => $value) { ?>
                <option value="<?= $value['nama_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group">
            <label>Jenjang</label>
            <select name="jenjang" class="form-control">
              <option value="">---Pilih Jenjang---</option>
              <option value="D1">Diploma 1</option>
              <option value="D2">Diploma 2</option>
              <option value="D3">Diploma 3</option>
              <option value="D4">Diploma 4</option>
              <option value="S1">Strata 1</option>
              <option value="S2">Strata 2</option>
              <option value="S3">Strata 3</option>
            </select>
          </div>
    </div>
    <div class="modal-footer">
        <a href="<?= base_url('prodi') ?>" class="btn btn-danger btn-flat"><i class="fa fa-close"> Keluar</i></a>
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"> Simpan</i></button>
    </div>
    <?php echo form_close() ?>
</div>
</div>
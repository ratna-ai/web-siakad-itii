<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('about') ?>"><i class="fa fa-dashboard"></i> About</a></li>
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
            echo form_open_multipart('about/update/'. $about['id_desc']); 
            ?>

    <div class="col-sm-12">
        <div class="form-group">
            <label>Tentang STAK-RRI</label>
            <textarea name="deskripsi" id="editor1" cols="30" rows="10"><?= $about['deskripsi'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Program Studi</label>
            <textarea name="prodi_stak" id="editor1" cols="30" rows="10"><?= $about['prodi_stak'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Gospel</label>
            <textarea name="gospel" id="editor1" cols="30" rows="10"><?= $about['gospel'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Landasan STAK-RRI</label>
            <textarea name="landasan" id="editor1" cols="30" rows="10"><?= $about['landasan'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Identitas dan Filosofi STAK-RRI</label>
            <textarea name="identitas_filosofi" id="editor1" cols="30" rows="10"><?= $about['identitas_filosofi'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Visi STAK-RRI</label>
            <textarea name="visi" id="editor1" cols="30" rows="10"><?= $about['visi'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Misi STAK-RRI</label>
            <textarea name="misi" id="editor1" cols="30" rows="10"><?= $about['misi'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Tujuan STAK-RRI</label>
            <textarea name="tujuan" id="editor1" cols="30" rows="10"><?= $about['tujuan'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Tujuan Tertinggi STAK-RRI</label>
            <textarea name="tujuan_tertinggi" id="editor1" cols="30" rows="10"><?= $about['tujuan_tertinggi'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Sasaran STAK-RRI</label>
            <textarea name="sasaran" id="editor1" cols="30" rows="10"><?= $about['sasaran'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Nilai-nilai Budaya STAK-RRI</label>
            <textarea name="nilai_budaya" id="editor1" cols="30" rows="10"><?= $about['nilai_budaya'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Profil Lulusan STAK-RRI</label>
            <textarea name="profil_lulusan" id="editor1" cols="30" rows="10"><?= $about['profil_lulusan'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Link Pendaftaran</label>
            <input name="pendaftaran" value="<?= $about['pendaftaran'] ?>" class="form-control"> </input>
            </textarea>
        </div>
        <div class="form-group">
            <label>Prosedur Pendaftaran</label>
            <textarea name="prosedur" id="editor1" cols="30" rows="10"><?= $about['prosedur'] ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>Biaya Pendidikan</label>
            <textarea name="biaya" id="editor1" cols="30" rows="10"><?= $about['biaya'] ?>
            </textarea>
        </div>
    </div>
</div>

    <div class="modal-footer">
        <a href="<?= base_url('about') ?>" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-close"> Keluar</i></a>
        <button type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-save"> Simpan</i></button>
    </div>
    <?php echo form_close() ?>
</div>
</div>
<section class="content-header">
  <h1>
      <?= $title ?>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $title ?></h3>

        <?php foreach ($about as $key => $value) { ?>
        <div class="box-tools pull-right">
        <a href="<?= base_url('about/edit/'.$value['id_desc']) ?>" class="btn btn-warning btn-sm btn-flat"><i class="fa fa-pencil"> Edit Data</i></a>
        </div>
        <?php } ?>
    </div>

    
    <div class="box-body">
      <?php 
      if (session()->getFlashdata('pesan')) {
        echo  '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
      } ?>
      <table class="table table-bordered table-striped table-responsive">
      <?php foreach ($about as $key => $value) { ?>
        <thead>
          <tr>
            <th>Latar Belakang</th>
            <td>:</td>
            <td><?= $value['deskripsi'] ?></td>
          </tr>
          <tr>
            <th>Program Studi</th>
            <td>:</td>
            <td><?= $value['prodi_stak'] ?></td>
          </tr>
          <tr>
            <th>Gospel</th>
            <td>:</td>
            <td><?= $value['gospel'] ?></td>
          </tr>
          <tr>
            <th>Landasan</th>
            <td>:</td>
            <td><?= $value['landasan'] ?></td>
          </tr>
          <tr>
            <th>Identitas dan Filosofi</th>
            <td>:</td>
            <td><?= $value['identitas_filosofi'] ?></td>
          </tr>
          <tr>
            <th>Visi</th>
            <td>:</td>
            <td><?= $value['visi'] ?></td>
          </tr>
          <tr>
            <th>Misi</th>
            <td>:</td>
            <td><?= $value['misi'] ?></td>
          </tr>
          <tr>
            <th>Tujuan</th>
            <td>:</td>
            <td><?= $value['tujuan'] ?></td>
          </tr>
          <tr>
            <th>Tujuan Tertinggi</th>
            <td>:</td>
            <td><?= $value['tujuan_tertinggi'] ?></td>
          </tr>
          <tr>
            <th>Sasaran</th>
            <td>:</td>
            <td><?= $value['sasaran'] ?></td>
          </tr>
          <tr>
            <th>Nilai-nilai Budaya</th>
            <td>:</td>
            <td><?= $value['nilai_budaya'] ?></td>
          </tr>
          <tr>
            <th>Profil Lulusan</th>
            <td>:</td>
            <td><?= $value['profil_lulusan'] ?></td>
          </tr>
          <tr>
            <th>Link Pendaftaran</th>
            <td>:</td>
            <td><?= $value['pendaftaran'] ?></td>
          </tr>
          <tr>
            <th>Prosedur Pendaftaran</th>
            <td>:</td>
            <td><?= $value['prosedur'] ?></td>
          </tr>
          <tr>
            <th>Biaya Pendidikan</th>
            <td>:</td>
            <td><?= $value['biaya'] ?></td>
          </tr>
        </thead>
      <?php } ?>
      </table> 
    </div>
<!-- /.box-body -->
</div>
<!-- /.box -->
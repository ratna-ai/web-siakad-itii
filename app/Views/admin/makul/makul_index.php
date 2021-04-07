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

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
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
      if (session()->getFlashdata('pesan')) {
        echo  '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
      }

      ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
              <th width="50px">No</th>
              <th>Kode Program Studi</th>
              <th>Program Studi</th>
              <th>Jenjang</th>
              <th class="text-center">Mata Kuliah</th>
              <th width="170px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $db = \Config\Database::connect();  
          $no = 1;
          foreach ($prodi as $key => $value) { 
            $jumlah = $db->table('tb_makul')
                      ->where('id_prodi', $value['id_prodi'])
                      ->countAllResults(); 
          ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['kode_prodi'] ?></td>
            <td><?= $value['nama_prodi'] ?></td>
            <td><?= $value['jenjang'] ?></td>
            <td class="text-center">
              <p class="label bg-purple">
                <?= $jumlah ?>
              </p>
            </td>
            <td>
              <a href="<?= base_url('makul/detail/'.$value['id_prodi']) ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"> Mata Kuliah</i></a>
            </td>
          </tr>
          <?php } ?>
       </tbody>
      </table>
    </div>
  </div>
</div>
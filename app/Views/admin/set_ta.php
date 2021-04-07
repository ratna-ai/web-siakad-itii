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
      <div class="box-header with-border">
        <h3 class="box-title">Setting <?= $title ?></h3>
      
      <!-- /.box-tools -->
      </div>
  <!-- /.box-header -->
    <div class="box-body">

      <?php 
      if (session()->getFlashdata('pesan')) {
        echo  '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
      }

      ?>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
              <th width="50px">No</th>
              <th>Tahun Akademik</th>
              <th>Semester</th>
              <th class="text-center">Status</th>
              <th width="170px" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($ta as $key => $value) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $value['ta'] ?></td>
            <td><?= $value['semester'] ?></td>
            <td class="text-center">
                <?php if ($value['status'] == 0) {
                    echo '<p class="label text-center bg-red">Non-Aktif</p>';
                } else {
                    echo '<p class="label text-center bg-green">Aktif</p>';
                } ?>
            </td>
            <td class="text-center">
                <?php if ($value['status'] == 0) { ?>
                    <a href="<?= base_url('ta/status_ta/' . $value['id_ta']) ?>" class="btn bg-purple btn-sm btn-flat"><i class="fa fa-check"> Aktifkan</i></a>
                <?php } ?>
            </td>
          </tr>
          <?php } ?>
       </tbody>
      </table>
    </div>
  </div>
</div>

<section class="content-header">
  <h1>
      <p class="text-center"><b><?= $title ?> <?= session()->get('nama') ?></b></p>
      <p class="text-center"><b>Tahun Ajaran <?= $ta['ta'] ?> (<?= $ta['semester'] ?>)</b></p>
  </h1>
  <h2> </h2>
</section>

<div class="row">
    <table class="table table-striped table-bordered table-responsive">
      <tr class="bg bg-purple">
        <th>No</th>
        <th>Hari</th>
        <th>Kode Mata Kuliah</th>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Kelas</th>
        <th>Program Studi</th>
        <th>Semester</th>
      </tr>

      <?php 
      $no = 1; 
      foreach ($jadwal as $key => $value) { ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $value['hari'] ?>, <?= $value['waktu'] ?></td>
          <td><?= $value['kode_makul'] ?></td>
          <td><?= $value['nama_makul'] ?></td>
          <td><?= $value['sks'] ?></td>
          <td><?= $value['nama_kelas'] ?> - <?= $value['angkatan'] ?></td>
          <td><?= $value['nama_prodi'] ?></td>
          <td><?= $value['smt'] ?></td>
        </tr>
      <?php } ?>   
    </table>
</div>
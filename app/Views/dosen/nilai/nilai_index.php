<section class="content-header">
  <h1>
    <b><?= $title ?></b>
    <b>Tahun Ajaran <?= $ta['ta'] ?> (<?= $ta['semester'] ?>)</b>
  </h1>
  <h2> </h2>
</section>

<div class="row">
    <table class="table table-striped table-bordered table-responsive">
      <tr class="bg bg-purple">
        <th>No</th>
        <th>Kode Mata Kuliah</th>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Kelas</th>
        <th>Program Studi</th>
        <th class="text-center">Semester</th>
        <th class="text-center">Nilai</th>
      </tr>

      <?php 
      $no = 1; 
      foreach ($absen as $key => $value) { ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $value['kode_makul'] ?></td>
          <td><?= $value['nama_makul'] ?></td>
          <td><?= $value['sks'] ?></td>
          <td><?= $value['nama_kelas'] ?> - <?= $value['angkatan'] ?></td>
          <td><?= $value['nama_prodi'] ?></td>
          <td class="text-center"><?= $value['smt'] ?></td>
          <td class="text-center">
            <a href="<?= base_url('dsn/DataNilai/'.$value['id_jadwal']) ?>" class="btn bg-maroon btn-sm btn-flat">
                <i class="fa fa-file-archive-o"></i> Nilai
            </a>
          </td>
        </tr>
      <?php } ?>   
    </table>
</div>
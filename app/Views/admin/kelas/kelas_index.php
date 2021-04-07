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
        <h3 class="box-title">Data <?= $title ?></h3>
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" data-target="#add">
                <i class="fa fa-plus"> Tambah Data</i>
            </button>
        </div>      
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
        if (session()->getFlashdata('pesan')) {
        echo  '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    } ?>
      
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="50px">No</th>
                <th>Nama Kelas</th>
                <th>Program Studi</th>
                <th>Dosen PA</th>
                <th>Angakatan</th>
                <th>Jumlah Mahasiswa</th>
                <th width="150px" class="text-center">Action</th>
            </tr>
        </thead>
    <tbody>
    <?php 
        $db = \Config\Database::connect();
        $no = 1; 
        foreach ($kelas as $key => $value){ 
          $jumlah = $db->table('tb_mhs')
          ->where('id_kelas', $value['id_kelas'])
          ->countAllResults(); 
    ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['nama_kelas'] ?> - <?= $value['angkatan'] ?></td>
            <td><?= $value['nama_prodi'] ?></td>
            <td><?= $value['nama_dosen'] ?></td>
            <td><?= $value['angkatan'] ?></td>
            <td class="text-center">
            <p class="label bg-purple"><?= $jumlah ?></p>
            </td>
            <td class="text-center">
                <a href="<?= base_url('kelas/mahasiswa/' . $value['id_kelas']) ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-search"></i></a>
                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_kelas'] ?>"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>
</div>
</div>

<!-- /.modal tambah-->
<div class="modal fade" id="add">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah <?= $title ?></h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('kelas/add'); ?>
          
            <div class="form-group">
                <label>Nama Kelas</label>
                <input name="nama_kelas" class="form-control" placeholder="Nama Kelas" required> </input>
            </div>
            
            <div class="form-group">
                <label>Program Studi</label>
                <select name="id_prodi" class="form-control">
                    <option value="">---Pilih Program Studi---</option>
                    <?php foreach ($prodi as $key => $value) { ?>
                        <option value="<?= $value['id_prodi'] ?>"><?= $value['nama_prodi'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Nama Dosen PA</label>
                <select name="id_dosen" class="form-control">
                    <option value="">---Pilih Dosen PA---</option>
                    <?php foreach ($dosen as $key => $value) { ?>
                        <option value="<?= $value['id_dosen'] ?>"><?= $value['nama_dosen'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label>Angkatan</label>
                <select name="angkatan" class="form-control">
                    <option value="">---Angkatan---</option>
                    <?php for ($i=date('Y'); $i >= date('Y')-2; $i--) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
              <label class="text-danger">Note: Pastikan data yang dibuat benar</label>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close"> Keluar</i></button>
        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"> Simpan</i></button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.modal delete-->
<?php foreach ($kelas as $key => $value) { ?>
<div class="modal fade" id="delete<?= $value['id_kelas'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Hapus <?= $title ?></h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus <b><?= $value['nama_kelas'] ?></b>?
        <label class="text-danger">Note: Sebelum menghapus, pastikan anggota kelas kosong.</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close">Keluar</i></button>
        <a href="<?= base_url('kelas/delete/'. $value['id_kelas']) ?>" class="btn btn-success btn-flat"><i class="fa fa-trash"> Hapus?</i></a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php } ?>
<!-- /.modal -->
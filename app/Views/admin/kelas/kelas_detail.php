<section class="content-header">
  <h1>
      <?= $title ?>: <label class='text-purple'><?= $kelas['nama_kelas'] ?> - <?= $kelas['angkatan'] ?></label>
  </h1>
  <h2> </h2>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('kelas') ?>"><i class="fa fa-dashboard"></i> Daftar Kelas</a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data <?= $title ?> <label class='text-purple'><?= $kelas['nama_kelas'] ?> - <?= $kelas['angkatan'] ?></label></h3>
        
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" data-target="#add">
                <i class="fa fa-plus"> Tambah Data</i>
            </button>
        </div>      
      <!-- /.box-tools -->
      </div>
  <!-- /.box-header -->
    <div class="box-body">
        <table class="table">
            <tr>
                <th width="170px">Nama Kelas</th>
                <th width="30px">:</th>
                <td width="200px"><?= $kelas['nama_kelas'] ?></td>

                <th width="70px">Angkatan</th>
                <th width="30px">:</th>
                <td><?= $kelas['angkatan'] ?></td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <th>:</th>
                <td><?= $kelas['nama_prodi'] ?></td>

                <th>Jumlah</th>
                <th>:</th>
                <td><?= $jml ?></td>
            </tr>
        </table>
    
    <?php 
        if (session()->getFlashdata('pesan')) {
        echo  '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    } ?>

    <br>
      
    <table id="example1" class="table table-bordered table-striped">
        <tr>
            <th width="50px" class="bg-purple">No</th>
            <th width="160px" class="bg-purple">NIM</th>
            <th class="bg-purple">Nama Mahasiswa</th>
            <th width="150px" class="bg-purple">Action</th>
        </tr>
        <?php $no = 1; 
        foreach ($mhs as $key => $value) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['nim'] ?></td>
            <td><?= $value['nama_mhs'] ?></td>
            <td class='text-center'>
                <a href="<?= base_url('kelas/remove_anggota_kelas/'.$value['id_mhs'].'/'. $kelas['id_kelas']) ?>" class="btn btn-flat btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                </a>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Mahasiswa</h4>
            </div>
        <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="bg-purple">
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Program Studi</th>
                        <th width="50px"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach ($data_mhs as $key => $value) { ?>
                <?php
                if ($kelas['id_prodi'] == $value['id_prodi']) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $value['nim'] ?></td>
                        <td><?= $value['nama_mhs'] ?></td>
                        <td><?= $value['nama_prodi'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('kelas/add_anggota_kelas/'. $value['id_mhs'].'/'.$kelas['id_kelas']) ?>" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-plus"></i></a> 
                        </td>
                    </tr>
                <?php } ?>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

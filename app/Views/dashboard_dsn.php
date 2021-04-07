<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-light-blue"><i class="fa fa-book"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">JADWAL MENGAJAR</span>
            <a href="<?= base_url('dsn/jadwal') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-maroon"><i class="fa fa-file"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">ABSEN KELAS</span>
            <a href="<?= base_url('dsn/AbsenKelas') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
        <span class="info-box-icon bg-olive"><i class="fa fa-check"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">NILAI MHS</span>
            <a href="<?= base_url('dsn/NilaiMahasiswa') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

<div class="col-md-12">
    <?php 
      if (session()->getFlashdata('pesan')) {
        echo  '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
      } ?>
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body">
            <div class="col-md-4">
                <img class="img-responsive pad" src="<?= base_url('fotodosen/' . $dosen['foto_dosen']) ?>" alt="User profile picture">
                <p class="text-center"><small><?= $dosen['nama_dosen'] ?> <br> Login Date: <?= date('d M Y') ?></small></p>

                <table class="table table-responsive">
                    <tr>
                        <th>Kode Dosen</th>
                        <th>:</th>
                        <td><?= $dosen['kode_dosen'] ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <th>:</th>
                        <td><?= $dosen['pass_dosen'] ?></td>
                    </tr>
                </table>
                <button class="btn btn-warning btn-sm btn-flat text-left" data-toggle="modal" data-target="#edit<?= $dosen['id_dosen'] ?>"><i class="fa fa-pencil"></i> Edit Password</button>
            </div>

            <div class="col-md-8">
                <h3 class="profile-username"><?= $dosen['nama_dosen'] ?></h3>
                <h3 class="profile-username"><?= $dosen['nidn'] ?></h3>
            
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <strong><i class="fa fa-graduation-cap margin-r-5"></i> Pendidikan Terakhir</strong>
                        <p class="text-muted"><?= $dosen['pend_akhir'] ?> - <?= $dosen['prodi_pend'] ?></p>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>
                        <p class="text-muted"><?= $dosen['alamat'] ?></p>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fa  fa-venus-mars margin-r-5"></i> Jenis Kelamin</strong>
                        <p class="text-muted"><?= $dosen['gender'] ?></p>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fa fa-birthday-cake margin-r-5"></i> Tempat/Tanggal Lahir</strong>
                        <p class="text-muted"><?= $dosen['tempat_lahir'] ?>, <?= $dosen['tanggal_lahir'] ?></p>
                    </li>
                    <li class="list-group-item">
                        <strong><i class="fa fa-envelope margin-r-5"></i> E-Mail</strong>
                        <p class="text-muted"><?= $dosen['email'] ?></p>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
</div>
<!-- /.box -->

<!-- /.modal edit-->
<div class="modal fade" id="edit<?= $dosen['id_dosen'] ?>">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Password</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('dsn/edit/'. $dosen['id_dosen']); ?>

          <div class="form-group">
            <label>Password</label>
            <input name="pass_dosen" value="<?= $dosen['pass_dosen'] ?>" class="form-control"> 
            </input>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal"><i class="fa fa-close"> Keluar</i></button>
        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-save"> Simpan Perubahan</i></button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
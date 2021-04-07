<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b>Login</b> STAK-RRI</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan masukkan <i>username</i> dan <i>password</i></p>
    
    <?php
    $errors = session()->getFlashdata('errors');
    if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
          <ul>
            <?php foreach ($errors as $key => $value) { ?>
                <li> <?= esc($value) ?> </li>
            <?php } ?>
          </ul>
        </div>

    <?php } ?>

    <?php
      if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
      }

      if (session()->getFlashdata('sukses')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('sukses');
        echo '</div>';
      }
    ?>

    <?php 
    echo form_open('auth/cek_login'); 
    ?>
      <div class="form-group has-feedback">
        <input name="username" type="username" class="form-control" placeholder="Username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>

    <div class="form-group has-feedback">
      <input name="password" type="password" class="form-control" placeholder="Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
        <select name="level" type ="level" class="form-control">
            <option value = "">---Level---</option>
            <option value = "1">1. Admin</option>
            <option value = "2">2. Dosen</option>
            <option value = "3">3. Mahasiswa</option>
        </select>
    </div>
    
    <div class="row">
      <div class="col-xs-8">
    </div>
        
    <!-- /.col -->
    <div class="col-xs-4">
      <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
    </div>
</div>
<?php echo form_close() ?>

<!-- jQuery 3 -->
<script src="<?= base_url() ?>/template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>/template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>/template/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
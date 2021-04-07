<!DOCTYPE html>
<html>
<head>
  <title>Institut Theologia Insani Indonesia | <?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Onepage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
  Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  <link href="<?= base_url() ?>/above/css/bootstrap.css" rel='stylesheet' type='text/css'/>
  <link href="<?= base_url() ?>/above/css/featured_slide.css" rel='stylesheet' type='text/css'/>
  <link href="<?= base_url() ?>/above/css/style.css" rel="stylesheet" type="text/css" media="all" />	    
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="<?= base_url() ?>/above/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>/above/js/move-top.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>/above/js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){		
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
      });
    });
  </script>
</head>
<body>
<div class="kepala" id="head">
    <div class="container">
      <div class="header-top">  
        <div class="top-menu">
          <span class="menu"> </span>
          <ul>
            <nav class="cl-effect-5">
              <li><a href="<?= base_url('home') ?>"><span data-hover="Home">Home</span></a></li>
              <li><a href="<?= base_url('itii') ?>"><span data-hover="ITII/YTII">ITII/YTII</span></a></li>
            </nav>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="atas" id="head">
    <div class="container">
      <div class="header-top">
      </div>
    </div>
  </div>

  <div class="about-section" id="about" id="about">
    <div class="container">
      <div class="about-header">
        <h3>Tentang Institut Theologia Insani Indonesia (ITII)</h3>
        <div class="tentang-imag">
          <img src="<?= base_url() ?>/above/images/yayasan_logo.png"/>
        </div>
        <?php foreach ($about as $key => $value) { ?>
          <div class="about-text">
            <p>----</p>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="contact">
    <div class="row">
      <div class="container">
      <form>
          <?php foreach ($about as $key => $value) { ?>
          <div class="col-md-4">
            <p class="text-center"><img src="<?= base_url() ?>/above/images/visi.png" alt=""></p>
            <p><em>Realizing Healthy Church and Society Based on Reformed 
              Theology and Making Theology As A Queen of Sciences in All Fields 
              and Master of Philosophy with Integrative Theology</em></p>
            <br>
            <p>Merealisasikan Gereja dan Masyarakat yang Sehat Berdasarkan Theologia 
              Reformed dan Mejadikan Theologia Sebagai Ratu Ilmu Pengetahuan di Segala 
              Bidang dengan Theologia Integratif</p>
					</div>
					<div class="col-md-4">
            <p class="text-center"><img src="<?= base_url() ?>/above/images/misi.png" alt=""></p>
            <p>
              <ol>
                <li>Preach the Gospel to save the lost</li>
                <li>Reforming the church with reformed theology</li>
                <li>Train cross-cultural messengers, send to the nationals (237) and accompany them</li>
                <li>Restore theology as queen of science and master of philosophy</li>
                <li>Theologizing of the word in all fields</li>
              </ol>
            </p>
          </div>
					<div class="col-md-4">
            <p class="text-center"><img src="<?= base_url() ?>/above/images/motto.png" alt=""></p>
            <p><em>Building and Developing the Integrity and the Holistic Competence of 
              Christian Leadersand Scholars in the Future</em>
            </p>
          </div>
          <?php } ?>
				</form>
      </div>
    </div>
	</div>

  <div class="kerja-section" id="work" id="work">
	  <div class="kerja-header">
			<h4>Susunan Pengurus Institute Theologia Insani Indonesia (ITII)</h4>
		</div>
    <br>

		<div class="container">
      <div class="kerja-header">
        <h4><b>Pembina</b></h4>
      </div>
      <?php  
      foreach ($dosen as $key => $value){ 
      if ($value['id_jabatan'] == 1) { ?>
        <div class="line">
          <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="150px" height="150px">
          <h4><u><?= $value['nama_dosen'] ?></u></h4>
          <p><?= $value['nama_jabatan'] ?></p>
          <br>
        </div>
      <?php }?>
      <?php } ?>  
    </div>

    <div class="container">
      <table class="table">
          <tr>
              <?php  
              foreach ($dosen as $key => $value){ 
              if ($value['id_jabatan'] == 2) { ?>
              <td>
                <div class="line">
                  <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="150px" height="150px">
                  <h4><u><?= $value['nama_dosen'] ?></u></h4>
                  <p><?= $value['nama_jabatan'] ?></p>
                </div>
              </td>
              <?php }?>
              <?php } ?>
          </tr>
      </table>  
    </div>

    <div class="container">
      <div class="kerja-header">
        <h4><b>Pengurus</b></h4>
      </div>
      <?php  
      foreach ($dosen as $key => $value){ 
      if ($value['id_jabatan'] == 3) { ?>
        <div class="line">
          <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="150px" height="150px">
          <h4><u><?= $value['nama_dosen'] ?></u></h4>
          <p><?= $value['nama_jabatan'] ?></p>
          <br>
        </div>
      <?php }?>
      <?php } ?>  
    </div>

    <div class="container">
      <?php  
      foreach ($dosen as $key => $value){ 
      if ($value['id_jabatan'] == 4) { ?>
        <div class="line">
          <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="150px" height="150px">
          <h4><u><?= $value['nama_dosen'] ?></u></h4>
          <p><?= $value['nama_jabatan'] ?></p>
          <br>
        </div>
      <?php }?>
      <?php } ?>  
    </div>

    <div class="container">
      <?php  
      foreach ($dosen as $key => $value){ 
      if ($value['id_jabatan'] == 5) { ?>
        <div class="line">
          <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="150px" height="150px">
          <h4><u><?= $value['nama_dosen'] ?></u></h4>
          <p><?= $value['nama_jabatan'] ?></p>
          <br>
        </div>
      <?php }?>
      <?php } ?>  
    </div>

    <div class="container">
      <?php  
      foreach ($dosen as $key => $value){ 
      if ($value['id_jabatan'] == 6) { ?>
        <div class="line">
          <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="150px" height="150px">
          <h4><u><?= $value['nama_dosen'] ?></u></h4>
          <p><?= $value['nama_jabatan'] ?></p>
          <br>
        </div>
      <?php }?>
      <?php } ?>  
    </div>

    <div class="container">
      <?php  
      foreach ($dosen as $key => $value){ 
      if ($value['id_jabatan'] == 7) { ?>
        <div class="line">
          <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="150px" height="150px">
          <h4><u><?= $value['nama_dosen'] ?></u></h4>
          <p><?= $value['nama_jabatan'] ?></p>
          <br>
        </div>
      <?php }?>
      <?php } ?>  
    </div>  

    <div class="container">
      <div class="kerja-header">
        <h4><b>Pengawas</b></h4>
      </div>
      <?php  
      foreach ($dosen as $key => $value){ 
      if ($value['id_jabatan'] == 8) { ?>
        <div class="line">
          <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="150px" height="150px">
          <h4><u><?= $value['nama_dosen'] ?></u></h4>
          <p><?= $value['nama_jabatan'] ?></p>
          <br>
        </div>
      <?php }?>
      <?php } ?>  
    </div>
  </div>
  
  <div class="footer-section" id="contact" id="contact">
		<div class="container"> 
			<div class="contact-header">
				<h3>Alamat Kampus</h3>
					<p class="text-center">Jakarta: Geneva Room, P6-Tower A, Season City Jl. Prof. Dr. Latumenten 33, Tambora, Jakarta Barat. <br> 
          Manado: Jl. Raya Tompaso No. 8A-E, Pinaesaan, Tomposo Barat. <br> 
          Surabaya: Jl. Krakatau No. 4A, Patemon, Sawahan, Surabaya.</p>
			</div>
      <div class="row">
        <div class="col-md-6 contactgrid">
					<input type="text" class="text" value="Kontak" readonly>
          <div class="social-icon">
            <br>
            <table>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_mail.png"></a> itii.ytii@gmail.com</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_wa.png"></a> +62 852 3546 6668</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_fb.png"></a> Indonesia Theological Humance Institute</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_ig.png"></a> @itii.ytii</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_yt.png"></a> Indonesia Theologia Insani Indonesia</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-6 contactgrid">
					<input type="text" class="text" value="Founder" readonly>
          <div class="social-icon">
            <br>
            <table>
              <tr>
                <td><a href="#"><img class="img-circle" src="<?= base_url() ?>/founder/shendy.jpg"></a> Shendy Carolina Lumintang, M.Th.</td>
              </tr>
              <tr>
                <td><a href="#"><img class="img-circle" src="<?= base_url() ?>/founder/stefanus.jpg"></a> Stafanus Padan, S.Th</td>
              </tr>
              <tr>
                <td><a href="#"><img class="img-circle" src="<?= base_url() ?>/founder/dcs_small.jpg"></a> Data Cloud Sugiarto</td>
            </table>
          </div>  
        </div>
      </div>
			<div class="footer-bottom">
					<p>&copy; 2021 Powered By | <b>Data Cloud Sugiarto</b> - Mojokerto</p>
      </div>
		</div>		
	</div>
  
</body>
</html>


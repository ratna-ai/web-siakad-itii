<!DOCTYPE html>
<html>
<head>
  <title>Institute Theologia Insani Indonesia | <?= $title ?></title>
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
<div class="header" id="head">
  <div class="container">
    <div class="header-top">
      <div class="top-menu">
        <span class="menu"> </span>
        <ul>
          <nav class="cl-effect-5">
            <li><a href="<?= base_url('home') ?>"><span data-hover="Home">Home</span></a></li>
            <li><a href="<?= base_url('stak') ?>"><span data-hover="STAK-RRI">STAK-RRI</span></a></li>
          </nav>
        </ul>
      </div>

      <!--script nav-->
      <script>
        $("span.menu").click(function(){
        $(".top-menu ul").slideToggle("slow" , function(){
        });
        });
      </script>
      <div class="clearfix"></div>
    </div>
      
    <div class="index-banner">
      <div class="wmuSlider example1">
        <div class="wmuSliderWrapper">
          <article style="position: absolute; width: 100%; opacity: 0;"> 
            <div class="banner-wrap">
              <div class="banner_center">	 
                <h2><b>SEKOLAH TINGGI AGAMA KRISTEN</b></h2>
                <h3><b>REFORMED REMNANT INTERNASIONAL</b></h3>
                <br>
                <br>
                <br>
                <p><b>Building and Developing the Integrity and the Holistic Competence of
                  Christian Leaders and Scholars In The Future</b></p>
              </div>
            </div>
          </article>
          <article style="position: relative; width: 100%; opacity: 1;"> 
            <div class="banner-wrap">
                <div class="banner_center">	 
                <h2><b>SEKOLAH TINGGI AGAMA KRISTEN</b></h2>
                <h3><b>REFORMED REMNANT INTERNASIONAL</b></h3>
                <br>
                <br>
                <br>
                <p><b>Building and Developing the Integrity and the Holistic Competence of
                  Christian Leaders and Scholars In The Future</b></p>
              </div>
            </div>
          </article>
          <article style="position: absolute; width: 100%; opacity: 0;">
            <div class="banner-wrap">
              <div class="banner_center">	 
                <h2><b>SEKOLAH TINGGI AGAMA KRISTEN</b></h2>
                <h3><b>REFORMED REMNANT INTERNASIONAL</b></h3>
                <br>
                <br>
                <br>
                <p><b>Building and Developing the Integrity and the Holistic Competence of
                  Christian Leaders and Scholars In The Future</b></p>
              </div>
            </div>
          </article>  
        </div>
      </div>
      <script src="<?= base_url() ?>/above/js/jquery.wmuSlider.js"></script> 
      <script>
          $('.example1').wmuSlider();         
      </script>
    </div>
  </div>
</div>

<div class="about-section" id="about" id="about">
  <div class="container">
    <div class="about-header">
      <h3>Pendaftaran Sekolah Tinggi Agama Kristen <br> 
      Reformed Remnant Internasional (STAK-RRI)</h3>
      <br>
      <h4>Prosedur Pendaftaran</h4>
      <br>
      <div class="col-md-3">
        <img src="<?= base_url() ?>/above/images/prosedur.png"/>
      </div>
      <?php foreach ($about as $key => $value) { ?>
        <div class="col-md-9 text-left">
          <p><?= $value['prosedur'] ?></p> 
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<div class="about-section" id="about" id="about">
  <div class="container">
    <div class="about-header">
      <h4>Biaya Pendidikan</h4>
      <br>
      <div class="col-md-3">
        <img src="<?= base_url() ?>/above/images/card.png"/>
      </div>
      <?php foreach ($about as $key => $value) { ?>
        <div class="col-md-9 text-left">
          <p><?= $value['biaya'] ?></p> 
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<div class="about-section" id="about" id="about">
  <div class="container">
    <div class="about-header">
      <div class="col-md-3 services-grid">
      </div>
      <div class="col-md-3 services-grid">
      </div>
      <div class="col-md-3 services-grid">
      </div>
      <div class="col-md-3 services-grid">
        <a target="_blank" href="http://bit.ly/formulir-stakrri"><img src="<?= base_url() ?>/above/images/download.png"/></a>
        <br>
        <a target="_blank" href="http://bit.ly/formulir-stakrri">Unduh Formulir Pendaftaran di Sini</a>
      </div>
    </div>
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
            </tr>
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
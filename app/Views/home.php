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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="atas" id="head">
  <div class="container">
    <div class="header-top">
      <div class="top-menu">        
      </div>
    </div>
  </div>
</div>

<div class="itii" id="head">
  <div class="container">
    <div class="header-top">  
      <div class="menu-atas">
        <span class="menu"> </span>
        <ul>
          <nav class="cl-effect-5">
            <li><a href="<?= base_url('home') ?>"><span data-hover="Home">Home</span></a></li>
            <li><a href="<?= base_url('itii') ?>"><span data-hover="ITII/YTHI">ITII/YTHI</span></a></li>
            <li><a href="<?= base_url('stak') ?>"><span data-hover="STAK-RRI">STAK-RRI</span></a></li>
          </nav>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php $no_a = 0; 
    foreach ($headline as $key => $value) {
      $a = $no_a; ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $no_a++ ?>" class="<?= ($a == 0) ? 'active' : '' ?>"></li>
    <?php } ?>
  </ol>

  <div class="carousel-inner">
    <?php $no_b = 0;
    foreach ($headline as $key => $value) { ?>
    <div class="carousel-item <?= ($no_b == 0) ? 'active' : '' ?>">
      <img class="d-block w-100" height="500px" src="<?= base_url('hotnews/'. $value['hotnews_gbr']) ?>" alt="<?= $no_b++ ?>">
    </div>
    <?php } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
  </a>
</div>
  
<div class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="about-section" id="about" id="about">
        <div class="about-header">
          <h3>News</h3>
        </div>
        <table id="example2" class="text-center">
          <tr>
            <td>
              <?php foreach ($news as $key => $value) { ?>
                <a href="<?= base_url('home/detail_berita/'.$value['id_news']) ?>"><img src="<?= base_url('fotonews/'.$value['dokumentasi']) ?>" width="200px" height="289px"></a>
              <?php } ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <div class="about-section" id="about" id="about">
        <div class="about-header">
          <h3>Gospel</h3>
          <p>The Original Man</p>
        </div>
        <br>
        <table class="text-justify">
          <tr>
            <td>
              <?php foreach ($about as $key => $value) { ?>
                <h5><?= $value['gospel'] ?></h5>
              <?php } ?> 
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col-md-3">
      <div class="about-section" id="about" id="about">
        <div class="about-header">
          <h3>Books</h3>
        </div>
        <table id="example2" class="text-center">
          <tr>
            <td>
              <?php foreach ($books as $key => $value) { ?>
                <a href="<?= base_url('home/detail_buku/'.$value['id_buku']) ?>"><img src="<?= base_url('fotobuku/'.$value['foto_buku']) ?>" width="200px" height="289px"></a>
              <?php } ?>
            </td>
          </tr>
        </table>
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
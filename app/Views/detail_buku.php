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
      <div class="logo">
      <a href="<?= base_url('home') ?>"><img src="<?= base_url() ?>/above/images/logo_itii.png" width="80px" height="55px" /></a>
			</div>
      <div class="header-top">  
        <div class="top-menu">
          <span class="menu"> </span>
          <ul>
            <nav class="cl-effect-5">
              <li><a href="<?= base_url('home') ?>"><span data-hover="Home">Home</span></a></li>
            </nav>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="about-section" id="about" id="about">
    <div class="container">
      <div class="row">
        <div class="about-header">
        <h3><?= $books['judul'] ?></h3>
        <br>
        <div class="col-md-4">
          <img src="<?= base_url('fotobuku/'. $books['foto_buku']) ?>" id="gambar_load" width="250px">
        </div>
        <div class="col-md-8">
          <table class="table">
            <tr>
              <th width="160px">Kode Buku</th>
              <td width="30px">:</td>
              <td class="text-left"><?= $books['kode_buku'] ?></td>
            </tr>
            <tr>
              <th width="160px">Penulis</th>
              <td width="30px">:</td>
              <td class="text-left"><?= $books['penulis'] ?></td>
            </tr>
            <tr>
              <th width="160px">Penerbit</th>
              <td width="30px">:</td>
              <td class="text-left"><?= $books['penerbit'] ?></td>
            </tr>
            <tr>
              <th width="160px">Tanggal Publish</th>
              <td width="30px">:</td>
              <td class="text-left"><?= $books['tgl_publish'] ?></td>
            </tr>
            <tr>
              <th width="160px">Tanggal Entry</th>
              <td>:</td>
              <td class="text-left"><?= $books['tgl_entry'] ?></td>
            </tr>
            <tr>
              <th width="160px">Sinopsis Buku</th>
              <td width="30px">:</td>
              <td class="text-justify"><?= $books['isi_buku'] ?></td>
            </tr>
          </table>
        </div>
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
					<input type="text" class="text" value="Kontak">
          <div class="social-icon">
            <br>
            <table>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_mail.png" width="30px" height="30px"></a> itii.ytii@gmail.com</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_wa.png" width="30px" height="30px"></a> +62 852 3546 6668</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_wa.png" width="30px" height="30px"></a> Indonesia Theological Humance Institute</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_ig.png" width="30px" height="30px"></a> @itii.ytii</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/above/images/icon_yt.png" width="30px" height="30px"></a> Indonesia Theologia Insani Indonesia</td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-md-6 contactgrid">
					<input type="text" class="text" value="Founder">
          <div class="social-icon">
            <br>
            <table>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/founder/shendy.jpg" width="30px" height="30px"></a> Shendy Carolina Lumintang, M.Th.</td>
              </tr>
              <tr>
                <td><a href="#"><img src="<?= base_url() ?>/founder/stefanus.jpg" width="30px" height="30px"></a> Stafanus Padan, S.Th</td>
              </tr>
              <tr>
                <td><a href="#"><img class="img-circle" src="<?= base_url() ?>/founder/dcs.png" width="40px" height="40px"></a> Data Cloud Sugiarto</td>
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


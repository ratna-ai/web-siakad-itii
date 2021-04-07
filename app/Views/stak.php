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
  
<div class="content">
  <div class="services-section" id="services">
    <div class="container"> 
      <div class="services-sectiongrids">
        <div class="col-md-6 services-grid">
          <a href="<?= base_url('auth') ?>"><img src="<?= base_url() ?>/above/images/login.png" alt=""/></a>
          <a href="<?= base_url('auth') ?>"><h4>Login</h4></a>
          <p>Silahkan klik menu ini untuk memasuki halaman Siakad Sekolah Tinggi Agama Kristen Reformed Remnant Internasional (STAK-RRI).</p>
        </div>
        <div class="col-md-6 services-grid">
          <a href="<?= base_url('pendaftaran') ?>"><img src="<?= base_url() ?>/above/images/pendaftaran.png" alt=""/></a>
          <a href="<?= base_url('pendaftaran') ?>"><h4>Pendaftaran</h4></a>
          <p>Silahkan klik menu ini untuk mendapatkan informasi seputar pendaftaran Sekolah Tinggi Agama Kristen Reformed Remnant Internasional (STAK-RRI).</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="about-section" id="about" id="about">
  <div class="container">
    <div class="about-header">
      <h3>Latar Belakang STAK-RRI</h3>
      <div class="about-imag">
        <img src="<?= base_url() ?>/above/images/kampus.jpg"/>
      </div>
      <?php foreach ($about as $key => $value) { ?>
        <div class="about-text">
          <p><?= $value['deskripsi'] ?></p> 
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
        <div class="col-md-4 garis">
          <input type="text" class="text" value="Visi" readonly>
          <p><?= $value['visi'] ?></p>
        </div>
        <div class="col-md-4 garis">
          <input type="text" class="text" value="Misi" readonly>
          <p><?= $value['misi'] ?></p>
        </div>
        <div class="col-md-4 garis">
          <input type="text" class="text" value="Tujuan Tertinggi" readonly>
          <p><?= $value['tujuan_tertinggi'] ?></p>
          <input type="text" class="text" value="Tujuan" readonly>
          <p><?= $value['tujuan'] ?></p>
        </div>
        <?php } ?>
      </form>
    </div>
  </div>
</div>

<div class="works-section" id="work" id="work">
	<div class="portfolio-section-bottom-row" id="portfolio">
		<div class="container">	
			<script src="<?= base_url() ?>/above/js/easyResponsiveTabs.js" type="text/javascript"></script>
      <script type="text/javascript">
        $(document).ready(function () {
          $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
          });
        });	
      </script>
			<link rel="stylesheet" href="<?= base_url() ?>/above/css/swipebox.css">
      <script src="<?= base_url() ?>/above/js/jquery.swipebox.min.js"></script> 
        <script type="text/javascript">
          jQuery(function($) {
            $(".swipebox").swipebox();
          });
        </script>
			  <!-- Portfolio Ends Here -->
						
        <div class="sap_tabs">
				  <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
            <ul class="resp-tabs-list">
              <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Landasan</span></li>
              <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Identitas dan Ideologi</span></li>
              <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Sasaran</span></li>
              <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>Nilai-nilai Budaya STAK-RRI</span></li>
              <li class="resp-tab-item" aria-controls="tab_item-4" role="tab"><span>Program Studi</span></li>
              <div class="clearfix"></div>
            </ul>	
            <?php foreach ($about as $key => $value) { ?>
            <div id="portfoliolist">
							<div class="resp-tabs-container">
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="tab_img">
										<div class="col-md-12">
                      <p><?= $value['landasan'] ?></p>
										</div>				
									</div>
                </div>
										
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
								  <div class="tab_img">
										<div class="col-md-12">
                      <p><?= $value['identitas_filosofi'] ?></p>
										</div>		
									</div>	 	        					 
								</div>
										
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">	
									<div class="tab_img">
										<div class="col-md-12">
                      <p><?= $value['sasaran'] ?></p>
										</div>		
									</div>		        					 
								</div>
										
                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
									<div class="tab_img">
										<div class="col-md-12">
                      <p><?= $value['nilai_budaya'] ?></p>
										</div>
									</div>	
								</div>

                <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-4">
									<div class="tab_img">
										<div class="col-md-12">
                      <p><?= $value['prodi_stak'] ?></p>
										</div>
									</div>	
								</div>
																				
							</div>	
						</div>
            <?php } ?>								
					</div>
				</div>	

		</div>
	</div>
</div>

<div class="kerja-section" id="work" id="work">
  <div class="kerja-header">
    <h4>Susunan Pengurus Sekolah Tinggi Agama Kristen Reformed Remnant Internasional (STAK-RRI)</h4>
  </div>
  <br>

  <div class="container">
    <div class="kerja-header">
      <h5><b>Ketua STAK-RRI</b></h5>
    </div>
    <?php  
    foreach ($dosen as $key => $value){ 
    if ($value['id_jabatan'] == 9) { ?>
      <div class="line">
        <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
        <h5><u><?= $value['nama_dosen'] ?></u></h5>
        <p><?= $value['nama_jabatan'] ?></p>
        <br>
      </div>
    <?php }?>
    <?php } ?>  
  </div>

    <table class="table">
      <thead>
        <tr>
          <td>
          <div class="kerja-header">
            <h5><b>Kepala Rumah Tangga</b></h5>
          </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 10) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
          </td>
          <td>
          <div class="kerja-header">
            <h5><b>Wakil Ketua I</b></h5>
          </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 11) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
          </td>
          <td>
          <div class="kerja-header">
            <h5><b>Wakil Ketua II</b></h5>
          </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 12) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
          </td>
          <td>
          <div class="kerja-header">
            <h5><b>Wakil Ketua III</b></h5>
          </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 13) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
          </td>
          <td>
          <div class="kerja-header">
            <h5><b>Wakil Ketua IV</b></h5>
          </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 14) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
          </td>
          <td>
          <div class="kerja-header">
            <h5><b>Penjamin Mutu</b></h5>
          </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 15) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td>
          <div class="kerja-header">
            <h6><b>Membawahi</b></h6> <br>
            <h5><b>Kaprodi Theologi</b></h5>
          </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 16) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
            <br>
            <div class="kerja-header">
            <h5><b>Kaprodi Pendidikan</b></h5>
            </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 17) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
            <br>
            <div class="kerja-header">
            <h5><b>Kepala Perpustakaan</b></h5>
            </div>
            <?php  
            foreach ($dosen as $key => $value){ 
            if ($value['id_jabatan'] == 18) { ?>
              <div class="line">
                <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                <h5><u><?= $value['nama_dosen'] ?></u></h5>
                <p><?= $value['nama_jabatan'] ?></p>
              </div>
            <?php }?>
            <?php } ?>
          </td>
          <td>
            <div class="kerja-header">
              <h6><b>Membawahi</b></h6> <br>
              <h5><b>Kepala BAK Administrasi</b></h5>
            </div>
              <?php  
              foreach ($dosen as $key => $value){ 
              if ($value['id_jabatan'] == 19) { ?>
                <div class="line">
                  <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                  <h5><u><?= $value['nama_dosen'] ?></u></h5>
                  <p><?= $value['nama_jabatan'] ?></p>
                </div>
              <?php }?>
              <?php } ?>
          </td>
          <td>
            <div class="kerja-header">
              <h6><b>Membawahi</b></h6> <br>
              <h5><b>Ketua Bidang Pelayanan Internal</b></h5>
            </div>
              <?php  
              foreach ($dosen as $key => $value){ 
              if ($value['id_jabatan'] == 20) { ?>
                <div class="line">
                  <img src="<?= base_url('fotodosen/'.$value['foto_dosen']) ?>" width="100px" height="100px">
                  <h5><u><?= $value['nama_dosen'] ?></u></h5>
                  <p><?= $value['nama_jabatan'] ?></p>
                </div>
              <?php }?>
              <?php } ?>
          </td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>  

<div class="about-section" id="about" id="about">
  <div class="container">
    <div class="about-header">
      <h3>Profil Lulusan</h3>
      <div class="tentang-imag">
        <img src="<?= base_url() ?>/above/images/edu.png"/>
      </div>
      <?php foreach ($about as $key => $value) { ?>
        <div class="tentang-text">
          <p><?= $value['profil_lulusan'] ?></p> 
        </div>
      <?php } ?>
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
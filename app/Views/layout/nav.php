<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <?php if (session()->get('level') == 1) { ?>
        <!-- Menu-menu halaman admin-->
        <li>
            <a href="<?= base_url('admin') ?>">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('prodi') ?>">Program Studi</a></li>
                <li><a href="<?= base_url('makul') ?>">Mata Kuliah</a></li>
                <li><a href="<?= base_url('dosen') ?>">Dosen</a></li>
                <li><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
                <li class="divider"></li>
                <li><a href="<?= base_url('jabatan') ?>">Set Jabatan</a></li>
                <li class="divider"></li>
                <li><a href="<?= base_url('books') ?>">Buku</a></li>
                <li class="divider"></li>
                <li><a href="<?= base_url('news') ?>">Berita</a></li>
                <li><a href="<?= base_url('headline') ?>">Hotnews</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('ta') ?>">Tahun Akademik</a></li>
                <li><a href="<?= base_url('ta/setting') ?>">Setting Tahun Akadmik</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('kelas') ?>">Kelas</a></li>
                <li><a href="<?= base_url('jadwalkuliah') ?>">Jadwal Kuliah</a></li>
            </ul>
        </li>

        <li>
            <a href="<?= base_url('about') ?>">About</a>
        </li>

        <?php } elseif (session()->get('level') == 2) { ?>
            <!-- Menu-menu halaman dosen-->
            <li>
                <a href="<?= base_url('dsn') ?>">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('dsn/jadwal') ?>">Jadwal Mengajar</a></li>
                <li><a href="<?= base_url('dsn/AbsenKelas') ?>">Absen Kelas</a></li>
                <li><a href="<?= base_url('dsn/NilaiMahasiswa') ?>">Nilai Mahasiswa</a></li>
            </ul>
        <?php } elseif (session()->get('level') == 3) { ?>
            <!-- Menu-menu halaman mahasiswa-->
            <li>
                <a href="<?= base_url('mhs') ?>">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="<?= base_url('krs') ?>">Kartu Rencana Studi (KRS)</a></li>
                <li><a href="<?= base_url('mhs/khs') ?>">Kartu Hasil Studi (KHS)</a></li>
                <li><a href="<?= base_url('mhs/absensi') ?>">Absensi</a></li>
            </ul>
        </li>
        <?php } ?>
</div>

<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
    <?php if (session()->get('username') == "") { ?>
        <li><a href="<?= base_url('auth') ?>"></a></li>
    <?php } else { ?>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <?php if (session()->get('level') == 1) { ?>
                        <img src="<?= base_url('foto/'. session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } elseif (session()->get('level') == 2) { ?>
                        <img src="<?= base_url('fotodosen/'. session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } else { ?>
                        <img src="<?= base_url('fotomhs/'. session()->get('foto')) ?>" class="user-image" alt="User Image">
                    <?php } ?>
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?= session()->get('nama') ?></span>
                </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <?php if (session()->get('level') == 1) { ?>
                                <img src="<?= base_url('foto/'. session()->get('foto')) ?>" class="img-circle" alt="User Image">
                            <?php } elseif (session()->get('level') == 2) { ?>
                                <img src="<?= base_url('fotodosen/'. session()->get('foto')) ?>" class="img-circle" alt="User Image">
                            <?php } else { ?>
                                <img src="<?= base_url('fotomhs/'. session()->get('foto')) ?>" class="img-circle" alt="User Image">
                            <?php } ?>
                            <p>
                                <?= session()->get('nama') ?> - <?php if (session()->get('level') == 1) {
                                echo 'Admin';
                                } elseif (session()->get('level') == 2) {
                                echo session()->get('username');
                                } elseif (session()->get('level') == 3) {
                                echo session()->get('username');
                                } ?>
                                <small><?= date('d M Y') ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url('user') ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
    </ul>
    <?php } ?>
</div>
<!-- /.navbar-custom-menu -->
</div>
<!-- /.container-fluid -->
</nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container"> 
<!-- Main content -->
<section class="content">
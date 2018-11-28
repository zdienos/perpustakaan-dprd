<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DPRD PROVINSI SULAWESI TENGAH</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('node_modules/font-awesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('node_modules/owl.carousel/dist/assets/owl.carousel.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('node_modules/bootstrap-table/dist/bootstrap-table.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('node_modules/lightbox2/dist/css/lightbox.min.css') ?>">



	<script src="<?php echo base_url('node_modules/jquery/dist/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/app.js') ?>"></script>


</head>
<body style="background-color: #f5f5f5;">

	<div class="top-bar mb-3">
		<div class="container">
			<div class="row py-2">
				<div class="col-md-6">
					<p class="mb-0" style="line-height: 30px">
						<span id="date">
							<?php
							$day_index = date('w');
							$day_array = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
							echo $day_array[$day_index];
							?>,
							<?php echo date('d-m-Y') ?></span>
						</p>
				</div>
				<div class="col-md-6 text-right">
					<?php if(!$this->session->has_userdata('perpustakaan_member')): ?>
						<a href="<?php echo base_url('page/member_login') ?>" class="btn btn-warning">Login Anggota</a>
					<?php else: ?>
						<a href="#" class="mr-4 text-white"><?php echo $this->session->userdata('perpustakaan_member')->name ?></a>
						<a href="<?php echo base_url('page/member_logout') ?>" class="btn btn-warning">Logout</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container mb-3">
		<div class="row mb-3">
			<div class="col-md-4">
				<img src="<?php echo base_url('assets/img/logo.png') ?>" class="img-fluid mt-4" alt="">
			</div>

			<div class="col-md-6 offset-md-2">
				<img style=" width: 100%;" src="<?php echo base_url('assets/img/header-bg-dashboard.png') ?>" class="img-fluid mt-4" alt="">
			</div>

		</div>

		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-md navbar-dark bg-primary">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url('/') ?>">Beranda</a>
							</li>
							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url('page/posts') ?>">Berita</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
								<div class="dropdown-menu" aria-labelledby="dropdown01">
									<a class="dropdown-item" href="<?php echo base_url('page/tugas_dan_fungsi') ?>">Tugas dan Fungsi</a>
									<a class="dropdown-item" href="<?php echo base_url('page/struktur_organisasi') ?>">Struktur Organisasi</a>
								</div>
							</li>



							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url('page/katalog') ?>">Katalog</a>
							</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kontak</a>
								<div class="dropdown-menu" aria-labelledby="dropdown01">
									<a class="dropdown-item" href="<?php echo base_url('page/kontak') ?>">Alamat</a>
									<a class="dropdown-item" href="<?php echo base_url('page/buku_tamu') ?>">Buku Tamu</a>
								</div>
							</li>






							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url('page/informasi') ?>">Informasi</a>
							</li>

							<li class="nav-item active">
								<a class="nav-link" href="<?php echo base_url('page/ebook') ?>">E-Book</a>
							</li>


						</ul>
					</div>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-breaking-news bg-dark text-white" style="border-top-left-radius: 0; border-top-right-radius">
					<div class="card-body">

						<marquee behavior="" direction="">Kemendagri Langsung Kirim Bantuan ke Lokasi Gempa di NTB |2018-08-07 00:32:58</marquee>
						<div class="card-breaking-news__label">Breaking News</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{content}

	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="<?php echo base_url('assets/img/logo-dark.png') ?>" class="img-fluid mb-3" style="margin-left: -10px;" alt="">
				</div>
				<!-- <div class="col-md-8">
					<h3>Perpustakaan Digital</h3>
					<div class="content">
						<p>Ruang baca nyaman dan koleksi buku lengkap, Kunjungi kami di.</p>
						<dl class="row">
							<dt class="col-sm-3">Email</dt>
							<dd class="col-sm-9">admin@perpustakaan.com</dd>

							<dt class="col-sm-3">Phone</dt>
							<dd class="col-sm-9">(021) 3522738</dd>

							<dt class="col-sm-3">Fax</dt>
							<dd class="col-sm-9">(021) 3522738</dd>

							<dt class="col-sm-3">Address</dt>
							<dd class="col-sm-9">Jl. Medan Merdeka Utara No. 7 Jakarta, Indonesia Kode Post: 10110</dd>


						</dl>
					</div>
				</div> -->
			</div>
			<!-- <div class="row">
				<div class="col-md-3">
					<h3>Terbuka Untuk Umum</h3>
					<p>Perpustakaan Kemendagri dibuka untuk umum, namun tetap memberlakukan sistem membership bagi pengguna yang akan melakukan transaksi pinjam meminjam buku</p>
				</div>
				<div class="col-md-3">
					<h3>Koleksi Ebook</h3>
					<p>Seluruh produk perundang-undangan yang dihasilkan Kementerian Dalam Negeri telah dikonversi kedalam file E-book sehingga dapat didownload dan dimanfaatkan secara luas oleh seluruh pengunjung E-library</p>
				</div>
				<div class="col-md-6">
					<h3>Perpustakaan Digital</h3>
					<p>Penerapan teknologi informasi di perpustakaan dapat difungsikan dalam berbagai bentuk. Di antaranya sebagai sistem informasi manajemen perpustakaan. Bidang pekerjaan yang diintegrasikan dalam sistem ini adalah akuisisi, katalogisasi, sirkulasi, preservasi, dan jenis laporan lainnya yang menunjang kepentingan manajemen perpustakaan. Penerapan teklonogi informasi dapat juga dimanfaatkan sebagai sarana pendukung dalam aktivitas perpustakaan dan penyebarluasan informasi layanan perpustakaan secara ekstensif dan intensif</p>
				</div>
			</div> -->
		</div>
	</footer>







	<script src="<?php echo base_url('node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/owl.carousel/dist/owl.carousel.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/bootstrap-table/dist/bootstrap-table.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/bootstrap-table/dist/locale/bootstrap-table-en-US.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/lightbox2/dist/js/lightbox.min.js') ?>"></script>
</body>
</html>

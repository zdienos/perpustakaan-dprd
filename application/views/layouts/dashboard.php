<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>:: Admin Dashboard ::</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- link rel="stylesheet" href="< ?php echo base_url('assets/css/app.css') ?>"-->

	<link rel="stylesheet" href="<?php echo base_url('assets/bs-413/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/my.css') ?>">


	<link rel="stylesheet" href="<?php echo base_url('node_modules/font-awesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('node_modules/bootstrap-table/dist/bootstrap-table.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('node_modules/select2/dist/css/select2.min.css') ?>">

	<style>
		/* Show it is fixed to the top */
		body {
		  	min-height: 75rem;
		}
	</style>

	<script src="<?php echo base_url('node_modules/jquery/dist/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/app.js') ?>"></script>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-primary">
		<!-- <a class="navbar-brand" href="#">Dashboard</a> -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('dashboard/home') ?>">Home</a></li>
				<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('dashboard/bibliography/catalog') ?>">Katalog</a></li>
				<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('dashboard/bibliography/collection') ?>">Koleksi</a></li>
				<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('dashboard/member/member') ?>">Keanggotaan</a></li>
				<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('dashboard/masterfile/gmd') ?>">Master File</a></li>
				<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('dashboard/content/post') ?>">Berita</a></li>
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item active"><a class="nav-link" href="<?php echo base_url('dashboard/home/logout') ?>">Logout</a></li>
			</ul>
		</div>
	</nav>

	<section class="banner-section">
		<div class="container-fluid px-0">
			<div class="row">
				<div class="col-md-6">
					<img src="<?php echo base_url('assets/img/logo.png') ?>" class="img-fluid mt-4" alt="" style="width: 270px; margin-left: 20px;">
				</div>
				<div class="col-md-6">
					<img src="<?php echo base_url('assets/img/header-bg-dashboard.png') ?>" class="img-fluid" style="width: 100%;" alt="">
				</div>
			</div>
		</div>
	</section>

	<section class="main-section bg-light">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 px-0">
					{submenu}
				</div>
				<div class="col-md-10 px-0 bg-white">
					<p class="p-3 mb-0 bg-light">Selamat datang di automasi perpustakaan, saat ini anda login sebagai <strong><?php echo $this->session->userdata('perpustakaan_administrator')->name ?></p>
					{content}
				</div>
			</div>

		</div>
	</section>


	<footer class="footer-section bg-primary py-3">
		<p class="text-center mb-0"><span class="text-white">Kementerian Dalam Negeri Library Automation</span> - Jl. Merdeka Utara No. 7 Jakarta, Indonesia Postal Code : 10110</p>
	</footer>




	<script src="<?php echo base_url('node_modules/popper.js/dist/umd/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/bootstrap-table/dist/bootstrap-table.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/bootstrap-table/dist/locale/bootstrap-table-en-US.min.js') ?>"></script>

	<script src="<?php echo base_url('node_modules/select2/dist/js/select2.full.min.js') ?>"></script>
	<script src="<?php echo base_url('node_modules/slugify/index.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendor/ckeditor/ckeditor.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendor/ckfinder/ckfinder.js') ?>"></script>

</body>
</html>

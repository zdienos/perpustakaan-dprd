<div class="container mb-5">
	<div class="row">
		
		<div class="col-md-4">
			<div class="card">
			
				<div class="card-body">
					<h5 class="card-title">Jumlah Koleksi Buku</h5>
					<h2 class="card-title"><?php echo $this->Collectionmodel->count() ?></h2>
					<p class="card-text"><small class="text-muted">Update Terakhir : <?php echo $this->Collectionmodel->get_updated_at() ?></small></p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title mb-0">Jam Pelayanan</h5>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Senin: 08.00 - 17:00</li>
					<li class="list-group-item">Selasa: 08.00 - 17:00</li>
					<li class="list-group-item">Rabu: 08.00 - 17:00</li>
					<li class="list-group-item">Kamis: 08.00 - 17:00</li>
					<li class="list-group-item">Jum'at: 08.00 - 17:00</li>
					<!-- <li class="list-group-item">Sabtu: 08.00 - 17:00</li> -->
				</ul>
				
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
			
				<div class="card-body">
					<h5 class="card-title">Ketentuan Peminjaman</h5>
					<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad praesentium nostrum quidem omnis alias, iure nam eveniet laudantium enim dignissimos ratione, voluptas natus repudiandae, recusandae. Dolorum incidunt, sapiente explicabo voluptate!</p>
					<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad praesentium nostrum quidem omnis alias, iure nam eveniet laudantium enim dignissimos ratione, voluptas natus repudiandae, recusandae. Dolorum incidunt, sapiente explicabo voluptate!</p>
				</div>
			</div>
		</div>
		<!-- <div class="col">
			<div class="accordion mb-2" id="accordionExample">
				<div class="card border-warning">
					<div class="card-header border-warning bg-white" id="headingOne">
						<h5 class="mb-0 text-warning" data-toggle="collapse" data-target="#collapse-informasi" aria-expanded="true" aria-controls="collapse-informasi">
							INFORMASI
						</h5>
					</div>

					<div id="collapse-informasi" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body bg-warning text-white">
							<p class="mb-0">Jumlah Koleksi: 8127 buku</p>
						</div>
					</div>
				</div>

				<div class="card border-warning">
					<div class="card-header border-warning bg-white" id="headingOne">
						<h5 class="mb-0 text-warning" data-toggle="collapse" data-target="#collapse-jam-layanan" aria-expanded="true" aria-controls="collapse-jam-layanan">
							JAM LAYANAN
						</h5>
					</div>

					<div id="collapse-jam-layanan" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body bg-warning text-white">
							<p>
								Senin s.d Kamis  <br>
								08.00 - 16.00 WIB  <br>
								12.00 - 12.30 WIB (istirahat)  <br>
								<br>
								Jumat   <br>
								08.00 - 16.30 WIB  <br>
								12.00 - 13.00 WIB (istirahat) <br>
							</p>
						</div>
					</div>
				</div>

				<div class="card border-warning">
					<div class="card-header border-warning bg-white" id="headingOne">
						<h5 class="mb-0 text-warning" data-toggle="collapse" data-target="#collapse-ketentuan-peminjaman" aria-expanded="true" aria-controls="collapse-ketentuan-peminjaman">
							KETENTUAN PEMINJAMAN
						</h5>
					</div>

					<div id="collapse-ketentuan-peminjaman" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body bg-warning text-white">
							<ul class="pl-3">
								<li>Anggota Perpustakaan Kementerian Dalam Negeri adalah pegawai Kementerian Dalam Negeri</li>
								<li>Mengisi formulir pendaftaran yang telah disediakan petugas perpustakaan</li>
								<li>Setiap anggota perpustakaan mendapat kartu anggota perpustakaan</li>
								<li>Kartu anggota perpustakaan berlaku untuk selama menjadi pegawai Kementerian Dalam Negeri.</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="card border-warning">
					<div class="card-header border-warning bg-white" id="headingOne">
						<h5 class="mb-0 text-warning" data-toggle="collapse" data-target="#collapse-link-terkait" aria-expanded="true" aria-controls="collapse-link-terkait">
							LINK TERKAIT
						</h5>
					</div>

					<div id="collapse-link-terkait" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body bg-warning text-white">
							<a href="#" class="text-white d-block">Sekretariat Jenderal</a>
							<a href="#" class="text-white d-block">Ditjen Politik dan Pemerintahan Umum</a>
							<a href="#" class="text-white d-block">Ditjen Bina Administrasi Kewilayahan</a>
							<a href="#" class="text-white d-block">Ditjen Otonomi Daerah</a>
							<a href="#" class="text-white d-block">Ditjen Bina Pembangunan Daerah</a>
							<a href="#" class="text-white d-block">Ditjen Bina Pemerintahan Desa</a>
							<a href="#" class="text-white d-block">Ditjen Kependudukan dan Pancatatan Sipil</a>
							<a href="#" class="text-white d-block">Ditjen Bina Keuangan Daerah</a>
							<a href="#" class="text-white d-block">Inspektorat Jenderal</a>
							<a href="#" class="text-white d-block">Badan Penelitian dan Pengembangan</a>
							<a href="#" class="text-white d-block">Badan Pengembangan Sumber Daya Manusia</a>
							<a href="#" class="text-white d-block">Institut Pemerintahan Dalam Negeri</a>
							<a href="#" class="text-white d-block">Pusat Penerangan</a>
							<a href="#" class="text-white d-block">Pustaka Keuangan Daerah</a>
							<a href="#" class="text-white d-block">E-Library IPDN</a>
						</div>
					</div>
				</div>
				
				
			</div>
		</div> -->
	</div>

	<div class="row mb-4">
		<div class="col-md-12">
			<h3>BUKU TERBARU</h3>
			<hr>
			<div class="owl-carousel latest-book-carousel">
				<?php if($catalogs): foreach($catalogs as $catalog): ?>
					<div>
						<a href="#" class="latest-book-carousel__inner">
							<div class="latest-book-carousel__inner__text">
								<h6 class="latest-book-carousel__inner__text__title"><?php echo $catalog->title ?></h6>
								<p class="latest-book-carousel__inner__text__author"></p>
								<p class="latest-book-carousel__inner__text__meta"><i class="fa fa-calendar"></i> 2018-08-09 00:00</p>
							</div>
							<?php $cover_image = ($catalog->cover_image !== '') ? $catalog->cover_image : 'No_Cover.jpg' ?>
							<img src="<?php echo base_url('uploads/book/'. $cover_image) ?>" class="img-fluid" alt="">
						</a>
					</div>
				<?php endforeach; endif; ?>
				
			</div>

		</div>
	</div>


	<div class="row">
		<div class="col-md-4">
			<h3>EBOOK</h3>
			<hr>
			<ul class="list-unstyled post-list">
				<?php if($catalogs): foreach($catalogs as $catalog): ?>
					<li class="media mb-3">
						<!-- <img class="mr-3" src=".../64x64" alt="Generic placeholder image"> -->
						<div class="media-body">
							<h6 class="mt-0 mb-2"><a href="<?php echo base_url('page/katalog_detail/'. $catalog->id) ?>"><?php echo $catalog->title ?></a></h6>
							<h6><small><i class="fa fa-calendar"></i> <?php echo $catalog->created_at ?></small></h6>
						</div>
					</li>
				<?php endforeach; endif; ?>
				
			</ul>
		</div>
		<div class="col-md-4">
			<h3>ARTIKEL</h3>
			<ul class="list-unstyled post-list">
				<?php foreach ($artikel_posts as $post): ?>
					<li class="media mb-3">
						<img class="mr-3" style="width: 100px" src="<?php echo base_url('uploads/featured_image/'. $post->featured_image) ?>" alt="Generic placeholder image">
						<div class="media-body">
							<h6 class="mt-0 mb-2"><a href="<?php echo base_url('page/post/'. $post->slug) ?>"><?php echo $post->title ?></a></h6>
							<h6><small><i class="fa fa-calendar"></i> <?php echo $post->created_at ?></small></h6>
						</div>
					</li>

				<?php endforeach ?>
			</ul>
		</div>
		<div class="col-md-4">
			<h3>GALERI PHOTO</h3>
			
			<div class="row">
				<div class="col-sm-2 px-1">
					<a href="<?php echo base_url('assets/img/gallery/325.jpg') ?>" data-lightbox="image-325">
						<img style="width: 100%" src="<?php echo base_url('assets/img/gallery/325.jpg') ?>" alt="">
					</a>
				</div>
				<div class="col-sm-2 px-1">
					<a href="<?php echo base_url('assets/img/gallery/325%20%288%29.jpg') ?>" data-lightbox="image-325%20%288%29">
						<img style="width: 100%" src="<?php echo base_url('assets/img/gallery/325%20%288%29.jpg') ?>" alt="">
					</a>
				</div>
				<div class="col-sm-2 px-1">
					<a href="<?php echo base_url('assets/img/gallery/325%20%287%29.jpg') ?>" data-lightbox="image-325%20%287%29">
						<img style="width: 100%" src="<?php echo base_url('assets/img/gallery/325%20%287%29.jpg') ?>" alt="">
					</a>
				</div>
				<div class="col-sm-2 px-1">
					<a href="<?php echo base_url('assets/img/gallery/325%20%286%29.jpg') ?>" data-lightbox="image-325%20%286%29">
						<img style="width: 100%" src="<?php echo base_url('assets/img/gallery/325%20%286%29.jpg') ?>" alt="">
					</a>
				</div>

			</div>
			
		</div>
	</div>


</div>











<script>
	$(document).ready(function(){
		$(".main-carousel").owlCarousel({
		    loop:true,
		    margin:10,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:1,
		            nav:true
		        },
		        1000:{
		            items:1,
		            nav:true,
		        }
		    }
		});
		
		$(".latest-book-carousel").owlCarousel({
		    loop:true,
		    margin:10,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:2,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:true
		        },
		        1000:{
		            items:5,
		            nav:true,
		        }
		    }
		});
	});
</script>
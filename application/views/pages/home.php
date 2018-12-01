<div class="container-fluid mb-5">
	<div class="row">
		<div class="col-md-12">
			<div class="owl-carousel main-carousel">
				<?php foreach($latest_posts as $post): ?>
					<div>
						<div class="main-carousel__inner">
							<div class="main-carousel__inner__text">
								<div class="btn-group mb-2" role="group">
									<?php foreach($post->categories as $category): ?>
										<a href="#" class="btn btn-warning text-dark"><?php echo $category->title ?></a>
									<?php endforeach ?>
									<button type="button" class="btn btn-secondary bg-dark border-dark text-warning"><?php echo $post->created_at ?></button>
								</div>
								<h4><a href="<?php echo base_url('page/post/'. $post->slug) ?>"><?php echo $post->title ?></a></h4>
							</div>
							<img src="<?php echo base_url('uploads/featured_image/'. $post->featured_image) ?>" class="img-fluid" style="object-fit: scale-down;" alt="">
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>

		  <!--
			<div class="col-md-4">
				<h3 class="btn btn-warning btn-lg text-dark mb-0">Category</h3>
				<hr>

				<div class="list-group mb-2">
					< ?php foreach($categories as $category): ?>
						<a href="#" class="list-group-item list-group-item-action mb-2 bg-secondary text-white" style="font-size: 0.7rem;">< ?php echo $category->title ?></a>
					< ?php endforeach ?>

				</div>
			</div>
		-->

	</div>

	<div class="row mb-4">
		<div class="col-md-12">
			<h3>BERITA-BERITA</h3>
			<hr>
			<div class="owl-carousel latest-book-carousel">
				<?php if($catalogs): foreach($catalogs as $catalog): ?>
					<div>
						<a href="#" class="latest-book-carousel__inner" style="height: 30vh;">
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

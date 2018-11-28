<div class="container mb-5">
	

	<div class="row mb-4">
		<div class="col-md-12">
			<iframe style="width: 100%; height: 900px;" src="<?php echo base_url('uploads/book/'. $catalog->pdf_file) ?>" frameborder="0"></iframe>
		</div>
	</div>

	<div class="row mb-4">
		<div class="col-md-12">
			<h3>BUKU TERBARU</h3>
			<hr>
			<div class="owl-carousel latest-book-carousel">
				<?php if($catalogs): foreach($catalogs as $catalog): ?>
					<div>
						<a href="<?php echo base_url('page/katalog_detail/'. $catalog->id) ?>" class="latest-book-carousel__inner">
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
							<h6 class="mt-0 mb-2"><a href="#"><?php echo $catalog->title ?></a></h6>
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


		$('.table-data').bootstrapTable({
			toolbar: ".table-data-toolbar",
			classes: 'table table-striped table-no-bordered',
			search: true,
			showRefresh: true,
			// showToggle: true,
			// showColumns: true,
			// showExport: true,
			// showPaginationSwitch: true,
			pagination: true,
			pageList: [10, 25, 50, 100, 'ALL'],
			// showFooter: false,
			sidePagination: 'server',
			url: "<?php echo base_url('page/json_katalog') ?>",
			columns: [
                {
                    field: 'id',
                    title: 'Action',
                    class: 'align-top',
                    formatter: function(value, row, index){

                    	var html = '';
                    	html += `
                    			<a class="btn btn-primary btn-sm" href="${base_url('uploads/book/' + row.pdf_file)}" target="_blank"><i class="fa fa-file-pdf-o"></i> Detail</a>`;
                    	if(row.pdf_file){
                    		html += `
                    			<a class="btn btn-danger btn-sm" href="${base_url('uploads/book/' + row.pdf_file)}" target="_blank"><i class="fa fa-file-pdf-o"></i> Baca</a>`;
                		}

                		return html;

                        
                    }
                },
                {
                    field: 'cover_image',
                    title: 'Cover Image',
                    class: 'align-top',
                    formatter: function(value, row, index){
                        var cover_image = value !== '' ? value : 'No_Cover.jpg'; 
                        return `<img src="${base_url('uploads/book/' + cover_image)}" alt="" style="width: 100px;"/>`
                    }
                },
                
                {
                    field: 'title',
                    title: 'Title',
                    class: 'align-top',
                    sortable: true,
                },
                {
                    field: 'edition',
                    title: 'Edition',
                    class: 'align-top',
                    sortable: true,
                },
                {
                    field: 'collection_number',
                    title: 'Jumlah Koleksi',
                    class: 'align-top',
                    sortable: true,
                },
                {
                    field: 'created_at',
                    title: 'Dibuat pada',
                    class: 'align-top',
                    sortable: true,
                },
                {
                    field: 'updated_at',
                    title: 'Diubah pada',
                    class: 'align-top',
                    sortable: true,
                },
            ]
		});


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
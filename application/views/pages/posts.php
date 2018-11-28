



<div class="latest-news-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php foreach($results as $post): ?>
						<div class="col-md-6 mb-3">
							<div class="card no-border">
								<div class="card-img-wrapper">
									<img src="<?php echo base_url('uploads/featured_image/'. $post->featured_image) ?>" alt="">
								</div>
								<div class="card-body">
									<h4><a href="<?php echo base_url('page/post/'. $post->slug) ?>"><?php echo $post->title ?></a></h4>
									<p class="text-muted mb-1"><small>Author: <a href="#">Administrator</a>, Created at: <?php echo $post->created_at ?></small></p>
									<p class="text-muted"><small>Category : <a href="#">lorem</a>, <a href="#">ipsum</a></small></p>
								</div>
							</div>
						</div>
					<?php endforeach ?>

				</div>

				<div class="mt-3">
					<?php echo $links ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="list-group">
					<?php foreach($latest_posts as $post): ?>
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
						<div class="d-flex w-100 justify-content-between">
							<h5 class="mb-1" style="color: #158765;"><?php echo $post->title ?></h5>
						</div>
						<small><?php echo $post->created_at ?></small>
						<small>Donec id elit non mi porta.</small>
					</a>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>
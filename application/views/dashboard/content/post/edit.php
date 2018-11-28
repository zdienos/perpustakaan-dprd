
<div class="card border-light">
	<div class="card-header">
		<h5 class="mb-0">Edit post</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/content/post/update/'. $post->id) ?>" method="post" enctype="multipart/form-data">

		
			<input type="hidden" name="id" id="id" value="<?php echo $post->id ?>">
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo set_value('title', $post->title) ?>">
				<?php echo form_error('title') ?>
			</div>

			<script>
				$(function(){
					function titleOnChangeHandler(){
						$('#slug').val(slugify($('#title').val()).toLowerCase());
					}
					$('#title').on('input', titleOnChangeHandler);
				});
			</script>

			<div class="form-group">
				<label for="slug">Slug</label>
				<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="<?php echo set_value('slug', $post->slug) ?>">
				<?php echo form_error('slug') ?>
			</div>

			<div class="form-group">
				<label for="category_ids">Categories</label>
				<select class="form-control" id="category_ids" name="category_ids[]" placeholder="Categories" multiple="">
					<?php foreach($categories as $category): ?>
						<option <?php echo set_select('category_ids', $category->id, in_array($category->id, $post->category_ids)) ?> value="<?php echo $category->id ?>"><?php echo $category->title ?></option>
					<?php endforeach; ?>
				</select>
				<?php echo form_error('category_ids') ?>
			</div>

			<div class="form-group">
				<label for="featured_image">Featured Image</label>
				<input type="file" class="form-control" id="featured_image" name="featured_image" placeholder="Featured Image" value="<?php echo set_value('featured_image') ?>">
				<p class="text-muted mt-2">ignore if you don't want to replace the image</p>
				<?php echo form_error('featured_image') ?>
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<textarea rows="10" class="form-control" id="content" name="content" placeholder="Content"><?php echo set_value('content', $post->content) ?></textarea>
				<?php echo form_error('content') ?>
			</div>

			<a href="<?php echo base_url('dashboard/content/post') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
			
		</form>
	</div>
</div>

<script>
	$(function(){
		var editor = CKEDITOR.replace('content');
		CKFinder.setupCKEditor( editor );
	});
</script>
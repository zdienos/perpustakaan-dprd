<div class="container">
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<div class="card border-light">
				<div class="card-header">
					<h5 class="mb-0">Add new book</h5>
				</div>
				<div class="card-body">

					<form action="<?php echo base_url('dashboard/book/store') ?>" method="post" enctype="multipart/form-data">

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="title">Title</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo set_value('title') ?>">
									<?php echo form_error('title') ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="isbn_issn">ISBN/ISSN</label>
									<input type="text" class="form-control" id="isbn_issn" name="isbn_issn" placeholder="ISBN/ISSN" value="<?php echo set_value('isbn_issn') ?>">
									<?php echo form_error('isbn_issn') ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="author_id">Author</label>
									<select name="author_id" id="author_id" class="form-control">
										<option value=""></option>
										<?php foreach($authors as $author): ?>
											<option <?php echo set_select('author_id', $author->id) ?> value="<?php echo $author->id ?>"><?php echo $author->first_name . ' ' . $author->middle_name . ' '. $author->last_name ?></option>
										<?php endforeach; ?>
									</select>
									
									<?php echo form_error('author_id') ?>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="publisher_id">Publisher</label>
									<select name="publisher_id" id="publisher_id" class="form-control">
										<option value=""></option>
										<?php foreach($publishers as $publisher): ?>
											<option <?php echo set_select('publisher_id', $publisher->id) ?> value="<?php echo $publisher->id ?>"><?php echo $publisher->name ?></option>
										<?php endforeach; ?>
									</select>
									
									<?php echo form_error('publisher_id') ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="language_id">Language</label>
									<select name="language_id" id="language_id" class="form-control">
										<option value=""></option>
										<?php foreach($languages as $language): ?>
											<option <?php echo set_select('language_id', $language->id) ?> value="<?php echo $language->id ?>"><?php echo $language->name ?></option>
										<?php endforeach; ?>
									</select>
									
									<?php echo form_error('language_id') ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="category_id">Category</label>
									<select name="category_id" id="category_id" class="form-control">
										<option value=""></option>
										<?php foreach($categories as $category): ?>
											<option <?php echo set_select('category_id', $category->id) ?> value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
										<?php endforeach; ?>
									</select>
									
									<?php echo form_error('category_id') ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="topic">Topic</label>
									<input type="text" class="form-control" id="topic" name="topic" placeholder="Topic" value="<?php echo set_value('topic') ?>">
									<?php echo form_error('topic') ?>
								</div>
							</div>
						</div>
								

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="publication_year">Publication Year</label>
									<input type="text" class="form-control" id="publication_year" name="publication_year" placeholder="Publication Year" value="<?php echo set_value('publication_year') ?>">
									<?php echo form_error('publication_year') ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="cover_img">Cover Image</label>
									<div class="input-group mb-3">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="cover_img" name="cover_img">
											<label class="custom-file-label" for="cover_img">Choose file</label>
										</div>
									</div>
									<?php echo form_error('cover_img') ?>
								</div>								
							</div>
							
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="pdf_file">PDF File</label>
									<div class="input-group mb-3">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="pdf_file" name="pdf_file">
											<label class="custom-file-label" for="pdf_file">Choose file</label>
										</div>
									</div>
									<?php echo form_error('cover_img') ?>
								</div>
							</div>
						</div>

						
						<hr>
								
						<a href="<?php echo base_url('dashboard/book') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
    $('#cover_img, #pdf_file').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        if(fileName !== ''){
        	$(this).next('.custom-file-label').html(fileName);	
        }else{
        	$(this).next('.custom-file-label').html("Choose a file");
        }
        
    });
</script>
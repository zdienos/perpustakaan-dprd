<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card border-light">
				<div class="card-header">
					<h5 class="mb-0">Edit book</h5>
				</div>
				<div class="card-body">
					<form action="<?php echo base_url('dashboard/book/update') ?>" method="post">
						<input type="hidden" name="id" id="id" value="<?php echo $book->id ?>">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo set_value('title', $book->title) ?>">
							<?php echo form_error('title') ?>
						</div>
						<a href="<?php echo base_url('dashboard/book') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


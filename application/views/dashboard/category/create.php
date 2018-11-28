<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card border-light">
				<div class="card-header">
					<h5 class="mb-0">Add new category</h5>
				</div>
				<div class="card-body">
					<form action="<?php echo base_url('dashboard/category/store') ?>" method="post">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo set_value('name') ?>">
							<?php echo form_error('name') ?>
						</div>
						<a href="<?php echo base_url('dashboard/category') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


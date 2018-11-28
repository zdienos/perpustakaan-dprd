<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card border-light">
				<div class="card-header">
					<h5 class="mb-0">Edit author</h5>
				</div>
				<div class="card-body">
					<form action="<?php echo base_url('dashboard/author/update') ?>" method="post">
						<input type="hidden" name="id" id="id" value="<?php echo $author->id ?>">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name', $author->first_name) ?>">
							<?php echo form_error('first_name') ?>
						</div>
						<div class="form-group">
							<label for="middle_name">Middle Name</label>
							<input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name" value="<?php echo set_value('middle_name', $author->middle_name) ?>">
							<?php echo form_error('middle_name') ?>
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name', $author->last_name) ?>">
							<?php echo form_error('last_name') ?>
						</div>

						<div class="form-group">
							<label for="biography">Biography</label>
							<textarea rows="10" class="form-control" id="biography" name="biography" placeholder="Biography"><?php echo set_value('biography', $author->biography) ?></textarea>
							<?php echo form_error('biography') ?>
						</div>
						<a href="<?php echo base_url('dashboard/author') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card border-light">
				<div class="card-header">
					<h5 class="mb-0">Delete category</h5>
				</div>
				<div class="card-body">
					<form action="<?php echo base_url('dashboard/category/destroy') ?>" method="post">
						<input type="hidden" name="id" id="id" value="<?php echo $category->id ?>">
						<p>Are you sure you want to delete <strong><?php echo $category->name ?></strong> ?</p>
						<a href="<?php echo base_url('dashboard/category') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
						<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


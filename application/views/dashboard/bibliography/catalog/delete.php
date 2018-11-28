
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Delete Katalog</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/bibliography/catalog/destroy') ?>" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $catalog->id ?>">
			<p>Are you sure you want to delete <strong><?php echo $catalog->title ?></strong> ?</p>
			<a href="<?php echo base_url('dashboard/bibliography/catalog') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
			<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
			
		</form>
	</div>
</div>
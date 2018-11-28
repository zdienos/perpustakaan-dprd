
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Delete Kategori</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/content/category/destroy') ?>" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $category->id ?>">
			<p>Are you sure you want to delete <strong><?php echo $category->name ?></strong> ?</p>
			<a href="<?php echo base_url('dashboard/content/category') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
			<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
			
		</form>
	</div>
</div>
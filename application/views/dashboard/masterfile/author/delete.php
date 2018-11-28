
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Delete Pengarang</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/masterfile/author/destroy') ?>" method="post">
			<input type="hidden" name="id" id="id" value="<?php echo $author->id ?>">
			<p>Are you sure you want to delete <strong><?php echo $author->name ?></strong> ?</p>
			<a href="<?php echo base_url('dashboard/masterfile/author') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Cancel</a>
			<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
			
		</form>
	</div>
</div>
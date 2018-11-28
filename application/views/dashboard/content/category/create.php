
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Tambah Category</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/content/category/store') ?>" method="post">
			
			<div class="form-group row">
				<label for="title" class="col-sm-2 col-form-label">Title</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title') ?>">
					<?php echo form_error('title') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="slug" class="col-sm-2 col-form-label">Slug</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="slug" name="slug" value="<?php echo set_value('slug') ?>">
					<?php echo form_error('slug') ?>
				</div>
			</div>

			<div class="form-group row">

				<div class="col-sm-8 offset-md-2">
					<a href="<?php echo base_url('dashboard/content/category') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Batal</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		</form>
	</div>
</div>
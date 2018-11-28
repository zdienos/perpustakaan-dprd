
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Edit Lokasi</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/masterfile/location/update/'. $location->id) ?>" method="post">
			<div class="form-group row">
				<label for="code" class="col-sm-2 col-form-label">Kode Lokasi</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="code" name="code" value="<?php echo set_value('code', $location->code) ?>">
					<?php echo form_error('code') ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Nama Lokasi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name', $location->name) ?>">
					<?php echo form_error('name') ?>
				</div>
			</div>

			<div class="form-group row">

				<div class="col-sm-8 offset-md-2">
					<a href="<?php echo base_url('dashboard/masterfile/location') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Batal</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		</form>
	</div>
</div>

<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Tambah Penyedia</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/masterfile/supplier/store') ?>" method="post">
			
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Nama Penyedia</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name') ?>">
					<?php echo form_error('name') ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="address" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="address" name="address"><?php echo set_value('address') ?></textarea>
					<?php echo form_error('address') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="contact" class="col-sm-2 col-form-label">Kontak</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo set_value('contact') ?>">
					<?php echo form_error('contact') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="phone" class="col-sm-2 col-form-label">No Telephone</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone') ?>">
					<?php echo form_error('phone') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="fax" class="col-sm-2 col-form-label">No Fax</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="fax" name="fax" value="<?php echo set_value('fax') ?>">
					<?php echo form_error('fax') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="account" class="col-sm-2 col-form-label">No Akun</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="account" name="account" value="<?php echo set_value('account') ?>">
					<?php echo form_error('account') ?>
				</div>
			</div>

			<div class="form-group row">

				<div class="col-sm-8 offset-md-2">
					<a href="<?php echo base_url('dashboard/masterfile/supplier') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Batal</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		</form>
	</div>
</div>
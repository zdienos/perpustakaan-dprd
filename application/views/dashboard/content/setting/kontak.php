
<div class="card border-light">
	<div class="card-header">
		<h5 class="mb-0">Tugas dan Fungsi</h5>
	</div>
	<div class="card-body">
		
		<form action="<?php echo base_url('dashboard/content/setting/update') ?>" method="post" enctype="multipart/form-data">
			

			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" name="email" id="email" value="<?php echo set_value('email', $kontak->email) ?>">
				<?php echo form_error('email') ?>
			</div>

			<div class="form-group">
				<label for="phone">Phone</label>
				<input type="text" class="form-control" name="phone" id="phone" value="<?php echo set_value('phone', $kontak->phone) ?>">
				<?php echo form_error('email') ?>
			</div>

			<div class="form-group">
				<label for="fax">Fax</label>
				<input type="text" class="form-control" name="fax" id="fax" value="<?php echo set_value('fax', $kontak->fax) ?>">
				<?php echo form_error('fax') ?>
			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<textarea class="form-control" name="address" id="address"><?php echo set_value('address', $kontak->address) ?></textarea>
				<?php echo form_error('address') ?>
			</div>

			<div class="form-group">
				<label for="googlemap_iframe">Google Map IFrame</label>
				<input type="text" class="form-control" name="googlemap_iframe" id="googlemap_iframe" value="<?php echo set_value('googlemap_iframe', $kontak->googlemap_iframe) ?>">
				<?php echo form_error('googlemap_iframe') ?>
			</div>
			
				
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>	
		</form>
	</div>
</div>



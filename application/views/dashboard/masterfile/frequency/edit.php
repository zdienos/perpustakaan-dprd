
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Edit Kala Terbit</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/masterfile/frequency/update/'. $frequency->id) ?>" method="post">
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Nama Kala Terbit</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name', $frequency->name) ?>">
					<?php echo form_error('name') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="language_id" class="col-sm-2 col-form-label">Bahasa</label>
				<div class="col-sm-8">
					<select name="language_id" id="language_id" class="form-control">
						<?php foreach($languages as $language): ?>
							<option <?php echo set_select('language_id', $language->id, ($language->id == $frequency->language_id)) ?> value="<?php echo $language->id ?>"><?php echo $language->name ?></option>
						<?php endforeach ?>
					</select>
					<?php echo form_error('language_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="timeincrement" class="col-sm-2 col-form-label">Selang Waktu</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" id="timeincrement" name="timeincrement" value="<?php echo set_value('timeincrement', $frequency->timeincrement) ?>">
					<?php echo form_error('timeincrement') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="timeunit" class="col-sm-2 col-form-label">Satuan Waktu</label>
				<div class="col-sm-8">
					<select name="timeunit" id="timeunit" class="form-control">
						<option <?php echo set_select('timeunit', 'day', ($frequency->timeunit == 'day')) ?> value="day">Hari</option>
						<option <?php echo set_select('timeunit', 'week', ($frequency->timeunit == 'week')) ?> value="week">Minggu</option>
						<option <?php echo set_select('timeunit', 'month', ($frequency->timeunit == 'month')) ?> value="month">Bulan</option>
						<option <?php echo set_select('timeunit', 'year', ($frequency->timeunit == 'year')) ?> value="year">Tahun</option>
					</select>
					<?php echo form_error('timeunit') ?>
				</div>
			</div>

			<div class="form-group row">

				<div class="col-sm-8 offset-md-2">
					<a href="<?php echo base_url('dashboard/masterfile/frequency') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Batal</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		</form>
	</div>
</div>
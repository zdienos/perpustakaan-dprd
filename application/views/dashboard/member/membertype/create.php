
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Tambah Tipe Keanggotaan</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/member/membertype/store') ?>" method="post">

		

			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Nama Tipe Keanggotaan</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name') ?>">
					<?php echo form_error('name') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="loan_limit" class="col-sm-2 col-form-label">Jumlah Pinjaman</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="loan_limit" name="loan_limit" value="<?php echo set_value('loan_limit') ?>">
					<?php echo form_error('loan_limit') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="loan_periode" class="col-sm-2 col-form-label">Lama Peminjaman (Dalam satuan hari)</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="loan_periode" name="loan_periode" value="<?php echo set_value('loan_periode') ?>">
					<?php echo form_error('loan_periode') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="enable_reserve" class="col-sm-2 col-form-label">Reservasi</label>
				<div class="col-sm-4">
					<select name="enable_reserve" id="enable_reserve" class="form-control">
						<option <?php echo set_select('enable_reserve', 1) ?> value="1">Dimungkinkan</option>
						<option <?php echo set_select('enable_reserve', 0) ?> value="0">Tidak mungkin</option>
					</select>
					<?php echo form_error('enable_reserve') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="reserve_limit" class="col-sm-2 col-form-label">Jumlah Reservasi</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="reserve_limit" name="reserve_limit" value="<?php echo set_value('reserve_limit') ?>">
					<?php echo form_error('reserve_limit') ?>
				</div>
			</div>


			<div class="form-group row">
				<label for="member_periode" class="col-sm-2 col-form-label">Masa Keanggotaan (Dalam satuan hari)</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="member_periode" name="member_periode" value="<?php echo set_value('member_periode') ?>">
					<?php echo form_error('member_periode') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="reborrow_limit" class="col-sm-2 col-form-label">Kali Perpanjangan</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="reborrow_limit" name="reborrow_limit" value="<?php echo set_value('reborrow_limit') ?>">
					<?php echo form_error('reborrow_limit') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="fine_each_day" class="col-sm-2 col-form-label">Denda Per Hari</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="fine_each_day" name="fine_each_day" value="<?php echo set_value('fine_each_day') ?>">
					<?php echo form_error('fine_each_day') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="grace_periode" class="col-sm-2 col-form-label">Toleransi Keterlambatan</label>
				<div class="col-sm-2">
					<input type="number" class="form-control" id="grace_periode" name="grace_periode" value="<?php echo set_value('grace_periode') ?>">
					<?php echo form_error('grace_periode') ?>
				</div>
			</div>

			<div class="form-group row">

				<div class="col-sm-8 offset-md-2">
					<a href="<?php echo base_url('dashboard/member/membertype') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Batal</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		</form>
	</div>
</div>
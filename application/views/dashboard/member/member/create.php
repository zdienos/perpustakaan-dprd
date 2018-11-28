
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Tambah Anggota</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/member/member/store') ?>" method="post" enctype="multipart/form-data">

			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Nama Anggota</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name') ?>">
					<?php echo form_error('name') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="member_id" class="col-sm-2 col-form-label">ID Anggota</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="member_id" name="member_id" value="<?php echo set_value('member_id') ?>">
					<?php echo form_error('member_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="birthday" class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo set_value('birthday') ?>">
					<?php echo form_error('birthday') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="expired_at" class="col-sm-2 col-form-label">Berlaku Hingga</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" id="expired_at" name="expired_at" value="<?php echo set_value('expired_at') ?>">
					<?php echo form_error('expired_at') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="institution" class="col-sm-2 col-form-label">Institusi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="institution" name="institution" value="<?php echo set_value('institution') ?>">
					<?php echo form_error('institution') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="membertype_id" class="col-sm-2 col-form-label">Tipe Member</label>
				<div class="col-sm-8">
					<select name="membertype_id" id="membertype_id" class="form-control">
						<?php foreach($membertypes as $membertype): ?>
							<option <?php echo set_select('membertype_id', $membertype->id) ?> value="<?php echo $membertype->id ?>"><?php echo $membertype->name ?></option>
						<?php endforeach; ?>
					</select>
					<?php echo form_error('institution') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-8">
					<select name="gender" id="gender" class="form-control">
						<option <?php echo set_select('gender', 1) ?> value="1">Laki-laki</option>
						<option <?php echo set_select('gender', 0) ?> value="0">Perempuan</option>
					</select>
					<?php echo form_error('institution') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="address" class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-8">
					<textarea name="address" id="address" cols="30" rows="10" class="form-control"><?php echo set_value('address') ?></textarea>
					<?php echo form_error('address') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="postalcode" class="col-sm-2 col-form-label">Kode Pos</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="postalcode" name="postalcode" value="<?php echo set_value('postalcode') ?>">
					<?php echo form_error('postalcode') ?>
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
				<label for="identity_number" class="col-sm-2 col-form-label">No Identitas (KTP/SIM)</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="identity_number" name="identity_number" value="<?php echo set_value('identity_number') ?>">
					<?php echo form_error('identity_number') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="notes" class="col-sm-2 col-form-label">Catatan</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="notes" name="notes"><?php echo set_value('notes') ?></textarea>
					<?php echo form_error('notes') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="photo" class="col-sm-2 col-form-label">Photo</label>
				<div class="col-sm-8">
					<input type="file" class="form-control" id="photo" name="photo" value="<?php echo set_value('photo') ?>">
					<?php echo form_error('photo') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>">
					<?php echo form_error('email') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password') ?>">
					<?php echo form_error('password') ?>
				</div>
			</div>

			<div class="form-group row">

				<div class="col-sm-8 offset-md-2">
					<a href="<?php echo base_url('dashboard/member/member') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Batal</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		</form>
	</div>
</div>
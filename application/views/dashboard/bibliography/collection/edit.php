
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Edit Koleksi</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/bibliography/collection/update/'. $collection->id) ?>" method="post">

			<div class="form-group row">
				<label for="catalog_id" class="col-sm-2 col-form-label">Catalog</label>
				<div class="col-sm-8">
					<select class="form-control" id="catalog_id" name="catalog_id">
						<option value=""></option>
						<?php foreach($catalogs as $catalog): ?>
							<option <?php echo set_select('catalog_id', $catalog->id, $catalog->id == $collection->catalog_id) ?> value="<?php echo $catalog->id ?>"><?php echo $catalog->title ?></option>
						
						<?php endforeach; ?>
					</select>
					<?php echo form_error('catalog_id') ?>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="code" class="col-sm-2 col-form-label">Kode Koleksi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="code" name="code" value="<?php echo set_value('code', $collection->code) ?>">
					<?php echo form_error('code') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="location_id" class="col-sm-2 col-form-label">Lokasi</label>
				<div class="col-sm-8">
					<select class="form-control" id="location_id" name="location_id">
						<option value=""></option>
						<?php foreach($locations as $location): ?>
							<option <?php echo set_select('location_id', $location->id, $location->id == $collection->location_id) ?> value="<?php echo $location->id ?>"><?php echo $location->name ?></option>
						<?php endforeach; ?>
					</select>
					<?php echo form_error('location_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="location_cabinet" class="col-sm-2 col-form-label">Lokasi Rak</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="location_cabinet" name="location_cabinet" value="<?php echo set_value('location_cabinet', $collection->location_cabinet) ?>">
					<?php echo form_error('location_cabinet') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="collectiontype_id" class="col-sm-2 col-form-label">Tipe Koleksi</label>
				<div class="col-sm-8">
					<select class="form-control" id="collectiontype_id" name="collectiontype_id">
						<option value=""></option>
						<?php foreach($collectiontypes as $collectiontype): ?>
							<option <?php echo set_select('collectiontype_id', $collectiontype->id, $collectiontype->id == $collection->collectiontype_id) ?> value="<?php echo $collectiontype->id ?>"><?php echo $collectiontype->name ?></option>
						<?php endforeach; ?>
					</select>
					<?php echo form_error('collectiontype_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="collectionstatus_id" class="col-sm-2 col-form-label">Status Koleksi</label>
				<div class="col-sm-8">
					<select class="form-control" id="collectionstatus_id" name="collectionstatus_id">
						<option value=""></option>
						<?php foreach($collectionstatuss as $collectionstatus): ?>
							<option <?php echo set_select('collectionstatus_id', $collectionstatus->id, $collectionstatus->id == $collection->collectionstatus_id) ?> value="<?php echo $collectionstatus->id ?>"><?php echo $collectionstatus->name ?></option>
						<?php endforeach; ?>
					</select>
					<?php echo form_error('collectionstatus_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="order_number" class="col-sm-2 col-form-label">Nomor Pemesanan</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="order_number" name="order_number" value="<?php echo set_value('order_number', $collection->order_number) ?>">
					<?php echo form_error('order_number') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="order_date" class="col-sm-2 col-form-label">Tanggal Pemesanan</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" id="order_date" name="order_date" value="<?php echo set_value('order_date', $collection->order_number) ?>">
					<?php echo form_error('order_date') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="receipt_date" class="col-sm-2 col-form-label">Tanggal Penerimaan</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" id="receipt_date" name="receipt_date" value="<?php echo set_value('receipt_date', $collection->receipt_date) ?>">
					<?php echo form_error('receipt_date') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="supplier_id" class="col-sm-2 col-form-label">Supplier</label>
				<div class="col-sm-8">
					<select class="form-control" id="supplier_id" name="supplier_id">
						<option value=""></option>
						<?php foreach($suppliers as $supplier): ?>
							<option <?php echo set_select('supplier_id', $supplier->id, $supplier->id == $collection->supplier_id) ?> value="<?php echo $supplier->id ?>"><?php echo $supplier->name ?></option>
						<?php endforeach; ?>
					</select>
					<?php echo form_error('supplier_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="invoice" class="col-sm-2 col-form-label">Invoice</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="invoice" name="invoice" value="<?php echo set_value('invoice', $collection->invoice) ?>">
					<?php echo form_error('invoice') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="invoice_date" class="col-sm-2 col-form-label">Tanggal Invoice</label>
				<div class="col-sm-8">
					<input type="date" class="form-control" id="invoice_date" name="invoice_date" value="<?php echo set_value('invoice_date', $collection->invoice_date) ?>">
					<?php echo form_error('invoice_date') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="price" class="col-sm-2 col-form-label">Harga</label>
				<div class="col-sm-8">
					<input type="number" class="form-control" id="price" name="price" value="<?php echo set_value('price', $collection->price) ?>">
					<?php echo form_error('price') ?>
				</div>
			</div>

			

			<div class="form-group row">

				<div class="col-sm-8 offset-md-2">
					<a href="<?php echo base_url('dashboard/masterfile/collection') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Batal</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		</form>
	</div>
</div>
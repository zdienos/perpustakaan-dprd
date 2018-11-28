
<div class="card" style="border-radius: 0; border: none;">
	<div class="card-header">
		<h5 class="mb-0">Tambah Katalog</h5>
	</div>
	<div class="card-body">
		<form action="<?php echo base_url('dashboard/bibliography/catalog/store') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="title" class="col-sm-2 col-form-label">Title</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title') ?>">
					<?php echo form_error('title') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="edition" class="col-sm-2 col-form-label">Edisi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="edition" name="edition" value="<?php echo set_value('edition') ?>">
					<?php echo form_error('edition') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="detail" class="col-sm-2 col-form-label">Detail</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="detail" name="detail" rows="7"><?php echo set_value('detail') ?></textarea>
					<?php echo form_error('detail') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="gmd_id" class="col-sm-2 col-form-label">GMD</label>
				<div class="col-sm-8">
					<select class="form-control" id="gmd_id" name="gmd_id">
						<option value=""></option>
						<?php foreach($gmd as $gmd): ?>
							<option <?php echo set_select('gmd_id', $gmd->id) ?> value="<?php echo $gmd->id ?>"><?php echo $gmd->name ?></option>
						<?php endforeach; ?>
					</select>
					<?php echo form_error('gmd_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo set_value('isbn') ?>">
					<?php echo form_error('isbn') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="author_id" class="col-sm-2 col-form-label">Author</label>
				<div class="col-sm-8">
					<select class="form-control" id="author_id" name="author_id" >
						<option value=""></option>
						<?php foreach($authors as $author): ?>
							<option <?php echo set_select('author_id', $author->id) ?> value="<?php echo $author->id ?>"><?php echo $author->name ?></option>
						<?php endforeach ?>
					</select>
					<?php echo form_error('author_id') ?>
				</div>
			</div>


			<div class="form-group row">
				<label for="publisher_id" class="col-sm-2 col-form-label">Publisher</label>
				<div class="col-sm-8">
					<select class="form-control" id="publisher_id" name="publisher_id" >
						<option value=""></option>
						<?php foreach($publishers as $publisher): ?>
							<option <?php echo set_select('publisher_id', $publisher->id) ?> value="<?php echo $publisher->id ?>"><?php echo $publisher->name ?></option>
						<?php endforeach ?>
					</select>
					<?php echo form_error('publisher_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="publication_year" class="col-sm-2 col-form-label">Publication Year</label>
				<div class="col-sm-8">
					<select class="form-control" id="publication_year" name="publication_year" value="<?php echo set_value('publication_year') ?>">
						<option value=""></option>
						<?php for($i = date('Y'); $i > 1990; $i--): ?>
							<option <?php echo set_select('publication_year', $i) ?> value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php endfor; ?>
					</select>
					<?php echo form_error('publication_year') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="publication_place_id" class="col-sm-2 col-form-label">Publication Place</label>
				<div class="col-sm-8">
					<select class="form-control" id="publication_place_id" name="publication_place_id" >
						<option value=""></option>
						<?php foreach($places as $place): ?>
							<option <?php echo set_select('publication_place_id', $place->id) ?> value="<?php echo $place->id ?>"><?php echo $place->name ?></option>
						<?php endforeach ?>
					</select>
				
					<?php echo form_error('publication_place_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="collation" class="col-sm-2 col-form-label">Collation</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="collation" name="collation" value="<?php echo set_value('collation') ?>">
					<?php echo form_error('collation') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="series_title" class="col-sm-2 col-form-label">Series Title</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="series_title" name="series_title" value="<?php echo set_value('series_title') ?>">
					<?php echo form_error('series_title') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="language_id" class="col-sm-2 col-form-label">Language</label>
				<div class="col-sm-8">
					<select name="language_id" id="language_id" class="form-control">
						<option value=""></option>
						<?php foreach($languages as $language): ?>
							<option <?php echo set_select('language_id', $language->id) ?> value="<?php echo $language->id ?>"><?php echo $language->name ?></option>
						<?php endforeach ?>
					</select>
					<?php echo form_error('language_id') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="note" class="col-sm-2 col-form-label">Note</label>
				<div class="col-sm-8">
					<textarea class="form-control" id="note" name="note" rows="7"><?php echo set_value('note') ?></textarea>
					<?php echo form_error('note') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="cover_image" class="col-sm-2 col-form-label">Cover Image</label>
				<div class="col-sm-8">
					<input type="file" class="form-control" id="cover_image" name="cover_image" value="<?php echo set_value('cover_image') ?>">
					<?php echo form_error('cover_image') ?>
				</div>
			</div>

			<div class="form-group row">
				<label for="pdf_file" class="col-sm-2 col-form-label">PDF File</label>
				<div class="col-sm-8">
					<input type="file" class="form-control" id="pdf_file" name="pdf_file" value="<?php echo set_value('pdf_file') ?>">
					<?php echo form_error('pdf_file') ?>
				</div>
			</div>

			<div class="form-group row">

				<div class="col-sm-8 offset-md-2">
					<a href="<?php echo base_url('dashboard/bibliography/catalog') ?>" class="btn btn-secondary"><i class="fa fa-ban"></i> Batal</a>
					<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		</form>
	</div>
</div>
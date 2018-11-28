
<div class="card border-light">
	<div class="card-header">
		<h5 class="mb-0">Struktur Ogranisasi</h5>
	</div>
	<div class="card-body">
		
		<form action="<?php echo base_url('dashboard/content/setting/update') ?>" method="post" enctype="multipart/form-data">
			

			<div class="form-group">
				<label for="struktur_organisasi">Struktur Ogranisasi</label>
				<textarea rows="20" class="form-control" id="struktur_organisasi" name="struktur_organisasi" placeholder="Content"><?php echo set_value('struktur_organisasi', $struktur_organisasi) ?></textarea>
				<?php echo form_error('struktur_organisasi') ?>
			</div>
			
				
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>	
		</form>
	</div>
</div>


<script>
	$(function(){
		var editor = CKEDITOR.replace('struktur_organisasi');
		CKFinder.setupCKEditor( editor );
	});
</script>
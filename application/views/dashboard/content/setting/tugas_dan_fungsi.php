
<div class="card border-light">
	<div class="card-header">
		<h5 class="mb-0">Tugas dan Fungsi</h5>
	</div>
	<div class="card-body">
		
		<form action="<?php echo base_url('dashboard/content/setting/update') ?>" method="post" enctype="multipart/form-data">
			

			<div class="form-group">
				<label for="tugas_dan_fungsi">Tugas dan Fungsi</label>
				<textarea rows="20" class="form-control" id="tugas_dan_fungsi" name="tugas_dan_fungsi" placeholder="Content"><?php echo set_value('tugas_dan_fungsi', $tugas_dan_fungsi) ?></textarea>
				<?php echo form_error('tugas_dan_fungsi') ?>
			</div>
			
				
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>	
		</form>
	</div>
</div>


<script>
	$(function(){
		var editor = CKEDITOR.replace('tugas_dan_fungsi');
		CKFinder.setupCKEditor( editor );
	});
</script>
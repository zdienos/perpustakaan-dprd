<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card border-light my-4">
				<!-- <div class="card-header">
					<h5 class="mb-0"></h5>
				</div> -->
				<div class="card-body">
					<h3>Dashboard</h3>
					<h5>Selamat datang di automasi perpustakaan, saat ini anda login sebagai <strong><?php echo $this->session->userdata('perpustakaan_administrator')->name ?></strong></h5>

					<pre>
						<?php print_r($this->session->userdata('perpustakaan_administrator')) ?>
					</pre>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container mb-5">
	<div class="row">

		<div class="col-md-8">

			<div class="card">
				<div class="card-body" style="padding: 20px 20px;">
					<h3 class="mb-3">Struktur Organisasi</h3>


					<div class="content">
						<?php echo $struktur_organisasi ?>
					</div>
				</div>
			</div>

		</div>
		<div class="col-4">
			<h3 class="btn btn-warning btn-lg text-dark mb-0">Kategori</h3>
			<hr>
			<div class="list-group mb-2">
				<?php foreach($categories as $category): ?>
					<a href="#" class="list-group-item list-group-item-action mb-2 bg-secondary text-white" style="font-size: 0.7rem;"><?php echo $category->title ?></a>
				<?php endforeach ?>
			</div>
		</div>
		<!-- <div class="col">
			<div class="accordion mb-2" id="accordionExample">
				<div class="card border-warning">
					<div class="card-header border-warning bg-white" id="headingOne">
						<h5 class="mb-0 text-warning" data-toggle="collapse" data-target="#collapse-informasi" aria-expanded="true" aria-controls="collapse-informasi">
							INFORMASI
						</h5>
					</div>

					<div id="collapse-informasi" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body bg-warning text-white">
							<p class="mb-0">Jumlah Koleksi: 8127 buku</p>
						</div>
					</div>
				</div>

				<div class="card border-warning">
					<div class="card-header border-warning bg-white" id="headingOne">
						<h5 class="mb-0 text-warning" data-toggle="collapse" data-target="#collapse-jam-layanan" aria-expanded="true" aria-controls="collapse-jam-layanan">
							JAM LAYANAN
						</h5>
					</div>

					<div id="collapse-jam-layanan" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body bg-warning text-white">
							<p>
								Senin s.d Kamis  <br>
								08.00 - 16.00 WIB  <br>
								12.00 - 12.30 WIB (istirahat)  <br>
								<br>
								Jumat   <br>
								08.00 - 16.30 WIB  <br>
								12.00 - 13.00 WIB (istirahat) <br>
							</p>
						</div>
					</div>
				</div>

				<div class="card border-warning">
					<div class="card-header border-warning bg-white" id="headingOne">
						<h5 class="mb-0 text-warning" data-toggle="collapse" data-target="#collapse-ketentuan-peminjaman" aria-expanded="true" aria-controls="collapse-ketentuan-peminjaman">
							KETENTUAN PEMINJAMAN
						</h5>
					</div>

					<div id="collapse-ketentuan-peminjaman" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body bg-warning text-white">
							<ul class="pl-3">
								<li>Anggota Perpustakaan Kementerian Dalam Negeri adalah pegawai Kementerian Dalam Negeri</li>
								<li>Mengisi formulir pendaftaran yang telah disediakan petugas perpustakaan</li>
								<li>Setiap anggota perpustakaan mendapat kartu anggota perpustakaan</li>
								<li>Kartu anggota perpustakaan berlaku untuk selama menjadi pegawai Kementerian Dalam Negeri.</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="card border-warning">
					<div class="card-header border-warning bg-white" id="headingOne">
						<h5 class="mb-0 text-warning" data-toggle="collapse" data-target="#collapse-link-terkait" aria-expanded="true" aria-controls="collapse-link-terkait">
							LINK TERKAIT
						</h5>
					</div>

					<div id="collapse-link-terkait" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body bg-warning text-white">
							<a href="#" class="text-white d-block">Sekretariat Jenderal</a>
							<a href="#" class="text-white d-block">Ditjen Politik dan Pemerintahan Umum</a>
							<a href="#" class="text-white d-block">Ditjen Bina Administrasi Kewilayahan</a>
							<a href="#" class="text-white d-block">Ditjen Otonomi Daerah</a>
							<a href="#" class="text-white d-block">Ditjen Bina Pembangunan Daerah</a>
							<a href="#" class="text-white d-block">Ditjen Bina Pemerintahan Desa</a>
							<a href="#" class="text-white d-block">Ditjen Kependudukan dan Pancatatan Sipil</a>
							<a href="#" class="text-white d-block">Ditjen Bina Keuangan Daerah</a>
							<a href="#" class="text-white d-block">Inspektorat Jenderal</a>
							<a href="#" class="text-white d-block">Badan Penelitian dan Pengembangan</a>
							<a href="#" class="text-white d-block">Badan Pengembangan Sumber Daya Manusia</a>
							<a href="#" class="text-white d-block">Institut Pemerintahan Dalam Negeri</a>
							<a href="#" class="text-white d-block">Pusat Penerangan</a>
							<a href="#" class="text-white d-block">Pustaka Keuangan Daerah</a>
							<a href="#" class="text-white d-block">E-Library IPDN</a>
						</div>
					</div>
				</div>


			</div>
		</div> -->
	</div>




</div>

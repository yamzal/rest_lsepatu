	<center>
		<h1></h1>
		<h3>Tambah data baru</h3>
	</center>

	<div class="container">
		<div class="col-md-10">
			<form action="<?php echo base_url(). 'admin/data_paket/tambah_aksi'; ?>" method="post">
						
						<div class="form-row">
								<div class="form-group col-md-4">
										<label for="paket_nama">ID Paket</label>
										<input type="text" class="form-control" id="paket_id" name="paket_id">
								</div>
						</div>

						<div class="form-row">
								<div class="form-group col-md-4">
										<label for="paket_nama">Nama Paket</label>
										<input type="text" class="form-control" id="paket_nama" name="paket_nama">
								</div>
						</div>

						<div class="form-row">
								<div class="form-group col-md-4">
										<label for="paket_satuan">Satuan</label>
										<input type="text" class="form-control" id="paket_satuan" name="paket_satuan">
								</div>
						</div>

						<div class="form-row">
								<div class="form-group col-md-4">
										<label for="paket_harga">Harga</label>
										<input type="text" class="form-control" id="paket_harga" name="paket_harga">
								</div>
						</div>
								<button type="submit" class="btn btn-primary">submit</button>
						</form>
			</div>
	</div>

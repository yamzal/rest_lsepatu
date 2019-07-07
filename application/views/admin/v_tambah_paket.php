	<center>
		<h1></h1>
		<h3>Tambah data baru</h3>
	</center>

	<!-- <form action="<?//php echo base_url(). 'admin/data_paket/tambah_aksi'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>Nama Paket</td>
				<td><input type="text" name="paket_nama"></td>
			</tr>
			<tr>
				<td>Satuan</td>
				<td><input type="text" name="paket_satuan"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="paket_harga"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Tambah"></td>
			</tr>
		</table>
	</form> -->

	<div class="container">
		<div class="col-md-10">
			<form action="<?php echo base_url(). 'admin/data_paket/tambah_aksi'; ?>" method="post">
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

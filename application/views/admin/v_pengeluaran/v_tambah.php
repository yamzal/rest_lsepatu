<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta charset="utf-8">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <meta name="description" content="Produk By instagram.com/farhan_rizal_h/">
	<meta name="author" content="Farhan Rizal Hidayat">
	<title>Tambah Data Baru</title>


	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
  <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">

</head>

<?php
        $this->load->view('v_partials/v_sidebar');
  ?>


<!-- page content -->
<div class="container">
	<!-- page heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Tambah Data Baru</h1>
		</div>
	</div>

    <div class="row">
    	<div class="section">
					<div class="card-body">
						<!-- <form action="<?php// echo base_url(). 'admin/data_pengeluaran/tambah_aksi'; ?>" method="post">
								<table>
										<div class="form-group">
											<label>Nama Pengeluaran</label>
											<td><input class="form-control" type="text" name="pengeluaran_nama"></td>
										</div>

											<div class="form-group">
												<label>Total Pengeluaran</label>
												<td><input class="form-control" type="text" name="pengeluaran_harga"></td>
											</div>

											<div class="form-group">
												<label>Keterangan</label>
												<td><input class="form-control" type="text" name="pengeluaran_keterangan"></td>
											</div>

												<tr>
													<td></td>
													<td><input type="submit" value="Tambah"></td>
											</tr>
								</table>
							</form> -->

							<form action="<?php echo base_url(). 'admin/data_pengeluaran/tambah_aksi'; ?>" method="post">
										<div class="form-row-md-4">
												<div class="form-group">
														<label for="pengeluaran_nama">Nama Pengeluaran</label>
														<input type="text" class="form-control" id="pengeluaran_nama" name="pengeluaran_nama">
												</div>
										</div>

										<div class="form-row-md-4">
												<div class="form-group">
														<label for="pengeluaran_harga">Total Pengeluaran</label>
														<input type="text" class="form-control" id="pengeluaran_harga" name="pengeluaran_harga">
												</div>
										</div>

										<div class="form-row-md-4">
												<div class="form-group">
														<label for="pengeluaran_keterangan">Keterangan</label>
														<input type="text" class="form-control" id="pengeluaran_keterangan" name="pengeluaran_keterangan">
												</div>
										</div>
												<button type="submit" class="btn btn-primary">Submit</button>
										</form>
					</div>
				</div>
			</div>


</body>
</html>

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
	<title>Edit Data</title>


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
			<h1 class="page-header">Edit Data</h1>
		</div>
	</div>


<div class="row">
  <div class="section">
				<div class="card-body">
						<?php foreach($tbl_paket as $p){ ?>
						<form action="<?php echo base_url(). 'admin/data_paket/update'; ?>" method="post">

									<div class="form-group">
										<label>ID Pengeluaran</label>
										<td><input class="form-control" type="text" name="pengeluaran_id" disabled value="<?php echo $p->paket_id ?>"></td>
									</div>

									<div class="form-group">
										<label>Tanggal Pengeluaran</label>
										<td><input class="form-control" type="text" name="pengeluaran_tanggal" value="<?php echo $p->paket_nama ?>"></td>
									</div>

									<div class="form-group">
										<label>Nama Pengeluaran</label>
										<td><input class="form-control" type="text" name="pengeluaran_nama" value="<?php echo $p->paket_satuan ?>"></td>
									</div>

									<div class="form-group">
										<label>Total Pengeluaran</label>
										<td><input class="form-control" type="text" name="pengeluaran_harga" value="<?php echo $p->paket_harga ?>"></td>
									</div>

									<tr>
										<td></td>
										<td><input type="submit" value="Simpan"></td>
									</tr>
								</table>

						</form>
						<?php } ?>
				</div>
	</div>
</div>


</body>
</html>

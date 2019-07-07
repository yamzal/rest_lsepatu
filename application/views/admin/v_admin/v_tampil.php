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
	<title>Data Admin</title>


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
        $this->load->view('admin/navbar');
   ?>

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data Admin</li>
</ol>

<!-- page content -->
<div class="container">
	<!-- page heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Data Admin</h1>

		</div>

	</div>

    <div class="mainbody-section text-center">

        <div class="row">

                <div class="section">
                <div class="table-responsive">
                    <table  class="table table-bordered" style="font-size:13px;margin-top:10px;">

	<center><?php echo anchor('admin/user_admin/tambah','Tambah Data'); ?></center>


		<tr>


	<tr>

			<th>No</th>
			<th>Tanggal Daftar</th>
			<th>Nama</th>
			<th>Password</th>
			<th>Email</th>
			<th>Level</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<?php
		$no = 1;

		foreach($tbl_admin as $a){

		foreach($tbl_users as $u){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->users_tanggal ?></td>
			<td><?php echo $u->users_nama ?></td>
			<td><?php echo password_hash("secret password", PASSWORD_DEFAULT) ?></td>
			<td><?php echo $u->users_email ?></td>
			<td><?php echo $u->users_level ?></td>
			<td><?php echo $u->users_status ?></td>

			<td>
			      <?php echo anchor('admin/user_admin/edit/'.$u->users_id,'Edit'); ?>

                              <?php echo anchor('admin/user_admin/hapus/'.$u->users_id,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
	</div>
</body>
</html>

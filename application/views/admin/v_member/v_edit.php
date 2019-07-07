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
        $this->load->view('admin/navbar');
   ?>

<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li><a href="">Data Admin</a></li>
  <li class="active">Edit Data</li>
</ol>

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
	<?php foreach($tbl_users as $u){ ?>
	<form action="<?php echo base_url('index.php/'). 'admin/user_member/update'; ?>" method="post">
	
		    
			<div class="form-group">
				<label>Nama</label>
				<td>
					<input type="hidden" name="users_id" value="<?php echo $u->users_id ?>">
					<input type="hidden" name="users_tanggal" value="<?php echo $u->users_tanggal ?>">
					<input class="form-control" type="text" name="users_nama" value="<?php echo $u->users_nama ?>">
				</td>
			</div>
			<div class="form-group">
				<label>Password</label>
				<td><input class="form-control" type="text" name="users_password" disabled value="<?php echo $u->users_password ?>"></td>
			</div>
			<div class="form-group">
				<label>Email</label>
				<td><input class="form-control" type="text" name="users_email" value="<?php echo $u->users_email ?>"></td>
			</div>
			<div class="form-group">
				<label>Level</label>
				<td><input class="form-control" type="text" name="users_level" value="<?php echo $u->users_level ?>"></td>
			</div>
			<div class="form-group">
				<label>Status</label>
				<td><input class="form-control" type="password" name="users_status"  value="<?php echo $u->users_status ?>"></td>
			</div>
            
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>
			</tr>
		</table>
	</form>	
	<?php } ?>
</body>
</html>
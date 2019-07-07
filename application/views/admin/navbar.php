<style>
    
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
    margin-top: 50px;
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }

#main {
  transition: margin-left .5s;
  padding: 16px;
}
}
</style>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		
		<div class="navbar-header">
		<div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
                <a href="<?php echo base_url('index.php/'). 'admin/user_admin';?>">Data Admin</a>
                <a href="<?php echo base_url('index.php/'). 'admin/user_member';?>">Data Member</a>
                <a href="<?php echo base_url('index.php/'). 'admin/data_paket';?>">Data Paket</a>
                <a href="<?php echo base_url('index.php/'). 'admin/data_pengeluaran';?>">Data Pengeluaran</a>
                <a href="<?php echo base_url('index.php/'). 'admin/laporan';?>">Laporan</a>
            </div>
        </div>
          <span style="font-size:20px;cursor:pointer" class="navbar-brand" onclick="openNav()" >&#9776; SUPER ADMIN</span>						
		</div>
	</div>	
</nav>

<script>
        function openNav() {
        document.getElementById("myNav").style.height = "100%";
        }

        function closeNav() {
        document.getElementById("myNav").style.height = "0%";
        }
</script>


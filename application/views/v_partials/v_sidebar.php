<?php
	$this->load->view("v_partials/v_sidebar_header");
?>

<?php
    //QUERY MENU
    $level = $this->session->userdata('users_level_id');
    $queryMenu =
      "SELECT tbl_menu.menu_id, tbl_menu.menu_title, tbl_menu.menu_icon, tbl_menu.menu_url
      FROM tbl_menu JOIN tbl_menu_akses
      ON tbl_menu.menu_id = tbl_menu_akses.akses_menu_id
      WHERE tbl_menu_akses.akses_level_id = $level
      ORDER BY tbl_menu_akses.akses_menu_id ASC";
    $menu = $this->db->query($queryMenu)->result_array();

 ?>

<div class="menu"><p id="tagname"></p><span></span></div>
<nav id="nav">
		<ul class="main">
				<?php foreach($menu as $m) : ?>
				<li><a href="<?= base_url($m['menu_url']); ?>"><?= $m['menu_title'];?></a></li>
			<?php endforeach; ?>
				<li><a href="<?= base_url('auth/usersLogout');  ?>">Logout</a></li>
		</ul>
</nav>
<div class="overlay"></div>
<?php
	$this->load->view("v_partials/v_sidebar_footer");
?>

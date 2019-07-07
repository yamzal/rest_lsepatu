
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

    <!-- page content -->
    <div class="container">
        <!-- page heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 id="page-header">Panel Menu</h1>
            </div>
        </div>

        <div class="container">
            <div class="col-lg-9">
                <div class="mainbody-section text-center">
                    <div class="row">

                      <?php foreach($menu as $m) : ?>
                        <div class="col-md-3 portfolio-item">
                            <div class="menu-item blue" style="height:150px;">
                                <a href="<?= base_url($m['menu_url']); ?>">
                                    <!-- <i class="fa fa-cart-plus"></i> -->
                                    <?= $m['menu_icon']; ?>
                                    <p style="text-align:left; font-size:14px; padding-left:5px;"><?= $m['menu_title']; ?></p>
                                </a>
                            </div>
                        </div>

                  <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

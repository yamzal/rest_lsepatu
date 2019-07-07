<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model {

  public function AccessMenu()
  {
    //QUERY MENU
    $menu = $this->session->userdata('users_level');
    $queryMenu =
      "SELECT tbl_menu.menu_id, tbl_menu.menu_title, tbl_menu.menu_icon
      FROM tbl_menu JOIN tbl_menu_akses
      ON tbl_menu.menu_id = tbl_menu_akses.akses_menu_id
      WHERE tbl_menu_akses.akses_level_id = $menu
      ORDER BY tbl_menu_akses.akses_menu_id ASC";
      return $menu = $this->db->query($queryMenu)->result_array();

  }

}

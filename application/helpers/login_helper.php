<?php

function is_logged_in()
{
    $ci = get_instance();
    if(!$ci->session->userdata('users_email')){
      redirect('auth');

    } else {
        $level_id = $ci->session->userdata('users_level_id');
        $menu = $ci->uri->segment(1);

         $queryMenu = $ci->db->get_where('tbl_menu',['menu_title' => $menu])->row_array();
         $menu_id = $queryMenu['menu_id'];

        $usersAccess = $ci->db->get_where('tbl_menu_akses',[
          'akses_level_id' => $level_id,
          'akses_menu_id' => $menu_id
        ]);

        if($usersAccess->num_rows() > 1) {
            redirect('auth/blocked');
        }

    }
}

<?php
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();

	}

	public function index()
    {
        $data['title'] = 'Home';
        $data['admin'] = $this->db->get_where('tbl_admin',['admin_username' => $this->session->userdata('admin_username')])->row_array();

        $this->load->view('admin/templates/v_index_header');
				$this->load->view('admin/v_index');
        $this->load->view('admin/templates/v_index_footer');
	}
}

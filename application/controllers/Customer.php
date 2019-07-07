<?php
class Customer extends CI_Controller{
	function __construct()
	{
			parent::__construct();
		 	is_logged_in();
			$this->load->library('form_validation');
			// $this->load->model('M_customer');
	}

	public function index()
    {
        $data['title'] = 'Home';
        $data['users'] = $this->db->get_where('tbl_users',['users_email' => $this->session->userdata('users_email')])->row_array();

        $this->load->view('v_partials/v_index_header',$data);
				$this->load->view("v_partials/v_sidebar");
        $this->load->view('v_index');
        $this->load->view('v_partials/v_index_footer');
			 }
	}

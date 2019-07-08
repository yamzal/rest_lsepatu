<?php
class Owner extends CI_Controller{
	function __construct()
	{
			parent::__construct();
		 	is_logged_in();
			$this->load->model('M_menu');
<<<<<<< HEAD
			$this->load->model('M_paket');
            $this->load->model('M_pegawai');
=======
			$this->load->model('M_pegawai');
>>>>>>> 99c68e503d7d9dc97306a870b28d58767da4951b
	}

	public function index()
    {
        $data['title'] = 'Home';
        $data['users'] = $this->db->get_where('tbl_users',['users_email' => $this->session->userdata('users_email')])->row_array();
				$data['menu'] = $this->db->get_where('tbl_users', ['users_email' => $this->session->userdata('users_email')])->row_array();
				$this->load->model('M_menu','AccessMenu');

        $this->load->view('v_partials/v_index_header',$data);
        $this->load->view("v_partials/v_sidebar");
        $this->load->view('v_index');
        $this->load->view('v_partials/v_index_footer');
			 }

		public function	dataPegawai()
		{
			$data['title'] = 'Data Pegawai';
			$data['pegawai'] = $this->M_pegawai->getPegawai();
<<<<<<< HEAD
            
=======

>>>>>>> 99c68e503d7d9dc97306a870b28d58767da4951b
			$this->load->view('v_partials/v_index_header',$data);
			$this->load->view('v_partials/v_sidebar',$data);
			$this->load->view('v_owner/v_data_pegawai',$data);
			$this->load->view('v_partials/v_index_footer');

		}
	}

<?php
class Owner extends CI_Controller{
	function __construct()
	{
			parent::__construct();
		 	is_logged_in();
			$this->load->model('M_menu');
<<<<<<< HEAD
			$this->load->model('M_paket');
=======
>>>>>>> fbe668e21c4275e6b36065dd9335661b6c741dc7
			$this->load->model('M_pegawai');

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
			
>>>>>>> fbe668e21c4275e6b36065dd9335661b6c741dc7
			$this->load->view('v_partials/v_index_header',$data);
			$this->load->view('v_partials/v_sidebar',$data);
			$this->load->view('v_owner/v_data_pegawai',$data);
			$this->load->view('v_partials/v_index_footer');

		}
	}

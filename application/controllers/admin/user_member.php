<?php 
 
class user_Member extends CI_Controller{
 
	function __construct(){
    parent::__construct();
    	
		$this->load->model('m_member');
        $this->load->helper('url');
	}
 
	function index(){
		$data['tbl_users'] = $this->m_member->tampil_data()->result();
		$this->load->view('admin/v_member/v_tampil',$data);
    }
    
    function tambah(){
		$this->load->view('admin/v_member/v_input');
    }
    
    function tambah_aksi(){
    $nama = $this->input->post('users_nama');
    $password =$this->input->post('users_password');
    $email = $this->input->post('users_email');
    $level = $this->input->post('users_level');
    $status = $this->input->post('users_status');
	
    

 
		$data = array(
			'users_nama' => $nama,
			'users_password' => $password,
      'users_email' => $email,
      'users_level' => $level,
      'users_status' => $status
			);
		$this->m_member->input_data($data,'tbl_users');
		redirect('admin/user_member/index');
    }
    
    function hapus($users_id){
		$where = array('users_id' => $users_id);
		$this->m_member->hapus_data($where,'tbl_users');
		redirect('admin/user_member/index');
    }
    
    function edit($users_id){
		$where = array('users_id' => $users_id);
		$data['tbl_users'] = $this->m_member->edit_data($where,'tbl_users')->result();
		$this->load->view('admin/v_member/v_edit',$data);
    }
    
    function update(){
        $users_id = $this->input->post('users_id');
        $tanggal = $this->input->post('users_tanggal');
        $nama = $this->input->post('users_nama');
    $password =$this->input->post('users_password');
    $email = $this->input->post('users_email');
    $level = $this->input->post('users_level');
    $status = $this->input->post('users_status');
	
    

 
		$data = array(
			'users_nama' => $nama,
			'users_password' => $password,
      'users_email' => $email,
      'users_level' => $level,
      'users_status' => $status
			);
    
        $where = array(
            'users_id' => $users_id
        );
    
        $this->m_member->update_data($where,$data,'tbl_users');
        redirect('admin/user_member/index');
    }
    function logout(){
      $this->session->sess_destroy();
      redirect(base_url('index.php/login'));
    }
}
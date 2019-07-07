<?php 
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

 class Authpegawai extends REST_Controller{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_auth');

       // $this->methods['index_get']['limit'] = 900;
 	}

 	function index_post() {

 		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success get data' );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail get data' , 'data' => null );
		
		$data_user = $this->m_auth->get_pegawai_by_uname($this->post('users_nama'),md5($this->post('users_password')));
		
		if ($data_user) {
			$this->response([
				'status' => true,                    
                    'message' => 'YES',
				'data'=> $data_user
                ], REST_Controller::HTTP_OK);
			
			
		} else {
			$this->response([
				'status' => FALSE,                    
                    'message' => 'NO',
				'data'=> null
                ], REST_Controller::HTTP_NOT_FOUND);
			
		}
 	}









 }
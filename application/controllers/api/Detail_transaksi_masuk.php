<?php 
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

 class Detail_transaksi_masuk extends REST_Controller{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_det_transaksi_masuk');

       // $this->methods['index_get']['limit'] = 900;
 	}


 	function index_post() {

 		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success get data' );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail get data' , 'data' => null );
		
		$data_det_tm = $this->m_det_transaksi_masuk->get_det_tm_by_nofak($this->post('dtm_nofak'));
		
		if ($data_det_tm) {
			$this->response([
				'status' => true,                    
                    'message' => 'YES',
				'data'=> $data_det_tm
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
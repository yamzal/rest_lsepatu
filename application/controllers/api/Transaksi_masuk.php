<?php 
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

 class Transaksi_masuk extends REST_Controller{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_transaksi_masuk');

       // $this->methods['index_get']['limit'] = 900;
 	}

 	




function StatusBelum_post() {

 		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success get data' );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail get data' , 'data' => null );
		
		$data_tm = $this->m_transaksi_masuk->get_tm_belum_by_cus_id($this->post('cus_id'));
		
		if ($data_tm) {
			$this->response([
				'status' => true,                    
                    'message' => 'YES',
				'data'=> $data_tm
                ], REST_Controller::HTTP_OK);
			
			
		} else {
			$this->response([
				'status' => FALSE,                    
                    'message' => 'NO',
				'data'=> null
                ], REST_Controller::HTTP_NOT_FOUND);
			
		}
 	}

 	function StatusSudah_post() {

 		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success get data' );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail get data' , 'data' => null );
		
		$data_tm = $this->m_transaksi_masuk->get_tm_sudah_by_cus_id($this->post('cus_id'));
		
		if ($data_tm) {
			$this->response([
				'status' => true,                    
                    'message' => 'YES',
				'data'=> $data_tm
                ], REST_Controller::HTTP_OK);
			
			
		} else {
			$this->response([
				'status' => FALSE,                    
                    'message' => 'NO',
				'data'=> null
                ], REST_Controller::HTTP_NOT_FOUND);
			
		}
 	}

 	function Status_get() {

 		#Set response API if Success
		$response['SUCCESS'] = array('status' => TRUE, 'message' => 'success get data' );

		#Set response API if Fail
		$response['FAIL'] = array('status' => FALSE, 'message' => 'fail get data' , 'data' => null );
		
		$data_tm = $this->m_transaksi_masuk->get_tm_status();
		
		if ($data_tm) {
			$this->response([
				'status' => true,                    
                    'message' => 'YES',
				'data'=> $data_tm
                ], REST_Controller::HTTP_OK);
			
			
		} else {
			$this->response([
				'status' => FALSE,                    
                    'message' => 'NO',
				'data'=> null
                ], REST_Controller::HTTP_NOT_FOUND);
			
		}
 	}

 	public function updateStatus_put(){

 		$tm_nofak = $this->put('tm_nofak');
 		$data = [
 			'tm_nofak' => $this->put('tm_nofak'),
 			'tm_users_id_cus' => $this->put('tm_users_id_cus'),
 			'tm_nama' => $this->put('tm_nama'),
 			'tm_status' => $this->put('tm_status')

 		];

        

 		if ( $this->m_transaksi_masuk->updateStatus($data, $tm_nofak) > 0 ) {

 			$this->response([
                    'status' => true,                    
                    'message' => 'new mhs has been updated.'
                ], REST_Controller::HTTP_NO_CONTENT);

 		} else {
 			$this->response([
                    'status' => false,                    
                    'message' => 'failed to update data!'
                ], REST_Controller::HTTP_BAD_REQUEST);
 		}
 	}










 }
<?php 
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

 class paket extends REST_Controller{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_paket');

       // $this->methods['index_get']['limit'] = 900;
 	}

 	public function find_All_get() {

 		$paket = $this->get('paket_id');
 		if ($paket === null) {

 			$paket = $this->m_paket->getPaket();
 			
 		} else {
 			$paket = $this->m_paket->getPaket($paket);
 		}

 		if ($paket) {
 			$this->response([
                    'status' => true,                    
                    'data' => $paket 	
                ], REST_Controller::HTTP_OK); 
 		} else {
 			$this->response([
                    'status' => false,                    
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND);
 		}


 	}
 	}

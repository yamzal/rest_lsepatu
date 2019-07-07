<?php  

class m_det_transaksi_masuk extends CI_Model {


	private $table_name = "tbl_detail_transaksi_masuk";





	function get_det_tm_by_nofak($dtm_nofak){
		$this->db->where('dtm_nofak',$dtm_nofak);
		
		return $this->db->get($this->table_name)->result_array();
	}


	
}

?>
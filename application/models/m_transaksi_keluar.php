<?php  

class m_transaksi_keluar extends CI_Model {


	private $table_name = "tbl_transaksi_keluar";


	function get_tk_by_cus_id($cus_id){
		$this->db->where('tm_users_id_cus',$cus_id);		
		$this->db->where('tm_status_bayar','belum');
		$this->db->where('tm_status','belum');

		return $this->db->get($this->table_name)->result_array();
	}

	function get_tm_sudah_by_cus_id($cus_id){
		$this->db->where('tm_users_id_cus',$cus_id);
		
		$this->db->where('tm_status_bayar','belum');
		$this->db->where('tm_status','kering');

		return $this->db->get($this->table_name)->result_array();
	}

	function get_tm_status() {

		$this->db->where('tm_status_bayar','belum');
		return $this->db->get($this->table_name)->result_array();


	}

	public function updateStatus($data, $tm_nofak) {

		$this->db->update('tbl_transaksi_masuk', $data, ['tm_nofak' => $tm_nofak]);
		return $this->db->affected_rows();
	}


	
}

?>
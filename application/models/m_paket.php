<?php  

/**
* 
*/
class m_paket extends CI_Model
{
	
	public function getPaket($paket_id = null) {

		if ($paket_id === null) {

			return $this->db->get('tbl_paket')->result_array();
		} else {

			return $this->db->get_where('tbl_paket', ['paket_id' => $paket_id])->result_array();
		}

	}
    
    function get_data_barang_bykode($kode){
        $hsl=$this->db->query("SELECT * FROM barang WHERE kode='$kode'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'kode' => $data->kode,
                    'nama_barang' => $data->nama_barang,
                    'harga' => $data->harga,
                    'satuan' => $data->satuan,
                    );
            }
        }
        return $hasil;
    }

	function tampil_paket(){
		$hsl=$this->db->query("SELECT paket_id , paket_nama, paket_satuan,paket_harga FROM tbl_paket");
		return $hsl;
	}

	function get_paket($kopak){
		$hsl=$this->db->query("SELECT * FROM tbl_paket WHERE paket_id ='$kopak'");
		return $hsl;
    } 
    
    	function get_member($idmember){
		$hsl=$this->db->query("SELECT * FROM tbl_user WHERE user_id ='$idmember'");
		return $hsl;
	}

	function input_data($data,$table){
        $this->db->insert($table,$data);
    }
    function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
    }
    
    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}

?>
<?php
class M_penjualan extends CI_Model{
function get_member($idmember) {
	$hsl=$this->db->query("SELECT * FROM tbl_user WHERE user_id='$idmember'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'user_id' => $data->user_id,
                    'user_nama' => $data->user_nama,
                    'user_alamat' => $data->user_alamat,
                    'user_no_telp' => $data->user_no_telp,
                    );
            }
        }
        return $hasil;
}

function get_tm_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(tm_nofak,4)) AS kd_max FROM tbl_transaksi_masuk WHERE DATE(tm_tanggal)=CURDATE()");
        $kd = "";
        $tm = "TM";
        if($q->num_rows()>0){
            foreach($q->result() as $k){

                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp );
            }
        }else{
            $kd = "0001";
        }
        return $tm.date('ymd').$kd;
	}



	function simpan_transaksi_masuk($tm_nofak,$total,$total_sepatu,$keterangan,$id_member,$nama,$alamat,$no_telp){

		$tm_users_id_peg = $this->session->userdata('users_id');
		$this->db->query("INSERT INTO tbl_transaksi_masuk(
				tm_nofak,tm_total_sepatu,tm_total,tm_users_id_peg,tm_keterangan,tm_users_id_cus,tm_nama,tm_alamat,tm_no_telp)
				VALUES ('$tm_nofak','$total_sepatu','$total','$tm_users_id_peg','$keterangan','$id_member','$nama','$alamat','$no_telp')");
		foreach ($this->cart->contents() as $item) {

			$data = array(

				'dtm_nofak' => $tm_nofak,
				'dtm_paket_id' => $item['id'],
				'dtm_paket_nama' => $item['name'],
				'dtm_satuan' => $item['satuan'],
				'dtm_harga' => $item['price'],
				'dtm_qty' => $item['qty'],
				'dtm_total' => $item['subtotal']

			);
			$this->db->insert('tbl_detail_transaksi_masuk',$data);

		}
		return true;

	}

	function tampil_transaksi_masuk() {

		$hsl=$this->db->query("SELECT tm_nofak , tm_total_sepatu, tm_total,tm_nama,tm_status FROM tbl_transaksi_masuk WHERE tm_status_bayar = 'belum'");
		return $hsl;
	}
	function get_detail_transaksi_masuk($kode_tm){
		$hsl=$this->db->query("SELECT * FROM tbl_detail_transaksi_masuk  WHERE dtm_nofak = '$kode_tm' ");
		return $hsl;
	}
	function get_transaksi_masuk($kode_tm){
		$hsl=$this->db->query("SELECT * FROM tbl_transaksi_masuk  WHERE tm_nofak = '$kode_tm' ");
		return $hsl;
	}
	function get_detail_transaksi_masuk2($kode_tm) {
		$hsl=$this->db->query("SELECT * FROM tbl_detail_transaksi_masuk  WHERE dtm_nofak = '$kode_tm' ");
		if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'dtm_nofak' => $data->dtm_nofak,
                    'dtm_paket_nama' => $data->dtm_paket_nama,
                    'dtm_satuan' => $data->dtm_satuan,
                    'dtm_harga' => $data->dtm_harga,
                    'dtm_qty' => $data->dtm_qty,
                    'dtm_total' => $data->dtm_total,
                    );
            }
        }
        return $hasil;
	}

	function get_transaksi_masuk2($kode_tm) {
		$hsl=$this->db->query("SELECT * FROM tbl_transaksi_masuk  WHERE tm_nofak = '$kode_tm'");
		if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'tm_total_sepatu' => $data->tm_total_sepatu,
                    'tm_total' => $data->tm_total,
                    'tm_user_id' => $data->tm_user_id,
                    'tm_nama' => $data->tm_nama,
                    'tm_status_bayar' => $data->tm_status_bayar,
                    );
            }
        }
        return $hasil;
	}

	function get_tk_nofak(){
		$q = $this->db->query("SELECT MAX(RIGHT(tk_nofak,4)) AS kd_max FROM tbl_transaksi_keluar WHERE DATE(tk_tanggal)=CURDATE()");
        $kd = "";
        $tk = "TK";
        if($q->num_rows()>0){
            foreach($q->result() as $k){

                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp );
            }
        }else{
            $kd = "0001";
        }
        return $tk.date('ymd').$kd;
	}
	function simpan_transaksi_keluar($tk_nofak,$tm_nofak,$total_sepatu,$total,$jml_uang,$kembalian,$idm,$nama){
		$admin_id="2";
		$this->db->query("INSERT INTO tbl_transaksi_keluar(
				tk_nofak,tk_tm_nofak,tk_total_sepatu,tk_total,tk_jml_uang,tk_kembalian,tk_admin_id,tk_user_id,tk_nama,tk_alamat,tk_no_telp)
				VALUES ('$tk_nofak','$tm_nofak','$total_sepatu','$total','$jml_uang','$kembalian','$admin_id','$idm','$nama','no','no')");



		$this->db->query("update tbl_transaksi_masuk set tm_status_bayar= 'sudah' where tm_nofak='$tm_nofak'");

		return true;

	}

}



 ?>

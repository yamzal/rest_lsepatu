
<?php

class Transaksi_keluar extends CI_Controller{
	function __construct(){
		parent::__construct();


		//$this->load->model('m_paket');
		$this->load->model('m_penjualan');
	}



	function index () {

		$data['data'] = $this->m_penjualan->tampil_transaksi_masuk();
		$kode_tm=$this->input->post('kode_tm');
		$data['kode_dtm']=$this->m_penjualan->get_detail_transaksi_masuk($kode_tm);
		$data['kode_tm']=$this->m_penjualan->get_transaksi_masuk($kode_tm);
		$this->load->view('admin/v_transaksi_keluar',$data);

	}
	function get_member(){
        $idmember=$this->input->post('id_member');
		$data=$this->m_penjualan->get_member($idmember);
		echo json_encode($data);
    }




	// function get_detail_transaksi_masuk2(){
 //        $kode_tm=$this->input->post('kode_tm');
 //        $data=$this->m_penjualan->get_detail_transaksi_masuk($kode_tm);
 //        echo json_encode($data);
 //    }
	// function get_transaksi_masuk2(){
 //        $kode_tm=$this->input->post('kode_tm');
 //        $data=$this->m_penjualan->get_transaksi_masuk($kode_tm);
 //        echo json_encode($data);
 //    }

	function simpan_transaksi_keluar () {
		$total=$this->input->post('total');
		$total_sepatu=$this->input->post('total_sepatu');
		$jml_uang=$this->input->post('jml_uang');
		$kembalian=$this->input->post('kembalian');
		$idm =$this->input->post('idm');
		$nama=$this->input->post('nama');
		$tm_nofak=$this->input->post('tm_nofak');

		$tk_nofak=$this->m_penjualan->get_tk_nofak();
		$this->session->set_userdata('tk_nofak',$tk_nofak);

		$order_proses=$this->m_penjualan->simpan_transaksi_keluar($tk_nofak,$tm_nofak,
			$total_sepatu,$total,$jml_uang,$kembalian,$idm,$nama);


		// if(!empty($jml_uang)) {
		// 	if ($jml_uang > $total) {
		// 		echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
		// 		redirect('admin/transaksi_keluar');
		// 	} else {

		// 		$order_proses=$this->m_penjualan->simpan_transaksi_keluar($tk_nofak,$tm_nofak,$total_sepatu,$total,$jml_uang,$kembalian,$idm,$nama);
		// 	//$this->load->view('admin/alert/alert_sukses');
		// 	redirect('admin/transaksi_keluar');
		// }
		// 	} else {
		// 		redirect('admin/transaksi_keluar');
		// 	}








	}
}

 ?>

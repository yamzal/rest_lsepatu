<?php

class Transaksi_masuk extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_paket');
		$this->load->model('m_penjualan');
		$this->load->library('session');
	}

	function index () {
		$data['data'] = $this->m_paket->tampil_paket();
		$this->load->view('admin/v_Transaksi_masuk',$data);
		//$this->load->view('admin/v_Transaksi_masuk');

	}

	function get_barang(){
        $kode=$this->input->post('kode');
        $data=$this->m_paket->get_data_barang_bykode($kode);
        echo json_encode($data);
    }


	function get_paket() {

		$kopak=$this->input->post('kode_paket');
		$x['paket']=$this->m_paket->get_paket($kopak);
		$this->load->view('admin/v_detail_paket',$x);

	}

	function get_member(){
    $idmember=$this->input->post('kode');
		$data=$this->m_penjualan->get_member($idmember);
		echo json_encode($data);
    }

	function add_to_cart(){

		$kopak=$this->input->post('kode_paket');
		$paket=$this->m_paket->get_paket($kopak);
		$i=$paket->row_array();
		$data = array(
				'id'       => $i['paket_id'],
      		  	'name'     => $i['paket_nama'],
               	'satuan'   => $i['paket_satuan'],
	           'price'   => $i['paket_harga'],
	           'qty'      => $this->input->post('qty'),

		);


		$this->cart->insert($data);
		redirect('admin/transaksi_masuk');
	}
	function remove(){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/transaksi_masuk');
    }

	function simpan_transaksi_masuk () {
		$total=$this->input->post('total');
		$total_sepatu=$this->input->post('total_sepatu');
		$keterangan=$this->input->post('keterangan');
		$id_member =$this->input->post('id_member');
		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$no_telp=$this->input->post('no_telp');

		$tm_nofak=$this->m_penjualan->get_tm_nofak();
		$this->session->set_userdata('tm_nofak',$tm_nofak);

		$order_proses=$this->m_penjualan->simpan_transaksi_masuk($tm_nofak,$total,$total_sepatu,$keterangan,$id_member,$nama,$alamat,$no_telp);

		if ($order_proses) {
			$this->cart->destroy();

			redirect('admin/transaksi_masuk');
		} else {

			redirect('admin/transaksi_masuk');
		}



		// if($order_proses){
		// 	$this->cart->destroy();

		// 	redirect('admin/transaksi_masuk');
		// }



	}



}























 ?>

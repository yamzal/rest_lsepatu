<?php
defined('BASEPATH') OR exit('No direct script access allowed');


    class Laporan2 extends CI_Controller{

    	function __construct(){
            parent::__construct();

            $this->load->model('M_laporan');
        }

        function index() {
        	// $data['lap_bulan']=$this->M_laporan->get_lap_bulan();
        	$this->load->view('admin/v_laporanFarhan',$data);
        }

        function lap_jasa_perbulan() {
            $bulan = $this->input->post('bln');
            $x['jml']=$this->M_laporan->get_total_jasa_perbulan($bulan);
        }








    }

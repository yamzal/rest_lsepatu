<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_laporan');
        $this->load->library('Pdf');


    }


        public function pdf()
        {
          $this->load->library('dompdf_gen');
          $data['url_cetak'] = base_url('index.php/'.$url_cetak);

          $data['tbl_transaksi_keluar'] = $transaksi;

          $this->load->view('print.php',$data);

          $paper_size = 'A4';
          $orientation = 'landscape';
          $html = $this->output->get_output();
          $this->dompdf->set_paper($paper_size, $orientation);

          $this->dompdf->load_html($html);
          $this->dompdf->render();
          $this->dompdf->stream("print.pdf", array('Attachment' =>0));
        }
}

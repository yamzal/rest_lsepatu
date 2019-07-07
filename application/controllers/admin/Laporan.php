<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laporan extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('m_laporan');
    $this->load->library('Pdf');

  }

  public function index()
  {
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Laporan Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'admin/laporan/cetak?filter=1&tahun='.$tgl;
                $transaksi = $this->m_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di m_laporan
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Laporan  Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'admin/laporan/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->m_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di m_laporan
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Laporan  Data Transaksi Tahun '.$tahun;
                $url_cetak = 'admin/laporan/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->m_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di m_laporan
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Laporan Semua Data Transaksi';
            $url_cetak = 'admin/laporan/cetak';
            $transaksi = $this->m_laporan->view_all(); // Panggil fungsi view_all yang ada di m_laporan
        }

    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['tbl_transaksi_keluar'] = $transaksi;
    $data['option_tahun'] = $this->m_laporan->option_tahun();
    $data['title'] = "Laporan";

    $this->load->view('v_partials/v_index_header', $data);
    $this->load->view('v_partials/v_sidebar', $data);
    $this->load->view('admin/v_laporan', $data);


  }

  public function cetak(){
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = $_GET['tanggal'];

            $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
            $transaksi = $this->m_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di m_laporan
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
            $transaksi = $this->m_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di m_laporan
        }else{ // Jika filter nya 3 (per tahun)
            $tahun = $_GET['tahun'];

            $ket = 'Data Transaksi Tahun '.$tahun;
            $transaksi = $this->m_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di m_laporan
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        $ket = 'Semua Data Transaksi';
        $transaksi = $this->m_laporan->view_all(); // Panggil fungsi view_all yang ada di m_laporan
    }

    $data['ket'] = $ket;
    $data['tbl_transaksi_keluar'] = $transaksi;
    $data['option_tahun'] = $this->m_laporan->option_tahun();

    ob_start();    
    $this->load->view('admin/print', $data);
    $this->load->view('v_partials/v_index_footer');  
    $html = ob_get_contents();
    ob_end_clean();

    
    require_once('./html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A3','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Transaksi.pdf', 'D');




}





/* public function cetak_pdf() {
    // load view yang akan digenerate atau diconvert
    $data = array(
      'record'  => $this->db->query("SELECT * FROM tbl_transaksi_keluar")
    );
    $this->load->view('print',$data);
    // dapatkan output html
    $html = $this->output->get_output();
    // Load/panggil library dompdfnya
    $this->load->library('dompdf_gen');
    // Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    //utk menampilkan preview pdf
    $sekarang=date("d:F:Y:h:m:s");
    $this->dompdf->stream("pendaftaran".$sekarang.".pdf",array('Attachment'=>0));
    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    //$this->dompdf->stream("welcome.pdf");
 }
 */

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_laporan extends CI_Model {
  public function view_by_date($date){
        $this->db->where('DATE(tk_tanggal)', $date); // Tambahkan where tanggal nya
        
    return $this->db->get('tbl_transaksi_keluar')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  }
    
  public function view_by_month($month, $year){
        $this->db->where('MONTH(tk_tanggal)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tk_tanggal)', $year); // Tambahkan where tahun
        
    return $this->db->get('tbl_transaksi_keluar')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  }
    
  public function view_by_year($year){
        $this->db->where('YEAR(tk_tanggal)', $year); // Tambahkan where tahun
        
    return $this->db->get('tbl_transaksi_keluar')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  }
    
  public function view_all(){
    return $this->db->get('tbl_transaksi_keluar')->result(); // Tampilkan semua data transaksi
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tk_tanggal) AS tahun'); // Ambil Tahun dari field tk_tanggal
        $this->db->from('tbl_transaksi_keluar'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tk_tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tk_tanggal)'); // Group berdasarkan tahun pada field tk_tanggal
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}
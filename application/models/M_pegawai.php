<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {



    public function registCustomer()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(users_id,4)) AS kd_max FROM tbl_users");
          $kd = "";
          $cs = "CS";
          if($q->num_rows()>0){
              foreach($q->result() as $k)
              {
                  $tmp = ((int)$k->kd_max)+1;
                  $kd = sprintf("%04s", $tmp);
              }

          } else {
              $kd = "0001";
          }

          $kode_user = $cs.$kd;

      $data = [
              'users_id' => $kode_user,
              'users_nama' => htmlspecialchars($this->input->post('users_nama',true)),
              'users_email' => htmlspecialchars($this->input->post('users_email',true)),
              'users_password' => password_hash($this->input->post('users_password1'), PASSWORD_DEFAULT),
              'users_level_id' => 3,
              'users_status' => 0,
              'users_image' => 'default.png'
      ];

      $this->db->insert('tbl_users',$data);

    }

    public function getCustomer()
    {
        $query = 'SELECT * FROM tbl_users WHERE users_level_id = 3';
        return $this->db->query($query)->result_array();
    }

    public function getPegawai()
    {
        $query = 'SELECT * FROM tbl_users WHERE users_level_id = 2';
        return $this->db->query($query)->result_array();
    }

    public function getToken($users_email,$token)
    {
        $tbl_token = [
            'tk_email' => $users_email,
            'tk_token' => $token,
            'tk_time' => time()
        ];
        return $this->db->insert('tbl_token',$tbl_token);
    }

    public function Activation($users_email,$token)
    {
				$this->db->set('users_status',1);
				$this->db->where('users_email',$users_email);
				$this->db->update('tbl_users');
        
				$this->db->delete('tbl_token',['tk_email' =>$token]);
    }

    public function editProfil($users_nama,$users_email)
    {
        $this->db->set('users_nama',$users_nama);
        $this->db->where('users_email',$users_email);
        $this->db->update('tbl_users');
    }

    public function getUser($users_email)
    {
        $this->db->get_where('tbl_users',['users_email' => $users_email])->row_array();
    }

    public function getTokenVerify($token,$tbl_token)
    {
        $this->db->get_where('tbl_token', ['tk_token' => $token])->row_array();
    }

    public function verifyExpired($users_email,$token)
    {
        $this->db->delete('tbl_users',['users_email' => $users_email]);
        $this->db->delete('tbl_token',['tk_email' => $token]);
    }


    // public function tampilPaket()
    // {
    //     $result = $this->db->query("SELECT paket_id, paket_nama, paket_satuan, paket_harga FROM tbl_paket");
    //     return $result;
    // }
    //
    // public function getPaket($kdpaket)
    // {
    //     $result = $this->db->query("SELECT * FROM tbl_paket WHERE paket_id = '$kdpaket'");
    //     return $result;
    // }
    //
    // public function getMember($idmember)
    // {
    //     $result = $this->db->query("SELECT * FROM tbl_users WHERE users_id = '$idmember'");
    //     return $result;
    // }
    //
    // public function inputData($where,$table)
    // {
    //     $this->db->insert($table,$data);
    // }
    //
    // public function hapusData($where,$table)
    // {
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }
    //
    // public function editData($where,$table)
    // {
    //     return $this->get_where($table,$where);
    // }
    //
    // public funciton updateData()
    // {
    //     $this->db->where($where);
    //     $this->db->update($table,$data);
    // }



}

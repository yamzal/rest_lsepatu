<?php  

/**
* 
*/
class m_auth extends CI_Model
{
	
	private $table_name = "tbl_users";

	function get_customer_by_uname($users_nama,$users_password){
		$this->db->where('users_nama',$users_nama);
		$this->db->where('users_password',$users_password);
		$this->db->where('users_status','1');
		$this->db->where('users_level_id','3');

		return $this->db->get($this->table_name)->row();
	}

	

	function get_pegawai_by_uname($users_nama,$users_password){
		$this->db->where('users_nama',$users_nama);
		$this->db->where('users_password',$users_password);
		$this->db->where('users_status','1');
		$this->db->where('users_level_id','2');

		return $this->db->get($this->table_name)->row();
	}
    
    public function registPg()
    {
      $q = $this->db->query("SELECT MAX(RIGHT(users_id,4)) AS kd_max FROM tbl_users");
          $kd = "";
          $cs = "PG";
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
              'users_password' => password_hash($this->input->post('users_password1'), PASSWORD_DEFAULT),
              'users_email' => htmlspecialchars($this->input->post('users_email',true)),
              'users_level_id' => 2,
              'users_status' => 0
      ];

      $this->db->insert('tbl_users',$data);
    }


    public function getToken($users_email,$token)
    {
        $tbl_token =  [
            'tk_email' => $users_email,
            'tk_token' => $token,
            'tk_time' => time()
        ];
        return $this->db->insert('tbl_token',$tbl_token);
    }

    public function getTokenVerify($token)
    {
      $this->db->get_where('tbl_token', ['tk_token' => $token])->row_array();
    }

    public function Activation($users_email,$token)
    {
        $this->db->set('users_status',1);
        $this->db->where('users_email',$users_email);
        $this->db->update('tbl_users');

        $this->db->delete('tbl_token',['tk_email' =>$token]);
    }


    public function verifyExpired($users_email,$token)
    {
      $this->db->delete('tbl_users',['users_email' => $users_email]);
      $this->db->delete('tbl_token',['tk_email' => $token]);
    }


    public function forgotPassword($tbl_token,$users_email,$token)
    {
      $tbl_token = [
          'tk_email' => $users_email,
          'tk_token' => $token,
          'tk_time' => time()
      ];
      $this->db->insert('tbl_token',$tbl_token);
    }

    public function getUser($users_email)
    {
      $this->db->get_where('tbl_users',['users_email' => $users_email])->row_array();
    }

    public function getTokenReset($token)
    {
      $this->db->get_where('tbl_token',['tk_token' => $token])->row_array();
    }

    public function getUserStatus($users_email)
    {
      $this->db->get_where('tbl_users',['users_email' => $users_email, 'users_status' => 1])->row_array();
    }

    public function changePassword($users_password,$users_email)
    {
      $this->db->set('users_password',$users_password);
      $this->db->where('users_email',$users_email);
      $this->db->update('tbl_users');
    }

}

?>
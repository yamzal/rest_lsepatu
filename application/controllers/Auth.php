<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');

    }


    public function index()
    {

        //form validation for field
        $this->form_validation->set_rules('users_email','email', 'trim|required|valid_email');
        $this->form_validation->set_rules('users_password', 'password','trim|required');

        if( $this->form_validation->run() == false )
        {
            $data['title'] = 'LSEPATU';
            $this->load->view('auth/v_partials/v_auth_header',$data);
            $this->load->view('auth/v_login');
            $this->load->view('auth/v_partials/v_auth_footer');

        } else {
            $this->_usersLogin();
        }
    }

    private function _usersLogin()
    {
        //admin var
        $users_email = $this->input->post('users_email');
        $users_password = $this->input->post('users_password');

        $users = $this->db->get_where('tbl_users',['users_email' =>$users_email])->row_array();

        if($users){

            if($users['users_status'] == 1) {

                if(password_verify($users_password, $users['users_password'])){
                    $data = [
                        'users_email' => $users['users_email'],
                        'users_level_id' => $users['users_level_id'],
                        'users_id' => $users['users_id']
                    ];
                    $this->session->set_userdata($data);
                        if($users['users_level_id'] == 1) {
                            redirect('Owner');
                          } else  if ($users['users_level_id'] == 2) {
                              redirect('Pegawai');
                          } else if ($users['users_level_id'] == 3) {
                            redirect('Customer');
                        } else {
                          redirect('Auth');
                        }

                    } else {
                        //wrong password
                        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password salah!</div>');
                        redirect('auth');
                    }

                } else {
                    //if not activated
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">User belum diaktivasi!</div>');
                        redirect('auth');
                }

            } else {
                //not registered
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">User tidak terdaftar!</div>');
                redirect('auth');

            }

    }

    public function registPg()
    {
          if($this->session->userdata('users_email')){
          redirect('Pegawai');
          }

        //full name
        $this->form_validation->set_rules('users_nama', 'Fullname', 'required|trim');

        //email
        $this->form_validation->set_rules('users_email', 'Email', 'required|trim|valid_email|is_unique[tbl_users.users_email]', [
                                           'is_unique' => 'Email ini sudah digunakan!'
                                            ]);
        //matching password ,p1
        $this->form_validation->set_rules('users_password1', 'Password', 'required|trim|min_length[3]|matches[users_password2]',[
                                            'matches' => 'password tidak cocok!',
                                            'min_length' => 'password terlalu pendek!'
                                            ]);
        //p2
        $this->form_validation->set_rules('users_password2', 'Password', 'required|trim|matches[users_password1]');

          if($this->form_validation->run() == false)

          {
              $data['title'] = 'LSepatu Registration';
              $this->load->view('auth/v_partials/v_auth_header',$data) ;
              $this->load->view('auth/v_registrasi');
              $this->load->view('auth/v_partials/v_auth_footer');

          } else {
              $this->M_auth->registPg();

              $users_email = $this->input->post('users_email','true');
              $token = base64_encode(random_bytes(32));

              $this->M_auth->getToken($users_email,$token);

              /*
              $tbl_token =  [
                  'tk_email' => $users_email,
                  'tk_token' => $token,
                  'tk_time' => time()

              ];
              $this->db->insert('tbl_token',$tbl_token);
              */

              $this->_sendEmail($token,'verify');
              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
              akun berhasil dibuat, mohon aktivasi terlebih dahulu</div>');
              redirect('auth');
          }

    }

    private function _sendEmail($token,$type)
    {
      $config = [
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'vacationdumper100@gmail.com',
        'smtp_pass' => 's1nce1998',
        'smtp_port' => 465,
        'mailtype' => 'html',
        'charset'  => 'utf-8',
        'newline' =>  "\r\n"
      ];

      $this->load->library('email',$config);
      $this->email->initialize($config);

      $this->email->from('vacationdumper100@gmail.com','Laundry Sepatu');
      $this->email->to($this->input->post('users_email'));

      if($type == 'verify') {
        $this->email->subject('Verifikasi Akun');
        $this->email->message('Click link berikut untuk aktivasi akun anda: <a href="' . base_url() . 'auth/verify?users_email=' . $this->input->post('users_email')
        . '&tk_token=' . urlencode($token) . '">Aktivasi Account</a>');

          } else {
            $this->email->subject('Reset Password');
            $this->email->message('Click link berikut untuk reset password anda: <a href="' . base_url() . 'auth/resetpassword?users_email=' . $this->input->post('users_email')
            . '&tk_token=' . urlencode($token) . '">Reset Password</a> ');
          }

        //debugging Email
        if($this->email->send()){
            return true;

        } else {

            echo $this->email->print_debugger();
            die;
        }


    }

    public function verify()
    {
      //get from link activation
      $users_email = $this->input->get('users_email');
      $token = $this->input->get('tk_token');

      $users = $this->M_auth->getUser($users_email);
      // $users = $this->db->get_where('tbl_users',['users_email' => $users_email])->row_array();

      if($users){
            $tbl_token = $this->M_auth->getTokenVerify($token);
            // $tbl_token = $this->db->get_where('tbl_token', ['tk_token' => $token])->row_array();

            if($tbl_token) {
                if(time() - $tbl_token['tk_time'] < ('60*60*24')) {

                    $this->M_auth->Activation($users_email,$token);

                    // $this->db->set('users_status',1);
                    // $this->db->where('users_email',$users_email);
                    // $this->db->update('tbl_users');
                    // $this->db->delete('tbl_token',['tk_email' =>$token]);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'. $users_email . '
                    telah di aktivasi. silahkan login</div>');
                    redirect('auth');

                    } else {
                      //token expired
                      $this->M_auth->verifyExpired($users_email,$token);
                      /*
                        $this->db->delete('tbl_users',['users_email' => $users_email]);
                        $this->db->delete('tbl_token',['tk_email' => $token]);
                      */
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal!, token kadaluarsa</div>');
                      }

                } else {
                //token
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Aktivasi akun gagal! token salah. </div>');
                redirect('auth');
               }

          } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun anda gagal! akun salah</div>');
            redirect('auth');
        }

    }



    public function usersLogout()
    {
      $this->session->unset_userdata('users_email');
      $this->session->unset_userdata('users_level_id');
      // $this->session->sess_destroy();


      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Logout berhasil</div>');
      redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/v_blocked');
    }

    public function forgotPassword()
    {
      $this->form_validation->set_rules('users_email','Email', 'trim|required|valid_email');

      if ($this->form_validation->run() == false ) {
          $data['title'] = 'Lupa Password';
          $this->load->view('auth/v_partials/v_auth_header',$data);
          $this->load->view('auth/v_forgotpass');
          $this->load->view('auth/v_partials/v_auth_footer');

      } else {
          $users_email = $this->input->post('users_email');
          $users = $this->M_auth->getUserStatus($users_email);
          // $users = $this->db->get_where('tbl_users',['users_email' => $users_email, 'users_status' => 1])->row_array();

          if($users){
              $token =  base64_encode(random_bytes(32));

              $this->M_auth->forgotPassword($tbl_token,$users_email,$token);
              /*
              $tbl_token = [
                  'tk_email' => $users_email,
                  'tk_token' => $token,
                  'tk_time' => time()
              ];
              $this->db->insert('tbl_token',$tbl_token);
              */

              $this->_sendEmail($token,'forgot');

              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Periksa email untuk reset password</div>');
              redirect('auth/forgotPassword');

              } else {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Email/User tidak teregistrasi!</div>');
                redirect('auth/forgotPassword');
              }

      }

    }


    public function resetPassword()
    {
      $users_email =  $this->input->get('users_email');
      $token = $this->input->get('tk_token');

      $users = $this->M_auth->getUser($users_email);
      // $users = $this->db->get_where('tbl_users',['users_email' => $users_email])->row_array();

      if($users) {
          $tbl_token = $this->M_auth->getTokenReset($token);
          // $tbl_token = $this->db->get_where('tbl_token',['tk_token' => $token])->row_array();

          if($tbl_token) {
              $this->session->set_userdata('reset_email',$users_email);
              $this->changePassword();

                } else {
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Reset Password Gagal!token salah</div>');
                redirect('auth/forgotPassword');
                }

      } else {
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Reset Password Gagal! Email/User salah</div>');
        redirect('auth/forgotPassword');
      }

    }

    public function changePassword()
    {

      if(!$this->session->userdata('reset_email')) {
        redirect('auth');
      }

      $this->form_validation->set_rules('users_password1','Password','trim|required|min_length[4]|matches[users_password2]');
      $this->form_validation->set_rules('users_password2','Password','trim|required|min_length[4]|matches[users_password1]');

      if($this->form_validation->run() == false ) {
          $data['title'] = 'Ubah Password';
          $this->load->view('auth/v_partials/v_auth_header',$data);
          $this->load->view('auth/v_changepass');
          $this->load->view('auth/v_partials/v_auth_header');

      } else {
          $users_password = password_hash($this->input->post('users_password1'), PASSWORD_DEFAULT);
          $users_email = $this->session->userdata('reset_email');

          $this->M_auth->changePassword($users_email,$users_password);

          /*
          $this->db->set('users_password',$users_password);
          $this->db->where('users_email',$users_email);
          $this->db->update('tbl_users');
          */
          $this->session->unset_userdata('reset_email');
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password telah diubah! Silahkan Login!</div>');
          redirect('auth');
      }


    }






}

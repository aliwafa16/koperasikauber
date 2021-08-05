<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
    }
    public function index()
    {
        $data['title'] = 'Kauber - Login';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/auth/index');
    }
    public function login()
    {
        $email = $this->input->post('email_user');
        $pass = $this->input->post('password_user');

        $user = $this->Auth_model->getUserByID($email);

        if ($user) {
            if ($user['is_active'] == 1) {
                if (md5($pass) == $user['password']) {
                    $data = [
                        'email_user' => $user['email_user'],
                        'id_role' => $user['id_role'],
                        'id_user' => $user['id_user'],
                        'nama_user' => $user['nama_user']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 1) {
                        $result = ['status' => true, 'id_role' => 1, 'alert' => 'Login berhasil !!'];
                    } else {
                        $result = ['status' => true, 'id_role' => 4, 'alert' => 'Login berhasil !!'];
                    }
                } else {
                    $result = ['status' => false, 'alert' => 'Password salah !!'];
                }
            } else {
                $result = ['status' => false, 'alert' => 'Email belum diaktifkan  !!'];
            }
        } else {
            $result = ['status' => false, 'alert' => 'Email tidak terdaftar !!'];
        }

        echo json_encode($result);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
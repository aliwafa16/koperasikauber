<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model');

        if (!$this->session->userdata('kode_anggota')) {
            $allowed = ['index', 'v_cekAnggota', 'login', 'cekAnggota'];
            if (!in_array($this->router->fetch_method(), $allowed)) {
                redirect('auth');
            }
        }
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
                        'kode_anggota' => $user['kode_anggota'],
                        'nama_user' => $user['nama_user'],
                        'token' => md5(uniqid())
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 1) {
                        $result = ['status' => true, 'id_role' => 1, 'alert' => 'Login berhasil !!'];
                    } else if ($user['id_role'] == 4) {
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

    public function v_registrasi()
    {
        $data['title'] = 'Kauber - Registrasi';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/auth/registrasi');
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]', ['required' => 'Password harus diiisi !!', 'matches' => 'Password tidak sama !!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]', ['required' => 'Password harus diiisi !!', 'matches' => 'Password tidak sama !!']);
        $this->form_validation->set_rules('email_user', 'Email User', 'required|valid_email|is_unique[tbl_user.email_user]', ['requird' => 'Email harus diisi !!', 'valid_email' => 'Format email salah !!', 'is_unique' => 'Email sudah digunakan !!']);

        if ($this->form_validation->run() == FALSE) {
            $data = ['password1_error' => form_error('password1'), 'password2_error' => form_error('password2'), 'email_user_error' => form_error('email_user')];
            echo json_encode($data);
        } else {
            $data = [
                'nama_user' => $this->input->post('nama_user'),
                'email_user' => $this->input->post('email_user'),
                'password' => md5($this->input->post('password1')),
                'id_role' => 4,
                'kode_anggota' => $this->input->post('kode_anggota'),
                'is_active' => 1,
                'created_at' => date('d-m-Y H:i:s')
            ];

            if ($this->Auth_model->addUser($data)) {
                $result = ['status' => false, 'alert' => 'Gagal Registrasi !!!'];
            } else {
                $this->session->sess_destroy();
                $result = ['status' => true, 'alert' => 'Berhasil Registrasi !!!'];
            }

            echo json_encode($result);
        }
    }

    public function v_cekAnggota()
    {
        $data['title'] = 'Kauber - Cek Kode Anggota';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/auth/cekkodeanggota');
    }

    public function cekAnggota()
    {
        $kode = strtoupper($this->input->post('kode_anggota'));
        $anggota = $this->db->get_where('tbl_anggota', ['kode_anggota' => $kode])->row_array();
        if ($anggota) {
            if ($anggota['is_active'] == 2) {
                $result = ['status' => false, 'alert' => 'Anggota Tidak Aktif'];
            } else {
                $kode = $this->db->get_where('tbl_user', ['kode_anggota' => $anggota['kode_anggota']])->row_array();
                if (!$kode) {
                    $data_regis = [
                        'id_anggota' => $anggota['id_anggota'],
                        'kode_anggota' => $anggota['kode_anggota'],
                        'nama_anggota' => $anggota['nama_anggota']
                    ];
                    $this->session->set_userdata($data_regis);
                    $result = ['status' => true, 'id_anggota' => $anggota['id_anggota'], 'alert' => 'Kode Anggota Terdaftar'];
                } else {
                    $result = ['status' => false, 'alert' => 'Kode Anggota Sudah Terdaftar !!'];
                }
            }
        } else {
            $result = ['status' => false, 'alert' => 'Kode Anggota Tidak Terdaftar'];
        }

        echo json_encode($result);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}

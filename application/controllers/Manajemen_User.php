<?php
class Manajemen_User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('User_Model');
        $this->load->library('form_validation');
        $this->load->library('upload');

        if (!$this->session->userdata('token')) {
            $allowed = [];
            if (!in_array($this->router->fetch_method(), $allowed)) {
                redirect('auth');
            }
        }

        if ($this->session->userdata('id_role') == 4) {
            redirect('helper/index.html');
        }
    }

    public function index(){
        // $data['user'] = $this->User_Model->User();
        // $data['user_aktif'] = $this->User_Model->Aktif_Anggota();
        // $data['user_tidak_aktif'] = $this->User_Model->Tidak_Aktif_Anggota();
        // $data['riwayat'] = $this->User_Model->Riwayat();

        $data['title'] = 'Kauber - Manajemen User';
        $data['headline'] = 'Manajemen Data - User';


        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/manajemen_user/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function getAllUser(){
        $result = $this->User_Model->allUser();
        echo json_encode($result);
    }

    public function getUserAktif(){
        $result = $this->User_Model->userAktif();
        echo json_encode($result);
    }

    public function getUserTidakAktif(){
        $result = $this->User_Model->userTidakAktif();
        echo json_encode($result);
    }

    public function getRiwayat(){
        $result = $this->User_Model->riwayat();
        echo json_encode($result);
    }

    public function getRole(){
        $result = $this->db->get('tbl_role')->result_array();
        echo json_encode($result);
    }

    public function getUser($id){
        $result = $this->User_Model->oneUser($id);
        echo json_encode($result);
    }

    public function searchAnggota(){
        $key = $this->input->post('key');
        $this->db->select('kode_anggota,nama_anggota,id_anggota');
        $this->db->like('nama_anggota',$key);
        $this->db->or_like('kode_anggota',$key);
        $result = $this->db->get('tbl_anggota')->row();
        echo json_encode($result);
    }

    public function addUser(){
        $this->form_validation->set_rules('user_name', 'Nama user', 'required|trim', ['required' => 'Nama harus diisi !!']);
        $this->form_validation->set_rules('email_user', 'email_user', 'required|trim|valid_email', ['required' => 'Email harus diisi !!','valid_email'=>'Format email salah !!']);
        $this->form_validation->set_rules('password', 'password', 'required|trim', ['required' => 'Password harus diisi !!']);

        if($this->form_validation->run()==FALSE){
            $array = [
                'user_name_error' => form_error('user_name'),
                'email_user_error' => form_error('email_user'),
                'password_error' => form_error('password'),
            ];
            echo json_encode($array);
        }else{
            $this->db->where('deleted_at',null);
            $this->db->where('kode_anggota', $this->input->post('kode_anggota'));
            $kode = $this->db->get('tbl_user')->row();

            if($kode==null){
                $password = md5($this->input->post('password'));
                $tanggal = $this->formatDate(date('Y-m-d'));
                $data = [
                    'nama_user'=> $this->input->post('user_name'),
                    'kode_anggota' => $this->input->post('kode_anggota'),
                    'email_user' => $this->input->post('email_user'),
                    'id_role' => $this->input->post('role_id'),
                    'is_active' => 0,
                    'password' => $password,
                    'created_at' => $tanggal
    
                ];

                $this->User_Model->add($data);
                $result = ['status' => true, 'alert' => 'Ditambahkan'];
            }else{
                
                $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
            }
            
            echo json_encode($result);

        }

    }

    public function editPassword($id){
        $this->form_validation->set_rules('new_password', 'Password', 'required|trim', ['required' => 'Password baru harus diisi !!']);
        
        if($this->form_validation->run()==FALSE){
            $array = ['new_password_error' => form_error('new_password')];
            echo json_encode($array);
        }else{            
            $password = md5($this->input->post('new_password'));
            $this->db->set('password',$password);
            $this->db->where('id_user',$id);
            $this->db->update('tbl_user');
    
            $result = ['status' => true, 'alert' => 'Password berhasil diubah'];
            echo json_encode($result);
        }
    }

    public function editUser(){
        $this->form_validation->set_rules('user_name', 'Nama user', 'required|trim', ['required' => 'Nama harus diisi !!']);
        $this->form_validation->set_rules('email_user', 'email_user', 'required|trim|valid_email', ['required' => 'Email harus diisi !!', 'valid_email' => 'Format email salah !!']);

        if($this->form_validation->run()==FALSE){
            $array = [
                'user_name_error' => form_error('user_name'),
                'email_user_error' => form_error('email_user'),
            ];
            echo json_encode($array);
        }else{
            $tanggal = $this->formatDate(date('Y-m-d'));
            $id = $this->input->post('id_user');
            $data = [
                'nama_user' => $this->input->post('user_name'),
                'kode_anggota' => $this->input->post('kode_anggota'),
                'email_user' => $this->input->post('email_user'),
                'updated_at' => $tanggal

            ];

            if($this->User_Model->edit($data, $id)){
                $result = ['status' => true, 'alert' => 'Ditambahkan'];
            }else{
                $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
            }

            echo json_encode($result);
        }
    }

    public function hapus($id){

        $deleted = [
            'deleted_at' => date('d-m-Y H:i:s'),
            'is_active' => 3,
        ];

        $this->db->where('id_user', $id);
        $this->db->update('tbl_user', $deleted);

        $result = ['status' => true, 'alert' => 'Dihapus'];

        echo json_encode($result);
    }

    public function AktifUser($id)
    {
        $this->db->set('is_active', 1);
        $this->db->where('id_user', $id);
        $this->db->update('tbl_user');

        $result = ['status' => true, 'alert' => 'Aktif !!'];
        echo json_encode($result);
    }

    public function NonaktifUser($id)
    {
        $this->db->set('is_active', 2);
        $this->db->where('id_user', $id);
        $this->db->update('tbl_user');

        $result = ['status' => true, 'alert' => 'Nonaktif !!'];
        echo json_encode($result);
    }


    private function formatDate($tanggal)
    {
        $bulan = [
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }
}
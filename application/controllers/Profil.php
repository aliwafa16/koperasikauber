<?php
class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_Model');
        if (!$this->session->userdata('token')) {
            $allowed = [];
            if (!in_array($this->router->fetch_method(), $allowed)) {
                redirect('auth');
            }
        }

    }

    public function index()
    {
        $data['title'] = 'Kauber - Profil';
        $data['headline'] = 'Profil';

        $id_anggota = $this->db->get_where('tbl_anggota',['kode_anggota'=>$this->session->userdata('kode_anggota')])->row_array();

        $data['anggota'] = $this->Profil_Model->getBiodata($id_anggota['id_anggota']);

        // var_dump($data['anggota']);
        // die;

        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/profil/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }
}

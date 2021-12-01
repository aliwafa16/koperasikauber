<?php
class Simpanan_Pokok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_Pokok_Model');
        $this->load->library('form_validation');

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

    public function index()
    {
        $data['title'] = 'Kauber - Simpanan Pokok';
        $data['headline'] = 'Manajemen Keuangan - Simpanan Pokok';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/simpanan_pokok/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function get_All_Simpanan()
    {
        $result = $this->Simpanan_Pokok_Model->getAllSimpanan();
        echo json_encode($result);
    }

    public function get_riwayat()
    {
        $result = $this->Simpanan_Pokok_Model->riwayat();
        echo json_encode($result);
    }

    public function addSimpananPokok(){
        $this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required|trim', ['required' => 'Kode harus diisi !!']);
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim', ['required' => 'Nama harus diisi !!']);
        $this->form_validation->set_rules('nik_anggota', 'NIK Anggota', 'required|trim', ['required' => 'NIK harus diisi !!']);
    }
}

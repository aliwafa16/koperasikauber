<?php
class Simpanan_Wajib extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

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
        $data['title'] = 'Kauber - Simpanan Wajib';
        $data['headline'] = 'Manajemen Keuangan - Simpanan Wajib';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/simpanan_wajib/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }
}

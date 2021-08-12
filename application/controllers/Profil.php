<?php
class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Kauber - Profil';
        $data['headline'] = 'Profil';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/profil/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }
}

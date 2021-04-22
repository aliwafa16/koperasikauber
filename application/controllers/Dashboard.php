<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/templates/admin_sidebar', $data);
        $this->load->view('backend/dashboard/index');
        $this->load->view('backend/templates/admin_footer');
    }
}

<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['title']='Dashboard - Kauber';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/dashboard/index');
        $this->load->view('backend/templates/admin_footer');
    }
}

<?php
class Admin extends CI_Controller
{
    public function index()
    {
        $this->load->view('backend/templates/admin_header');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/dashboard/index');
        $this->load->view('backend/templates/admin_footer');
    }
}

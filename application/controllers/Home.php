<?php

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('user/templates/user_header.php');
        $this->load->view('user/home/index.php');
        $this->load->view('user/templates/user_footer.php');
    }
}

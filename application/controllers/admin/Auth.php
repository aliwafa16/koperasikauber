<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $this->load->view('admin/auth/index.php');
    }
}

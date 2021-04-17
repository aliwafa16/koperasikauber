<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Kauber - Koperasi Jasa Angkutan Usaha Bersama';
        $this->load->view('frontend/templates/user_header.php', $data);
        $this->load->view('frontend/home/index.php');
        $this->load->view('frontend/templates/user_footer.php');
    }
}

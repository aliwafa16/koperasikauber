<?php
class ManajemenData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($params)
    {
        $loadView = null;
        $listView = 'backend/manajemenData/' . $params . '_v';

        if (file_exists(APPPATH . '/views/' . $listView . '.php') === TRUE) {
            $loadView = $listView;
        } else {
            $loadView = 'Not Found';
        }

        $data['title'] = 'Manajemen Data';

        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_navbar', $data);
        $this->load->view('backend/templates/admin_sidebar', $data);
        $this->load->view($loadView, $data);
        $this->load->view('backend/templates/admin_footer');
    }
}

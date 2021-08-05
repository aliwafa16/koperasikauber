<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_Model');
    }
    public function index()
    {
        $data['title'] = 'Kauber - Dashboard';
        $data['headline'] = 'Dashboard';

        $data['total_anggota'] = $this->Dashboard_Model->get_all_anggota();
        $data['anggota_aktif'] = $this->Dashboard_Model->get_all_anggota_aktif();
        $data['anggota_keluar'] = $this->Dashboard_Model->get_all_anggota_keluar();
        $data['total_kendaraan'] = $this->Dashboard_Model->get_all_kendaraan();

        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/dashboard/index', $data);
        $this->load->view('backend/templates/admin_footer');

    }
}

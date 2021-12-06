<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_Model');

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
        $data['title'] = 'Kauber - Dashboard';
        $data['headline'] = 'Dashboard';

        $data['total_anggota'] = $this->Dashboard_Model->get_all_anggota();
        $data['anggota_aktif'] = $this->Dashboard_Model->get_all_anggota_aktif();
        $data['anggota_keluar'] = $this->Dashboard_Model->get_all_anggota_keluar();
        $data['anggota_tidak_aktif'] = $this->Dashboard_Model->get_all_anggotda_tidak_aktif();


        $data['total_kendaraan'] = $this->Dashboard_Model->get_all_kendaraan();
        $data['kendaraan_aktif'] = $this->Dashboard_Model->get_kendaraan_aktif();
        $data['kendaraan_keluar'] = $this->Dashboard_Model->get_kendaraan_keluar();

        $data['count_skkk'] = $this->Dashboard_Model->get_all_skkk();
        $data['count_kesepahaman'] = $this->Dashboard_Model->get_all_kesepahaman();
        $data['count_pelepasan_hak'] = $this->Dashboard_Model->get_all_pelepasan_hak();


        $data['ap'] = $this->Dashboard_Model->getAP();
        $data['tpk'] = $this->Dashboard_Model->getTPK();
        $data['akdp'] = $this->Dashboard_Model->getAKDP();
        $data['ab'] = $this->Dashboard_Model->getAB();


        $data['trayek_ap'] = $this->Dashboard_Model->getTrayekAP();
        $data['trayek_tpk'] = $this->Dashboard_Model->getTrayekTPK();
        $data['trayek_akdp'] = $this->Dashboard_Model->getTrayekAKDP();
        $data['trayek_ab'] = $this->Dashboard_Model->getTrayekAB();


        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/dashboard/index', $data);
        $this->load->view('backend/templates/admin_footer');

    }
}

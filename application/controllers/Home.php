<?php

class Home extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('Home_Model');
	}

    public function index()
    {

    	$data['total_anggota'] = $this->Home_Model->countAllAnggota();
    	$data['anggota_aktif'] = $this->Home_Model->countAktifAnggota();
    	$data['anggota_tidak_aktif'] = $this->Home_Model->countTidakAktifAnggota();
    	$data['anggota_keluar'] = $this->Home_Model->countAnggotaKeluar();



    	$data['total_kendaraan'] = $this->Home_Model->countAllKendaraan();
    	$data['ak'] = $this->Home_Model->countAP();
    	$data['tpk'] = $this->Home_Model->countTPK();
    	$data['akdp'] = $this->Home_Model->countAKDP();
    	$data['ab'] = $this->Home_Model->countAB();

    	var_dump($data['total_anggota']);
        $data['judul'] = 'Kauber - Koperasi Jasa Angkutan Usaha Bersama';
        $this->load->view('frontend/templates/user_header.php', $data);
        $this->load->view('frontend/home/index.php', $data);
        $this->load->view('frontend/templates/user_footer.php');
    }
}

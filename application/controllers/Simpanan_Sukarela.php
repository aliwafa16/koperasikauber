<?php
class Simpanan_Sukarela extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Simpanan_Sukarela_Model');

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

	public function index(){
		$data['title'] = 'Kauber - Simpanan Sukarela';
        $data['headline'] = 'Manajemen Keuangan - Simpanan Sukarela';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/simpanan_sukarela/index', $data);
        $this->load->view('backend/templates/admin_footer');
	}

    public function get_Riwayat(){
        $result = $this->Simpanan_Sukarela_Model->getRiwayat();
        echo json_encode($result);
    }

    public function get_All_Simpanan(){
        $result = $this->Simpanan_Sukarela_Model->getAll();
        echo json_encode($result);
    }

    public function searchAnggota()
    {
        $key = $this->input->post('key');
        $this->db->select('kode_anggota,nama_anggota,id_anggota');
        $this->db->like('nama_anggota', $key);
        $this->db->or_like('kode_anggota', $key);
        $result = $this->db->get('tbl_anggota')->row();
        echo json_encode($result);
    }

    public function hapus($id){
        $deleted = date('d-m-Y H:i:s');
        $this->db->set('deleted_at',$deleted);
        $this->db->where('id_simpanan_sukarela', $id);
        $this->db->update('tbl_simpanan_sukarela');

        $result = ['status' => true, 'alert' => 'Dihapus'];
        echo json_encode($result);
    }

    public function addSimpananSukarela(){
    $this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'trim|required',['required'=>'Kode Anggota harus diiisi !!']);
    $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'trim|required',['required'=>'Nama Anggota harus diisi !!']);
    $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required',['required'=>'Nominal harus diisi !!']);

        if($this->form_validation->run()==FALSE){
             $array = [
                'nominal_error' => form_error('nominal'),
                'nama_anggota_error' => form_error('nama_anggota'),
                'kode_anggota_error' => form_error('kode_anggota'),
            ];
            echo json_encode($array);
        }else{
            $tanggal = $this->formatDate(date('Y-m-d'));
            $nominal = intval($this->input->post('nominal'));
            $data = [
                'kode_simpanan_sukarela' => $this->kode_simpanan_sukarela(),
                'id_anggota' => $this->input->post('id_anggota'),
                'tanggal_bayar' => $tanggal,
                'nominal' => $nominal,
                'created_at' => date('d-m-Y H:i:s')

            ];

            if($this->Simpanan_Sukarela_Model->add($data)){
                $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
            }else{
                $result = ['status' => true, 'alert' => 'Berhasil Ditambahkan'];
            }

            echo json_encode($result);

        }
    }



    private function formatDate($tanggal)
    {
        $bulan = [
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
    }


     private function kode_simpanan_sukarela()
    {
        $this->db->select_max('kode_simpanan_sukarela');
        $row = $this->db->get('tbl_simpanan_sukarela')->row_array();
        $nourut = intval(substr($row['kode_simpanan_sukarela'], 0));

        $nourut += 1;
        $result = $nourut . '/AKUN' . '/KAUBER' . '/' . 'SS' . '/' . date('d.m.y') . '/' . date('Y');
        return $result;
    }


	
}
<?php
class Kendaraan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kendaraan_Model');
        $this->load->model('Anggota_Model');
        $this->load->model('Kepemilikan_Model');
        $this->load->library('form_validation');

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
        $data['title'] = 'Kauber - Data Kendaraan';
        $data['headline'] = 'Manajemen Data - Kendaraan';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/kendaraan/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function tambahKendaraan()
    {
        $data['title'] = 'Kauber - Data Kendaraan';
        $data['headline'] = 'Tambah Data - Kendaraan';

        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/kendaraan/tambah', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function getAllKendaraan()
    {
        $result = $this->Kendaraan_Model->getKendaraan();
        echo json_encode($result);
    }

    public function getRiwayat()
    {
        $result = $this->Kendaraan_Model->getRiwayatKendaraan();
        echo json_encode($result);
    }

    public function getKendaraanByID($id)
    {
        $result = $this->Kendaraan_Model->getKendaraanID($id);
        echo json_encode($result);
    }

    public function getEditTrayek($id)
    {
        $result = $this->db->get_where('tbl_trayek', ['id_jenis_trayek' => $id])->result();
        echo json_encode($result);
    }

    public function getKepemilikan($id){
        $result = $this->Kepemilikan_Model->getKepemilikanLama($id);
        echo json_encode($result);
    }

    public function addKendaraan()
    {
        $this->form_validation->set_rules('nomor_kendaraan', 'Nomor Kendaraan', 'trim|required', ['required' => 'Nomor Kendaraan Wajib Diisi !!']);
        $this->form_validation->set_rules('no_rangka', 'Nomor Rangka', 'trim|required', ['required' => 'Nomor Rangka Wajib Diisi !!']);
        $this->form_validation->set_rules('no_mesin', 'Nomor Mesin', 'trim|required', ['required' => 'Nomor Mesin Wajib Diisi !!']);
        $this->form_validation->set_rules('merk', 'Merek', 'required|trim', ['required' => 'Merek Wajib Diisi !!']);
        $this->form_validation->set_rules('type', 'Type', 'required|trim', ['required' => 'Type Wajib Diisi !!']);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim', ['required' => 'Tahun Wajib Diisi !!']);
        $this->form_validation->set_rules('warna', 'Warna', 'required|trim', ['required' => 'Warna Wajib Diisi !!']);

        if ($this->form_validation->run() == FALSE) {
            $result = [
                'nomor_kendaraan_error' => form_error('nomor_kendaraan'),
                'no_rangka_error' => form_error('no_rangka'),
                'no_mesin_error' => form_error('no_mesin'),
                'merk_error' => form_error('merk'),
                'type_error' => form_error('type'),
                'tahun_error' => form_error('tahun'),
                'warna_error' => form_error('warna')
            ];
            echo json_encode($result);
        } else {
            $id_anggota = $this->input->post('id_anggota');

            $data = [
                'nomor_kendaraan' => $this->input->post('nomor_kendaraan'),
                'merk_type' => $this->input->post('merk') . '/' . $this->input->post('type'),
                'tahun' => $this->input->post('tahun'),
                'no_rangka' => $this->input->post('no_rangka'),
                'no_mesin' => $this->input->post('no_mesin'),
                'warna' => $this->input->post('warna'),
                'is_active' => 1,
                'id_trayek' => $this->input->post('trayek'),
                'created_at' => date('d-m-Y H:i:s')
            ];

            $id_kendaraan = $this->Kendaraan_Model->add($data);

            $data2 = [
                'id_kendaraan' => $id_kendaraan,
                'id_anggota' => $id_anggota,
                'is_active' => 1,
                'created_at' => date('d-m-Y H:i:s')
            ];

            if ($this->Kepemilikan_Model->addKepemilikan($data2)) {
                $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
            } else {
                $result = ['status' => true, 'alert' => 'Ditambahkan'];
            }
            echo json_encode($result);
        }
    }

    public function editKepemilikan($id){
        $id_pemilik_baru = $this->input->post('id_pemilik_baru');
        
        $data = [
            'id_anggota' => $id_pemilik_baru,
            'updated_at' => date('d-m-Y H:i:s')
        ];

        if ($this->Kepemilikan_Model->edit($data, $id)) {
            $result = ['status' => false, 'alert' => 'Gagal Edit'];
        } else {
            $result = ['status' => true, 'alert' => 'Diedit'];
        }
        echo json_encode($result);
    }

    public function editKendaraan()
    {
        $trayek = $this->input->post('trayek');
        $id_kendaraan = $this->input->post('id_kendaraan');

        $data = [
            'is_active' => $this->input->post('is_active'),
            'created_at' => $this->input->post('created_at'),
            'updated_at' => date('d-m-Y H:i:s'),
            'nomor_kendaraan' => $this->input->post('nomor_kendaraan'),
            'no_rangka' => $this->input->post('no_rangka'),
            'no_mesin' => $this->input->post('no_mesin'),
            'merk_type' => $this->input->post('merk') . '/' . $this->input->post('type'),
            'id_trayek' => $trayek,
            'tahun' => $this->input->post('tahun'),
            'warna' => $this->input->post('warna'),
        ];


        if ($this->Kendaraan_Model->edit($data, $id_kendaraan)) {
            $result = ['status' => false, 'alert' => 'Gagal Edit'];
        } else {
            $result = ['status' => true, 'alert' => 'Diedit'];
        }

        echo json_encode($result);
    }

    public function searchAnggota()
    {
        $key = $this->input->post('key');

        $data = $this->Anggota_Model->searchAnggota($key);

        if ($data) {
            $result = ['status' => true, 'data' => $data];
        } else {
            $result = ['status' => false, 'alert' => 'Data Anggota Tidak Ditemukan'];
        }

        echo json_encode($result);
    }

    public function hapusKendaraan($id)
    {

        $data = [
            'keterangan' => $this->input->post('value'),
            'deleted_at' => date('d-m-Y H:i:s')
        ];
        $this->db->where('id_kendaraan', $id);
        $this->db->update('tbl_kendaraan', $data);
        $this->hapusKepemilikan($id);

        $result = ['status' => true, 'alert' => 'Dihapus'];
        echo json_encode($result);
    }

    public function hapusKepemilikan($id)
    {
        $this->db->where('id_kendaraan', $id);
        $this->db->delete('tbl_kepemilikan');
    }
}

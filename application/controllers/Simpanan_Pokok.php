<?php
class Simpanan_Pokok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_Pokok_Model');
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
        $data['title'] = 'Kauber - Simpanan Pokok';
        $data['headline'] = 'Manajemen Keuangan - Simpanan Pokok';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/simpanan_pokok/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function get_All_Simpanan()
    {
        $result = $this->Simpanan_Pokok_Model->getAllSimpanan();
        echo json_encode($result);
    }

    public function get_riwayat()
    {
        $result = $this->Simpanan_Pokok_Model->riwayat();
        echo json_encode($result);
    }

    public function getDetail($id)
    {
        $result = $this->db->get_where('tbl_sp_riwayat', ['id_simpanan_pokok' => $id])->result();
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

    public function addSimpananPokok(){
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim', ['required' => 'Nominal harus diisi !!']);
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim', ['required' => 'Nama harus diisi !!']);
        $this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required|trim', ['required' => 'Kode harus diisi !!']);
        if ($this->form_validation->run() == FALSE) {
            $array = [
                'nominal_error' => form_error('nominal'),
                'nama_anggota_error' => form_error('nama_anggota'),
                'kode_anggota_error' => form_error('kode_anggota'),
            ];
            echo json_encode($array);
        } else {
            $tanggal = $this->formatDate(date('Y-m-d'));
            $debet = intval($this->input->post('nominal'));
            $credit = $debet - 150000;
            $total = $debet;
            $data = [
                'kode_simpanan_pokok' => $this->kode_simpanan_pokok(),
                'id_anggota' => $this->input->post('id_anggota'),
                'tanggal' => $tanggal,
                'debet' => $debet,
                'credit' => $credit,
                'total' => $total,
                'created_at' => date('d-m-Y H:i:s')

            ];
            $result = $this->Simpanan_Pokok_Model->add($data);

            $data_riwayat = [
                'id_simpanan_pokok' => $result,
                'tanggal_bayar' => $tanggal,
                'nominal' => $debet
            ];

            if ($this->Simpanan_Pokok_Model->addRiwayatSP($data_riwayat)) {
                $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
            } else {
                $result = ['status' => true, 'alert' => 'Berhasil Ditambahkan'];
            }

            echo json_encode($result);
        }
    }

    public function simpananPokokByID($id)
    {
        $this->db->select('tbl_anggota.nama_anggota,tbl_anggota.kode_anggota,tbl_anggota.id_anggota,tbl_simpanan_pokok.*');
        $this->db->from('tbl_simpanan_pokok');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_simpanan_pokok.id_anggota');
        $this->db->where('tbl_simpanan_pokok.id_simpanan_pokok', $id);
        $result = $this->db->get()->row();
        echo json_encode($result);
    }

    public function editSimpananPokok()
    {
        $tanggal = $this->formatDate(date('Y-m-d'));
        $id_simpanan_pokok = $this->input->post('id_simpanan_pokok');
        $debet = $this->input->post('nominal');
        $simpanan_lama = $this->db->get_where('tbl_simpanan_pokok', ['id_simpanan_pokok' => $id_simpanan_pokok])->row_array();

        $new_debet = intval($simpanan_lama['debet']) + intval($debet);
        $new_credit = $new_debet - 150000;
        $new_total = $new_debet;

        $data = [
            'kode_simpanan_pokok' => $this->kode_simpanan_pokok(),
            'id_anggota' => $this->input->post('id_anggota'),
            'tanggal' => $tanggal,
            'debet' => $new_debet,
            'credit' => $new_credit,
            'total' => $new_total,
            'created_at' => $this->input->post('created_at'),
            'updated_at' => date('d-m-Y H:i:s')
        ];

        $this->db->where('id_simpanan_pokok', $id_simpanan_pokok);
        $this->db->update('tbl_simpanan_pokok', $data);

        $data_riwayat = [
            'id_simpanan_pokok' => $id_simpanan_pokok,
            'tanggal_bayar' => $tanggal,
            'nominal' => $debet
        ];

        if ($this->Simpanan_Pokok_Model->addRiwayatSP($data_riwayat)) {
            $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
        } else {
            $result = ['status' => true, 'alert' => 'Berhasil Ditambahkan'];
        }

        echo json_encode($result);
    }

    public function hapus($id){
        $deleted = date('d-m-Y H:i:s');
        $this->db->set('deleted_at',$deleted);
        $this->db->where('id_simpanan_pokok', $id);
        $this->db->update('tbl_simpanan_pokok');

        $result = ['status' => true, 'alert' => 'Dihapus'];
        echo json_encode($result);

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


    private function kode_simpanan_pokok()
    {
        $this->db->select_max('kode_simpanan_pokok');
        $row = $this->db->get('tbl_simpanan_pokok')->row_array();
        $nourut = intval(substr($row['kode_simpanan_pokok'], 0));

        $nourut += 1;
        $result = $nourut . '/AKUN' . '/KAUBER' . '/' . 'SP' . '/' . date('d.m.y') . '/' . date('Y');
        return $result;
    }
}

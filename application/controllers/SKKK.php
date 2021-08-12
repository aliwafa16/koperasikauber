<?php
class SKKK extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('token')) {
            $allowed = [];
            if (!in_array($this->router->fetch_method(), $allowed)) {
                redirect('auth');
            }
        }

        if ($this->session->userdata('id_role') == 4) {
            redirect('helper/index.html');
        }

        $this->load->model('SKKK_Model');
    }

    public function index()
    {
        $data['title'] = 'Kauber - Rekap SKKK';
        $data['headline'] = 'Manajemen File - SKKK';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/skkk/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function get_All_SKKK()
    {
        $result = $this->SKKK_Model->getAll();
        echo json_encode($result);
    }

    public function addSKKK()
    {
        $data['title'] = 'Kauber - Tambah SKKK';
        $data['headline'] = 'Tambah Data SKKK';

        $data['kode_skkk'] = $this->kode_SKKK();
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/skkk/tambah', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function searchData($key)
    {
        $anggota = $this->SKKK_Model->search_anggota($key);
        if ($anggota) {
            $kesepahaman = $this->SKKK_Model->search_kesepahaman($anggota['id_anggota']);
            if ($kesepahaman) {
                $kendaraan = $this->SKKK_Model->search_kendaraan($anggota['id_anggota']);
                if ($kendaraan) {
                    $result = [
                        'status' => true,
                        'anggota' => $anggota,
                        'kesepahaman' => $kesepahaman,
                        'kendaraan' => $kendaraan
                    ];
                } else {
                    $result = ['status' => false, 'alert' => 'Kendaraan Tidak Ditemukan'];
                }
            } else {
                $result = ['status' => false, 'alert' => 'Kesepahaman Tidak Ditemukan'];
            }
        } else {
            $result = ['status' => false, 'alert' => 'Anggota Tidak Ditemukan !!'];
        }

        echo json_encode($result);
    }

    public function getKendaranBYID($id)
    {
        $result = $this->SKKK_Model->kendaraanByID($id);
        echo json_encode($result);
    }


    public function cetakSKKK()
    {

        $tanggal = $this->formatTanggal(date('Y-m-d'));
        $data = [
            'no_skkk' => $this->input->get('no_skkk'),
            'id_kesepahaman' => $this->input->get('id_kesepahaman'),
            'no_kesepahaman' => $this->input->get('no_kesepahaman'),
            'nama_anggota' => $this->input->get('nama_anggota'),
            'nik_anggota' => $this->input->get('nik_anggota'),
            'alamat' => $this->input->get('alamat'),
            'id_kendaraan' => $this->input->get('id_kendaraan'),
            'nomor_kendaraan' => $this->input->get('no_kendaraan'),
            'merk_type' => $this->input->get('merk_type'),
            'no_rangka' => $this->input->get('no_rangka'),
            'no_mesin' => $this->input->get('no_mesin'),
            'warna' => $this->input->get('warna'),
            'tanggal' => $tanggal,
        ];

        if ($this->input->get('no_kesepahaman')) {
            $data_db = [
                'no_skkk' => $data['no_skkk'],
                'id_kesepahaman' => $data['id_kesepahaman'],
                'tanggal_skkk' => $data['tanggal'],
                'id_kepemilikan' => $data['id_kendaraan'],
                'keterangan' => null,
                'created_at' => date('d-m-Y H:i:s')

            ];
            $this->SKKK_Model->add($data_db);
            $this->load->view('backend/skkk/cetak', $data);
        } else {
            echo '<h1> Data belum lengkap </h1>';
        }
    }


    private function kode_SKKK()
    {
        $this->db->select_max('no_skkk');
        $row = $this->db->get('tbl_skkk')->row_array();

        $bulan = $this->formatDate(date('n'));
        $nourut = intval(substr($row['no_skkk'], 0));
        $nourut += 1;
        $result = $nourut . '/SKKK-Kop' . '/' . $bulan . '/' . date('Y');
        return $result;
    }

    private function formatDate($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }

    private function formatTanggal($tanggal)
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
}

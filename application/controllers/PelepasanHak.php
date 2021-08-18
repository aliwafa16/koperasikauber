<?php
class PelepasanHak extends CI_Controller
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

        $this->load->model('PelepasanHak_Model');
    }

    public function index()
    {
        $data['title'] = 'Kauber - Rekap SKPH';
        $data['headline'] = 'Manajemen File - SKPH';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/pelepasan_hak/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function get_All_SKPH()
    {
        $result = $this->PelepasanHak_Model->getAll();
        echo json_encode($result);
    }

    public function addSKPH()
    {
        $data['title'] = 'Kauber - Tambah SKPH';
        $data['headline'] = 'Tambah Data SKPH';

        $data['kode_skph'] = $this->kode_SKPH();

        $data['hari'] = $this->hari_ini(date("D"));
        $data['tanggal'] = $this->formatTanggal(date('Y-m-d'));
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/pelepasan_hak/tambah', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function searchData()
    {

        $key = $this->input->post('key');
        $kendaraan = $this->PelepasanHak_Model->search_kendaraan($key);
        if ($kendaraan) {
            $data = $this->PelepasanHak_Model->search_data($kendaraan['id_kendaraan']);
            $result = [
                'status' => true,
                'kendaraan' => $data
            ];
        } else {
            $result = ['status' => false, 'alert' => 'Kendaraan Tidak Ditemukan !!'];
        }

        echo json_encode($result);
    }

    public function cetakSKPH()
    {
        $data = [
            'no_pelepasan_hak' => $this->input->get('no_pelepasan_hak'),
            'tanggal_skph' => $this->input->get('tanggal_skph'),
            'nomor_kendaraan' => $this->input->get('nomor_kendaraan'),
            'id_kendaraan' => $this->input->get('id_kendaraan'),
            'no_mesin' => $this->input->get('no_mesin'),
            'no_rangka' => $this->input->get('no_rangka'),
            'merk_type' => $this->input->get('merk_type'),
            'tahun' => $this->input->get('tahun'),
            'warna' => $this->input->get('warna'),
            'nama_trayek' => $this->input->get('nama_trayek'),
            'trayek' => $this->input->get('trayek'),
            'jenis' => $this->input->get('jenis'),
            'model' => $this->input->get('model'),
            'isi_silinder' => $this->input->get('isi_silinder'),
            'pemilik_lama' => $this->input->get('pemilik_lama'),
            'id_anggota' => $this->input->get('id_anggota'),
            'nama_baru' => $this->input->get('nama_baru'),
            'nik_baru' => $this->input->get('nik_baru'),
            'tempat_baru' => $this->input->get('tempat_baru'),
            'tanggal_lahir_baru' => $this->input->get('tanggal_lahir_baru'),
            'alamat_baru' => $this->input->get('alamat_baru')
        ];
        if ($this->input->get('nama_baru')) {
            $data_db = [
                'no_pelepasan_hak' => $data['no_pelepasan_hak'],
                'tanggal_skph' => $data['tanggal_skph'],
                'id_anggota' => $data['id_anggota'],
                'id_kendaraan' => $data['id_kendaraan'],
                'nama_baru' => $data['nama_baru'],
                'tempat_baru' => $data['tempat_baru'],
                'tanggal_lahir_baru' => $data['tanggal_lahir_baru'],
                'alamat_baru' => $data['alamat_baru'],
                'nik_baru' => $data['nik_baru'],
                'is_active' => 1,
                'created_at' => date('d-m-Y H:i:s')
            ];
            $this->PelepasanHak_Model->add($data_db);
            $this->load->view('backend/pelepasan_hak/cetak', $data);
        } else {
            echo 'data belum lengkap';
        }
    }


    private function kode_SKPH()
    {
        $this->db->select_max('no_pelepasan_hak');
        $row = $this->db->get('tbl_pelepasan_hak')->row_array();

        $bulan = $this->formatDate(date('n'));
        $nourut = intval(substr($row['no_pelepasan_hak'], 0));
        $nourut += 1;
        $result = $nourut . '/SKPH-Kauber' . '/' . $bulan . '/' . date('Y');
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

    private function hari_ini($hari)
    {
        switch ($hari) {
            case 'Sun':
                $hari_ini = "Minggu";
                break;

            case 'Mon':
                $hari_ini = "Senin";
                break;

            case 'Tue':
                $hari_ini = "Selasa";
                break;

            case 'Wed':
                $hari_ini = "Rabu";
                break;

            case 'Thu':
                $hari_ini = "Kamis";
                break;

            case 'Fri':
                $hari_ini = "Jumat";
                break;

            case 'Sat':
                $hari_ini = "Sabtu";
                break;

            default:
                $hari_ini = "Tidak di ketahui";
                break;
        }

        return $hari_ini;
    }
}

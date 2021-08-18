<?php
class Kesepahaman extends CI_Controller
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

        $this->load->model('Kesepahaman_Model');
    }

    public function index()
    {
        $data['title'] = 'Kauber - Rekap Kesepahaman';
        $data['headline'] = 'Manajemen File - Kesepahaman';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/kesepahaman/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function get_All_Kesepahaman()
    {
        $result = $this->Kesepahaman_Model->getAll();
        echo json_encode($result);
    }

    public function get_keluar()
    {
        $result = $this->Kesepahaman_Model->keluar();
        echo json_encode($result);
    }

    public function get_riwayat()
    {
        $result = $this->Kesepahaman_Model->riwayat();
        echo json_encode($result);
    }

    public function addKesepahaman()
    {

        $data['title'] = 'Kauber - Tambah Kesepahaman';
        $data['headline'] = 'Tambah Data Kesepahaman';
        $data['kode_kesepahaman'] = $this->kode_Kesepahaman();
        $data['hari'] = $this->hari_ini(date("D"));
        $data['tanggal'] = $this->formatTanggal(date('Y-m-d'));
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/kesepahaman/tambah', $data);
        $this->load->view('backend/templates/admin_footer');
    }


    public function searchData()
    {
        $key = $this->input->post('key');
        $anggota = $this->Kesepahaman_Model->search_anggota($key);
        if ($anggota) {
            if (!$anggota['deleted_at']) {
                if ($anggota['is_active'] == 1) {
                    if ($anggota['is_kesepahaman'] != 1) {
                        $result = [
                            'status' => true,
                            'anggota' => $anggota,
                        ];
                    } else {
                        $result = ['status' => false, 'alert' => 'Kesepahaman sudah dicetak !!'];
                    }
                } else {
                    $result = ['status' => false, 'alert' => 'Anggota tidak aktif !!'];
                }
            } else {
                $result = ['status' => false, 'alert' => 'Anggota sudah keluar !!'];
            }
        } else {
            $result = ['status' => false, 'alert' => 'Anggota tidak ditemukan !!'];
        }

        echo json_encode($result);
    }

    public function cetakKesepahaman()
    {

        $id = $this->input->get('id_anggota');
        $data = [
            'no_kesepahaman' => $this->input->get('no_kesepahaman'),
            'nama_anggota' => $this->input->get('nama_anggota'),
            'alamat' => $this->input->get('alamat'),
            'tanggal_kesepahaman' => $this->input->get('tanggal_kesepahaman')
        ];
        if ($this->input->get('nama_anggota')) {
            $data_db = [
                'no_kesepahaman' => $this->input->get('no_kesepahaman'),
                'tanggal_kesepahaman' => $this->input->get('tanggal_kesepahaman'),
                'id_anggota' => $id,
                'is_active' => 1,
                'created_at' => date('d-m-Y H:i:s')
            ];
            $this->db->set('is_kesepahaman', 1);
            $this->db->where('id_anggota', $id);
            $this->db->update('tbl_anggota');

            $this->Kesepahaman_Model->add($data_db);
            $this->load->view('backend/kesepahaman/cetak', $data);
        } else {
            echo 'data belum lengkap';
        }
    }

    public function RepeatPrint($id)
    {
        $data = $this->Kesepahaman_Model->printlagi($id);
        $this->load->view('backend/kesepahaman/cetak', $data);
    }

    public function hapus($id)
    {
        $data = ['deleted_at' => date('d-m-Y H:i:s')];
        $this->db->where('id_kesepahaman', $id);
        $this->db->update('tbl_kesepahaman', $data);

        $result = ['status' => true, 'alert' => 'Dihapus'];

        echo json_encode($result);
    }


    private function kode_Kesepahaman()
    {
        $this->db->select_max('no_kesepahaman');
        $row = $this->db->get('tbl_kesepahaman')->row_array();

        $bulan = $this->formatDate(date('n'));
        $nourut = intval(substr($row['no_kesepahaman'], 0));
        $nourut += 1;
        $result = $nourut . '/KAUBER' . '/' . $bulan . '/' . date('Y');
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

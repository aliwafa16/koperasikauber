<?php
class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Anggota_Model');
        $this->load->Model('Simpanan_Pokok_Model');
        $this->load->library('form_validation');
        $this->load->library('upload');

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

        $data['anggotas'] = $this->Anggota_Model->All_Anggota();
        $data['anggota_aktif'] = $this->Anggota_Model->Aktif_Anggota();
        $data['anggota_tidak_aktif'] = $this->Anggota_Model->Tidak_Aktif_Anggota();
        $data['riwayat'] = $this->Anggota_Model->Riwayat();

        $data['title'] = 'Kauber - Data Anggota';
        $data['headline'] = 'Manajemen Data - Anggota';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/anggota/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }


    public function get_All_Anggota()
    {
        $result = $this->Anggota_Model->All_Anggota();
        echo json_encode($result);
    }

    public function get_Anggota_Aktif()
    {
        $result = $this->Anggota_Model->Aktif_Anggota();
        echo json_encode($result);
    }

    public function get_Anggota_Tidak_Aktif()
    {
        $result = $this->Anggota_Model->Tidak_Aktif_Anggota();
        echo json_encode($result);
    }

    public function get_Riwayat()
    {
        $result = $this->Anggota_Model->Riwayat();
        echo json_encode($result);
    }


    public function aktifAnggota($id)
    {

        $simpanan_pokok = $this->db->get_where('tbl_simpanan_pokok', ['id_anggota' => $id])->row_array();

        if ($simpanan_pokok['tanggal'] == '' || $simpanan_pokok['debet'] == 0) {
            $tanggal = $this->formatDate(date('Y-m-d'));
            $data = [
                'tanggal' => $tanggal,
                'debet' => intval(150000),
                'credit' => 0,
                'total' => intval(150000),
                'updated_at' => date('d-m-Y H:i:s')
            ];

            $this->db->where('id_anggota', $id);
            $this->db->update('tbl_simpanan_pokok', $data);
        }

        $this->db->set('is_active', 1);
        $this->db->where('id_anggota', $id);
        $this->db->update('tbl_anggota');

        $result = ['status' => true, 'alert' => 'Aktif !!'];
        echo json_encode($result);
    }

    public function NonaktifAnggota($id)
    {
        $this->db->set('is_active', 2);
        $this->db->where('id_anggota', $id);
        $this->db->update('tbl_anggota');

        $result = ['status' => true, 'alert' => 'Nonaktif !!'];
        echo json_encode($result);
    }

    public function getKodeAnggota()
    {
        $this->db->select_max('kode_anggota');
        $row = $this->db->get('tbl_anggota')->row_array();
        $nourut = intval(substr($row['kode_anggota'], 0));

        $nourut += 1;
        $result = $nourut . '/KAUBER' . '/' . date('d.m.y') . '/' . date('Y');

        echo json_encode($result);
    }


    public function detailAnggota($id)
    {
        $data['anggota'] = $this->Anggota_Model->getDetailAnggota($id);
        $data['headline'] = 'Manajemen Data - Details Anggota';
        $data['title'] = 'Detail Anggota';

        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/anggota/details', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function getAnggotaByID($id)
    {
        $result = $this->db->get_where('tbl_anggota', ['id_anggota' => $id])->row();
        echo json_encode($result);
    }


    public function addAnggota()
    {
        $this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required|trim', ['required' => 'Kode harus diisi !!']);
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim', ['required' => 'Nama harus diisi !!']);
        $this->form_validation->set_rules('nik_anggota', 'NIK Anggota', 'required|trim', ['required' => 'NIK harus diisi !!']);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', ['required' => 'Tempat lahir harus diisi !!']);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim', ['required' => 'Tanggal lahir harus diisi !!']);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis kelamin harus diisi !!']);
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', ['required' => 'Pekerjaan harus diisi !!']);
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|trim', ['required' => 'No Telp. harus diisi !!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi !!']);
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim', ['required' => 'Kelurahan harus diisi !!']);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim', ['required' => 'Kecamatan harus diisi !!']);
        $this->form_validation->set_rules('kota_kab', 'Kab Kota', 'required|trim', ['required' => 'Kota / Kabupaten harus diisi !!']);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', ['required' => 'Keterangan harus diisi !!']);
        // $this->form_validation->set_rules('foto_anggota', 'Foto Anggota', 'required|trim', ['required' => 'Foto anggota harus diisi !!']);

        if ($this->form_validation->run() == FALSE) {
            $array = [
                'kode_anggota_error' => form_error('kode_anggota'),
                'nama_anggota_error' => form_error('nama_anggota'),
                'nik_anggota_error' => form_error('nik_anggota'),
                'tempat_lahir_error' => form_error('tempat_lahir'),
                'tanggal_lahir_error' => form_error('tanggal_lahir'),
                'jenis_kelamin_error' => form_error('jenis_kelamin'),
                'pekerjaan_error' => form_error('pekerjaan'),
                'no_telp_error' => form_error('no_telp'),
                'alamat_error' => form_error('alamat'),
                'kelurahan_error' => form_error('kelurahan'),
                'kecamatan_error' => form_error('kecamatan'),
                'kota_kab_error' => form_error('kota_kab'),
                'keterangan_error' => form_error('keterangan'),
                // 'foto_anggota_error' => form_error('foto_anggota'),

            ];

            echo json_encode($array);
        } else {
            $tanggal = $this->formatDate(date('Y-m-d'));
            $data = [
                'kode_anggota' => $this->input->post('kode_anggota', true),
                'nama_anggota' => $this->input->post('nama_anggota', true),
                'nik_anggota' => $this->input->post('nik_anggota', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'kecamatan' => $this->input->post('kecamatan', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'no_telp' => $this->input->post('no_telp', true),
                'alamat' => $this->input->post('alamat', true),
                'kelurahan' => $this->input->post('kelurahan', true),
                'kecamatan' => $this->input->post('kecamatan', true),
                'kota_kab' => $this->input->post('kota_kab', true),
                'keterangan' => $this->input->post('keterangan', true),
                'foto_anggota' => $this->_foto(),
                'tanggal_masuk' => $tanggal,
                'is_active' => 2,
                'created_at' => date('d-m-Y H:i:s')
            ];

            $result = $this->Anggota_Model->add($data);

            $simpanan_pokok = [
                'id_anggota' => $result['id'],
                'kode_simpanan_pokok' => $this->kode_simpanan_pokok(),
                'tanggal' => '',
                'debet' => 0,
                'credit' => intval(-150000),
                'total' => intval(-150000),
                'created_at' => date('d-m-Y H:i:s')
            ];


            if ($result['result']) {
                $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
            } else {
                $this->Simpanan_Pokok_Model->add($simpanan_pokok);
                $result = ['status' => true, 'alert' => 'Ditambahkan'];
            }
            echo json_encode($result);
        }
    }


    public function editAnggota()
    {
        $id = $this->input->post('id_anggota');

        $new_foto = $_FILES['foto_anggota']['name'];
        $result = $this->db->get_where('tbl_anggota', ['id_anggota' => $id])->row_array();
        $old_image = $result['foto_anggota'];

        if ($new_foto != null) {
            @unlink(FCPATH . './assets/foto_anggota/' . $old_image);
            $foto_anggota = $this->_foto();
        } else {
            $foto_anggota = $old_image;
        }

        $data = [
            'kode_anggota' => $this->input->post('kode_anggota', true),
            'nama_anggota' => $this->input->post('nama_anggota', true),
            'nik_anggota' => $this->input->post('nik_anggota', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'pekerjaan' => $this->input->post('pekerjaan', true),
            'no_telp' => $this->input->post('no_telp', true),
            'alamat' => $this->input->post('alamat', true),
            'foto_anggota' => $foto_anggota,
            'kelurahan' => $this->input->post('kelurahan', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'kota_kab' => $this->input->post('kota_kab', true),
            'keterangan' => $this->input->post('keterangan', true),
            'is_active' => $this->input->post('is_active', true),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
            'created_at' => $this->input->post('created_at', true),
            'updated_at' => date('d-m-Y H:i:s')
        ];

        if ($this->Anggota_Model->edit($data, $id)) {
            $result = ['status' => false, 'alert' => 'Gagal Edit'];
        } else {
            $result = ['status' => true, 'alert' => 'Diedit'];
        }


        echo json_encode($result);
    }


    public function hapus($id)
    {
        $data = $this->db->get_where('tbl_anggota', ['id_anggota' => $id])->row_array();
        $old_image = $data['foto_anggota'];
        @unlink(FCPATH . './assets/foto_anggota/' . $old_image);

        $deleted = [
            'deleted_at' => date('d-m-Y H:i:s')
        ];

        $this->db->where('id_anggota', $id);
        $this->db->update('tbl_anggota', $deleted);

        $result = ['status' => true, 'alert' => 'Dihapus'];

        echo json_encode($result);
    }


    private function _foto()
    {
        $config = [
            'upload_path' => './assets/foto_anggota',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 10048,
            'file_name' => uniqid()
        ];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto_anggota')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $foto = $this->upload->data('file_name');
            return $foto;
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

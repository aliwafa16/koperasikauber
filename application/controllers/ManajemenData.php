<?php
class ManajemenData extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Anggota_Model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index($params)
    {
        $loadView = null;
        $listView = 'backend/manajemenData/' . $params . '_v';

        if (file_exists(APPPATH . '/views/' . $listView . '.php') === TRUE) {
            $loadView = $listView;
        } else {
            $loadView = 'Not Found';
        }

        $data['title'] = 'Manajemen Data';

        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_navbar', $data);
        $this->load->view('backend/templates/admin_sidebar', $data);
        $this->load->view($loadView, $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function getAllAnggota()
    {
        $result = $this->Anggota_Model->getAnggota();
        echo json_encode($result);
    }

    public function getAllActiveAnggota()
    {
        $result = $this->Anggota_Model->getActiveAnggota();
        echo json_encode($result);
    }

    public function getAllNonActiveAnggota()
    {
        $result = $this->Anggota_Model->getNonActiveAnggota();
        echo json_encode($result);
    }

    public function getAnggotaByID($id){
        $result = $this->db->get_where('tbl_anggota', ['id_anggota'=>$id])->row();
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
            $data = [
                'kode_anggota' => $this->input->post('kode_anggota', true),
                'nama_anggota' => $this->input->post('nama_anggota', true),
                'nik_anggota' => $this->input->post('nik_anggota', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
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
                'tanggal_masuk' => date('j M Y', true),
                'created_at' => date('d-m-Y H:i:s', true)
            ];

            if ($this->Anggota_Model->add($data)) {
                $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
            } else {
                $result = ['status' => true, 'alert' => 'Ditambahkan'];
            }
            echo json_encode($result);
        }
    }

    public function editAnggota(){
        $id = $this->input->post('id_anggota');

        $data = $this->db->get_where('tbl_anggota', ['id_anggota'=>$id])->row();

        var_dump($data);
        die;

    }

    private function _foto()
    {
        $config = [
            'upload_path' => './assets/foto_anggota',
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048,
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

    public function detailAnggota($id)
    {
        $data['anggota'] = $this->db->get_where('tbl_anggota', ['id_anggota' => $id])->row_array();

        $data['title'] = 'Detail Anggota';


        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_navbar', $data);
        $this->load->view('backend/templates/admin_sidebar', $data);
        $this->load->view('backend/manajemenData/detail_v', $data);
        $this->load->view('backend/templates/admin_footer');
    }

    public function aktifAnggota($id)
    {
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
}

<?php
class Simpanan_Wajib extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Simpanan_Wajib_Model');
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
        $data['title'] = 'Kauber - Simpanan Wajib';
        $data['headline'] = 'Manajemen Keuangan - Simpanan Wajib';
        $this->load->view('backend/templates/admin_header', $data);
        $this->load->view('backend/templates/admin_sidebar');
        $this->load->view('backend/templates/admin_navbar');
        $this->load->view('backend/simpanan_wajib/index', $data);
        $this->load->view('backend/templates/admin_footer');
    }


    public function searchAnggota()
    {
        $key = $this->input->post('key');
        $this->db->select('kode_anggota,nama_anggota,id_anggota');
        $this->db->like('nama_anggota', $key);
        $this->db->or_like('kode_anggota', $key);
        $anggota = $this->db->get('tbl_anggota')->row_array();

        $kendaraan = $this->getJumlahKendaraan($anggota['id_anggota']);


        $result = ['anggota'=>$anggota,'jumlah_kendaraan'=>$kendaraan];

        echo json_encode($result);

    }

    public function get_All_Simpanan(){
        $simpanan_wajib = $this->Simpanan_Wajib_Model->getSimpananWajib();
        echo json_encode($simpanan_wajib);
    }

    public function addSimpananWajib(){
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|trim', ['required' => 'Nominal harus diisi !!']);
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required|trim', ['required' => 'Nama harus diisi !!']);
        $this->form_validation->set_rules('kode_anggota', 'Kode Anggota', 'required|trim', ['required' => 'Kode harus diisi !!']);

        if($this->form_validation->run()==FALSE){
             $array = [
                'nominal_error' => form_error('nominal'),
                'nama_anggota_error' => form_error('nama_anggota'),
                'kode_anggota_error' => form_error('kode_anggota'),
            ];
            echo json_encode($array);
        }else{
            $tanggal = $this->formatDate(date('d-m-Y H:i:s'));
            $kode_simpanan_wajib = $this->kode_simpanan_wajib();
            $tagihan = intval($this->input->post('tagihan'));
            $nominal = intval($this->input->post('nominal'));
            $credit = $tagihan-$nominal;

            $debet = $nominal;
            $total = $nominal;

            $data = [
                'kode_simpanan_wajib'=>$kode_simpanan_wajib,
                'id_anggota'=>$this->input->post('id_anggota'),
                'credit' => $credit,
                'debet' => $debet,
                'total' => $total,
                'created_at' => date('d-m-Y H:i:s'),
            ];
            $result = $this->Simpanan_Wajib_Model->add($data);


            $data_riwayat = [
                'id_simpanan_wajib'=>$result,
                'nominal'=>$nominal,
                'tanggal'=> $tanggal
            ];

            if ($this->Simpanan_Wajib_Model->addRiwayatSW($data_riwayat)) {
                $result = ['status' => false, 'alert' => 'Gagal DiTambahkan'];
            } else {
                $result = ['status' => true, 'alert' => 'Berhasil Ditambahkan'];
            }

            echo json_encode($result);

        }
    }

    public function addPembayaran(){
        $this->form_validation->set_rules('re_nominal', 'Nominal', 'required|trim', ['required' => 'Nominal harus diisi !!']);

        if($this->form_validation->run()==FALSE){
            $array = [
                're_nominal_error' => form_error('re_nominal'),
            ];
            echo json_encode($array);
        }else{

            $latest_pembayaran = $this->db->get_where('tbl_simpanan_wajib',['id_simpanan_wajib'=>$this->input->post('re_id_simpanan_wajib')])->row_array();

            var_dump($latest_pembayaran);

            // $nominal = intval($this->input->post('re_nominal'));
            // $tagihan = intval($this->input->post('re_tagihan'));
            // $credit = intval($this->input->post('re_credit'));

            // if($credit!=0){
            //    if($nominal>$credit){
            //     $new_debet
            //    }
            // }else{

            // }
        }

    }

    public function getLatestPembayaran($id){
        $latest =  $this->Simpanan_Wajib_Model->latestPembayaran($id);
        $jumlah_kendaraan = $this->getJumlahKendaraan($latest['id_anggota']);
        $result = [
            'pembayaran' => $latest,
            'kendaraan' => $jumlah_kendaraan
        ];


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


    private function kode_simpanan_wajib()
    {
        $this->db->select_max('kode_simpanan_pokok');
        $row = $this->db->get('tbl_simpanan_pokok')->row_array();
        $nourut = intval(substr($row['kode_simpanan_pokok'], 0));

        $nourut += 1;
        $result = $nourut . '/AKUN' . '/KAUBER' . '/' . 'SP' . '/' . date('d.m.y') . '/' . date('Y');
        return $result;
    }

    private function getJumlahKendaraan($id){
        return $this->Simpanan_Wajib_Model->jumlahKendaraan($id);
    }
}

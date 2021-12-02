<?php 
class Profil_Model extends CI_Model{
	public function getBiodata($id){
		$anggota = $this->db->get_where('tbl_anggota', ['id_anggota' => $id])->row_array();

		$this->db->select('tbl_sp_riwayat.*');
		$this->db->from('tbl_sp_riwayat');
		$this->db->join('tbl_simpanan_pokok','tbl_simpanan_pokok.id_simpanan_pokok=tbl_sp_riwayat.id_simpanan_pokok');
		$this->db->where('tbl_simpanan_pokok.id_anggota',$id);
        $simpanan_pokok = $this->db->get()->result_array();
        // $simpanan_wajib = $this->db->get_where('tbl_simpanan_wajib', ['id_anggota' => $id])->result_array();

        $this->db->select('*');
        $this->db->from('tbl_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->join('tbl_kepemilikan', 'tbl_kepemilikan.id_kendaraan=tbl_kendaraan.id_kendaraan');
        $this->db->where('tbl_kepemilikan.id_anggota', $id);
        $kendaraan =  $this->db->get()->result_array();


        $data = [
            'anggota' => $anggota,
            'kendaraan' => $kendaraan,
            'simpanan_pokok' => $simpanan_pokok,
            // 'simpanan_wajib' => $simpanan_wajib
        ];

        return $data;
	}
}
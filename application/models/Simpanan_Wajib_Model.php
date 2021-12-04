<?php
class Simpanan_Wajib_Model extends CI_Model {
	public function getSimpananWajib(){
		$this->db->select('tbl_simpanan_wajib.*,tbl_anggota.id_anggota,tbl_anggota.nama_anggota,tbl_anggota.kode_anggota');
		$this->db->from('tbl_simpanan_wajib');
		$this->db->join('tbl_anggota','tbl_simpanan_wajib.id_anggota=tbl_anggota.id_anggota');
		$this->db->where('tbl_simpanan_wajib.deleted_at',null);
		$this->db->where('tbl_anggota.deleted_at',null);
		$this->db->where('tbl_anggota.is_active',1);
		return $this->db->get()->result_array();
	}

	public function jumlahKendaraan($id){
		$this->db->where('id_anggota', $id);
		$this->db->where('deleted_at',null);
		$this->db->from('tbl_kepemilikan');
		return $this->db->count_all_results();
	}

	public function add($data){
		$this->db->insert('tbl_simpanan_wajib', $data);
		return $this->db->insert_id();
	}

	public function addRiwayatSW($data){
		$this->db->insert('tbl_sw_riwayat',$data);
		return $this->db->affected_rows() > 1 ? true : false;
	}


	public function latestPembayaran($id){
		$this->db->select('tbl_simpanan_wajib.*, tbl_anggota.id_anggota, tbl_anggota.nama_anggota, tbl_anggota.kode_anggota');
		$this->db->from('tbl_simpanan_wajib');
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota=tbl_simpanan_wajib.id_anggota');
		$this->db->where('tbl_simpanan_wajib.id_simpanan_wajib', $id);
		return $this->db->get()->row_array();
	}
}
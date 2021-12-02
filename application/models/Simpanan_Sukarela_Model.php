<?php 
class Simpanan_Sukarela_Model extends CI_Model{
	public function getAll(){
		$this->db->select('tbl_simpanan_sukarela.*,tbl_anggota.id_anggota,tbl_anggota.nama_anggota,tbl_anggota.kode_anggota');
		$this->db->from('tbl_simpanan_sukarela');
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota=tbl_simpanan_sukarela.id_anggota');
		$this->db->where('tbl_simpanan_sukarela.deleted_at',null);
		return $this->db->get()->result_array();
	}

	public function getRiwayat(){
		$this->db->select('tbl_simpanan_sukarela.*,tbl_anggota.id_anggota,tbl_anggota.nama_anggota,tbl_anggota.kode_anggota');
		$this->db->from('tbl_simpanan_sukarela');
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota=tbl_simpanan_sukarela.id_anggota');
		$this->db->where('tbl_simpanan_sukarela.deleted_at !=',null);
		return $this->db->get()->result_array();
	}

	public function add($data){
		$this->db->insert('tbl_simpanan_sukarela', $data);
		return $this->db->affected_rows() > 1 ? true : false;
	}
	
}
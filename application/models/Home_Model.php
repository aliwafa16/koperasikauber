<?php
class Home_Model extends CI_Model {
	public function countAllAnggota(){
		return $this->db->count_all_results('tbl_anggota');
	}

	public function countAktifAnggota(){
		$this->db->where('is_active',1);
		return $this->db->count_all_results('tbl_anggota');
	}

	public function countTidakAktifAnggota(){
		$this->db->where('is_active',2);
		return $this->db->count_all_results('tbl_anggota');
	}

	public function countAnggotaKeluar(){
		$this->db->where('deleted_at !=',null);
		return $this->db->count_all_results('tbl_anggota');
	}

	public function countAllKendaraan(){
		$this->db->where('deleted_at',null);
		$this->db->where('is_active',1);
		return $this->db->count_all_results('tbl_kendaraan');
	}

	public function countAP(){
		$this->db->select('*');
		$this->db->from('tbl_jenis_trayek');
		$this->db->join('tbl_trayek','tbl_trayek.id_jenis_trayek=tbl_jenis_trayek.id_jenis_trayek');
		$this->db->join('tbl_kendaraan','tbl_kendaraan.id_trayek=tbl_trayek.id_trayek');
		$this->db->where('tbl_kendaraan.deleted_at',null);
		$this->db->where('tbl_kendaraan.is_active',1);
		$this->db->where('tbl_jenis_trayek.id_jenis_trayek',1);

		return $this->db->count_all_results();
	}

	public function countTPK(){
		$this->db->select('*');
		$this->db->from('tbl_jenis_trayek');
		$this->db->join('tbl_trayek','tbl_trayek.id_jenis_trayek=tbl_jenis_trayek.id_jenis_trayek');
		$this->db->join('tbl_kendaraan','tbl_kendaraan.id_trayek=tbl_trayek.id_trayek');
		$this->db->where('tbl_kendaraan.deleted_at',null);
		$this->db->where('tbl_kendaraan.is_active',1);
		$this->db->where('tbl_jenis_trayek.id_jenis_trayek',3);

		return $this->db->count_all_results();
	}

	public function countAKDP(){
		$this->db->select('*');
		$this->db->from('tbl_jenis_trayek');
		$this->db->join('tbl_trayek','tbl_trayek.id_jenis_trayek=tbl_jenis_trayek.id_jenis_trayek');
		$this->db->join('tbl_kendaraan','tbl_kendaraan.id_trayek=tbl_trayek.id_trayek');
		$this->db->where('tbl_kendaraan.deleted_at',null);
		$this->db->where('tbl_kendaraan.is_active',1);
		$this->db->where('tbl_jenis_trayek.id_jenis_trayek',2);

		return $this->db->count_all_results();
	}

	public function countAB(){
		$this->db->select('*');
		$this->db->from('tbl_jenis_trayek');
		$this->db->join('tbl_trayek','tbl_trayek.id_jenis_trayek=tbl_jenis_trayek.id_jenis_trayek');
		$this->db->join('tbl_kendaraan','tbl_kendaraan.id_trayek=tbl_trayek.id_trayek');
		$this->db->where('tbl_kendaraan.deleted_at',null);
		$this->db->where('tbl_kendaraan.is_active',1);
		$this->db->where('tbl_jenis_trayek.id_jenis_trayek',4);

		return $this->db->count_all_results();
	}
}
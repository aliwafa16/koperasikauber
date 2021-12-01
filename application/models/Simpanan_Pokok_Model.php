<?php
class Simpanan_Pokok_Model extends CI_Model
{
    public function getAllSimpanan()
    {
        $this->db->select('tbl_simpanan_pokok.*,
        tbl_anggota.id_anggota,
        tbl_anggota.kode_anggota,
        tbl_anggota.nama_anggota');
        $this->db->from('tbl_simpanan_pokok');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_simpanan_pokok.id_anggota');
        $this->db->where('tbl_anggota.deleted_at =', null);
        return $this->db->get()->result();
    }

    public function riwayat()
    {
        $this->db->select('tbl_simpanan_pokok.*,
        tbl_anggota.id_anggota,
        tbl_anggota.kode_anggota,
        tbl_anggota.deleted_at,
        tbl_anggota.nama_anggota');
        $this->db->from('tbl_simpanan_pokok');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_simpanan_pokok.id_anggota');
        $this->db->where('tbl_anggota.deleted_at !=', null);
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_simpanan_pokok', $data);
        return $this->db->insert_id();
    }

    public function addRiwayatSP($data)
    {
        $this->db->insert('tbl_sp_riwayat', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }
}

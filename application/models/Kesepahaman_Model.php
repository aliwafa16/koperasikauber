<?php
class Kesepahaman_Model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('
        tbl_kesepahaman.*,
        tbl_anggota.id_anggota,
        tbl_anggota.kode_anggota,
        tbl_anggota.nama_anggota');

        $this->db->from('tbl_kesepahaman');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kesepahaman.id_anggota');
        $this->db->where('tbl_anggota.deleted_at =', null);
        $this->db->where('tbl_kesepahaman.deleted_at =', null);

        return $this->db->get()->result();
    }

    public function keluar()
    {
        $this->db->select('
        tbl_kesepahaman.*,
        tbl_anggota.id_anggota,
        tbl_anggota.kode_anggota,
        tbl_anggota.nama_anggota');

        $this->db->from('tbl_kesepahaman');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kesepahaman.id_anggota');
        $this->db->where('tbl_anggota.deleted_at !=', null);
        return $this->db->get()->result();
    }

    public function riwayat()
    {
        $this->db->select('
        tbl_kesepahaman.*,
        tbl_anggota.id_anggota,
        tbl_anggota.kode_anggota,
        tbl_anggota.nama_anggota');

        $this->db->from('tbl_kesepahaman');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kesepahaman.id_anggota');
        $this->db->where('tbl_kesepahaman.deleted_at !=', null);
        return $this->db->get()->result();
    }

    public function search_anggota($key)
    {
        $this->db->like('nama_anggota', $key);
        $this->db->or_like('kode_anggota', $key);
        return $this->db->get('tbl_anggota')->row_array();
    }

    public function add($data)
    {
        $this->db->insert('tbl_kesepahaman', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }

    public function printlagi($id)
    {
        $this->db->select(
            'tbl_kesepahaman.*,
            tbl_anggota.*'
        );
        $this->db->from('tbl_kesepahaman');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kesepahaman.id_anggota');
        $this->db->where('tbl_kesepahaman.id_kesepahaman', $id);
        return $this->db->get()->row_array();
    }
}

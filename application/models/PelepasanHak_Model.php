<?php
class PelepasanHak_Model extends CI_Model
{
    public function getAll()
    {
        $this->db->select('tbl_pelepasan_hak.*,
        tbl_anggota.nama_anggota,
        tbl_anggota.id_anggota,
        tbl_kendaraan.*,
        tbl_trayek.nama_trayek,
        tbl_trayek.trayek');

        $this->db->from('tbl_pelepasan_hak');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_pelepasan_hak.id_anggota');
        $this->db->join('tbl_kendaraan', 'tbl_kendaraan.id_kendaraan=tbl_pelepasan_hak.id_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->where('tbl_kendaraan.deleted_at !=', null);
        return $this->db->get()->result();
    }


    public function search_kendaraan($key)
    {
        $this->db->like('nomor_kendaraan', $key);
        $this->db->where('deleted_at !=', null);
        return $this->db->get('tbl_kendaraan')->row_array();
    }

    public function search_data($key)
    {
        $this->db->select('tbl_kendaraan.*,
        tbl_trayek.trayek,
        tbl_trayek.nama_trayek,
        tbl_anggota.nama_anggota,
        tbl_anggota.id_anggota');

        $this->db->from('tbl_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_kepemilikan', 'tbl_kepemilikan.id_kendaraan=tbl_kendaraan.id_kendaraan');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kepemilikan.id_anggota');
        $this->db->where('tbl_kendaraan.id_kendaraan', $key);
        return $this->db->get()->row();
    }

    public function add($data)
    {
        $this->db->insert('tbl_pelepasan_hak', $data);
    }
}

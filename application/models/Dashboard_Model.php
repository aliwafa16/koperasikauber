<?php

class Dashboard_Model extends CI_Model
{
    public function get_all_anggota()
    {
        return $this->db->where('deleted_at =', null)->get('tbl_anggota')->num_rows();
    }

    public function get_all_anggota_aktif()
    {
        return $this->db->where('is_active', 1)->where('deleted_at =', null)->get('tbl_anggota')->num_rows();
    }

    public function get_all_anggota_keluar()
    {
        return $this->db->where('deleted_at !=', null)->get('tbl_anggota')->num_rows();
    }

    public function get_all_kendaraan()
    {
        return $this->db->where('deleted_at =', null)->get('tbl_kendaraan')->num_rows();
    }
}

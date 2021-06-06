<?php

class Anggota_Model extends CI_Model
{
    public function getAnggota()
    {
        return $this->db->get('tbl_anggota')->result();
    }

    public function getActiveAnggota()
    {
        $this->db->where('is_active', 1);
        return $this->db->get('tbl_anggota')->result();
    }

    public function getNonActiveAnggota()
    {
        $this->db->where('is_active', 2);
        return $this->db->get('tbl_anggota')->result();
    }


    public function add($data)
    {
        $this->db->insert('tbl_anggota', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }
}

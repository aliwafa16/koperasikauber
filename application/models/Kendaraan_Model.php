<?php
class Kendaraan_Model extends CI_Model{
    public function getKendaraan(){
        $this->db->select('tbl_kendaraan.*,tbl_trayek.nama_trayek');
        
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->from('tbl_kendaraan');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('tbl_kendaraan', $data);
        return $this->db->insert_id();
    }

    public function addKepemilikan($data)
    {
        $this->db->insert('tbl_kepemilikan', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }

    public function getAllTrayek($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->where('tbl_trayek.id_jenis_trayek', $id);
        $result = $this->db->get()->result();
        return $result;
    }

    public function getKendaraanID($id)
    {
        $this->db->select('
                tbl_kendaraan.*,
                tbl_trayek.nama_trayek,
                tbl_jenis_trayek.id_jenis_trayek,
                tbl_jenis_trayek.nama_jenis_trayek,
                tbl_anggota.nama_anggota,
                tbl_anggota.kode_anggota,
                tbl_anggota.id_anggota,
                tbl_anggota.foto_anggota,
                tbl_kepemilikan.id_kepemilikan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->join('tbl_kepemilikan', 'tbl_kepemilikan.id_kendaraan=tbl_kendaraan.id_kendaraan');
        $this->db->join('tbl_anggota', 'tbl_anggota.id_anggota=tbl_kepemilikan.id_anggota');
        $this->db->from('tbl_kendaraan');
        $this->db->where('tbl_kendaraan.id_kendaraan', $id);
        return $this->db->get()->row();
    }
}
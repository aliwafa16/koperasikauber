<?php
class Kepemilikan_Model extends CI_Model
{
    public function addKepemilikan($data)
    {
        $this->db->insert('tbl_kepemilikan', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }

    public function getKepemilikanLama($id){
        $this->db->select('tbl_anggota.id_anggota, 
        tbl_anggota.kode_anggota, 
        tbl_anggota.nama_anggota,
        tbl_anggota.is_active,
        tbl_kepemilikan.id_kepemilikan,
        tbl_kepemilikan.id_kendaraan');
        $this->db->from('tbl_anggota');
        $this->db->join('tbl_kepemilikan', 'tbl_kepemilikan.id_anggota=tbl_anggota.id_anggota');
        $this->db->where('tbl_anggota.deleted_at =', null);
        $this->db->where('tbl_kepemilikan.id_kendaraan', $id);
        return $this->db->get()->row();
    }

    public function edit($data, $id){
        $this->db->where('tbl_kepemilikan.id_kendaraan', $id);
        $this->db->update('tbl_kepemilikan', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }
}

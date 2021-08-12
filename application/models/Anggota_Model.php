<?php

class Anggota_Model extends CI_Model
{
    public function All_Anggota()
    {
        $this->db->where('deleted_at', null);
        return $this->db->get('tbl_anggota')->result_array();
    }

    public function Aktif_Anggota()
    {
        $this->db->where('is_active', 1);
        $this->db->where('deleted_at', null);
        return $this->db->get('tbl_anggota')->result_array();
    }

    public function Tidak_Aktif_Anggota()
    {
        $this->db->where('is_active', 2);
        $this->db->where('deleted_at', null);
        return $this->db->get('tbl_anggota')->result_array();
    }

    public function Riwayat()
    {
        $this->db->where('deleted_at !=', null);
        return $this->db->get('tbl_anggota')->result_array();
    }


    public function add($data)
    {
        $this->db->insert('tbl_anggota', $data);
        $result = $this->db->affected_rows() > 1 ? true : false;
        $data = [
            'id' => $this->db->insert_id(),
            'result' => $result
        ];

        return $data;
    }

    public function edit($data, $id)
    {
        $this->db->where('id_anggota', $id);
        $this->db->update('tbl_anggota', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }

    public function searchAnggota($key){
        $this->db->like('nama_anggota', $key);
        $this->db->or_like('kode_anggota', $key);
        return $this->db->get('tbl_anggota')->row();
    }

    public function getDetailAnggota($id)
    {
        $anggota = $this->db->get_where('tbl_anggota', ['id_anggota' => $id])->row_array();

        $this->db->select('*');
        $this->db->from('tbl_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->join('tbl_kepemilikan', 'tbl_kepemilikan.id_kendaraan=tbl_kendaraan.id_kendaraan');
        $this->db->where('tbl_kepemilikan.id_anggota', $id);
        $kendaraan =  $this->db->get()->result_array();

        $data = [
            'anggota' => $anggota,
            'kendaraan' => $kendaraan
        ];

        return $data;
    }
}

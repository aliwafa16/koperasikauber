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

    public function get_all_anggotda_tidak_aktif()
    {
        return $this->db->where('is_active', 2)->where('deleted_at =', null)->get('tbl_anggota')->num_rows();
    }

    public function get_all_anggota_keluar()
    {
        return $this->db->where('deleted_at !=', null)->get('tbl_anggota')->num_rows();
    }

    public function get_all_kendaraan()
    {
        return $this->db->get('tbl_kendaraan')->num_rows();
    }

    public function get_kendaraan_aktif()
    {
        return $this->db->where('deleted_at', null)->get('tbl_kendaraan')->num_rows();
    }

    public function get_kendaraan_keluar()
    {
        return $this->db->where('deleted_at !=', null)->get('tbl_kendaraan')->num_rows();
    }

    public function get_all_skkk()
    {
        return $this->db->where('deleted_at =', null)->get('tbl_skkk')->num_rows();
    }

    public function get_all_kesepahaman()
    {
        return $this->db->where('deleted_at =', null)->get('tbl_kesepahaman')->num_rows();
    }

    public function get_all_pelepasan_hak()
    {
        return $this->db->where('deleted_at =', null)->get('tbl_pelepasan_hak')->num_rows();
    }

    public function getAP()
    {
        $this->db->select('*');
        $this->db->from('tbl_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->where('tbl_jenis_trayek.id_jenis_trayek', 1);
        $this->db->where('tbl_kendaraan.deleted_at', null);
        return $this->db->count_all_results();
    }

    public function getTPK()
    {
        $this->db->select('*');
        $this->db->from('tbl_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->where('tbl_jenis_trayek.id_jenis_trayek', 3);
        $this->db->where('tbl_kendaraan.deleted_at', null);
        return $this->db->count_all_results();
    }

    public function getAKDP()
    {
        $this->db->select('*');
        $this->db->from('tbl_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->where('tbl_jenis_trayek.id_jenis_trayek', 2);
        $this->db->where('tbl_kendaraan.deleted_at', null);
        return $this->db->count_all_results();
    }

    public function getAB()
    {
        $this->db->select('*');
        $this->db->from('tbl_kendaraan');
        $this->db->join('tbl_trayek', 'tbl_trayek.id_trayek=tbl_kendaraan.id_trayek');
        $this->db->join('tbl_jenis_trayek', 'tbl_jenis_trayek.id_jenis_trayek=tbl_trayek.id_jenis_trayek');
        $this->db->where('tbl_jenis_trayek.id_jenis_trayek', 4);
        $this->db->where('tbl_kendaraan.deleted_at', null);
        return $this->db->count_all_results();
    }

    public function getTrayekAP()
    {
        return $this->db->get_where('tbl_trayek', ['id_jenis_trayek' => 1])->result_array();
    }

    public function getTrayekTPK()
    {
        return $this->db->get_where('tbl_trayek', ['id_jenis_trayek' => 3])->result_array();
    }

    public function getTrayekAKDP()
    {
        return $this->db->get_where('tbl_trayek', ['id_jenis_trayek' => 2])->result_array();
    }

    public function getTrayekAB()
    {
        return $this->db->get_where('tbl_trayek', ['id_jenis_trayek' => 4])->result_array();
    }

    
}

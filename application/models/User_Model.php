<?php 
class User_Model extends CI_Model{
    public function allUser(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_role','tbl_role.id_role=tbl_user.id_role');
        $this->db->where('deleted_at',null);
        return $this->db->get()->result_array();
    }

    public function userAktif(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_role', 'tbl_role.id_role=tbl_user.id_role');
        $this->db->where('deleted_at', null);
        $this->db->where('tbl_user.is_active',1);
        return $this->db->get()->result_array();
    }

    public function userTidakAktif(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_role', 'tbl_role.id_role=tbl_user.id_role');
        $this->db->where('deleted_at', null);
        $this->db->where('tbl_user.is_active', 2);
        return $this->db->get()->result_array();
    }

    public function riwayat(){
        $this->db->where('is_active',3);
        $this->db->where('deleted_at !=',null);
        return $this->db->get('tbl_user')->result_array();
    }

    public function add($data){
        $this->db->insert('tbl_user',$data);
        return $this->db->affected_rows() > 1 ? true : false;

    }


}
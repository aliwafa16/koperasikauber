<?php
class Kendaraan_Model extends CI_Model{
    public function getKendaraan(){
        return $this->db->get('tbl_kendaraan')->result();
    }
}
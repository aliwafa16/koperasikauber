<?php
class Kepemilikan_Model extends CI_Model
{
    public function addKepemilikan($data)
    {
        $this->db->insert('tbl_kepemilikan', $data);
        return $this->db->affected_rows() > 1 ? true : false;
    }
}

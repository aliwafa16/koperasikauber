<?php

class Auth_model extends CI_Model
{
    public function getUserByID($email)
    {
        $this->db->where('email_user', $email);
        $result = $this->db->get('tbl_user')->row_array();

        return $result;
    }
}

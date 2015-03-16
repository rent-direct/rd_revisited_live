<?php
class Registermodel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert($row)
    {
        $this->db->insert('users',$row);
        return $this->db->insert_id();
    }
}
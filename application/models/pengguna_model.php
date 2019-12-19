<?php

class Pengguna_model extends CI_Model{
    public function getAllPengguna()
    {
        return $this->db->get('data_pengguna')->result_array();
    }
}
?>
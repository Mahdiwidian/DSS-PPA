<?php

class Mahasiswa_model extends CI_Model{
    public function getAllMahasiswa()
    {
        return $this->db->get('data_mahasiswa')->result_array();
    }
}
?>
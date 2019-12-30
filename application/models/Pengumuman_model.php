<?php

class Pengumuman_model extends CI_Model{
    public function insertData($data)
    {
        $this->db->insert('data_pengumuman', $data);
    }
}

?>

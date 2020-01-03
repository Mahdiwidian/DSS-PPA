<?php

class Pengumuman_model extends CI_Model{
    public function getPengumuman() 
    {
        $this->db->get('data_pengumuman');
    }
    
    public function insertData($data)
    {
        $this->db->insert('data_pengumuman', $data);
    }

    public function updatePengumuman($nim, $data)
    {
        $this->db->where_in('nim', $nim);
        $this->db->update('data_mahasiswa', $data);
    }
}

?>

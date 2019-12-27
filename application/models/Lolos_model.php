<?php

class Lolos_model extends CI_Model{
    public function getAllLolos()
    {
        
        $this->db->select('*');
        $this->db->from('data_lolos');
        $this->db->join('data_mahasiswa', 'data_mahasiswa.nim = data_lolos.id_data_mhsw', 'left');
        $data = $this->db->get()->result_array();

        return $data;
    }
    public function deleteData($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('data_lolos');
    }
}
?>
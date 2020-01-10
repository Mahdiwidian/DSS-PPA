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

    public function updateLolosMhs()
    {
        
        $this->db->select('*');
        $this->db->from('data_lolos');
        $this->db->join('data_mahasiswa', 'data_mahasiswa.nim = data_lolos.id_data_mhsw', 'left');
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function getLolos($id)
    {
        
        $this->db->select('*');
        $this->db->from('data_lolos');
        $this->db->join('data_mahasiswa', 'data_mahasiswa.nim = data_lolos.id_data_mhsw', 'left');
        $this->db->where_in('data_lolos.id', $id);
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function deleteData($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('data_lolos');
    }
    public function deleteAllData()
    {
        $this->db->empty_table('data_lolos'); 
    }

    public function insertData($data)
    {
        $this->db->insert('data_lolos', $data);
    }

}
?>
<?php

class Mahasiswa_model extends CI_Model{
    public function getAllMahasiswa()
    {
        $this->db->where('status', 0);
        // $this->db->or_where('status', 2);
        // $this->db->or_where('status', 2);
        return $this->db->get('data_mahasiswa')->result_array();
        // return $this->db->get_where('data_mahasiswa', ['status' => 0 ])->result_array();
    }

    public function getMahasiswaById($nim)
    {
        return $this->db->get_where('data_mahasiswa', ['nim' => $nim])->row_array();
        // return $this->db->where('nim', $nim);
    }
    
    public function insertMahasiswa($data)
    {
        $this->db->insert('data_mahasiswa', $data);
    }

    public function updateMahasiswa($nim, $data)
    {
        $this->db->where_in('nim', $nim);
        $this->db->update('data_mahasiswa', $data);
    }

    public function updateAllMahasiswa($data)
    {
        $this->db->update('data_mahasiswa', $data);
    }

    public function deleteData($nim)
    {
        $this->db->where_in('nim', $nim);
        $this->db->delete('data_mahasiswa');
    }
}
?>
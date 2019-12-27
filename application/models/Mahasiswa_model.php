<?php

class Mahasiswa_model extends CI_Model{
    public function getAllMahasiswa()
    {
        return $this->db->get('data_mahasiswa')->result_array();
    }

    public function getMahasiswaById($nim)
    {
        return $this->db->get_where('data_mahasiswa', ['nim' => $nim])->row_array();
        // return $this->db->where('nim', $nim);
    }

    public function updateMahasiswa($nim, $data)
    {
        $this->db->where('nim', $nim);
        $this->db->update('data_mahasiswa', $data);
    }

    public function deleteData($nim)
    {
        $this->db->where_in('nim', $nim);
        $this->db->delete('data_mahasiswa');
    }

    public function verifData($nim)
    {
        // return $this->db->get_where('data_mahasiswa', ['nim' => $nim])->result_array();
        $this->db->where('nim', $nim);
        $mahasiswa = $this->db->get('data_mahasiswa')->row_array();
        
        // BEGIN NILAI KONVErSI

        // untuk c1
        if($mahasiswa['gaji_ortu'] >= 0 && $mahasiswa['gaji_ortu'] <= 5000000 ){
            $c1 = '1';
        }elseif($mahasiswa['gaji_ortu'] > 5000000 && $mahasiswa['gaji_ortu'] <= 10000000 ){
            $c1 = '2';
        }elseif($mahasiswa['gaji_ortu'] > 10000000 && $mahasiswa['gaji_ortu'] <= 20000000 ){
            $c1 = '3';
        }elseif($mahasiswa['gaji_ortu'] > 20000000){
            $c1 = '4';
        }

        // untuk c2
        $c2 = $mahasiswa['jumlah_saudara'];

        // untuk c3
        if($mahasiswa['ipk'] <= 2 ){
            $c3 = '1';
        }elseif($mahasiswa['ipk'] > 2 && $mahasiswa['ipk'] <= 3 ){
            $c3 = '2';
        }elseif($mahasiswa['ipk'] > 3 && $mahasiswa['ipk'] <= 3.5 ){
            $c3 = '3';
        }elseif($mahasiswa['ipk'] > 3.5 ){
            $c3 = '4';
        }

        // untuk c4
        if(strpos($mahasiswa['prodi'], "REG")){
            $c4 = '1';
        }else{
            $c5 = '2';
        }

        // END NILAI KONVERSI

        //insert ke data_lolos
        $data = [
            "id_data_mhsw" => $mahasiswa['nim'],
            "c1" => $c1,
            "c2" => $c2,
            "c3" => $c3,
            "c4" => $c4
        ];
        
        $this->db->insert('data_lolos', $data);

        return $data;
    }
}
?>
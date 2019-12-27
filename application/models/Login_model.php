<?php
class Login_model extends CI_Model{
    //cek nip dan password dosen
    function auth_admin($username,$password){
        $query=$this->db->query("SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }
 
    //cek nim dan password mahasiswa
    function auth_mahasiswa($username,$password){
        $query=$this->db->query("SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }
 
}
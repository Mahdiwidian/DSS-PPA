<?php
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }

    function index()
    {
        if (@$_SESSION['masuk'] == TRUE) {
            if ($_SESSION['akses'] == 1) {
                redirect('Kelola');
            } else {
                redirect('Mhs');
            }
        } else {
            $this->load->view('home/login');
        }
    }

    function auth()
    {

        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        // echo "<pre>";
        // echo $username."<br>";
        // echo $password."<br>";
        // echo "</pre>";
        // die();


        $cek_admin = $this->Login_model->auth_admin($username, $password);

        if ($cek_admin->num_rows() > 0) { //jika login sebagai admin
            $data = $cek_admin->row_array();
            $this->session->set_userdata('masuk', TRUE);
            if ($data['role'] == '1') { //Akses admin
                $this->session->set_userdata('akses', '1');
                $this->session->set_userdata('ses_id', $data['id']);
                $this->session->set_userdata('ses_nama', $data['username']);
                redirect('Kelola');
            } else {
                $this->session->set_userdata('akses', '2');
                $this->session->set_userdata('ses_id', $data['id']);
                $this->session->set_userdata('ses_nama', $data['username']);
                redirect('Mhs');
            }
        } else { //jika login sebagai mahasiswa
            // $cek_mahasiswa=$this->Login_model->auth_mahasiswa($username,$password);
            // if($cek_mahasiswa->num_rows() > 0){
            //         $data=$cek_mahasiswa->row_array();
            // $this->session->set_userdata('masuk',TRUE);
            //         echo "test";
            //         $this->session->set_userdata('akses','2');
            //         $this->session->set_userdata('ses_id',$data['id']);
            //         $this->session->set_userdata('ses_nama',$data['username']);
            //         redirect('Kelola');
            // }else{  // jika username dan password tidak ditemukan atau salah
            $url = base_url();
            echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
            redirect($url);
            // }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $url = base_url('');
        redirect($url);
    }
}

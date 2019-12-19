<?php
    class Kelola extends CI_Controller
    {
        public function __construct(Type $var = null)
        {
            parent::__construct();
            $this->load->model('Mahasiswa_model');
        }
        
        public function index()
        {
            $data['mahasiswa'] =  $this->Mahasiswa_model->getAllMahasiswa();
            $data['page_title'] = 'Kelola Data Mahasiswa';
            $this->load->view('Layout/header', $data);
            $this->load->view('Kelola/index');
            $this->load->view('Layout/footer');
        }

        public function edit()
        {
            $data['page_title'] = 'Edit Data';
            $this->load->view('Layout/header', $data);
            $this->load->view('Kelola/edit');
            $this->load->view('Layout/footer');
        }
        public function verifikasi()
        {
            
        }
    }
?>
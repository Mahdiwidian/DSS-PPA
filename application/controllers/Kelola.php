<?php
    class Kelola extends CI_Controller
    {
        public function index()
        {
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
    }
?>
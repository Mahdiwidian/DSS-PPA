<?php
    class Lolos extends CI_Controller
    {
        public function index()
        {
            $data['page_title'] = 'Data Terverifikasi';
            $this->load->view('Layout/header', $data);
            $this->load->view('Lolos/index');
            $this->load->view('Layout/footer');
        }
    }
?>
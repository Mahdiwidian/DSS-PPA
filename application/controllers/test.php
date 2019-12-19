<?php
    class test extends CI_Controller
    {
        public function index()
        {
            $this->load->view('Layout/header');
            $this->load->view('test');
            $this->load->view('Layout/footer');
        }
    }
?>
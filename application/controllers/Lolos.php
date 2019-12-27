<?php
    class Lolos extends CI_Controller
    {
        public function __construct(Type $var = null)
        {
            parent::__construct();
            $this->load->model('Lolos_model');
        }

        public function index()
        {
            $data['lolos'] =  $this->Lolos_model->getAllLolos();
            $data['page_title'] = 'Data Terverifikasi';
            $this->load->view('Layout/header', $data);
            $this->load->view('Lolos/index');
            $this->load->view('Layout/footer');
        }

        public function delete()
        {
            $id = $_POST['id'];            
            $this->Lolos_model->deleteData($id);
            redirect('lolos');
        }
    }
?>
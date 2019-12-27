<?php
    class test extends CI_Controller
    {
        public function __construct(Type $var = null)
        {
            parent::__construct();
            $this->load->model('Mahasiswa_model');
        }

        public function index()
        {
            $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
            // $data['mahasiswa'] =  $this->generateData($mahasiswa);
            $data['page_title'] = 'Test Data Mahasiswa';
            $this->load->view('Layout/header', $data);
            $this->load->view('test');
            $this->load->view('Layout/footer');
        }

        public function delete()
        {
            $nim = $_POST['nim'];
            // echo '<pre>';
            // var_dump($nim);
            // echo '</pre>';
            
            $this->Mahasiswa_model->deleteData($nim);
            redirect('kelola');
        }

        // public function generateData($data)
        // {
        //     $retr = array();
        //     foreach($data as $value){
        //         $value['checkbox'] = "<input type='checkbox' value='1' id='checkbox-".$value['nim']."' />";
        //         $retr[] = $value;
        //     }

        //     return $retr;
        // }
    }
?>
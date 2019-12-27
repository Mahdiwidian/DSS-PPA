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

        public function edit($nim)
        {
            
            $data['mahasiswa'] =  $this->Mahasiswa_model->getMahasiswaById($nim);
            $data['page_title'] = 'Edit Data';
            $this->load->view('Layout/header', $data);
            $this->load->view('Kelola/edit');
            $this->load->view('Layout/footer');
        }

        public function storeEdit($nim)
        {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            // die();

            $data = [
                "nama" => $_POST['nama'], 
                "prodi" => $_POST['prodi'], 
                "gaji_ortu" => $_POST['gaji'], 
                "jumlah_saudara" => $_POST['tanggungan'], 
                "telp" => $_POST['telp'], 
                "ipk" => $_POST['ipk'], 
                "angkatan" => $_POST['angkatan'], 
                "rekening" => $_POST['rekening'], 
                "semester" => $_POST['semester'] 
            ];
    
            $this->Mahasiswa_model->updateMahasiswa($nim, $data);
            redirect('kelola');
        }

        public function delete()
        {
            $nim = $_POST['nim'];            
            $this->Mahasiswa_model->deleteData($nim);
            redirect('kelola');
        }

        
        public function verifikasi($nim)
        {
            $data['mahasiswa'] = $this->Mahasiswa_model->verifData($nim);
            redirect('kelola');
            // echo "<pre>";
            //     var_dump($data['mahasiswa']);
            // echo "</pre>";
        
        }
    }
?>
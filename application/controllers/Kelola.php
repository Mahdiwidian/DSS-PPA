<?php
    class Kelola extends CI_Controller
    {
        public function __construct(Type $var = null)
        {
            parent::__construct();
            $this->load->model('Mahasiswa_model');
            $this->load->model('Lolos_model');
        }
        
        public function index()
        {
            if($_SESSION['masuk'] == TRUE){
                if ($_SESSION['akses'] == 1) {
                    $data['mahasiswa'] =  $this->Mahasiswa_model->getAllMahasiswa();
                    $data['page_title'] = 'Kelola Data Mahasiswa';
                    $this->load->view('Layout/header', $data);
                    $this->load->view('Kelola/index');
                    $this->load->view('Layout/footer');
                }else {
                    redirect(base_url()); 
                }
            }else{
                $url=base_url();
                echo $this->session->set_flashdata('msg','Login Terlebih Dahulu');
                redirect($url);
            }
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
            $mahasiswa = $this->Mahasiswa_model->getMahasiswaById($nim);

            // update status
            $status = ["status" => 1];
            $this->Mahasiswa_model->updateMahasiswa($nim, $status);
            // $data['mahasiswa'] = $this->Mahasiswa_model->verifData($nim);
    
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
                $c4 = '2';
            }else{
                $c4 = '1';
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

            $this->Lolos_model->insertData($data);
            redirect('kelola');
            // echo "<pre>";
            //     var_dump($data['mahasiswa']);
            // echo "</pre>";
        
        }
    }
?>
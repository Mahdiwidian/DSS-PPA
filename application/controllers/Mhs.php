<?php
class Mhs extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Pengumuman_model');
    }

    public function index()
    {
        if ($_SESSION['masuk'] == TRUE) {
            if ($_SESSION['akses'] == 2) {
                // $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($_SESSION['ses_nama']);
                $data['page_title'] = 'Daftar Beasisiswa PPA';
                $this->load->view('Layout/header', $data);
                $this->load->view('Mhs/index');
                $this->load->view('Layout/footer');
            } else {
                redirect(base_url());
            }
        } else {
            $url = base_url();
            echo $this->session->set_flashdata('msg', 'Login Terlebih Dahulu');
            redirect($url);
        }
    }

    public function storeData()
    {
        $data = [
            "nim" => $_POST['nim'],
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

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // die();

        $this->Mahasiswa_model->insertMahasiswa($data);
        redirect('Pengumuman');
    }
}

<?php
class Pengumuman extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Pengumuman_model');
    }

    public function index()
    {
        if($_SESSION['masuk'] == TRUE){
            if ($_SESSION['akses'] == 2) {
                $data['page_title'] = 'Pengumuman Beasisiswa PPA';
                $this->load->view('Layout/header', $data);
                $this->load->view('Pengumuman/index_mhs');
                $this->load->view('Layout/footer');
            } else {
                $data['pengumuman'] = $this->Pengumuman_model->getPengumuman();
                $data['page_title'] = 'Pengumuman Beasisiswa PPA';
                $this->load->view('Layout/header', $data);
                $this->load->view('Pengumuman/index_adm');
                $this->load->view('Layout/footer');
            }
        }else{
            $url=base_url();
            echo $this->session->set_flashdata('msg','Login Terlebih Dahulu');
            redirect($url);
        }
    }

}

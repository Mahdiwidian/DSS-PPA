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
            $lolos = $this->Lolos_model->getAllLolos();
            $data['lolos'] =  $lolos;
            // mengurutkan array max dan min
            foreach ($lolos as $key => $krit) {
                $c1[$key] = $krit['c1'];
                $c2[$key] = $krit['c2'];
                $c3[$key] = $krit['c3'];
                $c4[$key] = $krit['c4'];
            }
            
            // mencari max dan min
            $C1min = MIN($c1);
            $C2max = MAX($c2);
            $C3max = MAX($c3);
            $C4max = MAX($c4);

            // normalisasi kategori

            foreach ($lolos as $key => $d_lolos) {
                $data_normal[$key] = [
                    $c1 = ($d_lolos['c1']/$C1min),
                    $c2 = ($d_lolos['c2']/$C2max),
                    $c3 = ($d_lolos['c3']/$C3max),
                    $c4 = ($d_lolos['c4']/$C4max)
                ];
            }
            
            foreach ($lolos as $key => $d_lolos) {
                $data_normal[$key] = [
                    "c1" => ($d_lolos['c1']/$C1min),
                    "c2" => ($d_lolos['c2']/$C2max),
                    "c3" => ($d_lolos['c3']/$C3max),
                    "c4" => ($d_lolos['c4']/$C4max)
                ];
            }
            
            //c * bobot            
            foreach ($lolos as $key => $d_lolos) {
                $data_lolos[$key] = [
                    "nim" => $d_lolos['id_data_mhsw'],
                    "nama" => $d_lolos['nama'],
                    "v" => ($data_normal[$key]['c1']*0.3)+($data_normal[$key]['c2']*0.27)+($data_normal[$key]['c3']*0.23)+($data_normal[$key]['c4']*0.2)
                ];
            }
            
            $data['alternatif'] = $data_lolos;

            // echo '<pre>';
            // var_dump($data['alternatif']);
            // echo '<pre>';

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
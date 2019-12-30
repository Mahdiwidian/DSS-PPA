<?php
class Lolos extends CI_Controller
{
    public function __construct(Type $var = null)
    {
        parent::__construct();
        $this->load->model('Lolos_model');
        $this->load->model('Mahasiswa_model');
        $this->load->model('Pengumuman_model');
    }

    public function index()
    {
        $lolos = $this->Lolos_model->getAllLolos();
        $data['lolos'] =  $lolos;

        if ($lolos != null) {
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
                    "c1" => ($C1min/$d_lolos['c1']),
                    "c2" => ($d_lolos['c2']/$C2max),
                    "c3" => ($d_lolos['c3']/$C3max),
                    "c4" => ($d_lolos['c4']/$C4max)
                ];
            }

            
            //c * bobot            
            foreach ($lolos as $key => $d_lolos) {
                $data_lolos[] = [
                    "nim" => $d_lolos['id_data_mhsw'],
                    "nama" => $d_lolos['nama'],
                    "v" => ($data_normal[$key]['c1']*0.3)+($data_normal[$key]['c2']*0.27)+($data_normal[$key]['c3']*0.23)+($data_normal[$key]['c4']*0.2),
                    "c1" => ($data_normal[$key]['c1']),
                    "c2" => ($data_normal[$key]['c2']),
                    "c3" => ($data_normal[$key]['c3']),
                    "c4" => ($data_normal[$key]['c4']),
                    "C1min" => $C1min,
                    "C2max" => $C2max,
                    "C3max" => $C3max,
                    "C4max" => $C4max
                ];
            }

            // echo '<pre>';
            // var_dump($data_lolos);
            // echo '<pre>';
            // die();

            function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
                $sort_col = array();
                foreach ($arr as $key=> $row) {
                    $sort_col[$key] = $row[$col];
                }

                array_multisort($sort_col, $dir, $arr);
            }


            array_sort_by_column($data_lolos, 'v');
            // array_multisort($v, SORT_ASC);


            $data['alternatif'] = $data_lolos;

            if(@$_POST['submit'] == "Terima"){
                $this->accept($data['alternatif']);
            }


            
        }else{
            $data['alternatif'] = $lolos;
        }

        $data['page_title'] = 'Data Terverifikasi';
        $this->load->view('Layout/header', $data);
        $this->load->view('Lolos/index');
        $this->load->view('Layout/footer');
    }

    public function accept($data)
    {
        $id = $_POST['id'];
        echo "<pre>";
        print_r($id);
        // print_r ($data);
        echo "</pre>";

        for ($j = 0; $j < count($data); $j++) {
            for ($i = 0; $i < count($data); $i++) {
                if (@$id[$j] == $data[$i]['nim']) {
                    $data_alt[$j] = [
                        "id_data_mhsw" => $data[$i]['nim'],
                        "f_c1" => $data[$i]['c1'],
                        "f_c2" => $data[$i]['c2'],
                        "f_c3" => $data[$i]['c3'],
                        "f_c4" => $data[$i]['c4'],
                        "score" => $data[$i]['v']
                    ];
                }
            }
            $this->Pengumuman_model->insertData($data_alt[$j]);
        }

        echo "<pre>";
        print_r($data_alt);
        echo "</pre>";

        $status = ["status" => 0];
        $this->Mahasiswa_model->updateAllMahasiswa($status);
        $this->Lolos_model->deleteAllData();
        redirect('kelola');
    }
    public function delete()
    {
        $id = $_POST['id'];
        $this->Lolos_model->deleteData($id);
        redirect('lolos');
    }
}
?>
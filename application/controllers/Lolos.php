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
        if ($_SESSION['masuk'] == TRUE) {
            if ($_SESSION['akses'] == 1) {
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
                            "c1" => ($C1min / $d_lolos['c1']),
                            "c2" => ($d_lolos['c2'] / $C2max),
                            "c3" => ($d_lolos['c3'] / $C3max),
                            "c4" => ($d_lolos['c4'] / $C4max)
                        ];
                    }


                    //c * bobot            
                    foreach ($lolos as $key => $d_lolos) {
                        $data_lolos[] = [
                            "lolos" => $data['lolos'][$key],
                            "alternatif" => [
                                "c1" => ($data_normal[$key]['c1']),
                                "c2" => ($data_normal[$key]['c2']),
                                "c3" => ($data_normal[$key]['c3']),
                                "c4" => ($data_normal[$key]['c4']),
                                "C1min" => $C1min,
                                "C2max" => $C2max,
                                "C3max" => $C3max,
                                "C4max" => $C4max,
                                // "v" => ($data_normal[$key]['c1'] * 0.3) + ($data_normal[$key]['c2'] * 0.27) + ($data_normal[$key]['c3'] * 0.23) + ($data_normal[$key]['c4'] * 0.2),
                            ],
                            "score" => ($data_normal[$key]['c1'] * 0.3) + ($data_normal[$key]['c2'] * 0.27) + ($data_normal[$key]['c3'] * 0.23) + ($data_normal[$key]['c4'] * 0.2),
                        ];
                    }


                    function array_sort_by_column(&$arr, $col, $dir = SORT_DESC)
                    {
                        $sort_col = array();
                        foreach ($arr as $key => $row) {
                            $sort_col[$key] = $row[$col];
                        }

                        array_multisort($sort_col, $dir, $arr);
                    }


                    array_sort_by_column($data_lolos, 'score');
                    // array_multisort($v, SORT_ASC);


                    $data_mhs['mahasiswa'] = $data_lolos;

                    // echo '<pre>';
                    // var_dump($data_mhs);
                    // echo '<pre>';
                    // die();

                    if (@$_POST['submit'] == "Terima") {
                        $this->accept($data_lolos);
                    }
                } else {
                    $data_mhs['mahasiswa'] = $lolos;
                }

                $data_mhs['page_title'] = 'Data Terverifikasi';
                $this->load->view('Layout/header', $data_mhs);
                $this->load->view('Lolos/index');
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

    public function accept($data)
    {
        $id = $_POST['id'];
        // echo "<pre>";
        // // print_r($id);
        // print_r ($data);
        // echo "</pre>";
        // die();
        

        for ($j = 0; $j < count($data); $j++) {
            for ($i = 0; $i < count($data); $i++) {
                if (@$id[$j] == $data[$i]['lolos']['id']) {
                    $data_alt[$j] = [
                        "id_data_mhsw" => $data[$i]['lolos']['nim'],
                        "f_c1" => $data[$i]['alternatif']['c1'],
                        "f_c2" => $data[$i]['alternatif']['c2'],
                        "f_c3" => $data[$i]['alternatif']['c3'],
                        "f_c4" => $data[$i]['alternatif']['c4'],
                        "score" => $data[$i]['score']
                    ];
                }
            }
            $this->Pengumuman_model->insertData($data_alt[$j]);
        }

        // echo "<pre>";
        // print_r($data_alt);
        // echo "</pre>";

        $status = ["status" => 0];
        $this->Mahasiswa_model->updateAllMahasiswa($status);
        $this->Lolos_model->deleteAllData();
        redirect('kelola');
    }
    public function delete()
    {
        $id = $_POST['id'];
        $data = $this->Lolos_model->getLolos($id);
        $nim = $data['nim'];

        // echo "<pre>";
        // print_r($nim);
        // echo "</pre>";
        // die();

        $status = ["status" => 0];
        $this->Mahasiswa_model->updateMahasiswa($nim, $status);
        $this->Lolos_model->deleteData($id);
        redirect('lolos');
    }
}

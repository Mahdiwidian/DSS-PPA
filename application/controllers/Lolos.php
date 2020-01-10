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

                    //mengurutkan data sesuai demgan score
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
                    // print_r($_POST);
                    // echo '<pre>';
                    // die();

                    if (@$_POST['terima'] == "Terima") {
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


        foreach ($data as $key => $row_data) {
            $data_alt[] = [
                "nim" => $row_data['lolos']['nim'],
                "nama" => $row_data['lolos']['nama'],
                "prodi" => $row_data['lolos']['prodi'],
                "gaji_ortu" => $row_data['lolos']['gaji_ortu'],
                "jumlah_saudara" => $row_data['lolos']['jumlah_saudara'],
                "telp" => $row_data['lolos']['telp'],
                "ip1" => $row_data['lolos']['ip1'],
                "ip2" => $row_data['lolos']['ip2'],
                "ip3" => $row_data['lolos']['ip3'],
                "ip4" => $row_data['lolos']['ip4'],
                "ip5" => $row_data['lolos']['ip5'],
                "ip6" => $row_data['lolos']['ip6'],
                "ipk" => $row_data['lolos']['ipk'],
                "angkatan" => $row_data['lolos']['angkatan'],
                "rekening" => $row_data['lolos']['rekening'],
                "semester" => $row_data['lolos']['semester'],
                "created_at" => $row_data['lolos']['created_at'],
                "f_c1" => $row_data['alternatif']['c1'],
                "f_c2" => $row_data['alternatif']['c2'],
                "f_c3" => $row_data['alternatif']['c3'],
                "f_c4" => $row_data['alternatif']['c4'],
                "score" => $row_data['score'],
                "status" => "2"
            ];
            $this->Pengumuman_model->insertData($data_alt[$key]);
        }

        // ngulang jumlah id
        foreach ($id as $i => $row_id) {
            // ngulang semua data lolos
            foreach ($data as $j => $row_data) {               
                if ($row_id == $row_data['lolos']['id']) {
                    $data_nim_lolos[] = [
                        "nim" => $row_data['lolos']['nim'],                      
                    ];
                } else {                    
                    $mhs_nim_gagal[] = $row_data['lolos']['nim'];
                }
            }
            // $status = ["status" => 2];
            // $this->Mahasiswa_model->updatePengumuman($data_alt[$i], $status);
            // $this->Pengumuman_model->insertData($data_alt[$i]);
        }

        // ngambil data nimnya
        foreach($data_nim_lolos as $value){
            $data_nim[] = $value['nim'];
        }
        
        // update status mahasiswa yang ga keterima
        $status = ["status" => 2];
        $this->Mahasiswa_model->updateMahasiswa(array_unique($mhs_nim_gagal), $status);
        
        // update status mahasiswa yg lolos
        $status = ["status" => 3];
        $this->Pengumuman_model->updatePengumuman($data_nim, $status);
        $this->Mahasiswa_model->updateMahasiswa($data_nim, $status);

        // echo "<pre>";
        // print_r($data_nim);
        // echo "</pre>";
        // die();       

        echo $this->session->set_flashdata('msg', 'Data Yang Diseleksi Berhasil Diterima dan Disimpan');

        $this->Lolos_model->deleteAllData();
        redirect('kelola');
    }

    public function getNim($mahasiswa)
    {
        $retr = array();
        foreach($mahasiswa as $value){
            $retr[] = $value['nim'];
        }
        return $retr;
    }
    public function delete()
    {
        $id = $_POST['id'];
        $datas = $this->Lolos_model->getLolos($id);
        foreach ($datas as $key => $data) {
            $nim[] = $data['id_data_mhsw'];
        }

        // echo "<pre>";
        // print_r($nim);
        // echo "</pre>";
        // die();


        $status = ["status" => 0];
        $this->Mahasiswa_model->updateMahasiswa($nim, $status);
        $this->Lolos_model->deleteData($id);
        echo $this->session->set_flashdata('msg', 'Data Berhasil Dihapus');
        redirect('lolos');
    }
}

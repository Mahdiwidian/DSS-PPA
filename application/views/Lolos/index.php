<div class="container" style="padding:0">
        <div class="row mt-5">
            <div class="d-inline col-lg-12">
                <h2 class="mt-5">Pemilihan Calon Penerima Beasiswa PPA</h2>
                <span>Halaman kelola Data Inovasi</span>
            </div>
            
            <div class="col-lg-2 ">
                <!-- <a href="/students/add" class=" btn btn-primary my-3 "> Tambah Data</a> -->
            </div>
            <div class="col-lg-12 mt-4">
                <div class="card shadow-sm">
                    <div class="card-body" style="padding:0">
                        <table class="table text-center table-responsive">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="align-middle">No</th>
                                    <th class="align-middle" >Nim</th>
                                    <th class="align-middle" >Nama</th>
                                    <th class="align-middle" >SMT</th>
                                    <th class="align-middle" >Angkatan</th>
                                    <th class="align-middle" >Kelas</th>
                                    <th class="align-middle" >No Rekening</th>
                                    <th class="align-middle" >Nama Dalam Rekening</th>
                                    <th class="align-middle" >IPK</th>
                                    <th class="align-middle" >Penghasilan Orang Tua</th>
                                    <th class="align-middle" >Jumlah Tanggungan</th>
                                    <th colspan="2" class="sorting_asc_disabled sorting_desc_disabled align-middle">Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tr>
                                <td scope="row">1</td>
                                <td>4616010022</td>
                                <td>TEST NAMA ORANG</td>
                                <td>6</td>
                                <td>2016</td>
                                <td>TI REG</td>
                                <td>157-00-0601728-0</td>
                                <td>TEST NAMA ORANG</td>
                                <td><a href="#" class="myModal" data-toggle="modal" data-target="#myModal-Ip"> 3.08</a></td>
                                <td>5.000.000</td>
                                <td>4</td>
                                <td>
                                    <a href="#" class="btn badge-success" >Verifikasi</a>
                                </td>
                                <td>
                                    <a href="kelola/edit/" class="btn badge-warning" >Kelola</a>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- BEGIN modal IP -->
    <div class="modal fade" id="myModal-Ip">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Daftar IP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <table class="table text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th colspan="8  ">SEMSETER</th>
                                    <th rowspan="2" class="align-middle">IPK</th>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4.0</td>
                                    <td>4.0</td>
                                    <td>4.0</td>
                                    <td>4.0</td>
                                    <td>3.0</td>
                                    <td>3.4</td>
                                    <td></td>
                                    <td></td>
                                    <td>3.08</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                </div>

            </div>
        </div>
    </div>
    <!-- END Modal IP -->

    <!-- BEGIN modal Kelola -->
    <div class="modal fade" id="myModal-Ip">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Daftar IP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <table class="table text-center">
                            <thead class="thead-light">
                                <tr>
                                    <th colspan="8  ">SEMSETER</th>
                                    <th rowspan="2" class="align-middle">IPK</th>
                                </tr>
                                <tr>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                    <th>6</th>
                                    <th>7</th>
                                    <th>8</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4.0</td>
                                    <td>4.0</td>
                                    <td>4.0</td>
                                    <td>4.0</td>
                                    <td>3.0</td>
                                    <td>3.4</td>
                                    <td></td>
                                    <td></td>
                                    <td>3.08</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
                </div>

            </div>
        </div>
    </div>
    <!-- END Modal IP -->

    <script>
        var nav = document.getElementsByClassName("nav-item");
        // alert(nav[0].getAttribute('class'));
        nav[0].setAttribute("Class", "nav-item")
        nav[1].setAttribute("Class", "nav-item active") 
    </script>
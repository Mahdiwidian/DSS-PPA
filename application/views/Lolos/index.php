    <!-- <?php var_dump($lolos); ?> -->
    <div class="container" style="padding:0">
        <div class="row mt-5">
            <div class="d-inline col-lg-12">
                <h2 class="mt-5">Pemilihan Calon Penerima Beasiswa PPA</h2>
                <span>Data Terverifikasi</span>
            </div>
            <div class="col-lg-3 mb-3 ">
                <button id="del" class="btn btn-danger mt-3">Delete Selected</button>
            </div>
            <!-- Default unchecked -->
            <div class="col-lg-12">
                <form id="myform" method="post" action="<?= base_url('/lolos/delete/') ?>">
                    <table id="mytable" class="table table-responsive table-hover" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th class="align-middle" ><span>All</span><input type="checkbox" id="checkall"></th>
                                <th scope="col" class="align-middle">No</th>
                                <th class="align-middle">Nim</th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">SMT</th>
                                <th class="align-middle">Angkatan</th>
                                <th class="align-middle">Kelas</th>
                                <th class="align-middle">No Rekening</th>
                                <th class="align-middle">Nama Dalam Rekening</th>
                                <th class="align-middle">IPK</th>
                                <th class="align-middle">Penghasilan Orang Tua</th>
                                <th class="align-middle">Jumlah Tanggungan</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($lolos as $mhs_lolos) : ?>
                                <tr>
                                    <td class="align-middle"><input type="checkbox" class="checkitem" name="id[]" value="<?= $mhs_lolos['id'] ?>"></td>
                                    <td scope="row"><?= $i ?></td>
                                    <td><?= $mhs_lolos['nim'] ?></td>
                                    <td><?= $mhs_lolos['nama'] ?></td>
                                    <td><?= $mhs_lolos['semester'] ?></td>
                                    <td><?= $mhs_lolos['angkatan'] ?></td>
                                    <td><?= $mhs_lolos['prodi'] ?></td>
                                    <td><?= $mhs_lolos['rekening'] ?></td>
                                    <td>Nama Rekening</td>
                                    <td><a href="#" class="myModal" data-toggle="modal" data-target="#myModal-Ip-<?= $i ?>"><?= $mhs_lolos['ipk'] ?></a></td>
                                    <td><?= $mhs_lolos['gaji_ortu'] ?></td>
                                    <td><?= $mhs_lolos['jumlah_saudara'] ?></td>
                                    <td>                                        
                                        <a href="#" class="btn badge-success col-lg-12 mt-2 myModal" data-toggle="modal" data-target="#myModal-kv-<?= $i ?>">Lihat Konversi</a>
                                        <a href="<?= base_url('/kelola/edit/') . $mhs_lolos['nim'] ?>" class="btn badge-warning col-lg-12 mt-2 ">Edit</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot class="thead-dark">
                            <tr>
                                <th class="text-center"></th>
                                <th scope="col" class="align-middle">No</th>
                                <th class="align-middle">Nim</th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">SMT</th>
                                <th class="align-middle">Angkatan</th>
                                <th class="align-middle">Kelas</th>
                                <th class="align-middle">No Rekening</th>
                                <th class="align-middle">Nama Dalam Rekening</th>
                                <th class="align-middle">IPK</th>
                                <th class="align-middle">Penghasilan Orang Tua</th>
                                <th class="align-middle">Jumlah Tanggungan</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>

    </div>

    <?php $i = 1; ?>
    <?php foreach ($lolos as $mhs_lolos) : ?>
    <!-- BEGIN modal IP -->
    <!-- <div class="modal fade" id="myModal-Ip-<?= $i ?>">
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
    </div> -->
    <!-- END Modal IP -->
    
    <!-- BEGIN modal konversi -->
    <div class="modal fade" id="myModal-kv-<?= $i ?>">
        <div class="modal-dialog modal-lg">
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
                            <thead class="thead-light align-middle">
                                <tr>
                                    <th>nim</th>
                                    <th>nama</th>
                                    <th>Gaji Orang Tua</th>
                                    <th>Jumlah Tanggungan</th>
                                    <th>IPK</th>
                                    <th>Prodi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $mhs_lolos['nim'] ?></td>
                                    <td><?= $mhs_lolos['nama'] ?></td>
                                    <td><?= $mhs_lolos['c1'] ?></td>
                                    <td><?= $mhs_lolos['c2'] ?></td>
                                    <td><?= $mhs_lolos['c3'] ?></td>
                                    <td><?= $mhs_lolos['c4'] ?></td>
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
    <!-- END Modal konversi -->
    <?php $i++  ?>
    <?php endforeach; ?>


    <script>
        var nav = document.getElementsByClassName("nav-item");
        // alert(nav[0].getAttribute('class'));
        nav[0].setAttribute("Class", "nav-item")
        nav[1].setAttribute("Class", "nav-item active")
    </script>
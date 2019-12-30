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
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <table id="mytable" class="table table-sm table-responsive table-hover" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th class="align-middle"><span>All</span><input type="checkbox" id="checkall"></th>
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
                                        <a href="#" class="btn badge-info col-lg-12 mt-2 myModal" data-toggle="modal" data-target="#myModal-kv-<?= $i ?>">Lihat Konversi</a>
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
            <div class="col-lg-12">
                <form action="<?= base_url('/lolos/index') ?>" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2> Data Alternatif</h2>
                        </div>
                        <?php
                        if (@$alternatif != null) { ?>
                            <ul class="list-group list-group-flush">
                                <?php
                                    foreach ($alternatif as $key => $alt) {
                                        echo "<li class='list-group-item'>";
                                        echo "<h6>" . $alt['nim'] . "</h6>";
                                        echo $alt['nama'] . "</br>";
                                        echo $alt['v'];
                                        ?>
                                    <div class="btn-group-toggle float-right" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <input type="checkbox" name="id[]" value="<?= $alt['nim'] ?>"> Checked
                                        </label>
                                    </div>
                                    <div class="btn-group-toggle mr-3 float-right">
                                        <a href="#" class="btn btn-info col-lg-12 myModal" data-toggle="modal" data-target="#myModal-sc-<?= $key ?>">Detail</a>
                                    </div>
                                <?php
                                        // echo "<input class='float-right align-center' type='checkbox' name=" . $alt['nim'] . ">";
                                        echo "</li>";
                                    }
                                    ?>
                            </ul>
                    </div>
                    <input type="submit" class="btn btn-success mt-4" name="submit" value="Terima">
                <?php
                } else {
                    echo "<span class='col-lg-12 offset-lg-5'>No data available in table</span>";
                }
                ?>
                <br><br>

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

    <!-- BEGIN modal normalisasi -->
    <?php foreach ($alternatif as $key => $alt) : ?>
        <div class="modal fade" id="myModal-sc-<?= $key ?>">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Nilai Score Perhitungan</h5>
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
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $alt['nim'] ?></td>
                                        <td><?= $alt['nama'] ?></td>
                                        <td><?= $alt['c1'] ?>*0.3</td>
                                        <td><?= $alt['c2'] ?>*0.27</td>
                                        <td><?= $alt['c3'] ?>*0.23</td>
                                        <td><?= $alt['c4'] ?>*0.2</td>
                                        <td class="align-middle" rowspan="2"><?= $alt['v'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Max/Min</td>
                                        <td>(min)<br><?= $alt['C1min'] ?></td>
                                        <td>(max)<br><?= $alt['C2max'] ?></td>
                                        <td>(max)<br><?= $alt['C3max'] ?></td>
                                        <td>(max)<br><?= $alt['C4max'] ?></td>
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
    <?php endforeach; ?>
    <!-- END Modal normalisasi -->


    <script>
        var nav = document.getElementsByClassName("nav-item");
        // alert(nav[0].getAttribute('class'));
        nav[0].setAttribute("Class", "nav-item")
        nav[1].setAttribute("Class", "nav-item active")
    </script>
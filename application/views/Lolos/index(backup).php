    <div class="container" style="padding:0">
        <div class="row mt-5">
            <div class="d-inline col-lg-12">
                <h2 class="mt-5">Pemilihan Calon Penerima Beasiswa PPA</h2>
                <span>Data Terverifikasi</span>
            </div>
            <div class="col-lg-3 mb-3 ">
                <button id="del" class="btn btn-danger mt-3" disabled>Delete Selected</button>
            </div>
            <!-- Default unchecked -->
            <div class="col-lg-12">
                <form id="myform" method="post" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <table id="mytable" class="table table-sm table-responsive table-hover" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th class="align-middle"><span>All</span><input type="checkbox" id="checkall"></th>
                                <th scope="col" class="align-middle">No</th>
                                <th class="align-middle">Nim</th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">SMT</th>
                                <th class="align-middle">Kelas</th>
                                <th class="align-middle">Nama Dalam Rekening</th>
                                <th class="align-middle">IPK</th>
                                <th class="align-middle">Penghasilan Orang Tua</th>
                                <th class="align-middle">Jumlah Tanggungan</th>
                                <th class="align-middle">Score</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $mhs_lolos) : ?>
                                <tr>
                                    <td class="align-middle">
                                        <input type="checkbox" class="checkitem" name="id[]" value="<?= $mhs_lolos['lolos']['id'] ?>">
                                        <!-- <div class="btn-group-toggle float-right" data-toggle="buttons">
                                        <label class="btn btn-secondary" id="check">
                                            <input type="checkbox" class="checkitem" name="id[]" value="<?= $mhs_lolos['lolos']['id'] ?>">&nbsp
                                        </label>
                                        </div>  -->
                                    </td>
                                    <td scope="row"><?= $i ?></td>
                                    <td><?= $mhs_lolos['lolos']['nim'] ?></td>
                                    <td><?= $mhs_lolos['lolos']['nama'] ?></td>
                                    <td><?= $mhs_lolos['lolos']['semester'] ?></td>
                                    <td><?= $mhs_lolos['lolos']['prodi'] ?></td>
                                    <td>Nama Rekening</td>
                                    <td><a href="#" class="myModal" data-toggle="modal" data-target="#myModal-Ip-<?= $i ?>"><?= $mhs_lolos['lolos']['ipk'] ?></a></td>
                                    <td>Rp <?= number_format($mhs_lolos['lolos']['gaji_ortu'] ,0,',','.'); ?> </td>
                                    <td><?= $mhs_lolos['lolos']['jumlah_saudara'] ?></td>
                                    <td><?= $mhs_lolos['score'] ?></td>
                                    <td>
                                        <a href="#" class="btn badge-info col-lg-12 mt-2 myModal" data-toggle="modal" data-target="#myModal-kv-<?= $i ?>">Detail</a>
                                        <!-- <a href="<?= base_url('/kelola/edit/') . $mhs_lolos['lolos']['nim'] ?>" class="btn badge-warning col-lg-12 mt-2 ">Edit</a> -->
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
                                <th class="align-middle">Kelas</th>
                                <th class="align-middle">Nama Dalam Rekening</th>
                                <th class="align-middle">IPK</th>
                                <th class="align-middle">Penghasilan Orang Tua</th>
                                <th class="align-middle">Jumlah Tanggungan</th>
                                <th class="align-middle">Score</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <input id="terima" type="submit" class="btn btn-success mt-4 col-lg-12" name="submit" value="Terima">
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
                        if (@$mahasiswa != null) { ?>
                            <ul class="list-group list-group-flush">
                                <?php
                                    foreach ($mahasiswa as $key => $alt) {
                                        echo "<li class='list-group-item'>";
                                        echo "<h6>" . $alt['lolos']['nim'] . "</h6>";
                                        echo $alt['lolos']['nama'] . "</br>";
                                        echo $alt['score'];
                                        ?>
                                    <!-- <div class="btn-group-toggle float-right" data-toggle="buttons">
                                        <label class="btn btn-secondary active">
                                            <input type="checkbox" name="id[]" value="<?= $alt['lolos']['nim'] ?>"> Checked
                                        </label>
                                    </div> -->
                                    <div class="btn-group-toggle mr-3 float-right">
                                        <a href="#" class="btn btn-info col-lg-12 myModal" data-toggle="modal" data-target="#myModal-sc-<?= $key ?>">Detail</a>
                                    </div>
                                <?php
                                        // echo "<input class='float-right align-center' type='checkbox' name=" . $alt['alternatif']['nim'] . ">";
                                        echo "</li>";
                                    }
                                    ?>
                            </ul>
                    </div>
                    <!-- <input type="submit" class="btn btn-success mt-4" name="submit" value="Terima"> -->
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

    <!-- <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $mhs_lolos) : ?> -->
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
                        <h5 class="modal-title">Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan="5">(<?= $mhs_lolos['lolos']['nim'] ?>) <?= $mhs_lolos['lolos']['nama'] ?></th>
                                    </tr>
                                    <tr class="thead-light text-center">                                        
                                        <th class="align-middle">Keterangan</th>
                                        <th>Gaji Orang Tua <br> C1</th>
                                        <th>Jumlah Tanggungan <br> C2</th>
                                        <th>IPK <br> C3</th>
                                        <th>Prodi <br> C4</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>Data Konversi</td>
                                        <td><?= $mhs_lolos['lolos']['c1'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['c2'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['c3'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['c4'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Data Konversi Normalisasi</td>
                                        <td><?= $mhs_lolos['alternatif']['c1'] ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c2'] ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c3'] ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c4'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kriteria x Bobot</td>
                                        <td><?= $mhs_lolos['alternatif']['c1']*0.3 ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c2']*0.27 ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c3']*0.23 ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c4']*0.2 ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Bobot</b> </td>
                                        <td>0.3</td>
                                        <td>0.27</td>
                                        <td>0.23</td>
                                        <td>0.2</td>
                                    </tr>
                                    <tr>
                                        <td><b> Max/Min</b> </td>
                                        <td>(min)<br><?= $mhs_lolos['alternatif']['C1min'] ?></td>
                                        <td>(max)<br><?= $mhs_lolos['alternatif']['C2max'] ?></td>
                                        <td>(max)<br><?= $mhs_lolos['alternatif']['C3max'] ?></td>
                                        <td>(max)<br><?= $mhs_lolos['alternatif']['C4max'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Score</b></td>
                                        <td colspan="4"><?= $mhs_lolos['score'] ?></td>
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
    <?php foreach ($mahasiswa as $key => $alt) : ?>
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
                                        <td><?= $alt['lolos']['nim'] ?></td>
                                        <td><?= $alt['lolos']['nama'] ?></td>
                                        <td><?= $alt['alternatif']['c1'] ?>*0.3</td>
                                        <td><?= $alt['alternatif']['c2'] ?>*0.27</td>
                                        <td><?= $alt['alternatif']['c3'] ?>*0.23</td>
                                        <td><?= $alt['alternatif']['c4'] ?>*0.2</td>
                                        <td class="align-middle" rowspan="2"><?= $alt['score'] ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Max/Min</td>
                                        <td>(min)<br><?= $alt['alternatif']['C1min'] ?></td>
                                        <td>(max)<br><?= $alt['alternatif']['C2max'] ?></td>
                                        <td>(max)<br><?= $alt['alternatif']['C3max'] ?></td>
                                        <td>(max)<br><?= $alt['alternatif']['C4max'] ?></td>
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
    <div class="container" style="padding:0">
        <div class="row mt-5">
            <div class="d-inline col-lg-12">
                <h2 class="mt-5">Pemilihan Calon Penerima Beasiswa PPA</h2>
                <span>Data Terverifikasi</span>
            </div>
            <div class="col-lg-3 mb-3 ">
                <button id="del" class="btn btn-danger mt-3" disabled>Delete Selected</button>
            </div>

            <?php
            if ($this->session->flashdata('msg')) {
                ?>
                <div class="col-lg-12 mb-3 ">
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                </div>
            <?php
            }
            ?>

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
                                    <td>Rp <?= number_format($mhs_lolos['lolos']['gaji_ortu'], 0, ',', '.'); ?> </td>
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
                    <input id="terima" class="btn btn-success mt-4 col-lg-12" name="terima" value="Terima" disabled>
                    <br><br>
                </form>
            </div>

        </div>

    </div>

    <!-- BEGIN modal IP dan Kv -->
    <!-- IP -->
    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $mhs_lolos) : ?>
        <div class="modal fade" id="myModal-Ip-<?= $i ?>">
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
                                        <th colspan="6">SEMSETER</th>
                                        <th rowspan="2" class="align-middle">IPK</th>
                                    </tr>
                                    <tr>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $mhs_lolos['lolos']['ip1'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['ip2'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['ip3'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['ip4'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['ip5'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['ip6'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['ipk'] ?></td>
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
                                        <td class="align-middle">Data Konversi</td>
                                        <td><?= $mhs_lolos['lolos']['c1'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['c2'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['c3'] ?></td>
                                        <td><?= $mhs_lolos['lolos']['c4'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Data Konversi Normalisasi</td>
                                        <td><?= $mhs_lolos['alternatif']['c1'] ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c2'] ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c3'] ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c4'] ?></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">Kriteria x Bobot</td>
                                        <td><?= $mhs_lolos['alternatif']['c1'] * 0.3 ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c2'] * 0.27 ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c3'] * 0.23 ?></td>
                                        <td><?= $mhs_lolos['alternatif']['c4'] * 0.2 ?></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><b>Bobot</b> </td>
                                        <td>0.3</td>
                                        <td>0.27</td>
                                        <td>0.23</td>
                                        <td>0.2</td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><b> Max/Min</b> </td>
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

    <script>
        var nav = document.getElementsByClassName("nav-item");
        // alert(nav[0].getAttribute('class'));
        nav[0].setAttribute("Class", "nav-item")
        nav[1].setAttribute("Class", "nav-item active")
    </script>
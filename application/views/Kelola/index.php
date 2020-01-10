    <div class="container" style="padding:0">
        <div class="row mt-5">
            <div class="d-inline col-lg-12">
                <h2 class="mt-5">Pemilihan Calon Penerima Beasiswa PPA</h2>
                <span>Kelola Data</span>
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

            <!-- <div class="col-lg-12 mb-3 ">
                <input type="text" id="year" />
            </div> -->

            <!-- Default unchecked -->
            <div class="col-lg-12 shadow-sm">
                <form id="myform" method="post" action="<?= base_url('/kelola/delete/') ?>">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <table id="mytable" class="table table-sm table-responsive table-hover" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th class="align-middle">All<input type="checkbox" id="checkall"></th>
                                <th scope="col" class="align-middle">No</th>
                                <th class="align-middle">Nim</th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">SMT</th>
                                <th class="align-middle">Angkatan</th>
                                <th class="align-middle">Kelas</th>
                                <th class="align-middle">No Rekening</th>
                                <th class="align-middle">IPK</th>
                                <th class="align-middle">Penghasilan Orang Tua</th>
                                <th class="align-middle">Jumlah Tanggungan</th>
                                <th class="align-middle">Tanggal Daftar</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $mhs) : ?>
                                <tr>
                                    <td class="align-middle"><input type="checkbox" class="checkitem" name="nim[]" value="<?= $mhs['nim'] ?>"></td>
                                    <td scope="row"><?= $i ?></td>
                                    <td><?= $mhs['nim'] ?></td>
                                    <td><?= $mhs['nama'] ?></td>
                                    <td><?= $mhs['semester'] ?></td>
                                    <td><?= $mhs['angkatan'] ?></td>
                                    <td><?= $mhs['prodi'] ?></td>
                                    <td><?= $mhs['rekening'] ?></td>
                                    <td><a href="#" class="myModal" data-toggle="modal" data-target="#myModal-Ip-<?= $i ?>"><?= $mhs['ipk'] ?></a></td>
                                    <td>Rp <?= number_format($mhs['gaji_ortu'], 0, ',', '.'); ?> </td>
                                    <td><?= $mhs['jumlah_saudara'] ?></td>
                                    <td><?= $mhs['created_at'] ?></td>
                                    <td class="text-center align-middle">
                                        <?php
                                            if ($mhs['status'] == 0) {
                                                ?>
                                            <a href="<?= base_url('/kelola/verifikasi/') . $mhs['nim'] ?>" class="btn badge-success col-lg-12">Verifikasi</a>
                                            <!-- <a href="<?= base_url() ?>kelola/edit/<?= $mhs['nim'] ?>" class="btn badge-warning">Edit</a> -->
                                            <a href="<?= base_url('/kelola/edit/') . $mhs['nim'] ?>" class="btn badge-warning col-lg-12 mt-2">Edit</a>
                                        <?php
                                            }elseif ($mhs['status'] == 2) {
                                                echo "<img src='".base_url('assets/img/delete.png')."' alt='' width='50px'></br>";
                                                echo "";
                                            }else{
                                                echo "<img src='".base_url('assets/img/correct.png')."' alt='' width='50px'></br>";
                                                echo "";
                                            }
                                            ?>
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
                                <th class="align-middle">IPK</th>
                                <th class="align-middle">Penghasilan Orang Tua</th>
                                <th class="align-middle">Jumlah Tanggungan</th>
                                <th class="align-middle">Nama Dalam Rekening</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>

    </div>
    </div> 

    <?php $i = 1; ?>
    <?php foreach ($mahasiswa as $mhs) : ?>
        <!-- BEGIN modal IP -->
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
                                        <td><?= $mhs['ip1'] ?></td>
                                        <td><?= $mhs['ip2'] ?></td>
                                        <td><?= $mhs['ip3'] ?></td>
                                        <td><?= $mhs['ip4'] ?></td>
                                        <td><?= $mhs['ip5'] ?></td>
                                        <td><?= $mhs['ip6'] ?></td>
                                        <td><?= $mhs['ipk'] ?></td>
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

        <?php $i++  ?>
    <?php endforeach; ?>
    <script>
        var nav = document.getElementsByClassName("nav-item");
        // alert(nav[0].getAttribute('class'));
        nav[0].setAttribute("Class", "nav-item active")
        nav[1].setAttribute("Class", "nav-item")
        nav[2].setAttribute("Class", "nav-item")
    </script>
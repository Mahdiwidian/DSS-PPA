    <div class="container" style="padding:0">
        <div class="row mt-5">
            <div class="d-inline col-lg-12">
                <h2 class="mt-5">Pemilihan Calon Penerima Beasiswa PPA</h2>
                <span>Kelola Data</span>
            </div>
            <div class="col-lg-3 mb-3 ">
                <button id="del" class="btn btn-danger mt-3" disabled>Delete Selected</button>
            </div>
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
                                <th class="align-middle">Nama Dalam Rekening</th>
                                <th class="align-middle">IPK</th>
                                <th class="align-middle">Penghasilan Orang Tua</th>
                                <th class="align-middle">Jumlah Tanggungan</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $mhs) : ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkitem" name="nim[]" value="<?= $mhs['nim'] ?>"></td>
                                    <td scope="row"><?= $i ?></td>
                                    <td><?= $mhs['nim'] ?></td>
                                    <td><?= $mhs['nama'] ?></td>
                                    <td><?= $mhs['semester'] ?></td>
                                    <td><?= $mhs['angkatan'] ?></td>
                                    <td><?= $mhs['prodi'] ?></td>
                                    <td><?= $mhs['rekening'] ?></td>
                                    <td>Nama Rekening</td>
                                    <td><a href="#" class="myModal" data-toggle="modal" data-target="#myModal-Ip-<?= $i ?>"><?= $mhs['ipk'] ?></a></td>
                                    <td>Rp <?= number_format($mhs['gaji_ortu'] ,0,',','.'); ?> </td>
                                    <td><?= $mhs['jumlah_saudara'] ?></td>
                                    <td>
                                        <!-- <a href="<?= base_url() ?>kelola/edit/<?= $mhs['nim'] ?>" class="btn badge-warning">Edit</a> -->
                                        <a href="<?= base_url('/kelola/verifikasi/') . $mhs['nim'] ?>" class="btn badge-success col-lg-12">Verifikasi</a>
                                        <a href="<?= base_url('/kelola/edit/') . $mhs['nim'] ?>" class="btn badge-warning col-lg-12 mt-2">Edit</a>
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


            <!-- <div class="col-lg-12 mt-4">
                <div class="card shadow-sm">
                    <div class="card-body" style="padding:0">
                        <table id="mytable" class="table text-center table-responsive">
                            <thead class="thead-light">
                                <tr>
                                    <th class="align-middle"><input type="checkbox" id="checkall"></th>
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
                                    <th colspan="2" class="sorting_asc_disabled sorting_desc_disabled align-middle">Aksi</th>

                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <?php foreach ($mahasiswa as $mhs) : ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" class="checkitem" name="nim[]" value="<?= $mhs['nim'] ?>"></td>
                                    <td scope="row"><?= $i ?></td>
                                    <td><?= $mhs['nim'] ?></td>
                                    <td><?= $mhs['nama'] ?></td>
                                    <td>semester</td>
                                    <td>angkatan</td>
                                    <td><?= $mhs['prodi'] ?></td>
                                    <td>No Rekening</td>
                                    <td>Nama Rekening</td>
                                    <td><a href="#" class="myModal" data-toggle="modal" data-target="#myModal-Ip-<?= $i ?>"><?= $mhs['ipk'] ?></a></td>
                                    <td><?= $mhs['gaji_ortu'] ?></td>
                                    <td><?= $mhs['jumlah_saudara'] ?></td>
                                    <td>
                                        <a href="#" class="btn badge-success">Verifikasi</a>
                                    </td>
                                    <td>
                                        <a href="<?= base_url() ?>kelola/edit/<?= $mhs['nim'] ?>" class="btn badge-warning">Edit</a>
                                        <a href="<?= base_url('/kelola/edit/') . $mhs['nim'] ?>" class="btn badge-warning">Edit</a>
                                    </td>
                                    <?php $i++  ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        
        </div>
    </div> -->

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
            </script>
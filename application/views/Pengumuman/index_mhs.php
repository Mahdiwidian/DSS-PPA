<div class="container" style="padding:0">
    <div class="row mt-5">
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
        <div class="col-lg-12 mt-5 ">
            <div class="col-lg-5 mx-auto">
                <div class="card shadow-sm text-center">
                    <div class="card-header">
                        <h2> Pengumuman</h2>
                    </div>
                    <div class="col">
                        <img src="<?= base_url() ?>/assets/img/correct.png" class="img-fluid" alt="Responsive image" width="150px">
                        <h4 class="col">Selamat Anda Mendapatkan Beasiswa PPA</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-5 ">
            <div class="col-lg-5 mx-auto">
                <div class="card shadow-sm text-center">
                    <div class="card-header">
                        <h2> Pengumuman</h2>
                    </div>
                    <div class="col">
                        <img src="<?= base_url() ?>/assets/img/pending.png" class="img-fluid" alt="Responsive image" width="150px">
                        <h4 class="col">Dalam Tahap Seleksi</h4>
                        Cek kembali di tanggal <br> yang telah ditentukan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var nav = document.getElementsByClassName("nav-item");
    // alert(nav[0].getAttribute('class'));
    nav[0].setAttribute("Class", "nav-item")
    nav[1].setAttribute("Class", "nav-item active")
</script>
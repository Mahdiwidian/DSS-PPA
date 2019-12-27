<div class="container" style="padding:0">
    <div class="row mt-5">
        <div class="d-inline col-lg-12">
            <h2 class="mt-5">Pemilihan Calon Penerima Beasiswa PPA</h2>
            <span>Data Terverifikasi</span>
        </div>
    </div>
    <form id="myform" method="post" action="<?= base_url('/test/delete/')?>">
        <p><b>Selected Row Data</b></p>
        <pre id="view-rows" method="post"></pre>
        <p><b>Form Data Submited to The Server</b></p>
        <pre id="view-form" method="post"></pre>
        <button id="view" class="btn btn-primary">View Selected</button>
        <button id="del" class="btn btn-danger">Delete Selected</button>
        <!-- Default unchecked -->
        <table id="mytable" class="table" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th class="text-center"><input type="checkbox" id="checkall"></th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Gaji Orangtua</th>
                    <th>Jumlah Tannggungan</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td class="text-center"><input type="checkbox" class="checkitem" name="nim[]" value="<?= $mhs['nim'] ?>"></td>
                    <td><?= $mhs['nim'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['prodi'] ?></td>
                    <td><?= $mhs['gaji_ortu'] ?></td>
                    <td><?= $mhs['jumlah_saudara'] ?></td>
                </tr>  
            <?php $i++; ?>
            <?php endforeach ?>         
            </tbody>
        </table>
    </form>
</div>
<!-- END Modal IP -->

<script>
    var nav = document.getElementsByClassName("nav-item");
    // alert(nav[0].getAttribute('class'));
    nav[0].setAttribute("Class", "nav-item")
    nav[1].setAttribute("Class", "nav-item active")
</script>

<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-2">Edit Data Mahasiswa</h1>
            <form method="post" action="<?= base_url('kelola/storeEdit/').$mahasiswa['nim'] ?>">                
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control " id="nim" placeholder="Masukan nim" name="nim" value="<?= $mahasiswa['nim'] ?>" require disabled>


                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control " id="nama" placeholder="Masukan Nama" name="nama" value="<?= $mahasiswa['nama']?>" require>

                </div>                
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <input type="text" class="form-control" id="prodi" placeholder="Masukan Prodi" name="prodi" value="<?= $mahasiswa['prodi'] ?>" require>

                </div>
                <div class="form-group">
                    <label for="gaji">Gaji Orang Tua</label>
                    <input type="text" class="form-control" id="gaji" placeholder="Masukan Gaji Orang Tua" name="gaji" value="<?= $mahasiswa['gaji_ortu'] ?>" require>

                </div>
                <div class="form-group">
                    <label for="tanggungan">Jumlah Tanggungan</label>
                    <input type="text" class="form-control" id="tanggungan" placeholder="Masukan Jumlah Tanggungan" name="tanggungan" value="<?= $mahasiswa['jumlah_saudara'] ?> "require>

                </div>
                <div class="form-group">
                    <label for="telp">Nomer Telp</label>
                    <input type="text" class="form-control" id="telp" placeholder="Masukan Nomer Telp" name="telp" value="<?= $mahasiswa['telp'] ?>" require>
                </div>
                <div class="form-group">
                    <label for="ipk">Jumlah IPK</label>
                    <input type="text" class="form-control" id="ipk" placeholder="Masukan Jumlah IPK" name="ipk" value="<?= $mahasiswa['ipk'] ?>" require>
                </div>
                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                    <input type="text" class="form-control " id="angkatan" placeholder="Masukan Email" name="angkatan" value="<?= $mahasiswa['angkatan'] ?>" require>

                </div>
                <div class="form-group">
                    <label for="jurusan">Nomer Rekening</label>
                    <input type="text" class="form-control" id="jurusan" placeholder="Masukan Jurusan" name="rekening" value="<?= $mahasiswa['rekening'] ?>" require>
                </div>
                <div class="form-group">
                    <label for="nama_rek">Nama Dalam Rekening</label>
                    <input type="text" class="form-control" id="nama_rek" placeholder="Masukan Jurusan" name="nama_rek" value="<?= $mahasiswa['nama'] ?>" require>
                </div>
                <div class="form-group">
                    <label for="Semester">Semester</label>
                    <input type="text" class="form-control" id="Semester" placeholder="Masukan Semester" name="semester" value="<?= $mahasiswa['semester'] ?> "require>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <br>
                <br>

            </form>

        </div>
    </div>
</div>
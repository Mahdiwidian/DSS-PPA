<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="mt-2">Form Edit Mahasiswa</h1>

            <form method="post" action="">
                
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama Bro" name="nama" value=>


                </div>  
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Masukan nim Bro" name="nim" value=>


                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukan Email Bro" name="email" value=>

                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" placeholder="Masukan Jurusan Bro" name="jurusan" value=>

                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>

            </form>

        </div>
    </div>
</div>
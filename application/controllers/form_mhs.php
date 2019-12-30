<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="bootstrap-4.4.1-dist/css/bootstrap.css">
	<title>Input Data Mahasiswa</title>
</head>
<style>

.kotak{
	width: 100%;
	background: #00bfff;
	margin: 0px auto;
	padding: 30px 20px;
}

.jarak{
	margin: 10px;
}


</style>

<body>
<div class="kotak">
<H4><u><b>Input Data Mahasiswa</b></u></H4>
</div>

<div class="jarak">

	<table class="table table-bordered">
	<!-- <form method="post" action="proses.php" > -->
	  <div class="form-group">
	    <label for="nim">NIM</label>
	    <input type="text" class="form-control" id="nim" placeholder="Masukan NIM">
	  </div>

	  <div class="form-group">
	    <label for="nama">Nama</label>
	    <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap">
	  </div>

	  <div class="form-group">
	    <label for="prodi">Prodi</label>
	    <input type="text" class="form-control" id="prodi" placeholder="Masukan Program Study">
	  </div>

	  <div class="form-group">
	    <label for="gaji_ortu">Gaji Orang Tua</label>
	    <input type="text" class="form-control" id="gaji_Ortu" placeholder="Masukan Gaji Orang Tua ">
	  </div>

	  <div class="form-group">
	    <label for="jumlah_saudara">Jumlah Saudara</label>
	    <input type="text" class="form-control" id="jumlah_saudara" placeholder="Masukan Jumlah Saudara ">
	  </div>

	  <div class="form-group">
	    <label for="telp">No Telpon</label>
	    <input type="text" class="form-control" id="telp" placeholder="Masukan No Telpon ">
	  </div>


		<div class="form-row">
		    <div class="form-group col-md-6">
			    <label for="ip1">IP1</label>
			    <input type="ip1" class="form-control" id="ip1">
		    </div>
		    <div class="form-group col-md-6">
			    <label for="ip2">IP2</label>
			    <input type="ip2" class="form-control" id="ip2">
		    </div>
	  	</div>

	  	<div class="form-row">
		    <div class="form-group col-md-6">
			    <label for="ip3">IP3</label>
			    <input type="ip3" class="form-control" id="ip3">
		    </div>
		    <div class="form-group col-md-6">
			    <label for="ip4">IP4</label>
			    <input type="ip4" class="form-control" id="ip4">
		    </div>
	  	</div>

	  	<div class="form-row">
		    <div class="form-group col-md-6">
			    <label for="ip5">IP5</label>
			    <input type="ip5" class="form-control" id="ip5">
		    </div>
		    <div class="form-group col-md-6">
			    <label for="ip5">IP5</label>
			    <input type="ip5" class="form-control" id="ip5">
		    </div>
	  	</div>

	  <div class="form-group">
	    <label for="ipk">IPK</label>
	    <input type="text" class="form-control" id="ipk" placeholder="Masukan IPk">
	  </div>

	  <div class="form-group">
	    <label for="Angkatan">Angkatan</label>
	    <input type="text" class="form-control" id="Angkatan" placeholder="Masukan Angkatan">
	  </div>

	  <div class="form-group">
	    <label for="rekening">Rekening</label>
	    <input type="text" class="form-control" id="rekening" placeholder="Masukan Rekening">
	  </div>

	  <div class="form-group">
	    <label for="semester">Semester</label>
	    <input type="text" class="form-control" id="semester" placeholder="Masukan Semester">
	  </div>

	  <button type="submit" class="btn btn-primary">Submit</button>


	  </form>
	  </table>
	  </div>

	  

	</form>
</body>
</html>

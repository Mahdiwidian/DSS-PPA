<style>
	.kotak {
		width: 100%;
		background: #00bfff;
		margin: 0px auto;
		padding: 30px 20px;
	}

	.jarak {
		margin: 10px;
	}
</style>

<body>
	<div class="container">

	</div>

	<?php
	if (@$mahasiswa) {
		?>
		<div class="mt-5">
			<div class="d-inline col-lg-12">
				<h2 class="mt-5">Daftar Beasiswa PPA</h2>
				<span>Kelola Data</span>
			</div>
			<div class="jarak">
				<form action="<?= base_url('Mhs/storeData') ?>" method="post">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<table class="table table-bordered" style="padding: 0px;">

						<div class="form-group">
							<label for="nim">NIM</label>
							<input type="text" class="form-control" name="nim" id="nim" placeholder="Masukan NIM">
						</div>

						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap">
						</div>

						<label for="prodi">Prodi</label>
						<div class="form-group input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Pilihan</label>
							</div>
							<select class="custom-select" name="prodi" id="inputGroupSelect01">
								<option selected>Choose...</option>
								<option value="TI REG">TI REG</option>
								<option value="TI PBI">TI PBI</option>
								<option value="TI MSU">TI MSU</option>
								<option value="TI CBD">TI CBD</option>
								<option value="TI JATWAR">TI JATWAR</option>
								<option value="TI CCIT">TI CCIT</option>
								<option value="TMJ REG">TMJ REG</option>
								<option value="TMJ CCIT">TMJ CCIT</option>
								<option value="TMD REG">TMD REG</option>
								<option value="TMD MSU">TMD MSU</option>
								<option value="TMD AEU">TMD AEU</option>
								<option value="TKJ REG">TKJ REG</option>
								<option value="SEC CCIT">SEC CCIT</option>
							</select>
						</div>

						<div class="form-group">
							<label for="gaji_ortu">Gaji Orang Tua</label>
							<input type="text" class="form-control" name="gaji" id="gaji_Ortu" placeholder="Masukan Gaji Orang Tua ">
						</div>

						<div class="form-group">
							<label for="jumlah_saudara">Jumlah Saudara</label>
							<input type="text" class="form-control" name="tanggungan" id="jumlah_saudara" placeholder="Masukan Jumlah Saudara ">
						</div>

						<div class="form-group">
							<label for="telp">No Telpon</label>
							<input type="text" class="form-control" name="telp" id="telp" placeholder="Masukan No Telpon ">
						</div>


						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="ip1">IP1</label>
								<input type="ip1" class="form-control" name="ip1" id="ip1">
							</div>
							<div class="form-group col-md-6">
								<label for="ip2">IP2</label>
								<input type="ip2" class="form-control" name="ip2" id="ip2">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="ip3">IP3</label>
								<input type="ip3" class="form-control" name="ip3" id="ip3">
							</div>
							<div class="form-group col-md-6">
								<label for="ip4">IP4</label>
								<input type="ip4" class="form-control" name="ip4" id="ip4">
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="ip5">IP5</label>
								<input type="ip5" class="form-control" name="ip5" id="ip5">
							</div>
							<div class="form-group col-md-6">
								<label for="ip6">IP5</label>
								<input type="ip6" class="form-control" name="ip6" id="ip6">
							</div>
						</div>

						<div class="form-group">
							<label for="ipk">IPK</label>
							<input type="text" class="form-control" id="ipk" name="ipk" placeholder="Masukan Pekerjaan Ayah">
						</div>

						<div class="form-group">
							<label for="pk_ayah">Pekerjaan Ayah</label>
							<input type="text" class="form-control" id="pk_ayah" name="pk_ayah" placeholder="Masukan Pekerjaan Ayah">
						</div>

						<div class="form-group">
							<label for="pk_ibu">Pekerjaan Ibu</label>
							<input type="text" class="form-control" id="pk_ibu" name="pk_ibu" placeholder="Masukan Pekerjaan Ibu">
						</div>

						<div class="form-group">
							<label for="Angkatan">Angkatan</label>
							<input type="text" class="form-control" name="angkatan" id="Angkatan" placeholder="Masukan Angkatan">
						</div>

						<div class="form-group">
							<label for="rekening">Rekening</label>
							<input type="text" class="form-control" name="rekening" id="rekening" placeholder="Masukan Rekening">
						</div>

						<label for="semester">Semester</label>
						<div class="form-group input-group mb-3">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
							</div>
							<select class="custom-select" name="semester" id="inputGroupSelect02">
								<option selected>Choose...</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
							</select>
						</div>

						<input type="submit" class="btn btn-primary" name="" value="Simpan" id="">

					</table>
				</form>
			</div>
		</div>
	<?php
	} else {
		?>
		<div class="container">
			<div class="mt-5">
				<div class="d-inline col-lg-12">
					<h2 class="mt-5">Daftar Beasiswa PPA</h2>
					<span>Kelola Data</span>
				</div>
				<div class="jarak">
					<form action="<?= base_url('Mhs/storeData') ?>" method="post">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<table class="table table-bordered" style="padding: 0px;">

							<div class="form-group">
								<label for="nim">NIM</label>
								<input type="text" class="form-control" name="nim" id="nim" placeholder="Masukan NIM">
							</div>

							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap">
							</div>

							<label for="prodi">Prodi</label>
							<div class="form-group input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect01">Pilihan</label>
								</div>
								<select class="custom-select" name="prodi" id="inputGroupSelect01">
									<option selected>Choose...</option>
									<option value="TI REG">TI REG</option>
									<option value="TI PBI">TI PBI</option>
									<option value="TI MSU">TI MSU</option>
									<option value="TI CBD">TI CBD</option>
									<option value="TI JATWAR">TI JATWAR</option>
									<option value="TI CCIT">TI CCIT</option>
									<option value="TMJ REG">TMJ REG</option>
									<option value="TMJ CCIT">TMJ CCIT</option>
									<option value="TMD REG">TMD REG</option>
									<option value="TMD MSU">TMD MSU</option>
									<option value="TMD AEU">TMD AEU</option>
									<option value="TKJ REG">TKJ REG</option>
									<option value="SEC CCIT">SEC CCIT</option>
								</select>
							</div>

							<div class="form-group">
								<label for="gaji_ortu">Gaji Orang Tua</label>
								<input type="text" class="form-control" name="gaji" id="gaji_Ortu" placeholder="Masukan Gaji Orang Tua ">
							</div>

							<div class="form-group">
								<label for="jumlah_saudara">Jumlah Saudara</label>
								<input type="text" class="form-control" name="tanggungan" id="jumlah_saudara" placeholder="Masukan Jumlah Saudara ">
							</div>

							<div class="form-group">
								<label for="telp">No Telpon</label>
								<input type="text" class="form-control" name="telp" id="telp" placeholder="Masukan No Telpon ">
							</div>


							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="ip1">IP1</label>
									<input type="ip1" class="form-control" name="ip1" id="ip1">
								</div>
								<div class="form-group col-md-6">
									<label for="ip2">IP2</label>
									<input type="ip2" class="form-control" name="ip2" id="ip2">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="ip3">IP3</label>
									<input type="ip3" class="form-control" name="ip3" id="ip3">
								</div>
								<div class="form-group col-md-6">
									<label for="ip4">IP4</label>
									<input type="ip4" class="form-control" name="ip4" id="ip4">
								</div>
							</div>

							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="ip5">IP5</label>
									<input type="ip5" class="form-control" name="ip5" id="ip5">
								</div>
								<div class="form-group col-md-6">
									<label for="ip6">IP5</label>
									<input type="ip6" class="form-control" name="ip6" id="ip6">
								</div>
							</div>

							<div class="form-group">
								<label for="ipk">IPK</label>
								<input type="text" class="form-control" id="ipk" name="ipk" placeholder="Masukan Pekerjaan Ayah">
							</div>

							<div class="form-group">
								<label for="pk_ayah">Pekerjaan Ayah</label>
								<input type="text" class="form-control" id="pk_ayah" name="pk_ayah" placeholder="Masukan Pekerjaan Ayah">
							</div>

							<div class="form-group">
								<label for="pk_ibu">Pekerjaan Ibu</label>
								<input type="text" class="form-control" id="pk_ibu" name="pk_ibu" placeholder="Masukan Pekerjaan Ibu">
							</div>

							<div class="form-group">
								<label for="Angkatan">Angkatan</label>
								<input type="text" class="form-control" name="angkatan" id="Angkatan" placeholder="Masukan Angkatan">
							</div>

							<div class="form-group">
								<label for="rekening">Rekening</label>
								<input type="text" class="form-control" name="rekening" id="rekening" placeholder="Masukan Rekening">
							</div>

							<label for="semester">Semester</label>
							<div class="form-group input-group mb-3">
								<div class="input-group-prepend">
									<label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
								</div>
								<select class="custom-select" name="semester" id="inputGroupSelect02">
									<option selected>Choose...</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
								</select>
							</div>

							<input type="submit" class="btn btn-primary" name="" value="Simpan" id="">

						</table>
					</form>
				</div>
			</div>
		</div>
	<?php
	}
	?>
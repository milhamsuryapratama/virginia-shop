<div class="container" style="width: 40%">
	<center><h3>Tambah Data Rekening</h3></center>
	<br>
	<form method="post" action="<?=base_url()?>administrator/tambah_rekening">
		<input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening">
		<br>
		<select name="nama_bank" class="form-control">
			<option>-- Pilih Bank -- </option>
			<option value="BRI">BRI</option>
			<option value="Mandiri">Mandiri</option>
			<option value="BNI">BNI</option>
			<option value="BCA">BCA</option>
		</select>
		<br>
		<input type="text" name="nama_pemilik" class="form-control" placeholder="Atas Nama">
		<br>
		<input type="submit" name="simpan" value="Simpan" class="form-control" style="cursor: pointer;">
	</form>
</div>
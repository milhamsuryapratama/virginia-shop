<div class="container" style="width: 40%">
	<center><h3>Tambah Data Rekening</h3></center>
	<br>
	<form method="post" action="<?=base_url()?>administrator/edit_rekening">
		<input type="hidden" name="id_rekening" value="<?=$rekening['id_rekening']?>">
		<input type="text" name="nomor_rekening" class="form-control" placeholder="Nomor Rekening" value="<?=$rekening['nomor_rekening']?>">
		<br>
		<select name="nama_bank" class="form-control">
			<option>-- Pilih Bank -- </option>
			<?php if ($rekening['nama_bank'] == "BRI") { ?>
				<option value="BCA">BCA</option>
				<option value="BRI" selected>BRI</option>
				<option value="BNI">BNI</option>
				<option value="Mandiri">Mandiri</option>
			<?php } elseif ($rekening['nama_bank'] == "BNI") { ?>
				<option value="BCA">BCA</option>
				<option value="BRI">BRI</option>
				<option value="BNI" selected>BNI</option>
				<option value="Mandiri">Mandiri</option>
			<?php } elseif ($rekening['nama_bank'] == "Mandiri") { ?>
				<option value="BCA">BCA</option>
				<option value="BRI">BRI</option>
				<option value="BNI">BNI</option>
				<option value="Mandiri" selected>Mandiri</option>
			<?php } else { ?>
				<option value="BCA" selected>BCA</option>
				<option value="BRI">BRI</option>
				<option value="BNI">BNI</option>
				<option value="Mandiri">Mandiri</option>
			<?php } ?>			
		</select>
		<br>
		<input type="text" name="nama_pemilik" class="form-control" placeholder="Atas Nama" value="<?=$rekening['nama_pemilik']?>">
		<br>
		<input type="submit" name="edit" value="Edit" class="form-control" style="cursor: pointer;">
	</form>
</div>
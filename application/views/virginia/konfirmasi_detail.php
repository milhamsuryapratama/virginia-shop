<br>
<div class="container" style="width: 50%">
	<form method="post" action="<?=base_url()?>orders/simpan" enctype="multipart/form-data">
		<label>Kode Transaksi</label>
		<input type="text" name="kode_transaksi" class="form-control" value="<?=$trx['kode_transaksi']?>" readonly>
		<label>Nama Pembeli</label>
		<input type="text" name="nama_pembeli" class="form-control" value="<?=$trx['nama_pembeli']?>" readonly>
		<label>Email</label>
		<input type="text" name="email" class="form-control" value="<?=$trx['email']?>" readonly>
		<label>Total</label>
		<input type="text" name="total" class="form-control" value="<?php echo "Rp. ". number_format($total['total'],0) ?>" readonly>
		<label>Transef ke Bank</label>
		<select name="bank" class="form-control" required>
			<option>Pilih Bank</option>
			<?php foreach ($rekening as $r) { ?>
				<option value="<?=$r['id_rekening']?>"><?=$r['nama_bank'].' '.'('.$r['nomor_rekening'].')'. ' A/n ('.$r['nama_pemilik'].')'?></option>
			<?php } ?>
		</select>
		<label>Bukti Pembayaran</label>
		<input type="file" name="bukti_bayar" class="form-control" required>
		<br>
		<input type="submit" name="simpan" value="Kirim" class="btn btn-primary">
	</form>
</div>
<br>
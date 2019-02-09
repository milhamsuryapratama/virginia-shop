<br>
<div class="container">
	<h3 style="text-align: justify;">Selamat. Orderan Anda dengan Kode Transaksi <strong><?php echo $kode; ?></strong> Kami Terima. Silahkan tranfer uang sebesar <strong>Rp. <?php echo number_format($total['total'],0); ?></strong> keoada nomor rekening kami dibawah ini untuk mempercepat proses pemesanan anda dan segera konfirmasi pembayarn anda <a href="<?=base_url()?>orders/konfirmasi">disini</a></h3>
	<table class="table">
		<tr>
			<th>No</th>
			<th>Nama Bank</th>
			<th>Nomor Rekening</th>
			<th>Atas Nama</th>
		</tr>
		<?php 
		$no = 1;
		foreach ($rekening as $r) { ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$r['nama_bank']?></td>
				<td><?=$r['nomor_rekening']?></td>
				<td><?=$r['nama_pemilik']?></td>

			</tr>
		<?php } ?>
	</table>
</div>
<br>
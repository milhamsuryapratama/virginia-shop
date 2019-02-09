<div class="container">
	<table class="table">
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Total</th>
		</tr>
		<?php 
		$no = 1;
		foreach ($trxDetail as $t) { ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$t['nama_produk']?></td>
				<td><?=$t['jumlah']?></td>
				<td><?php echo "Rp. ". number_format($t['harga_jual'],0); ?></td>
				<td><?php echo "Rp. ". number_format($t['total'],0); ?></td>
			</tr>
		<?php $no++;} ?>
	</table>
</div>
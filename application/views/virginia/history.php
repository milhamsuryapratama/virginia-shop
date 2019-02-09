<br>
<div class="container">
	<ol class="breadcrumb" style="background: white">
		<li><a href="<?=base_url()?>">Home</a></li>
		<li><a href="<?=base_url()?>produk">Produk</a></li>
		<li>History</li>
	</ol>

	<table class="table">
		<tr>
			<th>No</th>
			<th>Kode Transaksi</th>
			<th>Waktu Transaksi</th>
			<th></th>
		</tr>
		<?php 
		$no = 1;
		if (count($history) == 0) { ?>
			<tr>
				<td colspan="4"><center>Anda Tidak Memiliki History Transaksi</center></td>
			</tr>
		<?php } else { 
			foreach ($history as $h) { ?>
			<tr>
				<td><?=$no?></td>
				<td><?=$h['kode_transaksi']?></td>
				<td><?php echo date('d F Y', strtotime($h['waktu_transaksi'])); ?></td>
				<td><a href="<?=base_url()?>user/orders/<?=$h['kode_transaksi']?>" class="btn btn-primary">Detail</a></td>
			</tr>
			<?php $no++; } 
		}?>
		
	</table>
</div>
<br>
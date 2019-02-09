<br>
<div class="container">
	<ol class="breadcrumb" style="background: white">
		<li><a href="<?=base_url()?>">Home</a></li>
		<li><a href="<?=base_url()?>user/history">History</a></li>
		<li>Order Detail</li>
	</ol>
	<?php if ($this->session->flashdata('confirmSukses')) { ?>
		<div class="alert alert-success" role="alert">
			<?php echo $this->session->flashdata('confirmSukses'); ?>
		</div>
	<?php } ?>
	<table class="table">
		<tr>
			<th>No</th>
			<th>Item</th>
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
				<td>
					<a href="<?=base_url()?>produk/detail/<?=$t['produk_slug']?>" class="product-image"> <img src="<?=base_url()?>asset/upload/gambar_produk/<?=$t['gambar']?>" class="img-responsive" alt="Sample Product " width="100"> </a>
				</td>
				<td><a href="<?=base_url()?>produk/detail/<?=$t['produk_slug']?>"><?=$t['nama_produk']?></a></td>
				<td><?=$t['jumlah']?></td>
				<td><?php echo "Rp. ". number_format($t['harga_jual'],0); ?></td>
				<td><?php echo "Rp. ". number_format($t['total'],0); ?></td>
			</tr>
		<?php $no++;} ?>
	</table>
</div>
<br>
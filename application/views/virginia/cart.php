<br>
<div class="container">
	<ol class="breadcrumb" style="background: white">
		<li><a href="#">Home</a></li>
		<li><a href="<?=base_url()?>produk">Produk</a></li>
		<li><a href="<?=base_url()?>produk/cart">Cart</a></li>
	</ol>
	<br>
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th style="width: 10%;"></th>
				<th>Belanjaan</th>
				<th>Qty</th>
				<th>Harga</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if ($jumlahCart == 0) { ?>
				<tr>
					<td colspan="6"><center>Anda Belum Memiliki Keranjang Belanja</center></td>
				</tr> 
			<?php }

			foreach ($cart as $c) { ?>
				<tr>
					<td class="text-center">
						<a href="<?=base_url()?>produk/delete_cart/<?=$c['id_order_temp']?>" class="cart-remove" data-loading-text="<i class='fa fa-spinner fa-spin fa-2x'></i>" title="Keluarkan dari belanjaan">
							<i class="fa fa-times fa-2x"></i>
						</a>
					</td>
					<td>
						<div class="col-img-cart">
							<a href="<?=base_url()?>produk/detail/<?=$c['produk_slug']?>" class="product-image"> <img src="<?=base_url()?>asset/upload/gambar_produk/<?=$c['gambar']?>" class="img-responsive" alt="Sample Product "> </a>
						</div>
					</td>
					<td>
						<a href="<?=base_url()?>produk/detail/<?=$c['produk_slug']?>"><?=$c['nama_produk']?></a>
					</td>
					<td>
						<input type="number" name="jumlah" value="<?=$c['jumlah']?>" style="width:60px; text-align:center; margin-right:5px; height:34px;">
					</td>
					<td>Rp. <?=number_format($c['harga_konsumen'],0)?></td>
					<td>Rp. <?=number_format($c['harga_konsumen'] * $c['jumlah'],0)?></td>
				</tr>
			<?php } ?>			
		</tbody>
		<tfoot>
			<tr>
				<th colspan="5">Total</th>
				<th colspan="1">Rp. <?php echo number_format($total['total'],0); ?></th>
			</tr>
			<tr>
				<td colspan="5">
					<a href="<?=base_url()?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
				</td>
				<td>					
					<form method="post" action="<?=base_url()?>produk/checkout">
						<?php if ($jumlahCart == 0) { ?>
							<input type="submit" name="checkout" value="Checkout Now" class="btn btn-primary" disabled>
						<?php } else { ?>
							<input type="submit" name="checkout" value="Checkout Now" class="btn btn-primary">
						<?php } ?>
					</form>
				</td>
			</tr>
		</tfoot>
	</table>
	<br>	
</div>
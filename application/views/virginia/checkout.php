<br>
<div class="container">
	<ol class="breadcrumb" style="background: white">
		<ol class="breadcrumb" style="background: white">
			<li><a href="#">Home</a></li>
			<li><a href="<?=base_url()?>produk">Produk</a></li>
			<li>Checkout</li>
		</ol>
	</ol>
	<br>
	<div class="col-md-9">
		<center><strong><h3>Checkout Transaksi</h3></strong></center>
		<form method="post" action="<?=base_url()?>produk/order">
			<table class="table">
				<tr>
					<th>Nama Lengkap *</th>
					<td><input type="text" name="nama_pembeli" class="form-control" value="<?=$user['nama_lengkap']?>" required></td>
				</tr>
				<tr>
					<th>Email *</th>
					<td><input type="email" name="email" class="form-control" value="<?=$user['email']?>" required></td>
				</tr>
				<tr>
					<th>Alamat Lengkap *</th>
					<td><textarea name="alamat" class="form-control" rows="10" required></textarea></td>
				</tr>
				<tr>
					<th>Kode Pos *</th>
					<td><input type="text" name="kodepos" class="form-control" required></td>
				</tr>
				<tr>
					<th>Nomor Handphone</th>
					<td><input type="text" name="nohp" class="form-control"></td>
				</tr>
				<tr>
					<th>Tinggalkan Pesan</th>
					<td><textarea name="pesan" class="form-control" rows="10"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="order" value="Checkout Now" class="btn btn-primary"> <a href="<?=base_url()?>produk/cart" class="btn btn-primary">Batal</a></td>
				</tr>
			</table>
		</form>	
	</div>	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Order summary</h3>
			</div>
			<div class="panel-body">
				Shipping and additional costs are calculated based on the values you have entered.
			</div>
			<div class="panel-footer">Rp. <?php echo number_format($total['total']); ?></div>
		</div>
	</div>
</div>
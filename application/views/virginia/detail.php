<br>
<div class="container">
	<ol class="breadcrumb" style="background: white">
		<li><a href="<?=base_url()?>">Home</a></li>
		<li><a href="<?=base_url()?>produk">Produk</a></li>
		<li><a href="<?=base_url()?><?=$produkDetail['produk_slug']?>"><?=$produkDetail['nama_produk']?></a></li>
	</ol>
	<br>
	<div class="row">
		<div class="col-md-5">
			<a href="#" class="thumbnail">
      			<img src="<?=base_url()?>asset/upload/gambar_produk/<?=$produkDetail['gambar']?>" alt="...">
    		</a>
		</div>
		<div class="col-md-4">
			<div class="panel ">
				<div class="panel-heading panel-default"><strong>Product Detail</strong></div>
				<div class="panel-body">
					<form method="post" action="<?=base_url()?>produk/cart">
						<table class="table">
							<input type="hidden" name="id_produk" value="<?php echo $produkDetail['id_produk']; ?>">
							<tr>
								<th>Nama Produk</th>
								<td><?php echo $produkDetail['nama_produk']; ?></td>
							</tr>
							<tr>
								<th>Kategori</th>
								<td><a href="<?=base_url()?>"><strong><?php echo $produkDetail['nama_kategori']; ?></strong></a></td>
							</tr>
							<tr>
								<th>Harga</th>
								<td><?php echo "Rp ". number_format($produkDetail['harga_konsumen'],0); ?></td>
							</tr>
							<tr>
								<th>Stok</th>
								<td><?php echo $produkDetail['stok']; ?></td>
							</tr>
							<tr>
								<th>Deskripsi</th>
								<td><?php echo $produkDetail['keterangan']; ?></td>
							</tr>
							<tr>
								<th>Quantity</th>
								<td><input type="number" name="jumlah" value="1"></td>
							</tr>
							<tr>
								<td colspan="2">
									<?php if ($produkDetail['stok'] == 0) { ?>
										<button class="btn" style="background-color: #2ecc71; color: white;font-size: 12px;line-height: 28px;font-weight: 700;">Stok Habis</button>
									<?php } else { 
												if ($this->session->userdata('status') == 'userLoginSukses') { ?>
													<input type="submit" name="checkout" class="btn" value="Add to Chart" style="float: right; background-color: #2ecc71; color: white;font-size: 12px;line-height: 28px;font-weight: 700;">
												<?php } else { ?>
														<a href="<?=base_url()?>auth/login" class="btn" style="float: right; background-color: #2ecc71; color: white;font-size: 12px;line-height: 28px;font-weight: 700;">Add to Chart</a>
												<?php } ?>
									<?php } ?>
								</td>
							</tr>
						</table>
					</form>					
				</div>
			</div>
		</div>
		
	</div>

	<div class="row">
		<center><h1 class="lead" style="font-size: 40px">Lastest Produk</h1></center>
		<?php foreach ($produk as $p) { ?>
			<div class="col-md-3 col-sm-6" align="center">
				<div class="product-grid" style="border-radius: 60%; width: 200px;">
					<div class="product-image">
						<a href="#">
							<img class="pic-1" src="<?=base_url()?>asset/upload/gambar_produk/<?=$p['gambar']?>" style="border-radius: 60%; width: 200px">
							<img class="pic-2" src="<?=base_url()?>asset/upload/gambar_produk/<?=$p['gambar']?>" style="border-radius: 60%; width: 200px">
						</a>
						<a href="<?=base_url()?>produk/kategori/<?=$p['kategori_slug']?>"><span class="product-trend-label"><?=$p['nama_kategori']?></span></a>
						<ul class="social">
							<li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
							<li><a href="#" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
							<li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
							<li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
						</ul>
					</div>
					<div class="product-content">
						<h3 class="price"><strong><?=$p['nama_produk']?></strong></h3>
						<div class="price">
							<?php if ($p['diskon'] == '0' ) { ?>
								<strong><?php echo "Rp. ". number_format($p['harga_konsumen'],0); ?></strong>
							<?php } else { ?>
								<strike style="color: red"><?php echo "Rp. ". number_format($p['harga_konsumen'],0); ?></strike> <strong><?php echo "Rp. ". number_format($p['harga_konsumen'] * ($p['diskon'] / 100),0); ?></strong>
							<?php } ?>
						</div>
						<?php if ($p['stok'] == 0) { ?>
							<button class="btn" style="background-color: #2ecc71; color: white;font-size: 12px;line-height: 28px;font-weight: 700;">Stok Habis</button>
						<?php } else { ?>
							<a href="<?=base_url()?>produk/detail/<?=$p['produk_slug']?>" class="btn" style="background-color: #2ecc71; color: white;font-size: 12px;line-height: 28px;font-weight: 700;">Add to Cart</a>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

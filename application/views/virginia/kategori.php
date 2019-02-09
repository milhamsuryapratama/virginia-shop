
<br>
<div class="container">
  <div class="row" id="resultgambar">
    <center><h1 class="lead" style="font-size: 40px">Lastest Product On <?=$kat[0]['nama_kategori']?></h1></center>
    <?php foreach ($kat as $p) { ?>
      <div class="col-md-3 col-sm-6" align="center">
      <div class="product-grid" style="border-radius: 60%; width: 200px;">
        <div class="product-image">
          <a href="<?=base_url()?>kategori/<?=$p['kategori_slug']?>">
            <img class="pic-1" src="<?=base_url()?>asset/upload/gambar_produk/<?=$p['gambar']?>" style="border-radius: 60%; width: 200px">
            <img class="pic-2" src="<?=base_url()?>asset/upload/gambar_produk/<?=$p['gambar']?>" style="border-radius: 60%; width: 200px">
          </a>
          <a href="<?=base_url()?>kategori/v/<?=$p['kategori_slug']?>"><span class="product-trend-label"><?=$p['nama_kategori']?></span></a>
        </div>
        <div class="product-content" align="center">
          <h3 class="price"><strong><?=$p['nama_produk']?></strong></h3>
          <div class="price"><strong><?php echo "Rp. ". number_format($p['harga_konsumen'],0); ?></strong>
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
  <div><?php echo $halaman; ?></div>
</div>
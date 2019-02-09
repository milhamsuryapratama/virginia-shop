
<br>
<div class="container">
  <div class="row" id="resultgambar">
    <center><h1 class="lead" style="font-size: 40px">Lastest Produk</h1></center>
    <?php foreach ($produk as $p) { ?>
      <div class="col-md-3 col-sm-6" align="center">
      <div class="product-grid" style="border-radius: 60%; width: 200px;">
        <div class="product-image">
          <a href="#">
            <img class="pic-1" src="<?=base_url()?>asset/upload/gambar_produk/<?=$p['gambar']?>" style="border-radius: 60%; width: 200px">
            <img class="pic-2" src="<?=base_url()?>asset/upload/gambar_produk/<?=$p['gambar']?>" style="border-radius: 60%; width: 200px">
          </a>
          <a href="<?=base_url()?>kategori/v/<?=$p['kategori_slug']?>"><span class="product-trend-label"><?=$p['nama_kategori']?></span></a>
          <!-- <ul class="social">
            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
            <li><a href="#" data-tip="Wishlist"><i class="fa fa-heart"></i></a></li>
            <li><a href="#" data-tip="Compare"><i class="fa fa-random"></i></a></li>
            <li><a href="#" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
          </ul> -->
        </div>
        <div class="product-content" align="center">
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
    <center><?php echo $halaman; ?></center>
    <!-- <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav> -->
  </div>
</div>
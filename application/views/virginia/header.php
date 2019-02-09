<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="sumit kumar">
<title><?=$title?></title>
<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstraptiga.min.css" id="bootstrap-css">
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- <link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css" id="bootstrap-css"> -->


<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
<!-- <link href="css/font-awesome.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" href="<?=base_url('asset')?>/css/style.css">
<link rel="stylesheet" href="<?=base_url('asset')?>/css/stylebaru.css">
<script src="<?=base_url()?>asset/js/fontawesome.js"></script>
</head>
<!-- <style>
  body {
    background-color: #f0f0f0;
  }
</style> -->

<body>
  <!--=========-TOP_BAR============-->
  <nav class="topBar">
    <div class="container">
      <ul class="list-inline pull-left hidden-sm hidden-xs">
        <li><span class="text-primary">Have a question? </span> Call +120 558 7885</li>
      </ul>
      <ul class="topBarNav pull-right">       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
          <ul class="dropdown-menu w-150" role="menu">
            <?php if ($this->session->userdata('status') == 'userLoginSukses') { ?>
              <li><a>Halo <?=$this->session->userdata('namaUser')?></a></li>
            <?php } else { ?>
              <li><a href="<?=base_url()?>auth/login">Login</a>
              </li>
              <li><a href="<?=base_url()?>auth/register">Create Account</a>
              </li>
            <?php } ?>
            
            <li class="divider"></li>          
            <li><a href="<?=base_url()?>produk/cart">My Cart</a>
            </li>
            <?php if ($this->session->userdata('status') == 'userLoginSukses') { ?>
              <li><a href="<?=base_url()?>user/history">History</a></li>
              <li><a href="<?=base_url()?>auth/logout">Logout</a></li>
            <?php } ?>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-shopping-basket mr-5"></i> <span class="hidden-xs">
            Cart<sup class="text-primary">(<?=$jumlahCart?>)</sup>
            <i class="fa fa-angle-down ml-5"></i>
          </span> </a>
          <ul class="dropdown-menu cart w-250" role="menu">
            <li>
              <div class="cart-items">
                <ol class="items">
                  <?php foreach ($cart as $c) { ?>
                    <li>
                      <a href="<?=base_url()?>produk/detail/<?=$c['produk_slug']?>" class="product-image"> <img src="<?=base_url()?>asset/upload/gambar_produk/<?=$c['gambar']?>" class="img-responsive" alt="Sample Product "> </a>
                      <div class="product-details">
                        <div class="close-icon"> <a href="<?=base_url()?>produk/delete_cart/<?=$c['id_order_temp']?>"><i class="fa fa-close"></i></a> </div>
                        <p class="product-name"> <a href="<?=base_url()?>produk/detail/<?=$c['produk_slug']?>"><?=$c['nama_produk']?></a> </p> <strong><?=$c['jumlah']?></strong> x <span class="price text-primary"><?php echo "Rp. ". number_format($c['harga_konsumen'],0); ?></span> 
                      </div>
                      <!-- end product-details -->
                    </li>
                  <?php } ?>                
                </ol>
              </div>
            </li>
            <li>
              <div class="cart-footer"> <a href="<?=base_url()?>produk/cart" class="pull"><i class="fa fa-cart-plus mr-5"></i>View
              Cart</a></div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav><!--=========-TOP_BAR============-->

<!--=========MIDDEL-TOP_BAR============-->

<div class="middleBar">
  <div class="container">
    <div class="row display-table">
      <div class="col-sm-3 vertical-align text-left hidden-xs">
        <a href="<?=base_url()?>"> <img width="" src="https://lh3.googleusercontent.com/-r0Fhzz-so14/WNf9-4M65JI/AAAAAAAAD3E/ht6IhlL9gG4ujE2Hqiq70U3jBb6KQmaAQCL0B/w180-d-h43-p-rw/logo-2.png" alt=""></a>
      </div>
      <!-- end col -->
      <div class="col-sm-7 vertical-align text-center">
        <form method="get" action="<?=base_url()?>home/cari">
          <div class="row grid-space-1">
            <div class="col-sm-6">
              <input type="text" name="s" class="form-control input-lg" placeholder="Search">
            </div>
            <!-- end col -->
            <div class="col-sm-3">
              <select class="form-control input-lg" name="category">
                <option value="all">All Categories</option>
                <?php foreach ($kategori as $k) { ?>
                  <option value="<?=$k['id_kategori_produk']?>"><?=$k['nama_kategori']?></option>
                <?php } ?>             
              </select>
            </div>
            <!-- end col -->
            <div class="col-sm-3">
              <button type="submit" class="btn btn-default btn-block btn-lg">Cari</button>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </form>
      </div>
      <!-- end col -->
    </div>
    <!-- end  row -->
  </div>
</div>


<nav class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
  <div class="container">
    <!-- Brand and toggle -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>             
    </div>

    <!-- Collect the nav links,  -->
    <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">            
      <ul class="nav navbar-nav">
        <li><a href="<?=base_url()?>" class="dropdown-toggle">Home</a></li>
          
        <li class="dropdown megaDropMenu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Kategori <i class="fa fa-angle-down ml-5"></i></a>
          <ul class="dropdown-menu row">
            <?php foreach ($kategori as $k) { ?>
              <li class="col-sm-3 col-xs-12">
                <ul class="list-unstyled">
                  <li><a href="<?=base_url()?>kategori/v/<?=$k['kategori_slug']?>"><?=$k['nama_kategori']?></a></li>
                </ul>
              </li>
            <?php } ?>            
          </ul>
        </li>                
        <li><a href="<?=base_url()?>orders/konfirmasi">Konfirmasi</a></li>
        <li><a href="<?=base_url()?>orders/status">Cek Status Transaksi</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
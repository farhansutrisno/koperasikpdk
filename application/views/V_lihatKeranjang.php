<!doctype html>
<html class="no-js" lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="M_Adnan" />
<!-- Document Title -->
<title>Koperasi KPDK 12 Juli</title>

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url() ?>asset/images/logokpdk.jpg">
<link rel="icon" href="<?php echo base_url() ?>asset/images/logokpdk.jpg">

<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/rs-plugin/css/settings.css" media="screen" />

<!-- StyleSheets -->
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/main.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/style.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asset/css/responsive.css">

<!-- Fonts Online -->
<link href="https://fonts.googleapis.com/css?family=Lato:100i,300,400,700,900" rel="stylesheet">

<!-- JavaScripts -->
<script src="<?php echo base_url() ?>asset/js/vendors/modernizr.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<!-- Page Wrapper -->
<div id="wrap"> 
  <div id="notifications"><?php echo $this->session->flashdata('update1'); ?></div>
  <div id="notifications"><?php echo $this->session->flashdata('update2'); ?></div>
  <div id="notifications"><?php echo $this->session->flashdata('update3'); ?></div>
  <div id="notifications"><?php echo $this->session->flashdata('update4'); ?></div>
  <div id="notifications"><?php echo $this->session->flashdata('hapus1'); ?></div>
  <div id="notifications"><?php echo $this->session->flashdata('berat'); ?></div>
  
  <!-- Top bar -->
  <div class="top-bar">
    <div class="container">
      <p>Selamat Datang di Koperasi KPDK 12 Juli</p>
      <div class="right-sec">
        <ul>
         
        </ul>
       
      </div>
    </div>
  </div>
  
  <!-- Header -->
  <header>
    <div class="container">
      <div class="logo"> <a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk"><img src="<?php echo base_url() ?>asset/images/logokpdk.jpg" height="50px" width="60px" alt="" ></a> </div>
      <div class="search-cate">
       <form action="<?php echo base_url().'C_produkPembeli/pencarianLogin' ?>"  method="POST">
          <input type="text" name="data_produk" placeholder="Ketik untuk mencari">
          <button class="submit" type="submit" name="submit"><i class="icon-magnifier"></i></button>
        </form>
      </div>
      
      <!-- Cart Part -->
      <div class="nav navbar-right float-right list-inline">

          <ul class="nav navbar-left">
            <li class="dropdown"> 
               <a href="<?php echo base_url() ?>C_produkPembeli/lihatKeranjang"> <img src="<?php echo base_url() ?>asset/images/keranjang.png"  height="50px" width="60px"></a>
            </li>
          </ul>
          <ul class="nav navbar-right ">
              <li class="dropdown">
                <img src="<?php echo base_url() . 'gambar_proyek/'.$this->session->userdata('fotoProfil') ?>" height="50px" width="60px">
                <br> 
                <strong><?=$this->session->userdata('namaLengkap3')?></strong><span class="fa fa-sort-down white_bg"></span>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url() ?>C_dataAkun/lihatDataProfil" class="dropdown-item"> Profil</a></li>
                    <li><a href="<?=base_url('C_dataAkun/logout')?>" class="dropdown-item"> Logout</a></li>
                </ul>
              </li>
          </ul>
          <ul class="nav navbar-right ">
              <li class="dropdown">
                  <a href="<?php echo base_url() ?>C_transaksiProduk/allTransaksi"> <img src="<?php echo base_url() ?>asset/images/transaksi.png"  height="50px" width="60px"></a>    
              </li>
          </ul>
      </div>

    </div>
    
    <!-- Nav -->
    <nav class="navbar ownmenu">
      <div class="container"> 
        
        <!-- Categories -->
        <div class="cate-lst"> <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Kategori </a>
          <div class="cate-bar-in">
            <div id="cater" class="collapse">
              <ul>
                  <li><a href="<?php $kategori = "Makanan"; echo base_url('C_produkPembeli/makanan2/'.$kategori) ?>">Makanan</a></li>
                  <li><a href="<?php $kategori = "Minuman"; echo base_url('C_produkPembeli/makanan2/'.$kategori) ?>">Minuman</a></li>
                  <li><a href="<?php $kategori = "Makanan_Ringan"; echo base_url('C_produkPembeli/makanan2/'.$kategori) ?>">Makanan Ringan</a></li> 
                  <li><a href="<?php $kategori = "Alat_Kebersihan"; echo base_url('C_produkPembeli/makanan2/'.$kategori) ?>">Alat Kebersihan</a></li>
                  <li><a href="<?php $kategori = "Alat_Tulis"; echo base_url('C_produkPembeli/makanan2/'.$kategori) ?>"> Alat Tulis</a></li>
                  <li><a href="<?php $kategori = "Buku"; echo base_url('C_produkPembeli/makanan2/'.$kategori) ?>">Buku</a></li>
                  <li><a href="<?php $kategori = "Barang_UKM"; echo base_url('C_produkPembeli/makanan2/'.$kategori) ?>">Barang UKM</a></li>
                  <li><a href="<?php $kategori = "Lainnya"; echo base_url('C_produkPembeli/makanan2/'.$kategori) ?>">Lainnya</a></li>
                </ul>
            </div>
          </div>
        </div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-open-btn" aria-expanded="false"> <span><i class="fa fa-navicon"></i></span> </button>
        </div>
        
        <!-- NAV -->
        <div class="collapse navbar-collapse" id="nav-open-btn">
          <ul class="nav">
            <li class="dropdown megamenu"> <a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk">Produk Koperasi </a></li>
            <li class="dropdown"> <a href="<?php echo base_url() ?>webbackend/C_pesanMasuk/kirimPesan">Kontak</a></li>
          </ul>
        </div>
        
        <!-- NAV RIGHT -->
        <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hubungi:</strong>  (022) 733 2055 </span> </div>
      </div>
    </nav>
  </header>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">
        <ul class="row">
          
          <!-- Step 1 -->
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-shopping"></i> </div>
            <div class="media-body"> <span>Langkah 1</span>
              <h6>Keranjang</h6>
            </div>
          </li>
          
          <!-- Step 2 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-shopping-bag"></i> </div>
            <div class="media-body"> <span>Langkah 2</span>
              <h6>Data pembeli</h6>
            </div>
          </li>

          <!-- Step 3 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-business"></i> </div>
            <div class="media-body"> <span>Langkah 3</span>
              <h6>Data Pembayaran</h6>
            </div>
          </li>
          
          <!-- Step 4 -->
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Langkah 4</span>
              <h6>Data Transaksi</h6>
            </div>
          </li>
        </ul>

      </div>
    </div>
    
    <!-- Shopping Cart -->
    <section class="shopping-cart padding-bottom-60">
      <div class="container">

            <table class="table">
              <thead>
                <tr>
                  <th class="text-center">Produk</th>
                  <th class="text-center">Harga Satuan</th>
                  <th class="text-center">Jumlah Produk</th>
                  <th class="text-center">Harga Total</th>
                  <th class="text-center">Berat Produk</th>
                  <th class="text-center">Buang </th>
                </tr>
              </thead>
              <tbody>

                  <?php
                  $total_belanja = 0;
                  foreach ($produk as $item){
                        
                  $total_belanja = $total_belanja + $item->subtotal;
                  ?>

                  <!-- Item Cart -->
                  <tr>
                    <td>
                      <div class="media">
                        <div class="media-left"> 
                          <a href="#."> 
                            <img class="img-responsive" src="<?php echo base_url() . 'gambar_proyek/'.$item->gambar; ?>"/>
                          </a> 
                        </div>
                        <div class="media-body">
                          <p><?php echo $item->namaProduk; ?></p>
                        </div>
                      </div>
                    </td>
                    <td class="text-center padding-top-60">Rp. <?php echo number_format($item->harga, 0,",","."); ?></td>
                    <td class="text-center"><!-- Quinty -->
                      
                      <div class="quinty padding-top-20">
                        <!-- <input type="number" value="02"> -->
                        <!-- <form action="<?php echo base_url()?>C_produkPembeli/prosesUpdate" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="kdProduk" value="<?php echo $item->kdProduk;?>" />
                        <input type="hidden" name="harga" value="<?php echo $item->harga;?>" />
                        <input type="hidden" name="berat" value="<?php echo $item->berat;?>" />
                        <input type="number" class="form-control input-sm" name="qty" value="<?php echo $item->jml_produk;?>" />
                        </form> -->
                        <!-- style='width :30px; height: 30px' -->

        <!-- <a href="<?php echo base_url()?>C_produkPembeli/keranjangTambah/<?php echo $item->kdProduk.'/'.$item->jml_produk.'/'.$item->harga.'/'.$item->berat; ?>" class="remove"><i class="fa fa-plus-circle"></i></a> -->
        <form action="<?php echo base_url()?>C_produkPembeli/prosesUbahJumlah" method="post">

        <a href="<?php echo base_url()?>C_produkPembeli/keranjangTambah/<?php echo $item->kdProduk.'/'.$item->jml_produk.'/'.$item->harga.'/'.$item->berat.'/'.$item->kdKeranjang; ?>" class="remove"><i class="fa fa-plus-circle"></i></a>

          <input type="hidden" name="kdProduk" value="<?php echo $item->kdProduk;?>" />
          <input type="hidden" name="kdKeranjang" value="<?php echo $item->kdKeranjang;?>" />
          <input type="number" name="qty" value="<?php echo $item->jml_produk;?>" style='width :40px; height: 30px'/>
          <input type="hidden" name="harga" value="<?php echo $item->harga;?>" />
          <input type="hidden" name="berat" value="<?php echo $item->berat;?>" />
          <input type="hidden" name="subtotal" value="<?php echo $item->subtotal;?>" />
          
        <?php if($item->jml_produk == 1){ ?>
          <a href="#" class="remove"><i class="fa fa-minus-circle"></i></a>
        <?php }else{ ?>

        <a href="<?php echo base_url()?>C_produkPembeli/keranjangKurang/<?php echo $item->kdProduk.'/'.$item->jml_produk.'/'.$item->harga.'/'.$item->berat.'/'.$item->subtotal.'/'.$item->kdKeranjang; ?>" class="remove"><i class="fa fa-minus-circle"></i></a>

        <?php } ?>

        </form>
        <!-- <input type="number" name="qty" value="<?php echo $item->jml_produk;?>" style='width :40px; height: 30px'  readonly /> -->

        <!-- <?php if($item->jml_produk == 1){ ?>
          <a href="#" class="remove"><i class="fa fa-minus-circle"></i></a>
        <?php }else{ ?>

        <a href="<?php echo base_url()?>C_produkPembeli/keranjangKurang/<?php echo $item->kdProduk.'/'.$item->jml_produk.'/'.$item->harga.'/'.$item->berat.'/'.$item->subtotal; ?>" class="remove"><i class="fa fa-minus-circle"></i></a>

        <?php } ?> -->

                      </div>
                    </td>
                    <td class="text-center padding-top-60">Rp. <?php echo number_format($item->subtotal, 0,",",".") ?></td>
                    <td class="text-center padding-top-60"><?php echo $item->berat; ?> (KG)</td>
                    <td class="text-center padding-top-60"><a href="<?php echo base_url()?>C_produkPembeli/deleteProduk2/<?php echo $item->kdKeranjang;?>" class="remove"><i class="fa fa-close"></i></a></td>
                  </tr>
                  
                  <?php } ?>
              </tbody>
            </table>
            
            <!-- Promotion -->
            <div class="promo">
              <?php if ($keranjang > 0) { ?>
                  <b>* Pemberitahuan *</b><br>
                  Untuk tambah jumlah produk harap tekan tombol tambah + <br>
                  Untuk kurangi jumlah produk harap tekan tombol kurang - 
              <?php }else{ ?> 

              <?php } ?> 
              
              <!-- Grand total -->
              <div class="g-totel">
                <h5>Total Belanja: <span>Rp. <?php echo number_format($total_belanja, 0,",","."); ?></span></h5>
              </div>

            </div>
            
            <!-- Button -->

            <div class="pro-btn"> 
              <a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk" class="btn-round btn-light">Belanja Lagi</a>

              <?php if ($keranjang > 0) { ?>
                  <a href="<?php echo base_url() ?>C_dataAkun/inputDataPembelian" class="btn-round">Lanjutkan</a>
              <?php }else{ ?> 

              <?php } ?> 
            </div>

        </div>
    </section>
    
  <!-- End Content --> 
  
  <!-- Footer -->
  <footer>
    <div class="container">
      
      <div class="row"> 
        
        <!-- Contact -->
        <div class="col-md-4">
          <h4>Kontak Koperasi KPDK 12 Juli</h4>
          <p>Alamat: Komplek Dinas Koperasi dan Usaha Kecil Provinsi Jawa Barat Jl. Soekarno Hatta NO.705 Bandung</p>
          <p>No Telepon:  (022) 733 2055 </p>
          <!-- Social Links -->
          <div class="social-links"> <a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a> <a href="https://twitter.com/login" target="_blank"><i class="fa fa-twitter"></i></a> <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="fa fa-instagram"></i></a> </div>
        </div>
        
        <!-- <div class="col-md-3">
          <h4>Customer Services</h4>
          <ul class="links-footer">
            <li><a href="#."> Panduan Belanja</a></li>
            <li><a href="#."> Kontak </a></li>
          </ul>
        </div> -->
        
        <!-- Categories -->
        <!-- <div class="col-md-2">
          <h4>Informasi</h4>
          <ul class="links-footer">
            <li><a href="#."> Tentang Koperasi KPDK 12 Juli</a></li>
          </ul>
      </div> -->
    </div>
  </div>
  </footer>
  
  <!-- Rights -->
  <div class="rights">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p>Copyright ©Farhan Sutrisno 2019 | All rights reserved</p>
        </div>
       
      </div>
    </div>
  </div>
  
  <!-- End Footer --> 
  
  <!-- GO TO TOP  --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="<?php echo base_url() ?>asset/js/vendors/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url() ?>asset/js/vendors/wow.min.js"></script> 
<script src="<?php echo base_url() ?>asset/js/vendors/bootstrap.min.js"></script> 
<script src="<?php echo base_url() ?>asset/js/vendors/own-menu.js"></script> 
<script src="<?php echo base_url() ?>asset/js/vendors/jquery.sticky.js"></script> 
<script src="<?php echo base_url() ?>asset/js/vendors/owl.carousel.min.js"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="<?php echo base_url() ?>asset/rs-plugin/js/jquery.tp.t.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url() ?>asset/rs-plugin/js/jquery.tp.min.js"></script> 
<script src="<?php echo base_url() ?>asset/js/main.js"></script> 
<script src="<?php echo base_url() ?>asset/js/vendors/jquery.nouislider.min.js"></script> 
<script>
jQuery(document).ready(function($) {
  
  //  Price Filter ( noUiSlider Plugin)
    $("#price-range").noUiSlider({
    range: {
      'min': [ 0 ],
      'max': [ 1000 ]
    },
    start: [40, 940],
        connect:true,
        serialization:{
            lower: [
        $.Link({
          target: $("#price-min")
        })
      ],
      upper: [
        $.Link({
          target: $("#price-max")
        })
      ],
      format: {
      // Set formatting
        decimals: 2,
        prefix: '$'
      }
        }
  })
})

</script>
</body>
</html>
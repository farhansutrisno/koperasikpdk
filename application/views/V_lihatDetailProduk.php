<!doctype html>
<html class="no-js" lang="en">

<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="author" content="M_Adnan" />
      <!-- Document Title -->
      <title>koperasi KPDK 12 Juli</title>
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

      <!-- <link type="text/css" rel="stylesheet" href="<?=base_url()?>vendors/select2/css/select2.min.css" />
      <link type="text/css" rel="stylesheet" href="<?=base_url()?>css/pages/dataTables.bootstrap.css" />
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet"> -->

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
         <!-- Top bar -->
         <?php if ($this->session->userdata('nama') AND $this->session->userdata('pass')) { ?>

         <div class="top-bar">
            <div class="container">
               <p>Selamat Datang di koperasi KPDK 12 Juli</p>
            </div>
         </div>

         <?php }else{ ?>

        <div class="top-bar">
          <div class="container">
            <p>Selamat Datang di koperasi KPDK 12 Juli</p>
            <div class="right-sec">
              <ul>
                <li><a href="<?php echo base_url() ?>C_dataAkun/login">Login </a></li>
                <li><a href="<?php echo base_url() ?>C_dataAkun/createAkun">Buat AKun </a></li>
              </ul>
            </div>
          </div>
        </div>

        <?php } ?>
         <!-- Header -->
         <header>
          <?php if ($this->session->userdata('nama') AND $this->session->userdata('pass')) { ?>    

            <div class="container">
               <div class="logo"> <a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk"><img src="<?php echo base_url() ?>asset/images/logokpdk.jpg" height="50px" width="60px" alt="" ></a> </div>
               <div class="search-cate">
                  <form action="<?php echo base_url().'C_produkPembeli/pencarianLogin' ?>"  method="POST">
                    <input type="text" name="data_produk" placeholder="Ketik untuk mencari">
                    <button class="submit" type="submit" name="submit"><i class="icon-magnifier"></i></button>
                  </form>
               </div>
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

            <?php }else{ ?>

            <div class="container">
              <div class="logo"> <a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk"><img src="<?php echo base_url() ?>asset/images/logokpdk.jpg" height="50px" width="60px" alt="" ></a> </div>
              <div class="search-cate">
                <form action="<?php echo base_url().'C_produkPembeli/pencarianLogin' ?>"  method="POST">
                  <input type="text" name="data_produk" placeholder="Ketik untuk mencari">
                  <button class="submit" type="submit" name="submit"><i class="icon-magnifier"></i></button>
                </form>
              </div>
              <div class="nav navbar-right float-right list-inline">
                  <ul class="nav navbar-left">
                    <li class="dropdown"> 
                       <a href="<?php echo base_url() ?>C_dataAkun/login"> <img src="<?php echo base_url() ?>asset/images/keranjang.png"  height="50px" width="60px"></a>
                    </li>
                  </ul>
              </div>
            </div>

            <?php } ?>

            <!-- Nav -->
            <nav class="navbar ownmenu">
               <div class="container">
                  <!-- Categories -->
                  <div class="cate-lst">
                     <a  data-toggle="collapse" class="cate-style" href="#cater"><i class="fa fa-list-ul"></i> Kategori </a>
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
                  <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hubungi:</strong> (022) 733 2055 </span> </div>
                  <div class="nav-right"> </div>
               </div>
            </nav>
         </header>
         <!-- Linking -->
         
         <!-- Content -->
         <div id="content">
            <!-- Products -->
            <?php if ($this->session->userdata('nama') AND $this->session->userdata('pass')) { ?>

            <section class="padding-top-40 padding-bottom-60">
               <div class="container">
                  <div class="row">
                     <!-- Shop Side Bar -->
                     
                     <!-- Products -->
                     <div class="col-md-10">
                        <div class="product-detail">
                           <div class="product">

                              <div class="row">
                                 <!-- Slider Thumb -->
                                 <!-- <form method="post" action="<?php echo base_url();?>C_produkPembeli/tambah" method="post" enctype="multipart/form-data"> -->
                                  <div class="col-xs-3">
                                    <article class="slider-item on-nav">
                                              <div id="slider" class="flexslider">
                                                <ul class="slides">
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar ?>" alt="">
                                                  </li>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar2 ?>" alt="">
                                                  </li>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar3 ?>" alt="">
                                                  </li>
                                                  <?php if ($row[0]->gambar_pendukung == null) { ?>

                                                  <?php }else{ ?>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar_pendukung ?>" alt="">
                                                  </li>
                                                  <?php } ?>
                                                  
                                                </ul>
                                              </div>
                                              <div id="carousel" class="flexslider">
                                                <ul class="slides">
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar ?>" alt="">
                                                  </li>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar2 ?>" alt="">
                                                  </li>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar3 ?>" alt="">
                                                  </li>

                                                  <?php if ($row[0]->gambar_pendukung == null) { ?>

                                                  <?php }else{ ?>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar_pendukung ?>" alt="">
                                                  </li>
                                                  <?php } ?>
                                                  
                                                </ul>
                                              </div>
                                    </article>
                                 </div>
                                    <!-- <div class="col-xs-5">
                                      <article class="slider-item on-nav">
                                               <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar ?>">    
                                      </article>
                                    </div> -->
                                    <!-- Item Content -->
                                    <div class="col-xs-9">
                                       <span class="tags">Kategori&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $row[0]->kategori ?></span>
                                    <h5>Barang&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $row[0]->namaProduk ?></h5>
                                      
                                       <div class="row">
                                          <div class="col-sm-12"><span class="price">Harga Rp. <?php echo number_format($row[0]->hargaPenjualan,0,",","."); ?></span></div> 
                                       </div>
                                       <br>
                                       <!-- List Details -->
                                       <div class="table-responsive">
                                       <table class="table table-bordered table-striped" >
                                          <tr><th>Stok</th><td>: <?php echo $row[0]->stok ?></td></tr>
                                          <tr><th>Berat</th><td>: <?php echo $row[0]->berat ?>&nbsp;(Kg)</td></tr>
                                          <tr><th>Expired</th><td>: <?php echo $row[0]->expired ?></td></tr>
                                          <tr><th>Deskripsi</th><td>: <?php echo $row[0]->deskripsi ?></td></tr>
                                          <?php if ($row[0]->catatan_pendukung == null) { ?>

                                          <?php }else{ ?>
                                          <tr><th>Catatan Pendukung</th><td>: <?php echo $row[0]->catatan_pendukung ?></td></tr>
                                          <?php } ?>
                                          
                                          
                                      </table>
                                      </div>
                                       
                                       <!-- Quinty -->
                                       <!-- <div class="quinty">
                                          <input type="text" name="qty" value="1">
                                       </div> -->

                                      <!--  <input type="hidden" name="id" value="<?php echo $row[0]->kdProduk ?>" />
                                       <input type="hidden" name="nama" value="<?php echo $row[0]->namaProduk ?>" />
                                       <input type="hidden" name="harga" value="<?php echo $row[0]->hargaPenjualan ?>" />
                                       <input type="hidden" name="gambar" value="<?php echo $row[0]->gambar ?>" /> -->
                                       <!-- <input type="hidden" name="qty" value="1" /> -->
                                       <!-- <a href="#." class="btn-round"><i class="icon-basket-loaded margin-right-5"></i> Add to Cart</a>  -->
                                       <!-- <button type="submit" class="btn-round"><i class="icon-basket-loaded margin-right-5"></i> Tambah Ke Keranjang</button> -->

                       <?php if($row[0]->stok < 1){ ?>

                        <a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk1" class="btn-round"><i class="icon-basket-loaded margin-right-5"></i>Tambah Ke Keranjang</a>

                      <?php 
                      }else{
                      ?>
                        <form method="post" action="<?php echo base_url()?>C_produkPembeli/prosesTambah" method="post" enctype="multipart/form-data">
                        <!-- <div class="quinty">
                            <input type="number" name="qty" value="1">
                        </div> -->
                         <?php $kode = $this->session->userdata('kode'); 
                         $subtotal = $row[0]->hargaPenjualan * 1 ;?>

                        <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>" /> 
                        <input type="hidden" name="idAkun" value="<?php echo $kode; ?>" /> 
                        <input type="hidden" name="kdProduk" value="<?php echo $row[0]->kdProduk; ?>" />
                        <input type="hidden" name="namaProduk" value="<?php echo $row[0]->namaProduk; ?>" />
                        <input type="hidden" name="harga" value="<?php echo $row[0]->hargaPenjualan; ?>" />
                        <input type="hidden" name="gambar" value="<?php echo $row[0]->gambar; ?>" />
                        <input type="hidden" name="berat" value="<?php echo $row[0]->berat; ?>" />
                        <input type="hidden" name="qty" value="1" required />
                        <button type="submit" name="submit" class="btn-round"><i class="icon-basket-loaded margin-right-5"></i>Tambah Ke Keranjang</button>
                        </form>
                      <?php } ?> 
                                    </div>

                                <!--  </form> -->
                              </div>

                           </div>
                           <!-- Details Tab Section-->
                           
                        </div>
                        <!-- Related Products -->
                        
                     </div>
                  </div>
               </div>
            </section>

            <?php }else{ ?>

            <section class="padding-top-40 padding-bottom-60">
               <div class="container">
                  <div class="row">
                     
                     <!-- Products -->
                     <div class="col-md-10">
                        <div class="product-detail">
                           <div class="product">
                              <div class="row">
                                 <!-- Slider Thumb -->
                                 <div class="col-xs-3">
                                    <article class="slider-item on-nav">
                                              <div id="slider" class="flexslider">
                                                <ul class="slides">
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar ?>" alt="">
                                                  </li>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar2 ?>" alt="">
                                                  </li>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar3 ?>" alt="">
                                                  </li>

                                                  <?php if ($row[0]->gambar_pendukung == null) { ?>

                                                  <?php }else{ ?>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar_pendukung ?>" alt="">
                                                  </li>
                                                  <?php } ?>
                                                  
                                                </ul>
                                              </div>
                                              <div id="carousel" class="flexslider">
                                                <ul class="slides">
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar ?>" alt="">
                                                  </li>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar2 ?>" alt="">
                                                  </li>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar3 ?>" alt="">
                                                  </li>

                                                  <?php if ($row[0]->gambar_pendukung == null) { ?>

                                                  <?php }else{ ?>
                                                  <li>
                                                    <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar_pendukung ?>" alt="">
                                                  </li>
                                                  <?php } ?>
                                                  
                                                </ul>
                                              </div>
                                    </article>
                                 </div>
                                 <!-- <div class="col-xs-5">
                                    <article class="slider-item on-nav">
                                             <img class="img-responsive" src="<?php echo base_url().'gambar_proyek/'.$row[0]->gambar ?>">    
                                    </article>
                                 </div> -->
                                 <!-- Item Content -->
                                 <div class="col-xs-9">
                                    <span class="tags">Kategori&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $row[0]->kategori ?></span>
                                    <h5>Barang&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $row[0]->namaProduk ?></h5>
                                   
                                    <div class="row">
                                       <div class="col-sm-12"><span class="price">Harga Rp. <?php echo number_format($row[0]->hargaPenjualan,0,",","."); ?></span></div>
                                    </div>
                                    <br>
                                    <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                          <tr><th>Stok</th><td>: <?php echo $row[0]->stok ?></td></tr>
                                          <tr><th>Berat</th><td>: <?php echo $row[0]->berat ?> (Kg)</td></tr>
                                          <tr><th>Expired</th><td>: <?php echo $row[0]->expired ?> </td></tr>
                                          <tr><th>Deskripsi</th><td>: <?php echo $row[0]->deskripsi ?></td></tr>
                                          <?php if ($row[0]->catatan_pendukung == null) { ?>

                                          <?php }else{ ?>
                                          <tr><th>Catatan Pendukung</th><td>: <?php echo $row[0]->catatan_pendukung ?></td></tr>
                                          <?php } ?>
                                      </table>
                                    </div>
                                    <!-- Quinty -->
                                    <!-- <div class="quinty">
                                       <input type="text" value="1">
                                    </div> -->
                                    <a href="<?php echo base_url() ?>C_dataAkun/login" class="btn-round"><i class="icon-basket-loaded margin-right-5"></i> Tambah Ke Keranjang</a> 
                                 </div>
                              </div>
                           </div>
                           <!-- Details Tab Section-->
                           
                        </div>
                        <!-- Related Products -->
                        
                     </div>
                  </div>
               </div>
            </section>

            <?php } ?>
            <!-- Your Recently Viewed Items -->
            <?php if ($this->session->userdata('nama') AND $this->session->userdata('pass')) { ?>

            <section class="padding-bottom-60">
               <div class="container">
                  <!-- heading -->
                  <div class="heading">
                     <h2>Produk Terkait</h2>
                     <hr>
                  </div>
                  <!-- Items Slider -->
                  <div class="item-slide-5 with-nav">
                     <!-- Product -->

            <?php foreach ($produk as $key) { ?>
              <div class="product">
               
                  <article> <img width="100px" height="180px" src="<?php echo base_url() ?>gambar_proyek/<?php echo $key->gambar ?>" > 
                    <span class="tag"></span> <a href="<?php echo base_url().'C_produkPembeli/lihatDetailProduk/'.$key->kdProduk?>" class="tittle"><?php echo $key->namaProduk; ?></a> 
                    <br>
                    <div class="price">Rp. <?php echo number_format($key->hargaPenjualan,0,",","."); ?> </div>
                    <?php if($key->stok < 1){ ?>

                        <a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk1" class="cart-btn"><i class="icon-basket-loaded"></i></a>

                      <?php 
                      }else{
                      ?>
                        <form method="post" action="<?php echo base_url()?>C_produkPembeli/prosesTambah" method="post" enctype="multipart/form-data">

                         <?php $kode = $this->session->userdata('kode'); 
                         $subtotal = $key->hargaPenjualan * 1 ;?>

                        <input type="hidden" name="subtotal" value="<?php echo $subtotal; ?>" /> 
                        <input type="hidden" name="idAkun" value="<?php echo $kode; ?>" /> 
                        <input type="hidden" name="kdProduk" value="<?php echo $key->kdProduk; ?>" />
                        <input type="hidden" name="namaProduk" value="<?php echo $key->namaProduk; ?>" />
                        <input type="hidden" name="harga" value="<?php echo $key->hargaPenjualan; ?>" />
                        <input type="hidden" name="gambar" value="<?php echo $key->gambar; ?>" />
                        <input type="hidden" name="qty" value="1" />
                        <button type="submit" name="submit" class="cart-btn"><i class="icon-basket-loaded"></i></button>
                        </form>
                      <?php } ?> 
                 </article>
              
              </div>
            <?php } ?>      
                  </div>
               </div>
                           
            </section>
            
            <?php }else{ ?>

            <section class="padding-bottom-60">
               <div class="container">
                  <!-- heading -->
                  <div class="heading">
                     <h2>Produk Terkait</h2>
                     <hr>
                  </div>
                  <!-- Items Slider -->
                  <div class="item-slide-5 with-nav">
                     <?php foreach ($produk as $key) { ?>
                       <div class="product">
                         <article> <img width="100px" height="180px" src="<?php echo base_url() ?>gambar_proyek/<?php echo $key->gambar ?>" > 
                           <span class="tag"></span> <a href="<?php echo base_url().'C_produkPembeli/lihatDetailProduk/'.$key->kdProduk?>" class="tittle"><?php echo $key->namaProduk; ?></a> 
                           <br>
                           <div class="price">Rp. <?php echo number_format($key->hargaPenjualan,0,",","."); ?> </div>
                          <a href="<?php echo base_url() ?>C_dataAkun/login" class="cart-btn"><i class="icon-basket-loaded"></i></a>
                          </article>
                       </div>
                     <?php } ?>    
                  </div>
               </div>            
            </section>
            <?php } ?>
         </div>
         <!-- End Content --> 
         <!-- Footer -->
         <footer>
            <div class="container">
               <!-- Footer Upside Links -->
               
               <div class="row">
                  <!-- Contact -->
                  <div class="col-md-4">
                    <h4>Kontak Koperasi KPDK 12 Juli</h4>
                      <p>Alamat: Komplek Dinas Koperasi dan Usaha Kecil Provinsi Jawa Barat Jl. Soekarno Hatta NO.705 Bandung</p>
                      <p>No Telepon: (022) 733 2055 </p>
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
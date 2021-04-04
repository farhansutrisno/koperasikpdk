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
  <div id="notifications"><?php echo $this->session->flashdata('konfirmasi1'); ?></div> 
  <!-- Top bar -->
  <div class="top-bar">
    <div class="container">
      <p>Selamat Datang di Koperasi KPDK 12 Juli</p>   
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
        <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hubungi:</strong> (022) 733 2055 </span> </div>
      </div>
    </nav>
  </header>
  
  <!-- Content -->
  <div id="content"> 
    
    <!-- Ship Process -->
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">

        <ul class="row">
          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-shopping"></i> </div>
            <div class="media-body"> <span>Langkah 1</span>
              <h6>Keranjang</h6>
            </div>
          </li>
          
          <li class="col-sm-3 ">
            <div class="media-left"> <i class="flaticon-shopping-bag"></i> </div>
            <div class="media-body"> <span>Langkah 2</span>
              <h6>Data pembeli</h6>
            </div>
          </li>

          <li class="col-sm-3 ">
            <div class="media-left"> <i class="flaticon-business"></i> </div>
            <div class="media-body"> <span>Langkah 3</span>
              <h6>Data Pembayaran</h6>
            </div>
          </li>
          
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Langkah 4</span>
              <h6>Data Transaksi</h6>
            </div>
          </li>
        </ul>

      </div>
    </div>
    
    <!-- Payout Method -->
    <section class="padding-bottom-60">
      <div class="container"> 
        <!-- Payout Method -->
       <h5>Detail Transaksi</h5>
                
        <div class="pay-method check-out"> 

          <div class="row">
            <div class="col-md-6"> 
                <div class="heading">
                  <h2>Data Pembayaran</h2>
                  <hr>
                </div>
                
                <ul>
                  <h8>TOTAL BAYAR</h8>
                </ul>
                <ul class="row check-item">
                  <li class="col-xs-12">
                    <p> Rp.<?php echo  number_format($row[0]->totalBayar, 0,",","."); ?></p>
                    <b> *Bayar sampai 3 digit terakhir pada total bayar tujuan untuk verifikasi*</b>
                  </li>
                </ul>
                <div class="heading">
                  <h2>List Transfer Bank</h2>
                  <hr>
                </div>
                <ul class="row check-item">
                  <li class="col-xs-6">
                    <h8><b>BANK BRI</b></h8>
                    <p><img class="margin-right-20" src="<?php echo base_url() ?>asset/images/bri.jpg" height="70px" width="90px" alt=""></p>
                    <p>234 786 346 466</p>
                  </li>

                  <li class="col-xs-6">
                    <h8><b>BANK BCA</b></h8>
                    <p><img class="margin-right-20" src="<?php echo base_url() ?>asset/images/bca.jpg" height="70px" width="90px" alt=""></p>
                    <p>954 454 257 234</p>
                  </li>
                </ul>

                <ul class="row check-item">
                  <li class="col-xs-6">
                    <h8><b>BANK BNI</b></h8>
                    <p><img class="margin-right-20" src="<?php echo base_url() ?>asset/images/bni.jpg" height="70px" width="90px" alt=""></p>
                    <p>999 124 967 934</p>
                  </li>

                  <li class="col-xs-6">
                    <h8><b>BANK MANDIRI</b></h8>
                    <p><img class="margin-right-20" src="<?php echo base_url() ?>asset/images/mandiri.jpg" height="70px" width="90px" alt=""></p>
                    <p>888 965 444 534</p>
                  </li>
                </ul>

                <div class="row">
                    <div class="col-md-12">
                      <div class="heading">
                      <h2>Data Pembelian</h2>
                      <hr>
                    </div>
                      
                    
                    <ul>
                    <h8>NOMOR RESI</h8>
                    </ul>
                    <ul class="row check-item">
                      <li class="col-xs-12">
                        <p><?php echo $row[0]->noResi ?></p>
                      </li>
                    </ul>
                    <ul>
                      <h8>KODE PEMBAYARAN</h8>
                    </ul>
                    <ul class="row check-item">
                      <li class="col-xs-12">
                        <p><?php echo $row[0]->kdPembayaran ?></p>
                      </li>
                    </ul>
                    <ul>
                      <h8>JASA PENGIRIMAN</h8>
                    </ul>
                    <ul class="row check-item">
                      <li class="col-xs-12">
                        <p><?php echo $row[0]->kurir ?></p>
                      </li>
                      
                    </ul>
                    <ul>
                      <h8>BARANG</h8>
                    </ul>
                    <?php foreach ($produk as $produk1) { ?>          
                    
                    <ul class="row check-item">
                      <li class="col-xs-12">
                        <p><img src="<?php echo base_url() ?>gambar_proyek/<?php echo $produk1->gambar ?>" height="100px" width="100px" ></p>
                      </li>
                      <li class="col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                            <tr><th>Nama Produk</th><td><?php echo $produk1->namaProduk ?></td></tr>
                            <tr><th>Harga Satuan</th><td>Rp. <?php echo  number_format($produk1->hargaPenjualan, 0,",","."); ?></td></tr>
                            <tr><th>Jumlah Produk</th><td><?php echo $produk1->jml_produk ?></td></tr>
                            <tr><th>Harga Total</th><td>Rp. <?php echo  number_format($produk1->subtotal, 0,",","."); ?></td></tr>
                            <tr><th>Berat Total</th><td><?php echo $produk1->berat ?> (Kg)</td></tr>
                          </table>
                        </div>
                      </li>
                    </ul>
                    <?php } ?>            
                    </div>
                </div>

            </div>

            <div class="col-md-6"> 
              
                <ul>
                  <h8>BUKTI PEMBAYARAN</h8>
                </ul>
                <ul class="row check-item">
                  <li class="col-xs-12">
                    <!-- <p><?php echo $row[0]->kdPembayaran ?></p> -->
                    <!-- session dibawah ini untuk ubah transaksi -->
                    <?php
                      $kode = $row[0]->kdPembayaran;
                      $this->session->set_userdata('pembayaran',$kode); 
                    ?>
                  </li>
                  
                  <!-- <li class="col-xs-12"> -->
                    <img src="<?php echo base_url() ?>gambar_proyek/<?php echo $row[0]->strukPembayaran ?>" height="500px" width="450px" >
                  <!-- </li> -->
                  
                  <li class="col-xs-12">
                  <?php if ($row[0]->statusPembayaran == 'sudah dikirim') { ?>
                  
                  <?php }elseif($row[0]->statusPembayaran == 'sudah diterima'){ ?>
                    
                  <?php }else{ ?>
                    <br>
                    <p><b>* Upload Bukti Transaksi atau Struk Pembayaran* </b><br>
                      <p><b>*Format Foto/File = JPG/PNG/JPEG/GIF* </b><br><a href="<?php echo base_url().'C_transaksiProduk/konfirmasiPembayaran/'.$row[0]->kdPembayaran ?>" class="btn-round">Konfirmasi Pembayaran</a></p>
                  <?php } ?>
                  </li>
                  
                </ul>

                <ul>
                  <h8>STATUS TRANSAKSI</h8>
                </ul>
                <ul class="row check-item">
                  <li class="col-xs-12">
                    <p><?php echo $row[0]->statusPembayaran ?></p>
                  </li>
                  <li class="col-xs-12">
                  <?php if ($row[0]->statusPembayaran == 'sudah dikirim') { ?>
                      <br>
                      <p><b>* Harap Ganti Status Transaksi Jika Sudah Menerima Barang!!! * </b><br></p>

                      <form action="<?php echo base_url().'C_transaksiProduk/statusTerima'?>" method="post">
                        <div class="row">
                      <input type="hidden" name="terima" value="<?php echo $row[0]->kdPembayaran?>">
                            <div class="col-sm-6">
                              <select class="form-control" type="text" name="statusTerima" required>
                                <option>sudah diterima</option>
                              </select>
                            </div>      
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" name="submit" class="btn-round" align="left" value="S I M P A N"/>
                        </div>
                      </form>
                  <?php }else{ ?>
                    
                  <?php } ?>
                  </li>

                  <li class="col-xs-12">
                  <?php if ($row[0]->statusPembayaran == 'belum dibayar') { ?>
                      <br>
                      <p><b>* Harap Periksa Kembali Bukti Pembayaran nya!!! * </b><br></p>

                      <div class="table-responsive">
                          <table class="table table-bordered">
                            <tr><th>Catatan</th><td><?php echo $row[0]->catatan ?></td></tr>
                          </table>
                      </div>

                  <?php }else{ ?>
                    
                  <?php } ?>
                  </li>
                  
                </ul>
                
                <ul>
                  <h8>RINCIAN PEMBAYARAN</h8>
                </ul>
                <ul class="row check-item">
                  <li class="col-xs-6">
                    <p>Total Belanja</p>
                  </li>
                  <li class="col-xs-6">
                     <p>Rp.<?php echo  number_format($totalBelanja2, 0,",",".");  ?></p>
                  </li>
                  <li class="col-xs-6">
                    <p>Biaya kirim</p>
                  </li>
                  <li class="col-xs-6">
                     <p>Rp.<?php echo  number_format($row[0]->biayaKirim, 0,",",".");  ?></p>
                  </li>
                  <li class="col-xs-6">
                    <p>Kode Pembayaran </p>
                  </li>
                  <li class="col-xs-6">
                     <p><?php echo $row[0]->kodeUnik ?></p>
                  </li>
                  <li class="col-xs-6">
                    <p>Total Bayar</p>
                  </li>
                  <li class="col-xs-6">
                     <p>Rp.<?php echo   number_format($row[0]->totalBayar, 0,",","."); ?></p>
                  </li>
                </ul>
                <ul>
                  <h8>ALAMAT PENGIRIMAN</h8>
                </ul>
                <ul class="row check-item">
                  <li class="col-xs-6">
                    <p> <?php echo $profil[0]->namaLengkap ?></p>
                    <p> <?php echo $profil[0]->alamatLengkap ?></p>
                    <p> <?php echo $profil[0]->kelurahan ?>,<?php echo $profil[0]->kecamatan ?>, <?php echo $profil[0]->kota_kabupaten ?></p>
                    <p>  </p>
                    <p> <?php echo $profil[0]->provinsi ?>, <?php echo $profil[0]->kodePos ?></p>
                    <p> No Handphone : <?php echo $profil[0]->noTelepon ?></p>
                  </li>
                  <?php if ($row[0]->statusPembayaran == 'belum dibayar') { ?>
                      <li class="col-xs-12">
                          <?php echo anchor('C_transaksiProduk/ubahAlamat','Ubah Alamat',array('class'=>'btn-round'));?>
                      </li>
                  <?php }else{ ?>
                    
                  <?php } ?>
                </ul>

            </div>
          </div>
      
        <div class="pro-btn"> 
          <a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk" class="btn-round">Lihat Produk</a> 
        </div>

      </div>
    </section>
 
  </div>
  <!-- End Content --> 
  
  <!-- Footer -->
  <footer>
    <div class="container"> 
      
      <div class="row"> 
        
        <!-- Contact -->
        <div class="col-md-4">
          <h4>Kontak Koperasi KPDK 12 Juli</h4>
          <p>Alamat: Komplek Dinas Koperasi dan Usaha Kecil Provinsi Jawa Barat Jl. Soekarno Hatta NO.705 Bandung</p>
          <p>No Telepon: (022) 733 2055 </p>
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
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
  <div id="notifications"><?php echo $this->session->flashdata('info1'); ?></div> 
  <div id="notifications"><?php echo $this->session->flashdata('info2'); ?></div> 
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
  
  <div id="content"> 
  
    <div class="ship-process padding-top-30 padding-bottom-30">
      <div class="container">
        <ul class="row">
          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-shopping"></i> </div>
            <div class="media-body"> <span>Langkah 1</span>
              <h6>Keranjang</h6>
            </div>
          </li>
          
          <li class="col-sm-3 current">
            <div class="media-left"> <i class="flaticon-shopping-bag"></i> </div>
            <div class="media-body"> <span>Langkah 2</span>
              <h6>Data pembeli</h6>
            </div>
          </li>

          <li class="col-sm-3">
            <div class="media-left"> <i class="flaticon-business"></i> </div>
            <div class="media-body"> <span>Langkah 3</span>
              <h6>Data Pembayaran</h6>
            </div>
          </li>
          
          <li class="col-sm-3">
            <div class="media-left"> <i class="fa fa-check"></i> </div>
            <div class="media-body"> <span>Langkah 4</span>
              <h6>Data Transaksi</h6>
            </div>
          </li>
        </ul>
      </div>
    </div>
    
    <section class="padding-bottom-60">
      <div class="container"> 
       
        <div class="pay-method">
          <div class="row">
            <div class="col-md-6"> 
              
              <div class="heading">
                <h2>Data Pembeli</h2>
                <hr>
              </div>
              
             <form action="<?php echo base_url().'C_dataAkun/prosesUbahDataPembelian'?>" method="POST" name="ubahDataPembelian" >
                <input type="hidden" name="idAkun" value="<?php echo $dataPembeli[0]->idAkun?>">
                <div class="row"> 

                  <div class="col-sm-6">
                    <label>Nama Lengkap
                      <input type="text" class="form-control" name="namaLengkap" value="<?php echo $dataPembeli[0]->namaLengkap ?>" required>
                      <?php echo set_value('namaLengkap') ?><br><?php echo form_error('namaLengkap'); ?>
                    </label>
                  </div>
                  <div class="col-sm-6">
                    <label>No Telepon
                      <input type="text" class="form-control" name="noTelepon" value="<?php echo $dataPembeli[0]->noTelepon ?>" required>
                      <?php echo set_value('noTelepon') ?><br><?php echo form_error('noTelepon'); ?>
                    </label>
                  </div>
                  
                  <div class="col-sm-6">
                    <label>Kelurahan
                        <input type="text" class="form-control" name="kelurahan" value="<?php echo $dataPembeli[0]->kelurahan ?>" required >
                        <?php echo set_value('kelurahan') ?><br><?php echo form_error('kelurahan'); ?>
                    </label>
                  </div>

                  <div class="col-sm-6">
                    <label>Kecamatan
                        <input type="text" class="form-control" name="kecamatan" value="<?php echo $dataPembeli[0]->kecamatan ?>" required >
                        <?php echo set_value('kecamatan') ?><br><?php echo form_error('kecamatan'); ?>
                    </label>
                  </div>

                  <div class="col-sm-6">
                    <label>kota/kabupaten
                        <input type="text" class="form-control" name="kota_kab" value="<?php echo $dataPembeli[0]->kota_kabupaten ?>" required >
                        <?php echo set_value('kota_kab') ?><br><?php echo form_error('kota_kab'); ?>
                  </label>
                  </div>

                  <div class="col-sm-6">
                    <label>Provinsi
                        <select class="form-control" type="text" name="provinsi" required>
                          <option><?php echo $dataPembeli[0]->provinsi ?></option>
                          <option>Aceh</option>
                          <option>Sumatera Utara</option>
                          <option>Sumatera Barat</option>
                          <option>Riau</option>
                          <option>Jambi</option>
                          <option>Sumatera Selatan</option>
                          <option>Bengkulu</option>
                          <option>Lampung</option>
                          <option>Kepulauan Bangka Belitung</option>
                          <option>Kepulauan Riau</option>
                          <option>DKI Jakarta</option>
                          <option>Jawa Barat</option>
                          <option>Jawa Tengah</option>
                          <option>DI Yogyakarta</option>
                          <option>Jawa Timur</option>
                          <option>Banten</option>
                          <option>Bali</option>
                          <option>Nusa Tenggara Barat</option>
                          <option>Nusa Tenggara Timur</option>
                          <option>Kalimantan Barat</option>
                          <option>Kalimantan Tengah</option>
                          <option>Kalimantan Selatan</option>
                          <option>Kalimantan Utara</option>
                          <option>Kalimantan Timur</option>
                          <option>Sulawesi Utara</option>
                          <option>Sulawesi Tengah</option>
                          <option>Sulawesi Selatan</option>
                          <option>Sulawesi Tenggara</option>
                          <option>Sulawesi Barat</option>
                          <option>Gorontalo</option>
                          <option>Maluku</option>
                          <option>Maluku Utara</option>
                          <option>Papua</option>
                          <option>Papua Barat</option>
                    </select>
                    <?php echo set_value('provinsi') ?><br><?php echo form_error('provinsi'); ?>
                 </label>
                  </div>

                  <div class="col-sm-6">
                    <label>Kode Pos
                        <input type="number" class="form-control" name="kodePos" value="<?php echo $dataPembeli[0]->kodePos ?>" required>
                        <?php echo set_value('kodePos') ?><br><?php echo form_error('kodePos'); ?>
                  </label>
                  </div>

                  <div class="col-sm-6">
                    <label>Alamat Lengkap
                        <textarea required class="form-control" name="alamatLengkap"  rows="5"><?php echo $dataPembeli[0]->alamatLengkap ?></textarea>
                        <?php echo set_value('alamatLengkap') ?><br><?php echo form_error('alamatLengkap'); ?>
                  </label>
                  </div>
                </div>
                  <div class="pro-btn">
                    <?php echo anchor('C_dataAkun/inputDataPembelian','K E M B A L I',array('class'=>'btn-round btn-light'));?>
                    <input type="submit" name="submit" class="btn-round" value="S I M P A N"/>
                </div>
              </form>
            </div>
            
          </div>
        </div>
        
      </div>
    </section>
    
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
        
       <!--  <div class="col-md-3">
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
          <p>Copyright ??Farhan Sutrisno 2019 | All rights reserved</p>
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
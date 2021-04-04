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
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?=base_url();?>vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
<link href="<?php echo base_url()?>assets/date_picker_bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<!-- Fonts Online -->
<link href="https://fonts.googleapis.com/css?family=Lato:100i,300,400,700,900" rel="stylesheet">

<!-- JavaScripts -->
<script src="<?php echo base_url() ?>asset/js/vendors/modernizr.js"></script>

</head>
<body>

<!-- Page Wrapper -->
<div id="wrap"> 
  <div id="notifications"><?php echo $this->session->flashdata('akun2'); ?></div> 
  <div id="notifications"><?php echo $this->session->flashdata('msg3'); ?></div>
  <!-- Top bar -->
  <div class="top-bar">
    <div class="container">
      <p>Selamat Datang di koperasi KPDK 12 Juli</p>
      <div class="right-sec">
        <ul>
          <li><a href="<?php echo base_url() ?>C_dataAkun/login">Login </a></li>
          <li><a href="<?php echo base_url() ?>C_dataAkun/createAkun">Buat Akun </a></li>
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
             <a href="<?php echo base_url() ?>C_dataAkun/login"> <img src="<?php echo base_url() ?>asset/images/keranjang.png"  height="50px" width="60px"></a>
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

    <!-- <div class="linking">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url() ?>C_produkPembeli/lihatProduk">Beranda</a></li>
          <li class="active">Login</li>
        </ol>
      </div>
    </div> -->
    
    <section class="login-sec padding-top-30 padding-bottom-100">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
          <h5>Login Akun</h5>
            
            <!-- FORM -->
            <form action="<?php echo base_url().'C_dataAkun/prosesLogin'?>" method="POST" name="form1">
              <ul class="row">
                <li class="col-sm-12">
                  <label>Username
                    <input type="text" class="form-control" name="username"  required>
                  </label>
                </li>
                <li class="col-sm-12">
                  <label>Password
                    <input type="password" class="form-control" name="password" required>
                    
                  </label>
                </li>
               
                 <div class="col-lg-3" align="center">
                    <?php echo anchor('C_produkPembeli/lihatProduk','K E M B A L I',array('class'=>'form-control btn btn-round btn-info'));?>
                </div>
                <div class="col-lg-3 form-group" align="center">
                    <input type="submit" name="submit" class="form-control btn btn-round btn-success" value="L O G I N"/>
                </div> 
              </ul>
            </form>
          </div>
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
            <li><a href="#."> Login</a></li>
            <li><a href="#."> Buat Akun</a></li>
            <li><a href="#."> Kontak </a></li>
          </ul>
        </div> -->
        
        <!-- Categories -->
        <!-- <div class="col-md-2">
          <h4>Informasi</h4>
          <ul class="links-footer">
            <li><a href="#."> Tentang Koperasi KPDK 12 Juli</a></li>
            <li><a href="#."> Lokasi Koperasi</a></li>
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
          <p>Copyright © Farhan Sutrisno 2019 | All rights reserved</p>
        </div>
      
      </div>
    </div>
  </div>
  
  <!-- End Footer --> 
  
  <!-- GO TO TOP  --> 
  <a href="<?php echo base_url() ?>asset/#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
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

<script type="text/javascript" src="<?php echo base_url()?>assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript">
     $('.datepicker').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
        });
    </script> 

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
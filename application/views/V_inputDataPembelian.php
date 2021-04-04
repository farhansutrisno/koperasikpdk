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
  <div id="notifications"><?php echo $this->session->flashdata('ongkir2'); ?></div>
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
        <div class="nav-right"> <span class="call-mun"><i class="fa fa-phone"></i> <strong>Hubungi:</strong>  (022) 733 2055 </span> </div>
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
          
               <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                  <tr><th>Nama Pembeli</th><td><?php echo $dataPembeli[0]->namaLengkap ?></td></tr>
                  <tr><th>No Telepon</th><td><?php echo $dataPembeli[0]->noTelepon ?></td></tr>
                  <tr><th>Kelurahan</th><td><?php echo $dataPembeli[0]->kelurahan?></td></tr>
                  <tr><th>Kecamatan</th><td><?php echo $dataPembeli[0]->kecamatan ?></td></tr>
                  <tr><th>Kota/Kab</th><td><?php echo $dataPembeli[0]->kota_kabupaten ?></td></tr>
                  <tr><th>Provinsi</th><td><?php echo $dataPembeli[0]->provinsi ?></td></tr>
                  <tr><th>Alamat Lengkap</th><td><?php echo $dataPembeli[0]->alamatLengkap ?> </td></tr>
                  <tr><th>Kode Pos</th><td><?php echo $dataPembeli[0]->kodePos ?></td></tr>
                </table>
              </div>

            <div class="pro-btn">
                <?php echo anchor('C_dataAkun/ubahDataPembelian','Ubah Alamat',array('class'=>'btn-round'));?>
                
            </div>
           
            </div>

            <div class="col-md-6"> 
              <div class="heading">
                <h2>Ongkos Kirim</h2>
                <hr>
              </div>
              <!-- <input type="hidden" name="idAkun" value="<?php echo $dataPembeli['idAkun'] ?>" /> -->
               

              <!-- <div class="col-sm-6">
                    <label>Provinsi
                        <select class="form-control" type="text" name="provinsi" required>
                          <option><?php echo $dataPembeli['provinsi'] ?></option>
                    </select>
                 </label>
                  </div> -->

              <link rel="stylesheet" href="<?php echo base_url() ?>baru/assets/bootstrap/css/bootstrap.min.css">
              <link rel="stylesheet" href="<?php echo base_url() ?>baru/assets/bootstrap/css/bootstrap.css"/>

              <script src="<?php echo base_url() ?>baru/js/jquery.min.js"></script>
              <script src="<?php echo base_url() ?>baru/js/bootstrap.min.js"></script>


              <!-- <div class="input-group">
               <div class="input-group-append">
                  <span class="input-group-text">Berat(kg)</span>
                </div>
                <input type="number" value="1" min="1" class="form-control" id="berat" name="berat"> 
                <div class="input-group-append">
                  <span class="input-group-text"></span>
                </div>
              </div> -->

            <!-- <div class="form-group">  
              
            </div> -->

            <!-- <p>Lokasi Asal :</p>
            <div class="form-group">  
              <select class="form-control" id="sel1">
                <option value=""> Pilih Provinsi</option>            
              </select>
            </div>

            <div class="form-group">  
              <select class="form-control" id="sel2" disabled>
                <option value=""> Pilih Kota</option>            
              </select>
            </div> -->
            <p>Jumlah Berat Produk (KG)</p>
            <input type="number" value="<?php echo $berat ?>" class="form-control" style='width :80px; ' readonly>
            <p>Lokasi Tujuan : </p>

            <div class="form-group">  
              <select class="form-control" id="sel11" required>
                <option value=""> Pilih Provinsi</option>            
              </select>
            </div>

            <div class="form-group">  
              <select class="form-control" id="sel22" required>
                <option value=""> Pilih Kota</option>            
              </select>
            </div>

            <form action="<?php echo base_url()?>C_transaksiProduk/inputOngkir" method="POST" >
                <!-- <?php $total =  random_string('numeric', 3); ?>
                <input type="hidden" name="kodeUnik" value="<?php echo $total ?>" />
                <input type="hidden" name="idAkun" value="<?php echo $dataPembeli[0]->idAkun ?> ?>" /> -->
            <input type="hidden" value="<?php echo $berat ?>" class="form-control" id="berat" name="berat" readonly required>
            <div class="form-group">  
              <select class="form-control" id="kurir" name="kurir" required>
                <option value=""> Pilih Kurir</option>
                <option value="jne">JNE</option>
                <option value="tiki">TIKI</option>
                <option value="pos">POS Indonesia</option>
              </select>
            </div>

            <!-- div id="hasil"></div> -->

            <div class="form-group">  
              <select id="paket" class="form-control" name="paket" onchange="myFunction(this.options[this.selectedIndex].text)" required>
                <option> pilih paket ongkir</option>            
              </select>
              <input type="hidden" name="harga_ongkir" id="harga_ongkir" value="" required/>
              <input type="hidden" name="nama_kurir" id="nama_kurir" value="" required/>
            </div>
            <!-- <input type="text" class="form-control" id="demo" name="harga"> -->
            <div id="hasil"></div>
            <br>
            <div class="form-group">  
              <input type="submit" name="submit" class="btn-round" value="Lanjutkan"/>
              <!-- <a href="<?php echo base_url() ?>C_transaksiProduk/inputDataPembayaran" class="btn-round">Lanjutkan</a> -->
            </div>
            
          </form>
            <!-- <div class="form-group" >  
              <select class="form-control" id="hasil">
                <option value=""> hasil</option>            
              </select>
            </div>  -->

            <script type="text/javascript">
              
            function getLokasi() {
              var $op = $("#sel1"), $op1 = $("#sel11");
              
              $.getJSON("provinsi", function(data){  
                $.each(data, function(i,field){  
                
                   $op.append('<option value="'+field.province_id+'">'+field.province+'</option>'); 
                   $op1.append('<option value="'+field.province_id+'">'+field.province+'</option>'); 

                });
                
              });
             
            }

            getLokasi();

            $("#sel11").on("change", function(e){
              e.preventDefault();
              var option = $('option:selected', this).val();    
              $('#sel22 option:gt(0)').remove();
              $('#kurir').val('');

              if(option==='')
              {
                alert('null');    
                $("#sel22").prop("disabled", true);
                $("#kurir").prop("disabled", true);
              }
              else
              {        
                $("#sel22").prop("disabled", false);
                getKota1(option);
              }
            });


            $("#sel1").on("change", function(e){
              e.preventDefault();
              var option = $('option:selected', this).val();    
              $('#sel2 option:gt(0)').remove();
              $('#kurir').val('');

              if(option==='')
              {
                alert('null');    
                $("#sel2").prop("disabled", true);
                $("#kurir").prop("disabled", true);
              }
              else
              {        
                $("#sel2").prop("disabled", false);
                getKota(option);
              }
            });


            $("#sel22").on("change", function(e){
              e.preventDefault();
              var option = $('option:selected', this).val();    
              $('#kurir').val('');

              if(option==='')
              {
                alert('null');    
                $("#kurir").prop("disabled", true);
              }
              else
              {        
                $("#kurir").prop("disabled", false);    
              }
            });


            $("#kurir").on("change", function(e){
              e.preventDefault();
              var option = $('option:selected', this).val();    
              // var origin = $("#sel2").val();
              var des = $("#sel22").val();
              var qty = $("#berat").val();

              if(qty==='0' || qty==='')
              {
                alert('null');
              }
              else if(option==='')
              {
                alert('null');        
              }
              else
              {                
                getOrigin(des,qty,option);
              }
            });

            function showPrice(str) {
              var elm = $('#hasil');
              elm.html(str);
            }

            function getOrigin(des,qty,cour) {
              var $op = $("#hasil"); 
               var i, j, x = "";
              
              $.getJSON("tarif/"+des+"/"+qty+"/"+cour, function(data){     
                $.each(data, function(i,field){  
                  var harga_ongkir = document.getElementById('harga_ongkir');
                  var paket = $('#paket');
                  paket[0].disabled = false;
                  paket.html('');
                  paket.append('<option>pilih paket ongkir</option>')

                  for(i in field.costs)
                  {
                      x += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : "+field.costs[i].description+"</p>";

                      for (j in field.costs[i].cost) {
                             x += "Rp."+field.costs[i].cost[j].value +" &nbsp;("+field.costs[i].cost[j].etd+" &nbsp;hari kerja) "+field.costs[i].cost[j].note;
                         }
                    var option = document.createElement('option'); 
                    option.value = field.costs[i].cost[0].value;
                    //mempelajjari atribut dom dengan memasukan data yang sudah dipilih
                    // option.onclick = function() { document.getElementById('hasil').innerHTML = field.costs[i].cost[0].value };
                    
                    option.innerHTML = field.costs[i].service + ' - ' + field.costs[i].description+" - "+ "Rp."+field.costs[i].cost[0].value+" ("+field.costs[i].cost[j].etd+" hari kerja) ";
                    document.getElementById('paket').appendChild(option);

                  }



                  
                    //data sudah bisa dipakai tapi belum bisa di tampilkan 
                    
                     // paket.append(`<option value="${field.costs[i].cost[0].value}" onclick="showPrice('${field.costs[i].cost[0].value}')">${field.costs[i].service} : ${field.costs[i].description}</option>`);
                    // }
                    

                  //data kembaliannya dimasukan kedalam json encode kemudian ditampilkan dengan id 
                  // dan data ini dubuat 
                //$op.html(x);

                  // $op.append('<option value="'+field.service+'">'+field.description+'</option>');


                });
              });
             
            }

            function myFunction(nama_kurir) {
              var kurir = document.getElementById('kurir').value;
              var tes = document.getElementById('paket').value;
              document.getElementById('harga_ongkir').value=tes;
              document.getElementById('nama_kurir').value = kurir.toUpperCase()+" - "+nama_kurir;

            }

            function getKota1(idpro) {
              var $op = $("#sel22"); 
              
              $.getJSON("kota/"+idpro, function(data){      
                $.each(data, function(i,field){  
                
                   $op.append('<option value="'+field.city_id+'">'+field.type+' '+field.city_name+'</option>'); 

                });
                
              });
             
            }

            function getKota(idpro) {
              var $op = $("#sel2"); 
              
              $.getJSON("kota/"+idpro, function(data){      
                $.each(data, function(i,field){  
                
                   $op.append('<option value="'+field.city_id+'">'+field.type+' '+field.city_name+'</option>'); 

                });
                
              });
             
            }

            </script>
           
            </div>
          </div>

        </div>
        
        <!-- Button -->
        <div class="pro-btn"> 
          <a href="<?php echo base_url() ?>C_produkPembeli/lihatKeranjang" class="btn-round btn-light">Kembali</a> 
          
          <!-- <a href="<?php echo base_url() ?>C_transaksiProduk/inputDataPembayaran" class="btn-round">Lanjutkan</a>  -->
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
<script src="<?php echo base_url() ?>admin/js/data-table.js"></script>
  <!-- End custom js for this page-->
<!-- <script src="<?php echo base_url() ?>asset/js/vendors/jquery/jquery.min.js"></script>  -->
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
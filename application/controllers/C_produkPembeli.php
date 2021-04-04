<?php
class C_produkPembeli extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','table'));
		$this->load->library('pagination');
		$this->load->model('mod_dataProduk');
	}

	// public function index(){
 //        $data['produk'] = $this->mod_dataProduk->lihatDataProduk()->result();
 //        $data['barang_ukm'] = $this->mod_dataProduk->barang_ukm()->result();
 //        $this->load->view('V_homeFrontEnd2',$data);
 //    }
    
    //function dibawah tidak dipakai
	/*public function lihatProdukAwal(){
		$data['produk'] = $this->mod_dataProduk->lihatDataProduk()->result();
        $data['barang_ukm'] = $this->mod_dataProduk->barang_ukm()->result();
		$this->load->view('V_homeFrontEnd1',$data);
	}*/

    public function lihatProduk(){
        $data['produk'] = $this->mod_dataProduk->lihatDataProduk()->result();
        $data['barang_ukm'] = $this->mod_dataProduk->barang_ukm()->result();
        $data['terlaris'] = $this->mod_dataProduk->terlaris()->result();
        $this->load->view('V_homeFrontEnd2',$data);
    }

    public function lihatProduk1(){
        $this->session->set_flashdata('stok1', 
                    '<div class="alert alert-info fade in">    
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h7>Stok Tidak Tersedia </h7>
                        <p>Segera memilih produk untuk transaksi.<br/>
                        Terima kasih.</p>
                    </div>');

        $data['produk'] = $this->mod_dataProduk->lihatDataProduk()->result();
        $data['barang_ukm'] = $this->mod_dataProduk->barang_ukm()->result();
        $data['terlaris'] = $this->mod_dataProduk->terlaris()->result();
        $this->load->view('V_homeFrontEnd2',$data);
    }
	
	public function lihatDetailProduk(){
		$id 			= $this->uri->segment(3);
        $data["row"]    = $this->mod_dataProduk->lihatDetailProduk($id)->result();
		$data['produk'] = $this->mod_dataProduk->lihatDataProduk()->result();
		$this->load->view('V_lihatDetailProduk',$data);
	}

    //function dibawah ini tidak dipakai
	/*public function detailProdukLogin(){
		$id 			= $this->uri->segment(3);
        $data["row"] = $this->mod_dataProduk->lihatDetailProdukLogin($id)->result();
		$data['produk']  = $this->mod_dataProduk->lihatDataProduk()->result();
		$this->load->view('V_detailProdukLogin',$data);			
	}*/

	public function lihatKeranjang(){
        $data['produk']         = $this->mod_dataProduk->lihatKeranjang()->result();
        $jml                    = $this->mod_dataProduk->jmlKeranjang();
        $data['keranjang']      = $jml->jmlKeranjang;
		$this->load->view('V_lihatKeranjang',$data);
	}

	//=============================================================================================
	//keranjang coba bismillah

    public function validasi(){
        $uangmuka = $this->input->post('uangmuka');

        if ( $uangmuka >= $total) {
           $this->session->set_flashdata('update2', 
                    '<div class="alert alert-info ">    
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h7>Stok Kurang ! </h7>
                        <p>Gagal Mengubah Jumlah Produk</p>
                    </div>');
            redirect('C_produkPembeli/lihatProduk');

        } else if ($uangmuka <= 100000 ) {
           $this->session->set_flashdata('update2', 
                    '<div class="alert alert-info ">    
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h7>Stok Kurang ! </h7>
                        <p>Gagal Mengubah Jumlah Produk</p>
                    </div>');
            redirect('C_produkPembeli/lihatProduk');
        }

    }

    public function prosesTambah(){
            
            $subtotal       = $this->input->post('subtotal');
            $namaProduk     = $this->input->post('namaProduk');
            $kdProduk       = $this->input->post('kdProduk');
            $qty            = $this->input->post('qty');
            $idAkun         = $this->input->post('idAkun');
            $harga          = $this->input->post('harga');
            $gambar         = $this->input->post('gambar');
            $berat          = $this->input->post('berat');

            $produk = $this->mod_dataProduk->cekProduk($kdProduk)->result();

            if ($kdProduk == $produk[0]->kdProduk) {
                
                $cek = $this->mod_dataProduk->cekKeranjang($kdProduk)->result();

                if($qty >= $cek[0]->stok){

                    $this->session->set_flashdata('update2', 
                            '<div class="alert alert-info ">    
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h7>Stok Kurang ! </h7>
                                <p>Gagal Mengubah Jumlah Produk</p>
                            </div>');
                    redirect('C_produkPembeli/lihatProduk');

                }else{

                        $this->session->set_flashdata('tambah1', 
                        '<div class="alert alert-info ">    
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h7>BERHASIL MENAMBAHKAN PRODUK KE KERANJANG ! </h7>
                            <p>Terimakasih </p>
                        </div>');

                        $brt = $this->mod_dataProduk->cekBerat($kdProduk)->result();
                        $jml = $this->mod_dataProduk->cekJumlah($kdProduk)->result();

                        $jumlah = $jml[0]->jml_produk + $qty;
                        $beratProduk = $brt[0]->berat * $jumlah;

                        $data           = array(
                            "jml_produk"    => $jumlah,
                            "subtotal"      => $jumlah * $harga,
                            "berat"         => $beratProduk   
                        );
                        $this->mod_dataProduk->ubahData($data,$kdProduk);
                        redirect('C_produkPembeli/lihatProduk');

                }

            }else{

                $this->session->set_flashdata('tambah1', 
                        '<div class="alert alert-info ">    
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h7>BERHASIL MENAMBAHKAN PRODUK KE KERANJANG ! </h7>
                            <p>Terimakasih </p>
                        </div>');

                $data           = array(
                    "namaProduk"         => $namaProduk,
                    "kdProduk"           => $kdProduk,
                    "jml_produk"         => $qty,
                    "subtotal"           => $subtotal,
                    "idAkun"             => $idAkun,
                    "harga"              => $harga,
                    "gambar"             => $gambar,
                    "berat"              => $berat
                );

                $this->mod_dataProduk->prosesTambah($data);
                redirect('C_produkPembeli/lihatProduk');
            }
    }

    //function dibawah ini tidak dipakai
    /*public function prosesUpdate(){
        $qty            = $this->input->post('qty');
        $kdProduk       = $this->input->post('kdProduk');
        $harga          = $this->input->post('harga');
        $berat          = $this->input->post('berat');

        $cek = $this->mod_dataProduk->cekKeranjang($kdProduk)->result();

        if($qty >= $cek[0]->stok){
            $this->session->set_flashdata('update2', 
                    '<div class="alert alert-info ">    
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h7>Stok Kurang ! </h7>
                        <p>Gagal Mengubah Jumlah Produk</p>
                    </div>');
            redirect('C_produkPembeli/lihatKeranjang');
        }else{

            $jml = $this->mod_dataProduk->cekJumlah($kdProduk)->result();

            if ($qty > $jml[0]->jml_produk) {

                $this->session->set_flashdata('update1', 
                        '<div class="alert alert-info ">    
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h7>BERHASIL ! </h7>
                            <p>Berhasil Mengubah Jumlah Barang<br/></p>
                        </div>');
                
                // cara tambah tombol 
                //
                $data           = array(
                    "jml_produk"    => $qty,
                    "subtotal"      => $qty * $harga,
                    "berat"         => $qty * $berat    
                );
                $this->mod_dataProduk->prosesUpdate($data,$kdProduk);
                redirect('C_produkPembeli/lihatKeranjang');
            }else{

                $this->session->set_flashdata('update3', 
                        '<div class="alert alert-info ">    
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h7>BERHASIL ! </h7>
                            <p>Berhasil Mengubah Jumlah Barang<br/></p>
                        </div>');
                $brt = $this->mod_dataProduk->cekBerat($kdProduk)->result();

                $harga          = $this->input->post('harga');
                //cara make tombol kurang 1
                $beratAwal      = $jml[0]->berat - $brt[0]->berat;
                //-------------------------------------------------
                $beratAkhir     = $qty * $brt[0]->berat;

                $data           = array(
                    "jml_produk"    => $qty,
                    "subtotal"      => $qty * $harga,
                    "berat"         => $beratAwal   
                );
                $this->mod_dataProduk->prosesUpdate($data,$kdProduk);
                redirect('C_produkPembeli/lihatKeranjang');
            }

        }
        
    }*/

    public function keranjangTambah(){

        $kdProduk       = $this->uri->segment(3);
        $qty            = $this->uri->segment(4);
        $tambah         = 1; 
        $jumlah         = $qty + $tambah;
        $harga          = $this->uri->segment(5);
        $berat          = $this->uri->segment(6);
        $kdKeranjang    = $this->uri->segment(7);

        $cek = $this->mod_dataProduk->cekKeranjang($kdProduk)->result();

        if($qty >= $cek[0]->stok){

            $this->session->set_flashdata('update2', 
                    '<div class="alert alert-info ">    
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h7>Stok Kurang ! </h7>
                        <p>Gagal Mengubah Jumlah Produk</p>
                    </div>');
            redirect('C_produkPembeli/lihatKeranjang');

        }else{

                $this->session->set_flashdata('update1', 
                        '<div class="alert alert-info ">    
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h7>BERHASIL ! </h7>
                            <p>Berhasil Mengubah Jumlah Barang<br/></p>
                        </div>');
                $brt = $this->mod_dataProduk->cekBerat($kdProduk)->result();
                $beratProduk = $brt[0]->berat * $jumlah;
                $data           = array(
                    "jml_produk"    => $jumlah,
                    "subtotal"      => $jumlah * $harga,
                    "berat"         => $beratProduk    
                );
                $this->mod_dataProduk->prosesUpdate($data,$kdKeranjang);
                redirect('C_produkPembeli/lihatKeranjang');

        }
        
    }

    //function tambahan revisi
    public function prosesUbahJumlah(){
        $kdKeranjang        = $this->input->post('kdKeranjang');
        $kdProduk           = $this->input->post('kdProduk');
        $qty                = $this->input->post('qty'); 
        $jumlah             = $qty;
        $harga              = $this->input->post('harga');
        $berat              = $this->input->post('berat');
        $subtotal           = $this->input->post('subtotal');
        $subtotal_kurang    = $subtotal - $harga;

        if($qty <= 0){
            $this->session->set_flashdata('update4', 
                        '<div class="alert alert-danger ">    
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h7>PERINGATAN ! </h7>
                            <p>Harap memasukan data dengan benar<br/></p>
                        </div>');
            redirect('C_produkPembeli/lihatKeranjang');

        }else{

            $produk = $this->mod_dataProduk->jumlahProduk($kdProduk)->result();

            if($qty > $produk[0]->jml_produk){
                
                $cek = $this->mod_dataProduk->cekKeranjang($kdProduk)->result();

                if($qty >= $cek[0]->stok){

                    $this->session->set_flashdata('update2', 
                            '<div class="alert alert-info ">    
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h7>Stok Kurang ! </h7>
                                <p>Gagal Mengubah Jumlah Produk</p>
                            </div>');
                    redirect('C_produkPembeli/lihatKeranjang');

                }else{

                        $this->session->set_flashdata('update1', 
                                '<div class="alert alert-info ">    
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <h7>BERHASIL ! </h7>
                                    <p>Berhasil Mengubah Jumlah Barang<br/></p>
                                </div>');
                        $brt = $this->mod_dataProduk->cekBerat($kdProduk)->result();
                        $beratProduk = $brt[0]->berat * $jumlah;
                        $data           = array(
                            "jml_produk"    => $jumlah,
                            "subtotal"      => $jumlah * $harga,
                            "berat"         => $beratProduk    
                        );
                        $this->mod_dataProduk->prosesUpdate($data,$kdKeranjang);
                        redirect('C_produkPembeli/lihatKeranjang');

                }

            }elseif($qty < $produk[0]->jml_produk){

                $this->session->set_flashdata('update1', 
                    '<div class="alert alert-info ">    
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <h7>BERHASIL ! </h7>
                        <p>Berhasil Mengubah Jumlah Barang<br/></p>
                    </div>');
                $brt = $this->mod_dataProduk->cekBerat($kdProduk)->result();
                $beratProduk = $berat -  $brt[0]->berat;
                $data           = array(
                    "jml_produk"    => $jumlah,
                    "subtotal"      => $subtotal_kurang,
                    "berat"         => $beratProduk    
                );
                $this->mod_dataProduk->prosesUpdate($data,$kdKeranjang);
                redirect('C_produkPembeli/lihatKeranjang');

            }elseif($qty == $produk[0]->jml_produk){
                redirect('C_produkPembeli/lihatKeranjang');
            }

        }
        
    }

    public function keranjangKurang(){

        $kdProduk           = $this->uri->segment(3);
        $qty                = $this->uri->segment(4);
        $kurang             = 1; 
        $jumlah             = $qty - $kurang;
        $harga              = $this->uri->segment(5);
        $berat              = $this->uri->segment(6);
        $subtotal           = $this->uri->segment(7);
        $kdKeranjang        = $this->uri->segment(8);
        $subtotal_kurang    = $subtotal - $harga;

        // $cek = $this->mod_dataProduk->cekKeranjang($kdProduk)->result();

        // if($qty >= $cek[0]->stok){

        //     $this->session->set_flashdata('update2', 
        //             '<div class="alert alert-info ">    
        //             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        //             <h7>Stok Kurang ! </h7>
        //                 <p>Gagal Mengubah Jumlah Produk</p>
        //             </div>');
        //     redirect('C_produkPembeli/lihatKeranjang');

        // }else{

        $this->session->set_flashdata('update1', 
                '<div class="alert alert-info ">    
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h7>BERHASIL ! </h7>
                    <p>Berhasil Mengubah Jumlah Barang<br/></p>
                </div>');
        $brt = $this->mod_dataProduk->cekBerat($kdProduk)->result();
        $beratProduk = $berat -  $brt[0]->berat;
        $data           = array(
            "jml_produk"    => $jumlah,
            "subtotal"      => $subtotal_kurang,
            "berat"         => $beratProduk    
        );
        $this->mod_dataProduk->prosesUpdate($data,$kdKeranjang);
        redirect('C_produkPembeli/lihatKeranjang');

        //}
        
    }

    public function deleteProduk2($kdKeranjang){
        $this->session->set_flashdata('hapus1', 
                        '<div class="alert alert-info ">    
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h7>BERHASIL ! </h7>
                            <p>Berhasil Menghapus Produk</p>
                        </div>');
        $this->mod_dataProduk->deleteProduk($kdKeranjang);
        redirect('C_produkPembeli/lihatkeranjang');
    }

    //function dibawah ini tidak dipakai
    /*public function pencarian(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/pencarian'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $data['produk'] = $this->mod_dataProduk->lihatDataProduk2($config["per_page"], $data['page'])->result();
        $this->load->view('V_pencarian',$data);
    }*/

    public function pencarianLogin(){
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/pencarianLogin'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $data['produk'] = $this->mod_dataProduk->lihatDataProduk2($config["per_page"], $data['page'])->result();

        $this->load->view('V_pencarianLogin',$data);
    }

    //function dibawah ini tidak dipakai
    /*public function makanan(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/makanan'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_makanan($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarian',$data);
    }*/

    //function dibawah ini tidak dipakai
    /*public function minuman(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/minuman'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_minuman($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarian',$data);
    }*/

    //function dibawah ini tidak dipakai
    /*public function makanan_ringan(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/makanan_ringan'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_ringan($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarian',$data);
    }*/

    //function dibawah ini tidak dipakai
    /*public function alat_kebersihan(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/alat_kebersihan'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_kebersihan($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarian',$data);
    }*/

    //function dibawah ini tidak dipakai
    /*public function alat_tulis(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/alat_tulis'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_tulis($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarian',$data);
    }*/

    //function dibawah ini tidak dipakai
    /*public function buku(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/buku'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_buku($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarian',$data);
    }*/

    //function dibawah ini tidak dipakai
    /*public function barang(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/barang'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_barang($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarian',$data);
    }*/

    //function dibawah ini tidak dipakai
    /*public function lainnya(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/lainnya'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_lain($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarian',$data);
    }*/

    public function makanan2(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/makanan'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_makanan($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarianLogin',$data);
    }

    /*public function minuman2(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/minuman'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_minuman($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarianLogin',$data);
    }

    public function makanan_ringan2(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/makanan_ringan'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_ringan($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarianLogin',$data);
    }

    public function alat_kebersihan2(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/alat_kebersihan'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_kebersihan($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarianLogin',$data);
    }

    public function alat_tulis2(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/alat_tulis'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_tulis($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarianLogin',$data);
    }

    public function buku2(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/buku'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_buku($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarianLogin',$data);
    }

    public function barang2(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/barang'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_barang($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarianLogin',$data);
    }

    public function lainnya2(){
       
        //konfigurasi pagination
        $config['base_url'] = site_url('C_produkPembeli/lainnya'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['pag'] = $this->pagination->create_links();
        $kategori  = $this->uri->segment(3);
        $data['produk'] = $this->mod_dataProduk->kategori_lain($config["per_page"], $data['page'],$kategori)->result();
        $this->load->view('V_pencarianLogin',$data);
    }*/
}

?>
<?php
class C_transaksiProduk extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','table'));
		$this->load->library('pagination');
		$this->load->model('mod_dataPembelian');
	}

	public function inputDataPembayaran(){
		$jml 			 		= $this->mod_dataPembelian->jumlahBayar();
		$data['totalBelanja'] 	= $jml->jumlahBayar;
		$data["data"] 			= $this->mod_dataPembelian->inputDataPembayaran()->result();
		$this->load->view('V_inputDataPembayaran',$data);
	}

	public function prosesInputPembayaran(){
		if($this->input->post("submit")){
			$this->session->set_flashdata('pembayaran1', 
		                '<div class="alert alert-info ">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>BERHASIL ! </h7>
		                    <p>Harap Segera Dibayar Dan Lanjutkan Transaksi <br>
		                    	Tekan Tombol Lanjutkan Transaksi </p>
		                </div>');
			$this->mod_dataPembelian->inputPembayaran();
			
			redirect('C_transaksiProduk/lihatTagihan');
		}else{
			$this->session->set_flashdata('pembayaran2', 
		                '<div class="alert alert-danger">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>Erorr Pembayaran ! </h7>
		                   
		                </div>');
			redirect('C_transaksiProduk/inputDataPembayaran');
		}
	}

	public function inputOngkir(){

		$this->form_validation->set_rules('nama_kurir','nama kurir','trim|required|min_length[2]');
		$this->form_validation->set_rules('harga_ongkir','harga ongkir','trim|required|min_length[3]|numeric');

	    if(isset($_POST['submit'])){
		    if($this->form_validation->run() == false){

		    	$this->session->set_flashdata('ongkir2', 
		                '<div class="alert alert-danger">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>Jasa Pengiriman Harus Diisi Dengan Lengkap ! </h7>
		                   
		                </div>');

				redirect('C_dataAkun/inputDataPembelian');

		    }
		    else{

		        $this->session->set_flashdata('ongkir2', 
		                '<div class="alert alert-info ">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>BERHASIL MEMILIH PAKET ONGKIR</h7>
		                    <p>Harap Segera Dibayar </p>
		                </div>');
				$this->mod_dataPembelian->inputOngkir();
				redirect('C_transaksiProduk/inputDataPembayaran');

		    }
		}

		/*if($this->input->post("submit")){
			$this->session->set_flashdata('ongkir1', 
		                '<div class="alert alert-info ">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>BERHASIL MEMILIH PAKET ONGKIR</h7>
		                    <p>Harap Segera Dibayar </p>
		                </div>');
			$this->mod_dataPembelian->inputOngkir();
			redirect('C_transaksiProduk/inputDataPembayaran');
		}else{
			$this->session->set_flashdata('ongkir2', 
		                '<div class="alert alert-danger">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>Erorr Pembayaran ! </h7>
		                   
		                </div>');
			redirect('C_transaksiProduk/inputDataPembayaran');
		}*/
	}

	//function di bawah ini tidak dipakai
	/*public function lihatDataTransaksi(){
		$id   = $this->session->userdata('kdPembayaran');
		$kode = $this->session->userdata('kode');
		
		$data["row"] = $this->mod_dataPembelian->lihatData2($id)->result();
		
		$data["profil"] = $this->mod_dataPembelian->lihatData($kode)->result();
		$this->load->view('V_lihatDataTransaksi',$data);
	}*/

	public function lihatTagihan(){
		$data['row'] = $this->mod_dataPembelian->lihatTagihan()->result();
		$this->load->view('lihatTagihan',$data);
	}

	public function ubahAlamat(){
		$id = $this->session->userdata('kode');
		$data["dataPembeli"] = $this->mod_dataPembelian->ubahAlamat($id)->result();
		$pembayaran = $this->session->userdata('pembayaran');
		$data["pembayaran"] 	= $this->mod_dataPembelian->ubahAlamat2($pembayaran)->result();
		$this->load->view('V_ubahAlamat',$data);
	}

	public function prosesUbahAlamat(){
	    $this->form_validation->set_rules('kelurahan','kelurahan','required|min_length[4]');
	    /*$this->form_validation->set_rules('kecamatan','kecamatan','required|min_length[4]');
	    $this->form_validation->set_rules('kota_kab','kota/kabupaten','required|min_length[4]');
	    $this->form_validation->set_rules('provinsi','provinsi','required|min_length[4]');*/
	    $this->form_validation->set_rules('alamatLengkap','alamat lengkap','required|min_length[6]');
	    $this->form_validation->set_rules('kodePos','kode pos','required|min_length[4]|numeric');

	    if(isset($_POST['submit'])){
		    if($this->form_validation->run() == false){

		    	$pembayaran 			= $this->session->userdata('pembayaran');
		    	$data["pembayaran"] 	= $this->mod_dataPembelian->ubahAlamat2($pembayaran)->result();
		    	$id 					= $this->input->post('idAkun');
		        $data["dataPembeli"] 	= $this->mod_dataPembelian->ubahAlamat($id)->result();
				$this->load->view('V_ubahAlamat',$data);

		    }
		    else{
		        
		    	$this->mod_dataPembelian->prosesUpdateAlamat();
	        	$this->session->set_flashdata('ubah1', 
			                '<div class="alert alert-info ">    
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h7>BERHASIL ! </h7>
			                    <p>Berhasil mengupdate alamat pengiriman</p>
			                </div>');
				
				redirect('C_transaksiProduk/ubahAlamat');

		    }
		}	
	
	}

	public function statusTerima(){
		
	        $this->mod_dataPembelian->statusTerima();
	        $this->session->set_flashdata('terima', 
			                '<div class="alert alert-info ">    
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h7>BERHASIL ! </h7>
			                    <p>Pesanan Sudah Diterima Yah !!</p><br>
			                    <p>Yuk Belanja Lagi...</p>
			                </div>');
				
			redirect('C_transaksiProduk/allTransaksi');
	}

	public function konfirmasiPembayaran(){
	
		//session dibawah ini coba transaksi
		$id 			= $this->uri->segment(3);
		$pembayaran = $this->session->userdata('pembayaran');
		
		$data["pembayaran"] = $this->mod_dataPembelian->konfirmasiPembayaran($pembayaran)->result();

		$this->load->view('V_konfirmasiPembayaran',$data);
	}

	public function prosesKonfirmasiPembayaran(){
		
			$id = $this->input->post('kdPembayaran');;
			
			$config['upload_path']='./gambar_proyek/';
	        $config['allowed_types']='jpg|png|jpeg|gif';
	        $config['max_size'] = 5000000;
	        $this->load->library('upload',$config);
	        $this->upload->do_upload();
	        $data   =  $this->upload->data();

	        $this->mod_dataPembelian->prosesKonfirmasiPembayaran($data['file_name']);

	        $this->session->set_flashdata('konfirmasi1', 
			                '<div class="alert alert-info ">    
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h7>BERHASIL ! </h7>
			                    <p>Berhasil konfirmasi pembayaran</p>
			                </div>');
				
			$stok = $this->mod_dataPembelian->kurangStok($id)->result_array();
			foreach ($stok as $stok1) {
				$sisa = $stok1['stok'] - $stok1['jml_produk'];
				$produk = $stok1['kdProduk'];
				$dataStok = array(
									'stok'	=> $sisa
								);
				$this->mod_dataPembelian->updateStok($dataStok,$produk,$id);
			}
			redirect('C_transaksiProduk/konfirmasiPembayaran');
		
	}

	//kedua ini coba transaksi baru
	public function allTransaksi(){
		//konfigurasi pagination
        $config['base_url'] = site_url('C_transaksiProduk/allTransaksi'); //site url
        $config['total_rows'] = $this->db->count_all('pembelian'); //total row
        $config['per_page'] = 5;  //show record per halaman
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
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
                 
        $data['pag'] = $this->pagination->create_links();
		$data['pembayaran'] = $this->mod_dataPembelian->sessionTransaksi($config["per_page"], $data['page'])->result();
		$this->load->view('webbackend/V_allTransaksi',$data);
	}

	public function lihatTransaksi(){
		$id 			= $this->uri->segment(3);
		$kode = $this->session->userdata('kode');

		$data["produk"] = $this->mod_dataPembelian->dataProduk($id)->result();
		$data["row"] = $this->mod_dataPembelian->lihatTransaksi($id)->result();
		
		$data["profil"] = $this->mod_dataPembelian->lihatTransaksi2($kode)->result();
		$jml 			 		= $this->mod_dataPembelian->jumlahBayar2($id);
		$data['totalBelanja2'] 	= $jml->jumlahBayar2;
		$this->load->view('V_Transaksi',$data);
	}
	
	public function lihatTransaksi2(){
		$id 			= $this->uri->segment(3);
		$kode = $this->session->userdata('kode');
		
		$order = $this->mod_dataPembelian->inputTransaksi($id)->result_array();
		foreach ($order as $key) {
			
			$dataTransaksi = array(
								'idAkun'			=> $key['idAkun'],
								'kdProduk'			=> $key['kdProduk'],
								'jml_produk'		=> $key['jml_produk'],
								'berat'				=> $key['berat'],
								'subtotal'			=> $key['subtotal'],
								'totalBayar'		=> $key['totalBayar'],
								'kurir'				=> $key['kurir'],
								'biayaKirim'		=> $key['biayaKirim'],
								'kdPembayaran'		=> $key['kdPembayaran'],
								'kodeUnik'			=> $key['kodeUnik'],
								'tglTransaksi'		=> date("Y-m-d"),
								'statusPembayaran' 	=> 'belum dibayar');
			$this->mod_dataPembelian->inputDataOrder($dataTransaksi);
		}
		
		$data["produk"] = $this->mod_dataPembelian->dataProduk($id)->result();
		$data["row"] = $this->mod_dataPembelian->lihatTransaksi($id)->result();
		
		$data["profil"] = $this->mod_dataPembelian->lihatTransaksi2($kode)->result();
		$jml 			 		= $this->mod_dataPembelian->jumlahBayar2($id);
		$data['totalBelanja2'] 	= $jml->jumlahBayar2;
		$this->mod_dataPembelian->deleteProduk();
		$this->load->view('V_Transaksi',$data);
	}
	
}
?>
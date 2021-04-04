<?php
class C_dataProduk extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','table'));
		$this->load->model('mod_dataProduk');
	}
	
	public function lihatDataProduk(){
		$data['filter'] = $this->mod_dataProduk->filter()->result();
		$data['tahun']	= $this->mod_dataProduk->tahun2()->result();
		$data['bulan']	= $this->mod_dataProduk->bulan()->result();
		$data['produk'] = $this->mod_dataProduk->lihatDataProduk()->result();
		$this->load->view('backend/V_lihatDataProduk',$data);
	}

	public  function inputDataProduk(){
		$this->load->view('backend/V_inputDataProduk');
	}

	public function prosesInputDataProduk(){
		$this->form_validation->set_rules('namaProduk','nama produk','trim|required|min_length[4]');
		$this->form_validation->set_rules('namaSuplier','nama suplier','trim|required|min_length[4]');
	    $this->form_validation->set_rules('hp','harga penjualan','trim|required|min_length[3]|numeric');
	    $this->form_validation->set_rules('hpp','harga pokok pembelian','required|min_length[3]numeric');
	    $this->form_validation->set_rules('stok','stok','required|min_length[1]|numeric');
	    $this->form_validation->set_rules('berat','berat','required|min_length[1]');
	    $this->form_validation->set_rules('kategori','kategori','required|min_length[4]');
	    $this->form_validation->set_rules('expired','expired');
	    $this->form_validation->set_rules('tglPembelian','tanggal pembelian','required');
	    $this->form_validation->set_rules('deskripsi','deskripsi','required|min_length[6]');
	    $this->form_validation->set_rules('catatan_pendukung','catatan pendukung','min_length[6]');

	    if(isset($_POST['submit'])){
		    if($this->form_validation->run() == false){

		        $this->load->view('backend/V_inputDataProduk');

		    }
		    else{

		        $this->session->set_flashdata('pesan1', 
		                '<div class="alert alert-info ">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>BERHASIL ! </h7>
		                    <p>Berhasil menginputkan data produk</p>
		                </div>');

				$this->load->library('upload');
			    $dataInfo = array();
			    $files = $_FILES;
			    $cpt = count($_FILES['userfile']['name']);
			    for($i=0; $i<$cpt; $i++)
			    {           
			        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
			        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
			        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
			        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

			        $this->upload->initialize($this->set_upload_options());
			        $this->upload->do_upload();
			        $dataInfo[] = $this->upload->data();
			    }

			    $this->upload->initialize($this->set_upload_options());
		        $this->upload->do_upload('pendukung');
		        $gambar = $this->upload->data();

			    $kode           = $this->session->userdata('kodeOperator');   
				$namaProduk 	= $this->input->post('namaProduk');
				$namaSuplier 	= $this->input->post('namaSuplier');
				$deskripsi 		= $this->input->post('deskripsi');
				$expired 		= $this->input->post('expired');
				$hp 			= $this->input->post('hp');
				$hpp 			= $this->input->post('hpp');
				$tglPembelian 	= $this->input->post('tglPembelian');
				$berat 			= $this->input->post('berat');
				$stok 			= $this->input->post('stok');
				$kategori 		= $this->input->post('kategori');
		$catatan_pendukung 		= $this->input->post('catatan_pendukung');
				
				$data 			= array(
					"namaProduk" 			=> $namaProduk,
					"namaSuplier" 			=> $namaSuplier,
					"deskripsi" 			=> $deskripsi,
					"catatan_pendukung" 	=> $catatan_pendukung,
					"expired" 				=> $expired,
					"hargaPenjualan" 		=> $hp,
					"hargaPokokPembelian" 	=> $hpp,
					"tglPembelian" 			=> $tglPembelian,
					"berat" 				=> $berat,
					"stok" 					=> $stok,
					"kategori"				=> $kategori,
					'gambar' 				=> $dataInfo[0]['file_name'],
			        'gambar2' 				=> $dataInfo[1]['file_name'],
			        'gambar3' 				=> $dataInfo[2]['file_name'],
			        'gambar_pendukung'		=> $gambar['file_name'],
	                "kdOperator"            => $kode);
				
				$this->mod_dataProduk->inputDataProduk($data);
				redirect('backend/C_dataProduk/lihatDataProduk');

		    }
		}
	}


	private function set_upload_options(){   
    //upload an image options
	    $config = array();
	    $config['upload_path'] = './gambar_proyek/';
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size']      = 5000000;
	    $config['overwrite']     = FALSE;

	    return $config;
	}

	public function updateDataProduk($kdProduk){
		$data["produk"] = $this->mod_dataProduk->updateDataProduk($kdProduk)->result();
		$this->load->view('backend/V_updateDataProduk', $data);
	}

	public function prosesUpdateDataProduk(){

		$this->form_validation->set_rules('namaProduk','nama produk','trim|required|min_length[4]');
		$this->form_validation->set_rules('namaSuplier','nama suplier','trim|required|min_length[4]');
	    $this->form_validation->set_rules('hp','harga penjualan','trim|required|min_length[3]|numeric');
	    $this->form_validation->set_rules('hpp','harga pokok pembelian','required|min_length[3]numeric');
	    $this->form_validation->set_rules('stok','stok','required|min_length[1]|numeric');
	    $this->form_validation->set_rules('berat','berat','required|min_length[1]');
	    $this->form_validation->set_rules('kategori','kategori','required|min_length[4]');
	    $this->form_validation->set_rules('expired','expired');
	    $this->form_validation->set_rules('tglPembelian','tanggal pembelian','required');
	    $this->form_validation->set_rules('deskripsi','deskripsi','required|min_length[6]');
	    $this->form_validation->set_rules('catatan_pendukung','catatan pendukung','min_length[6]');

	    if(isset($_POST['submit'])){
		    if($this->form_validation->run() == false){

		    	$kdProduk 		= $this->input->post('kdProduk');
		        $data["produk"] = $this->mod_dataProduk->updateDataProduk($kdProduk)->result();
				$this->load->view('backend/V_updateDataProduk', $data);

		    }
		    else{

			    $this->load->library('upload');
			    $dataInfo = array();
			    $files = $_FILES;
			    $cpt = count($_FILES['userfile']['name']);
			    for($i=0; $i<$cpt; $i++)
			    {           
			        $_FILES['userfile']['name']= $files['userfile']['name'][$i];
			        $_FILES['userfile']['type']= $files['userfile']['type'][$i];
			        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			        $_FILES['userfile']['error']= $files['userfile']['error'][$i];
			        $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

			        $this->upload->initialize($this->set_upload_options());
			        $this->upload->do_upload();
			        $dataInfo[] = $this->upload->data();
			    }

			    $this->upload->initialize($this->set_upload_options());
		        $this->upload->do_upload('pendukung');
		        $gambar = $this->upload->data();

				if($dataInfo[0]['file_name'] == null AND $dataInfo[1]['file_name'] == null AND $dataInfo[2]['file_name'] == null AND $gambar['file_name'] == null){
					$kode           = $this->session->userdata('kodeOperator');
				    $kdProduk 		= $this->input->post('kdProduk');
					$namaProduk 	= $this->input->post('namaProduk');
					$namaSuplier 	= $this->input->post('namaSuplier');
					$deskripsi 		= $this->input->post('deskripsi');
					$expired 		= $this->input->post('expired');
					$hp 			= $this->input->post('hp');
					$hpp 			= $this->input->post('hpp');
					$tglPembelian 	= $this->input->post('tglPembelian');
					$berat 			= $this->input->post('berat');
					$stok 			= $this->input->post('stok');
					$kategori 		= $this->input->post('kategori');
			$catatan_pendukung 		= $this->input->post('catatan_pendukung');

					$data 			= array(
						"namaProduk" 			=> $namaProduk,
						"namaSuplier" 			=> $namaSuplier,
						"deskripsi" 			=> $deskripsi,
						"catatan_pendukung" 	=> $catatan_pendukung,
						"expired" 				=> $expired,
						"hargaPenjualan" 		=> $hp,
						"hargaPokokPembelian" 	=> $hpp,
						"tglPembelian" 			=> $tglPembelian,
						"berat" 				=> $berat,
						"stok" 					=> $stok,
						"kategori"				=> $kategori,
		                "kdOperator"            => $kode);
		            $this->mod_dataProduk->prosesUpdateDataProduk($data,$kdProduk);
		        }elseif($dataInfo[0]['file_name'] == null AND $dataInfo[1]['file_name'] == null AND $dataInfo[2]['file_name'] == null){
		        	$kode           = $this->session->userdata('kodeOperator');
				    $kdProduk 		= $this->input->post('kdProduk');
					$namaProduk 	= $this->input->post('namaProduk');
					$namaSuplier 	= $this->input->post('namaSuplier');
					$deskripsi 		= $this->input->post('deskripsi');
					$expired 		= $this->input->post('expired');
					$hp 			= $this->input->post('hp');
					$hpp 			= $this->input->post('hpp');
					$tglPembelian 	= $this->input->post('tglPembelian');
					$berat 			= $this->input->post('berat');
					$stok 			= $this->input->post('stok');
					$kategori 		= $this->input->post('kategori');
			$catatan_pendukung 		= $this->input->post('catatan_pendukung');
			
		        	$data 			= array(
						"namaProduk" 			=> $namaProduk,
						"namaSuplier" 			=> $namaSuplier,
						"deskripsi" 			=> $deskripsi,
						"catatan_pendukung" 	=> $catatan_pendukung,
						"expired" 				=> $expired,
						"hargaPenjualan" 		=> $hp,
						"hargaPokokPembelian" 	=> $hpp,
						"tglPembelian" 			=> $tglPembelian,
						"berat" 				=> $berat,
						"stok" 					=> $stok,
						"kategori"				=> $kategori,
				        'gambar_pendukung'		=> $gambar['file_name'],
		                "kdOperator"            => $kode);
		            $this->mod_dataProduk->prosesUpdateDataProduk($data,$kdProduk);
		        }elseif($gambar['file_name'] == null){
		        	$kode           = $this->session->userdata('kodeOperator');
				    $kdProduk 		= $this->input->post('kdProduk');
					$namaProduk 	= $this->input->post('namaProduk');
					$namaSuplier 	= $this->input->post('namaSuplier');
					$deskripsi 		= $this->input->post('deskripsi');
					$expired 		= $this->input->post('expired');
					$hp 			= $this->input->post('hp');
					$hpp 			= $this->input->post('hpp');
					$tglPembelian 	= $this->input->post('tglPembelian');
					$berat 			= $this->input->post('berat');
					$stok 			= $this->input->post('stok');
					$kategori 		= $this->input->post('kategori');
			$catatan_pendukung 		= $this->input->post('catatan_pendukung');
			
		        	$data 			= array(
						"namaProduk" 			=> $namaProduk,
						"namaSuplier" 			=> $namaSuplier,
						"deskripsi" 			=> $deskripsi,
						"catatan_pendukung" 	=> $catatan_pendukung,
						"expired" 				=> $expired,
						"hargaPenjualan" 		=> $hp,
						"hargaPokokPembelian" 	=> $hpp,
						"tglPembelian" 			=> $tglPembelian,
						"berat" 				=> $berat,
						"stok" 					=> $stok,
						"kategori"				=> $kategori,
						'gambar' 				=> $dataInfo[0]['file_name'],
				        'gambar2' 				=> $dataInfo[1]['file_name'],
				        'gambar3' 				=> $dataInfo[2]['file_name'],
		                "kdOperator"            => $kode);
		            $this->mod_dataProduk->prosesUpdateDataProduk($data,$kdProduk);
		        }

				$this->session->set_flashdata('pesan3', 
			                '<div class="alert alert-info ">    
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h7>BERHASIL ! </h7>
			                    <p>Berhasil mengupdate data produk</p>
			                </div>');
				
				redirect('backend/C_dataProduk/lihatDataProduk');
		    }
		}
		
	}

	public function deleteDataProduk($kdProduk){
		$this->session->set_flashdata('pesan5', 
		                '<div class="alert alert-info ">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>BERHASIL ! </h7>
		                    <p>Berhasil menghapus data produk</p>
		                </div>');
		$this->mod_dataProduk->deleteDataProduk($kdProduk);
		redirect('backend/C_dataProduk/lihatDataProduk');
	}

	public function detailProduk($kdProduk){
		$data["row"] = $this->mod_dataProduk->detailProduk($kdProduk)->result();
		$this->load->view('backend/V_detailDataProduk', $data);
	}

	function grafikProduk(){
		$tahun = $this->input->post('tahun');
		$this->session->set_userdata('tahun', $tahun);
		
		$x['tahun']=  $this->mod_dataProduk->tahun()->result();

		$x['makanan'] 			= $this->mod_dataProduk->get_kategori('Makanan')->row()->data;
		$x['minuman'] 			= $this->mod_dataProduk->get_kategori('Minuman')->row()->data;
		$x['makanan_ringan'] 	= $this->mod_dataProduk->get_kategori('Makanan_Ringan')->row()->data;
		$x['alat_kebersihan'] 	= $this->mod_dataProduk->get_kategori('Alat_Kebersihan')->row()->data;
		$x['alat_tulis'] 		= $this->mod_dataProduk->get_kategori('Alat_Tulis')->row()->data;
		$x['buku_organisasi'] 	= $this->mod_dataProduk->get_kategori('Buku')->row()->data;
		$x['barang_konsinyasi'] = $this->mod_dataProduk->get_kategori('Barang_UKM')->row()->data;
		$x['lain_lain'] 		= $this->mod_dataProduk->get_kategori('Lainnya')->row()->data;

		$x['makanan2'] 				= $this->mod_dataProduk->kategori_value('Makanan')->row()->data;
		$x['minuman2'] 				= $this->mod_dataProduk->kategori_value('Minuman')->row()->data;
		$x['makanan_ringan2'] 		= $this->mod_dataProduk->kategori_value('Makanan_Ringan')->row()->data;
		$x['alat_kebersihan2'] 		= $this->mod_dataProduk->kategori_value('Alat_Kebersihan')->row()->data;
		$x['alat_tulis2'] 			= $this->mod_dataProduk->kategori_value('Alat_Tulis')->row()->data;
		$x['buku_organisasi2'] 		= $this->mod_dataProduk->kategori_value('Buku')->row()->data;
		$x['barang_konsinyasi2'] 	= $this->mod_dataProduk->kategori_value('Barang_UKM')->row()->data;
		$x['lain_lain2'] 			= $this->mod_dataProduk->kategori_value('Lainnya')->row()->data;

      	$x['jml_produk'] 		= $this->mod_dataProduk->jml_produk()->result();
		$x['jml_pesan'] 		= $this->mod_dataProduk->jml_pesan()->result();
		$x['jml_penjualan'] 	= $this->mod_dataProduk->jml_penjualan()->result();

		$x['januari'] 		= $this->mod_dataProduk->get_bulan('01')->result()[0]->total_bayar;
		$x['februari'] 		= $this->mod_dataProduk->get_bulan('02')->result()[0]->total_bayar;
		$x['maret'] 		= $this->mod_dataProduk->get_bulan('03')->result()[0]->total_bayar;
		$x['april'] 		= $this->mod_dataProduk->get_bulan('04')->result()[0]->total_bayar;
		$x['mei'] 			= $this->mod_dataProduk->get_bulan('05')->result()[0]->total_bayar;
		$x['juni'] 			= $this->mod_dataProduk->get_bulan('06')->result()[0]->total_bayar;
		$x['juli'] 			= $this->mod_dataProduk->get_bulan('07')->result()[0]->total_bayar;
		$x['agustus'] 		= $this->mod_dataProduk->get_bulan('08')->result()[0]->total_bayar;
		$x['september'] 	= $this->mod_dataProduk->get_bulan('09')->result()[0]->total_bayar;
		$x['oktober'] 		= $this->mod_dataProduk->get_bulan('10')->result()[0]->total_bayar;
		$x['november'] 		= $this->mod_dataProduk->get_bulan('11')->result()[0]->total_bayar;
		$x['desember'] 		= $this->mod_dataProduk->get_bulan('12')->result()[0]->total_bayar;

		$x['belum_dibayar'] 	= $this->mod_dataProduk->seluruhnya('belum dibayar')->row()->data;
		$x['sudah_dibayar'] 	= $this->mod_dataProduk->seluruhnya('sudah dibayar')->row()->data;
		$x['sudah_dikirim'] 	= $this->mod_dataProduk->seluruhnya('sudah dikirim')->row()->data;
		$x['sudah_diterima'] 	= $this->mod_dataProduk->seluruhnya('sudah diterima')->row()->data;

		$this->load->view('backend/V_lihatGrafikPenjualan',$x);

      	/*$x['makanan'] 			= $makanan;
		$x['minuman'] 			= $minuman;
		$x['makanan_ringan'] 	= $makanan_ringan;
		$x['alat_kebersihan'] 	= $alat_kebersihan;
		$x['alat_tulis'] 		= $alat_tulis;
		$x['buku_organisasi'] 	= $buku_organisasi;
		$x['barang_konsinyasi'] = $barang_konsinyasi;
		$x['lain_lain'] 		= $lain_lain;*/

		/*$bulan_data = ['01' => 'januari',
				'02' => 'febuari',
				'03' => 'maret',
				'04' => 'april',
				'05' => 'mei',
				'06' => 'juni',
				'07' => 'juli',
				'08' => 'agustus',
				'09' => 'september',
				'10' => 'oktober',
				'11' => 'november',
				'12' => 'desember'
			];
		$data_bulan = $this->mod_dataProduk->get_bulan()->result();
		foreach($data_bulan as $row_bulan){
			$bulan = substr($row_bulan->tglPembayaran, 5, 2); 
			$index_bulan = $bulan_data[$bulan];
			$x[$index_bulan] = $row_bulan->total_bayar;
			print_r($index_bulan);
			echo "<br>"; 
		}*/
		                 
		
      	//$data = $this->mod_dataProduk->seluruhnya()->result();

		/*$belumdbyr = $this->mod_dataProduk->seluruhnya('belum dibayar')->row()->data;
		$sudahdbyr = $this->mod_dataProduk->seluruhnya('sudah dibayar')->row()->data;
		$sudahkrm = $this->mod_dataProduk->seluruhnya('sudah dikirim')->row()->data;
		$sudahtrm = $this->mod_dataProduk->seluruhnya('sudah diterima')->row()->data;*/
		/*foreach($data as $row){
			if($row->statusPembayaran == 'belum dibayar') $belumdbyr = $row->data;
			else if($row->statusPembayaran == 'sudah dibayar') $sudahdbyr = $row->data;
			else if($row->statusPembayaran == 'sudah dikirim') $sudahkrm = $row->data;
			else if($row->statusPembayaran == 'sudah diterima') $sudahtrm = $row->data;
		}*/

		/*$x['belum_dibayar'] 	= $belumdbyr;
		$x['sudah_dibayar'] 	= $sudahdbyr;
		$x['sudah_dikirim'] 	= $sudahkrm;
		$x['sudah_diterima'] 	= $sudahtrm;*/
     	//print_r([$belumdbyr, $sudahkrm]);
     	
    }

    public function exportAll(){
		$data['produk'] = $this->mod_dataProduk->lihatDataProduk()->result();
		$this->load->view('backend/V_excelDataProduk',$data);
	}

	public function dataFilter(){
       if(isset($_POST['submit'])){
            $kategori 	= $this->input->post('kategori');
            $tahun 		= $this->input->post('tahun');
            $bulan 		= $this->input->post('bulan');
            $data['produk']= $this->mod_dataProduk->excelFilter($kategori,$tahun,$bulan)->result();
            $this->load->view('backend/V_excelDataProduk',$data);
        }
    }

}

?>
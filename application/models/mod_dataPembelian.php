<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class mod_dataPembelian extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function inputDataPembayaran(){
		$kode 			= $this->session->userdata('kode');
         $this->db->where("idAkun",$kode);
         return $this->db->get("keranjang");
    }

    public function lihatData2($id){
         $this->db->where("kdPembayaran",$id);
         return $this->db->get("pembelian");
    }

    public function lihatData($kode){
         $this->db->where("idAkun",$kode);
         return $this->db->get("konsumen");
    }

    public function ubahAlamat($id){
         $this->db->where("idAkun",$id);
         return $this->db->get("konsumen");
    }

    public function ubahAlamat2($pembayaran){
         $this->db->where("kdPembayaran",$pembayaran);
         return $this->db->get("pembelian");
    }

    public function konfirmasiPembayaran($pembayaran){
         $this->db->where("kdPembayaran",$pembayaran);
         return $this->db->get("pembelian");
    }

    public function lihatTransaksi($id){
         $this->db->where("kodeUnik",$id);
         return $this->db->get("pembelian");
    }

    public function lihatTransaksi2($kode){
         $this->db->where("idAkun",$kode);
         return $this->db->get("konsumen");
    }

    public function dataProduk($id) {
		$this->db->select('pembelian.jml_produk,pembelian.berat, produk.namaProduk, pembelian.subtotal, produk.kategori, produk.gambar, produk.hargaPenjualan');
		$this->db->from('produk');
		$this->db->join('pembelian','pembelian.kdProduk=produk.kdProduk');
		$this->db->where("kodeUnik",$id);
		return $this->db->get();
		
	}

	public function inputPembayaran(){
			$kode 			= $this->session->userdata('kode');
			$totalBayar	= $this->input->post('totalBayar');

			$data= array(

				"totalBayar" 			=> $totalBayar
				
			);
				
			$this->db->where("idAkun",$kode);
				return $this->db->update("keranjang",$data);

	}

	public function inputDataOrder($dataTransaksi){
		$this->db->insert("pembelian",$dataTransaksi);
	}

	public function inputOngkir(){
			$kode 			= $this->session->userdata('kode');
			$kodeUnik 		= random_string('numeric', 3);
			$total 			= random_string('alpha', 5);
			$nama_kurir		= $this->input->post('nama_kurir');
			$harga_ongkir	= $this->input->post('harga_ongkir');

			$data= array(

				"kurir" 			=> $nama_kurir,
				"biayaKirim"		=> $harga_ongkir,
				"kdPembayaran"		=> 'KP'.$total.'KPDK',
				"kodeUnik" 			=> $kodeUnik
				
			);
				$this->db->where("idAkun",$kode);
				return $this->db->update("keranjang",$data);

	}

    function jumlahBayar(){
        
        $kode  = $this->session->userdata('kode');
        $query = $this->db->query("SELECT  SUM(subtotal) as jumlahBayar
                                FROM keranjang
                                WHERE idAkun=$kode");
        return $query->row();
    }
    function jumlahBayar2($id){
        
        $query = $this->db->query("SELECT  SUM(subtotal) as jumlahBayar2
                                FROM pembelian
                                WHERE kodeUnik=$id");
        return $query->row();
    }

	public function lihatTagihan(){
		
		$kode  = $this->session->userdata('kode');
		$this->db->where("idAkun",$kode);
		 return $this->db->get("keranjang");
	}

	public function inputTransaksi($id){
		
		$this->db->where("kodeUnik",$id);
		 return $this->db->get("keranjang");
	}

	public function prosesUpdateAlamat(){

			$kelurahan 		= $this->input->post('kelurahan');
			/*$kecamatan 		= $this->input->post('kecamatan');
			$kota_kab 		= $this->input->post('kota_kab');*/
			$alamatLengkap 	= $this->input->post('alamatLengkap');
			/*$provinsi 		= $this->input->post('provinsi');*/
			$kodePos 		= $this->input->post('kodePos');

			$data 			= array(
				"alamatLengkap" 	=> $alamatLengkap,
				/*"provinsi" 			=> $provinsi,
				"kota_kabupaten"	=> $kota_kab,*/
				"kodePos" 			=> $kodePos,
				"kelurahan" 		=> $kelurahan
				/*"kecamatan" 		=> $kecamatan,*/
			);

				$this->db->where("idAkun",$this->input->post('idAkun'));
				return $this->db->update("konsumen",$data);
	}
	

	public function prosesKonfirmasiPembayaran($gambar){
			
			$data 			= array(
				"tglPembayaran"		=> date("Y-m-d"),
				"statusPembayaran"	=> 'sudah dibayar',
				"strukPembayaran"	=> $gambar

			);

				$this->db->where("kdPembayaran",$this->input->post('kdPembayaran'));
				return $this->db->update("pembelian",$data);
	}

	public function statusTerima(){

			$terima 		= $this->input->post('statusTerima');
			$data 			= array(

				"statusPembayaran"	=> $terima
				
			);

			$this->db->where("kdPembayaran",$this->input->post('terima'));
			return $this->db->update("pembelian",$data);
	}

	public function updateStok($dataStok,$produk,$id){

		$this->db->join('pembelian','produk.kdProduk=pembelian.kdProduk');
		$this->db->set($dataStok);
		$this->db->where('produk.kdProduk',$produk);
		return $this->db->update('produk');
	}

	public function kurangStok($id) {
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('pembelian','pembelian.kdProduk=produk.kdProduk');
		$this->db->where("kdPembayaran",$id);
		return $this->db->get();
		
	}

	public function sessionTransaksi($limit, $start){
		$kode = $this->session->userdata('kode');
		$this->db->distinct();
		$this->db->select("totalBayar,kdPembayaran,kodeUnik,tglTransaksi,noResi,statusPembayaran,strukPembayaran");
		$this->db->where("idAkun",$kode);
		$this->db->order_by('tglTransaksi','DESC');
		 return $this->db->get("pembelian",$limit, $start);
	}

	/*public function sessionTransaksi($limit, $start){
		$kode = $this->session->userdata('kode');
		$this->db->limit($limit, $start);
		$this->db->distinct();
		$this->db->select("pembelian.totalBayar,pembelian.kdPembayaran,pembelian.kodeUnik,pembelian.tglTransaksi,pembelian.noResi,pembelian.statusPembayaran,pembelian.strukPembayaran,produk.namaProduk");
		$this->db->from('pembelian');
		$this->db->join('produk','produk.kdProduk=pembelian.kdProduk');
		$this->db->where("idAkun",$kode);
		$this->db->order_by('tglTransaksi','DESC');
		 return $this->db->get();
	}*/

	public function deleteProduk(){
		$kode 			= $this->session->userdata('kode');
        $this->db->where("idAkun",$kode);
        return $this->db->delete("keranjang");
    }

}
?>
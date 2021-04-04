<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class mod_dataPenjualan extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function lihatDataPenjualan(){
		$this->db->distinct();
		$this->db->select("idAkun,kdPembayaran,totalBayar,statusPembayaran,tglTransaksi,tglPembayaran");
		$this->db->order_by('tglPembayaran','DESC');
		return $this->db->get("pembelian");
	}

	public function lihatDataPenjualan2(){
		
		$this->db->order_by('tglPembayaran','DESC');
		return $this->db->get("pembelian");
	}

    public function detailDataPenjualan2($kdPembayaran){
        $this->db->select('*');
		$this->db->from('konsumen');
		$this->db->join('pembelian','pembelian.idAkun = konsumen.idAkun');
		$this->db->where("kdPembayaran",$kdPembayaran);
		return $this->db->get();
    }

	public function updateDataPenjualan($kdPembayaran){
		 $this->db->where("kdPembayaran",$kdPembayaran);
		 return $this->db->get("pembelian");
	}

	public function prosesUpdateDataPenjualan(){
			$kode			= $this->input->post('bismillah');
			$noResi 		= $this->input->post('noResi');
			$kdPembayaran 	= $this->input->post('kdPembayaran');
			$data 			= array(
				
				"noResi" 					=> $noResi,
				"statusPembayaran"			=> 'sudah dikirim',
				"kdOperator"				=> $kode
				
			);

		$this->db->where("kdPembayaran",$kdPembayaran);
		return $this->db->update("pembelian",$data);
	}

	public function prosesUpdateDataPenjualan2(){
			$kode			= $this->input->post('bismillah');
			$catatan 		= $this->input->post('catatan');
			$kdPembayaran 	= $this->input->post('kdPembayaran');
			$data 			= array(
				
				"catatan" 					=> $catatan,
				"statusPembayaran"			=> 'belum dibayar',
				"kdOperator"				=> $kode
				
			);

		$this->db->where("kdPembayaran",$kdPembayaran);
		return $this->db->update("pembelian",$data);
	}

	public function filter(){
        return $this->db->query("SELECT DISTINCT statusPembayaran FROM pembelian");
    }

    public function bulan(){
        return $this->db->query("SELECT DISTINCT MONTH(tglPembayaran) AS bulan FROM pembelian  order by bulan ASC");
    }

    public function excelFilter($status,$tahun,$bulan)
    {
        $query = "select * from pembelian where";

        if ($bulan >= 10) {

	        if($status != ""){
	         $query = $query." statusPembayaran = '".$status."' and";
	        }

	        if($tahun != ""){
	        $query = $query." tglPembayaran BETWEEN '".$tahun."-".$bulan."-01' AND '".$tahun."-".$bulan."-31' and";
	        }

	    }else{

	    	if($status != ""){
	         $query = $query." statusPembayaran = '".$status."' and";
	        }

	        $bln = "0".$bulan;
	        if($tahun != ""){
	        $query = $query." tglPembayaran BETWEEN '".$tahun."-".$bln."-01' AND '".$tahun."-".$bln."-31' and";
	        }
	    }

        $bismillah = substr($query, 0,-3);// membuang and

        return $this->db->query("$bismillah");        
    }

    public function tahun2(){
        return $this->db->query("SELECT DISTINCT YEAR(tglPembayaran) AS tanggal1 FROM pembelian  order by tanggal1 desc");
    }

}
?>
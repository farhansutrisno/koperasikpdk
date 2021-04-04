<?php
defined('BASEPATH') or exit ('no direct script access allowed');
class mod_dataOperator extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function detailDataOperator($kdOperator){
         $this->db->where("kdOperator",$kdOperator);
         return $this->db->get("operator");
    }

	public function inputDataOperator($gambar){
			
			$namaLengkap 	= $this->input->post('namaLengkap');
			$username 		= $this->input->post('username');
			$password 		= $this->input->post('password');
			$email 			= $this->input->post('email');
			$tglLahir 		= $this->input->post('tglLahir');
			$noTelepon 		= $this->input->post('noTelepon');
			$jenisKelamin 	= $this->input->post('jenisKelamin');
			$kelurahan 		= $this->input->post('kelurahan');
			$kecamatan		= $this->input->post('kecamatan');
			$kota_kab 		= $this->input->post('kota_kab');
			$provinsi		= $this->input->post('provinsi');
			$alamatLengkap	= $this->input->post('alamatLengkap');
			$kodePos		= $this->input->post('kodePos');
		
			$data 			= array(
				"namaLengkap" 		=> $namaLengkap,
				"username" 			=> $username,
				"password" 			=> $password,
				"email" 			=> $email,
				"tglLahir" 			=> $tglLahir,
				"noTelepon" 		=> $noTelepon,
				"jenisKelamin" 		=> $jenisKelamin,
				"kelurahan" 		=> $kelurahan,
				"kecamatan" 		=> $kecamatan,
				"kota_kab"			=> $kota_kab,
				"provinsi"			=> $provinsi,
				"alamatLengkap"		=> $alamatLengkap,
				"kodePos"			=> $kodePos,
				"foto"				=> $gambar
			);

				$this->db->insert('operator',$data);
	}

	public function lihatDataOperator(){
		return $this->db->get("operator");
	}
	
	public function deleteDataOperator($kdOperator){
		$this->db->where("kdOperator",$kdOperator);
		return $this->db->delete("operator");
	}

	public function updateDataOperator($kdOperator){
		 $this->db->where("kdOperator",$kdOperator);
		 return $this->db->get("operator");
	}

	public function prosesUpdateDataOperator($gambar){

			if($gambar==null){

				$kdOperator 	= $this->input->post('kdOperator');
				$namaLengkap 	= $this->input->post('namaLengkap');
				$username 		= $this->input->post('username');
				$password 		= $this->input->post('password');
				$email 			= $this->input->post('email');
				$tglLahir 		= $this->input->post('tglLahir');
				$noTelepon 		= $this->input->post('noTelepon');
				$jenis 			= $this->input->post('jenis');
				$kelurahan 		= $this->input->post('kelurahan');
				$kecamatan		= $this->input->post('kecamatan');
				$kota_kab 		= $this->input->post('kota_kab');
				$provinsi		= $this->input->post('provinsi');
				$alamatLengkap	= $this->input->post('alamatLengkap');
				$kodePos		= $this->input->post('kodePos');

				$data 			= array(
					"namaLengkap" 		=> $namaLengkap,
					"username" 			=> $username,
					"password" 			=> $password,
					"email" 			=> $email,
					"tglLahir" 			=> $tglLahir,
					"noTelepon" 		=> $noTelepon,
					"jenisKelamin" 		=> $jenis,
					"kelurahan" 		=> $kelurahan,
					"kecamatan" 		=> $kecamatan,
					"kota_kab"			=> $kota_kab,
					"provinsi"			=> $provinsi,
					"alamatLengkap"		=> $alamatLengkap,
					"kodePos"			=> $kodePos 
				);

			$this->db->where("kdOperator",$kdOperator);
			return $this->db->update("operator",$data);
		}else{
				$kdOperator 	= $this->input->post('kdOperator');
				$namaLengkap 	= $this->input->post('namaLengkap');
				$username 		= $this->input->post('username');
				$password 		= $this->input->post('password');
				$email 			= $this->input->post('email');
				$tglLahir 		= $this->input->post('tglLahir');
				$noTelepon 		= $this->input->post('noTelepon');
				$jenis 			= $this->input->post('jenis');
				$kelurahan 		= $this->input->post('kelurahan');
				$kecamatan		= $this->input->post('kecamatan');
				$kota_kab 		= $this->input->post('kota_kab');
				$provinsi		= $this->input->post('provinsi');
				$alamatLengkap	= $this->input->post('alamatLengkap');
				$kodePos		= $this->input->post('kodePos');

				$data 			= array(
					"namaLengkap" 		=> $namaLengkap,
					"username" 			=> $username,
					"password" 			=> $password,
					"email" 			=> $email,
					"tglLahir" 			=> $tglLahir,
					"noTelepon" 		=> $noTelepon,
					"jenisKelamin" 		=> $jenis,
					"kelurahan" 		=> $kelurahan,
					"kecamatan" 		=> $kecamatan,
					"kota_kab"			=> $kota_kab,
					"provinsi"			=> $provinsi,
					"alamatLengkap"		=> $alamatLengkap,
					"kodePos"			=> $kodePos,
					"foto"				=> $gambar 
				);

			$this->db->where("kdOperator",$kdOperator);
			return $this->db->update("operator",$data);
		}
	}
}
?>
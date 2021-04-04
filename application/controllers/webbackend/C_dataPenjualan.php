<?php
class C_dataPenjualan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','table'));
		$this->load->model('mod_dataPenjualan');
	}
	
	public function lihatDataPenjualan(){
		$data['status'] = $this->mod_dataPenjualan->filter()->result();
		$data['tahun']	= $this->mod_dataPenjualan->tahun2()->result();
		$data['bulan']	= $this->mod_dataPenjualan->bulan()->result();
		$data['penjualan'] = $this->mod_dataPenjualan->lihatDataPenjualan()->result();
		$this->load->view('backend/V_lihatDataPenjualan',$data);
	}

	public function detailDataPenjualan2($kdPembayaran){
		$data["row"] = $this->mod_dataPenjualan->detailDataPenjualan2($kdPembayaran)->result();
		$this->load->view('backend/V_detailDataPenjualan', $data);
	}

	public function updateDataPenjualan($kdPembayaran){
		$data["penjualan"] = $this->mod_dataPenjualan->updateDataPenjualan($kdPembayaran)->result();
		$this->load->view('backend/V_updateDataPenjualan', $data);
	}

	public function prosesUpdateDataPenjualan(){

	    $this->form_validation->set_rules('noResi','noResi','required|min_length[7]|numeric');

	    if(isset($_POST['submit'])){
		    if($this->form_validation->run() == false){

		    	$kdPembayaran		= $this->input->post('kdPembayaran');
		        $data["penjualan"] 	= $this->mod_dataPenjualan->updateDataPenjualan($kdPembayaran)->result();
				$this->load->view('backend/V_updateDataPenjualan', $data);

		    }
		    else{

				$this->session->set_flashdata('pesan1', 
			                '<div class="alert alert-info ">    
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h7>BERHASIL ! </h7>
			                    <p>Data penjualan berhasil diupdate</p>
			                </div>');
				$this->mod_dataPenjualan->prosesUpdateDataPenjualan();
				redirect('backend/C_dataPenjualan/lihatDataPenjualan');

		    }
		}

	}

	public function prosesUpdateDataPenjualan2(){

	    $this->form_validation->set_rules('catatan','catatan','required|min_length[7]');

	    if(isset($_POST['submit'])){
		    if($this->form_validation->run() == false){

		    	$kdPembayaran		= $this->input->post('kdPembayaran');
		        $data["penjualan"] 	= $this->mod_dataPenjualan->updateDataPenjualan($kdPembayaran)->result();
				$this->load->view('backend/V_updateDataPenjualan', $data);

		    }
		    else{

				$this->session->set_flashdata('pesan2', 
			                '<div class="alert alert-info ">    
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h7>BERHASIL ! </h7>
			                    <p>Data penjualan berhasil diupdate</p>
			                </div>');
				$this->mod_dataPenjualan->prosesUpdateDataPenjualan2();
				redirect('backend/C_dataPenjualan/lihatDataPenjualan');

		    }
		}

	}

	public function exportAll(){
		$data['penjualan'] = $this->mod_dataPenjualan->lihatDataPenjualan2()->result();
		$this->load->view('backend/V_excelDataPenjualan',$data);
	}

	public function dataFilter(){
       if(isset($_POST['submit'])){
            $status 	= $this->input->post('statusPembayaran');
            $tahun 		= $this->input->post('tahun');
            $bulan 		= $this->input->post('bulan');
            $data['penjualan']= $this->mod_dataPenjualan->excelFilter($status,$tahun,$bulan)->result();
            $this->load->view('backend/V_excelDataPenjualan',$data);
        }
    }
}

?>
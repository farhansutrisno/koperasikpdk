<?php
class C_dataOperator extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('form_validation','table'));
		$this->load->model('mod_dataOperator');
	}

	public function login(){
		$this->load->view('webbackend/V_loginAdmin');
	}

	//function dibawah ini tidak dipakai
	public function homeBackEnd(){
		$this->load->view('webbackend/V_homeBackEnd');
	}

	public  function lihatDataOperator(){
		$data['operator'] = $this->mod_dataOperator->lihatDataOperator()->result();
		$this->load->view('webbackend/V_lihatDataOperator',$data);
	}

	public function inputDataOperator(){
		$this->load->view('webbackend/V_inputDataOperator');
	}

	public function prosesInputDataOperator(){
		$this->form_validation->set_rules('namaLengkap','nama lengkap','trim|required|min_length[4]');
		$this->form_validation->set_rules('username','username','trim|required|min_length[4]|alpha_dash');
	    $this->form_validation->set_rules('password','password','trim|required|min_length[4]|alpha_dash');
	    $this->form_validation->set_rules('email','email','required|min_length[3]|valid_email');
	    $this->form_validation->set_rules('tglLahir','tanggal lahir','required');
	    $this->form_validation->set_rules('noTelepon','no telepon','required|min_length[10]|numeric');
	    $this->form_validation->set_rules('jenisKelamin','jenis kelamin','required');
	    $this->form_validation->set_rules('kelurahan','kelurahan','required|min_length[4]');
	    $this->form_validation->set_rules('kecamatan','kecamatan','required|min_length[4]');
	    $this->form_validation->set_rules('kota_kab','kota/kabupaten','required|min_length[4]');
	    $this->form_validation->set_rules('provinsi','provinsi','required|min_length[4]');
	    $this->form_validation->set_rules('alamatLengkap','alamat lengkap','required|min_length[6]');
	    $this->form_validation->set_rules('kodePos','kode pos','required|min_length[4]|numeric');

	    if(isset($_POST['submit'])){
		    if($this->form_validation->run() == false){
		        $this->load->view('webbackend/V_inputDataOperator');
		    }
		    else{
		        $config['upload_path']='./gambar_proyek/';
	            $config['allowed_types']='jpg|png|jpeg|gif';
	            $config['max_size'] = 5000000;
	            $this->load->library('upload',$config);
	            $this->upload->do_upload();
	            $data   =  $this->upload->data();

	            
				$this->session->set_flashdata('pesan3', 
			                '<div class="alert alert-info ">    
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h7>BERHASIL ! </h7>
			                    <p>Berhasil membuat data operator baru</p>
			                </div>');
				$this->mod_dataOperator->inputDataOperator($data['file_name']);
				redirect('webbackend/C_dataOperator/lihatDataOperator');
		    }
		}

	}

	//funtion dibawah ini tidak dipakai
	//=============================================================================================================
	/*function periksasatu($username){
		if (! preg_match('/^[a-zA-Z\s.,123456789]+$/',$username)) {
			$this->form_validation->set_massage('periksasatu','gunakan huruf atau angka dalam mengisi');
			return false;
		}else{
			return true;
		}
	}

	function periksadua($username){
		if (! preg_match('/^[a-zA-Z\s.,123456789]+$/',$username)) {
			$this->form_validation->set_massage('periksasatu','gunakan huruf, karakter atau angka dalam mengisi');
			return false;
		}else{
			return true;
		}
	}*/
	//===================================================================================================================

	public function updateDataOperator($kdOperator){
		$data["operator"] = $this->mod_dataOperator->updateDataOperator($kdOperator)->row_array();
		$this->load->view('webbackend/V_updateDataOperator', $data);
	}

	public function prosesUpdateDataOperator(){
		$this->form_validation->set_rules('namaLengkap','nama lengkap','trim|required|min_length[4]');
		$this->form_validation->set_rules('username','username','trim|required|min_length[4]|alpha_dash');
	    $this->form_validation->set_rules('password','password','trim|required|min_length[4]|alpha_dash');
	    $this->form_validation->set_rules('email','email','required|min_length[3]|valid_email');
	    $this->form_validation->set_rules('tglLahir','tanggal lahir','required');
	    $this->form_validation->set_rules('noTelepon','no telepon','required|min_length[10]|numeric');
	    $this->form_validation->set_rules('jenis','jenis kelamin','required');
	    $this->form_validation->set_rules('kelurahan','kelurahan','required|min_length[4]');
	    $this->form_validation->set_rules('kecamatan','kecamatan','required|min_length[4]');
	    $this->form_validation->set_rules('kota_kab','kota/kabupaten','required|min_length[4]');
	    $this->form_validation->set_rules('provinsi','provinsi','required|min_length[4]');
	    $this->form_validation->set_rules('alamatLengkap','alamat lengkap','required|min_length[6]');
	    $this->form_validation->set_rules('kodePos','kode pos','required|min_length[4]|numeric');

	    if(isset($_POST['submit'])){
		    if($this->form_validation->run() == false){
		    	$id 				= $this->input->post('kdOperator');
		        $data["operator"] 	= $this->mod_dataOperator->updateDataOperator($id)->row_array();
				$this->load->view('webbackend/V_updateDataOperator', $data);
		    }
		    else{
		        $config['upload_path']='./gambar_proyek/';
	            $config['allowed_types']='jpg|png|jpeg|gif';
	            $config['max_size'] = 5000000;
	            $this->load->library('upload',$config);
	            $this->upload->do_upload();
	            $data   =  $this->upload->data();

				$this->session->set_flashdata('pesan5', 
			                '<div class="alert alert-info ">    
			                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			                <h7>BERHASIL ! </h7>
			                    <p>Berhasil mengupdate data operator<br/></p>
			                </div>');
				$this->mod_dataOperator->prosesUpdateDataOperator($data['file_name']);
				redirect('webbackend/C_dataOperator/lihatDataOperator');
		    }
		}

	}

	public function deleteDataOperator($kdOperator){
		$this->session->set_flashdata('pesan7', 
		                '<div class="alert alert-info ">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>BERHASIL ! </h7>
		                    <p>Berhasil menghapus data operator<br/></p>
		                </div>');
		$this->mod_dataOperator->deleteDataOperator($kdOperator);
		redirect('webbackend/C_dataOperator/lihatDataOperator');
	}

	public function prosesLoginAdmin(){
		
		$data = $this->mod_dataOperator->lihatDataOperator()->result_array();
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$no =0;
		foreach ($data as $key) {
			
			if($username == $key['username'] && $password == $key['password']){
				$no=1;

				$this->session->set_userdata('namaAdmin',$key['username']);
				$this->session->set_userdata('namaLengkap',$key['namaLengkap']);
				$this->session->set_userdata('kodeOperator',$key['kdOperator']);
				$this->session->set_userdata('foto',$key['foto']);

				$this->session->set_flashdata('pesan1', 
	 	                '<div class="alert alert-info ">    
	                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                <h7>BERHASIL ! </h7>
	                    <p>Berhasil login sebagai Admin<br/></p>
	                </div>');
				redirect('webbackend/C_dataProduk/grafikProduk');
			}
		}
		if ($no==0) {
			$this->session->set_flashdata('pesan2', 
		                '<div class="alert alert-danger">    
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <h7>GAGAL LOGIN ! </h7>
		                    <p>Harap memasukan data valid<br/>
		                    Terima kasih.</p>
		                </div>');
			redirect('webbackend/C_dataOperator/login');
		}
	}

	public function detailDataOperator($kdOperator){
		$data["row"] = $this->mod_dataOperator->detailDataOperator($kdOperator)->result();
		$this->load->view('webbackend/V_detailDataOperator', $data);
	}

	public function logout(){
		$this->session->unset_userdata('namaAdmin');
		$this->session->unset_userdata('namaLengkap');
		$this->session->unset_userdata('kdOperator');
		$this->session->unset_userdata('foto');
		$this->session->unset_userdata('tahun');
		redirect('webbackend/C_dataOperator/login');
	}

}

?>
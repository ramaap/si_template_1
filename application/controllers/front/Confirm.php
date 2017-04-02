<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class confirm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_checkout');
		$this->load->library('upload');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("Home");     
        $this->load->view('front/pages/confirm');
    }
	public function add(){
        $this->lib->check_session_customer();
				$config['upload_path']    = dirname(BASEPATH).'/include/bukti_transfer/';
				$config['allowed_types']  = 'gif|jpg|png|jpeg';
						 
				$this->load->library('upload');
				$this->upload->initialize($config);
				//______________________upload front
				if (!$this->upload->do_upload("bukti_transfer")) {
					 echo "Error";
				}else{
					$datafoto=$this->upload->data();
					$nm_file = trim(str_replace(" ","",date('dmYHis'))).$datafoto['orig_name'];
					copy('include/bukti_transfer/'.$datafoto['orig_name'], 'include/bukti_transfer/'.$nm_file);	
				}
				
		$customerCustomer = array(
			'customer_id' => $this->session->userdata("customer_id"),
			'order_no' => urldecode($_POST['order_no']),
			'jml_bayar' => urldecode($_POST['jml']),
			'bank' => urldecode($_POST['bank']),
			'no_rek' => urldecode($_POST['no_rek']),
			'nama_rek' => urldecode($_POST['nama_rek']),
			'tgl' => urldecode($_POST['tgl']),
			'keterangan' => urldecode($_POST['ket']),
			'bukti_transfer' => $nm_file,
			'status' => "Open",
			'last_update' => date("y-m-d h:i:s")
		);
		$this->data_checkout->insert_konfirmasi_bayar($customerCustomer);
				
        $this->session->set_userdata('alert',"Data Konfirmasi berhasil dikirim");  		
		redirect('front/confirm');
            
        
	}

}

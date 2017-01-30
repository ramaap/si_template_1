<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class confirm extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_checkout');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("Home");     
        $this->load->view('front/pages/confirm');
    }
	public function add(){
        $this->lib->check_session_customer();
		$customerCustomer = array(
			'customer_id' => $this->session->userdata("customer_id"),
			'order_no' => urldecode($_POST['order_no']),
			'jml_bayar' => urldecode($_POST['jml']),
			'bank' => urldecode($_POST['bank']),
			'no_rek' => urldecode($_POST['no_rek']),
			'nama_rek' => urldecode($_POST['nama_rek']),
			'tgl' => urldecode($_POST['tgl']),
			'keterangan' => urldecode($_POST['ket']),
			'status' => "Open",
			'last_update' => date("y-m-d h:i:s")
		);
		$this->data_checkout->insert_konfirmasi_bayar($customerCustomer);
				
        $this->session->set_userdata('alert',"Data Konfirmasi berhasil dikirim");  		
		redirect('front/confirm');
            
        
	}

}

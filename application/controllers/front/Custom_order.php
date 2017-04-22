<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class custom_order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_custom_order');

        // Place your model here...
    }

	public function index() {
        // $this->lib->check_session_customer();
        $this->lib->check_lokasi("Custom Order");     
        $this->load->view('front/pages/custom_order');
    }
	public function add(){
        // $this->lib->check_session_customer();
		$customerCustomer = array(
			'custom_nama' => urldecode($_POST['custom_nama']),
			'custom_status' => "Open",
			'custom_tgl' => date('y-m-d'),
			'custom_email' => urldecode($_POST['custom_email']),
			'custom_telp' => urldecode($_POST['custom_telp']),
			'custom_keterangan' => urldecode($_POST['custom_keterangan']),
			'last_update' => date("y-m-d h:i:s")
		);
		$this->data_custom_order->insert($customerCustomer);
				
        $this->session->set_userdata('alert',"Data Custom Order berhasil dikirim, Kami akan segera mengirimkan email konfirmasi terkait pesanan Anda");  		
		redirect('front/custom_order');
            
        
	}
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class checkout_success extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');

        // Place your model here...
    }

	public function index() {
        $this->lib->check_session_customer();
        $this->lib->check_lokasi("Checkout"); 
		$data['order'] = $this->db->query("select *,order_ongkir+order_total as total from transaksi
								  where is_delete=0 
								  and order_id = ".$this->session->userdata('order_id')."
								  ")->row();    
        $this->load->view('front/pages/checkout/checkout_success',$data);
    }
}
